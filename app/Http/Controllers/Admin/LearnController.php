<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\LearnRequest;

use App\Http\Requests;
use App\Models\Learn;
use App\Models\Author;
use DB;
use App\Mark;
use App\MarkResource;

class LearnController extends Controller
{
    protected $learn_m;
    protected $paginate = 50;

    public function __construct(Learn $learn_m)
    {
        $this->learn_m = $learn_m;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');
		$route = 'admin.learn.index';
		
		$search = $request->search ? $request->search : false;
		$parent_id = $request->parent_id ? $request->parent_id : false;
		$categorize = ($request->categorize !== null && $request->categorize !== '') ? ($request->categorize ? 1 : 0) : false;
		$order_by = $request->order_by ? $request->order_by : 'published_at';
		$sort_by = $request->sort_by ? $request->sort_by : 'desc';
		
		$learns = $this->learn_m->with(['parent','childrens']);
		
		if($search!==false){
			#$learns = $learns->where('title','LIKE','%'.$search.'%');
			$learns = $learns->where(function ($query) use ($search) {
                $query->where('title','LIKE','%'.$search.'%')
                      ->orWhere('wid','LIKE','%'.$search.'%')
                      ->orWhere('author','LIKE','%'.$search.'%');
            });
		}
		
		if($parent_id!==false){
			$learns = $learns->where('parent_id','=',$parent_id);
		}
		
		if($categorize!==false){
			$learns = ($categorize) ? $learns->where('children','>',0) : $learns->where('children','=',0);
		}

		$learns = $learns->orderBy($order_by, $sort_by);
		$learns = $learns->paginate($this->paginate);
		

		$links = $learns->appends([
									'search' => $request->search, 
									'parent_id' => $request->parent_id, 
									'order_by' => $request->order_by, 
									'sort_by' => $request->sort_by
								])->render();
			
		$pathes = $this->learn_m->where('children','>',0)->select('id','wid','path','title')->get();
		$order_by = ['ID'=>'id','Дата'=>'published_at','Название'=>'title','Цена'=>'price'];
		
		return view('admin.learn.index', compact('learns', 'links', 'order_by', 'pathes'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$url = config('files.url') . '?langCode=' . config('app.locale');
		
		$data = $this->learn_m;
		
		$pathes = $this->learn_m->where('children','>',0)->select('id','wid','path','title')->get();
		$authors = Author::where('type','=','iteam')->select('id','name')->get();

		return view('admin.learn.create', compact('url', 'data', 'pathes', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LearnRequest $request)
    {
		$learn = $this->learn_m;
		$upd = [];

		$upd["title"] = $request->input("title") ? $request->input("title") : '';
		$upd["intro"] = $request->input("intro") ? $request->input("intro") : '';
		$upd["text"] = $request->input("text") ? $request->input("text") : '';
		
		$upd["ptext"] = $request->input("ptext") ? $request->input("ptext") : '';

		$upd["parent_id"] = $request->input("parent_id") ? $request->input("parent_id") : null;
		if(is_null($upd["parent_id"])) return redirect()->back()->withInput()->with('error','Не определён ID категории');
		
		$upd["wid"] = $request->input("wid") ? $request->input("wid") : '';
		if(!$upd["wid"]) {
			$upd["wid"] = substr( crypt( md5( time() . $upd['title'] ) , time() ), 2, 6);
		}
		
		$upd["author_id"] = $request->input("author_id") ? $request->input("author_id") : 0;
		if($upd["author_id"]) {
			$author = Author::find($upd["author_id"]);
			if($author && $author->name) $upd["author"] = $author->name;
			else $upd["author_id"] = 0;
		}
		if(!$upd["author_id"]) $upd["author"] = $request->input("author") ? $request->input("author") : '';

		if($rImg = $request->file('img')) {
			
			$fileName = md5($rImg->getFileName()).'.'.$rImg->extension();
			$destinationPath = 'filemanager/userfiles/user0/content';
			if($rImg->move($destinationPath, $fileName)){
				$upd["img"] = '/' . $destinationPath . '/' . $fileName;
			}
		}
		/*
		if($request->file('avatar')){
			$files = $upload->store($request, 'avatar');
			if($files['errors']) $errors = implode('<br>',$files['errors'][0]);
			if($files['files']) $user->avatar = $files['files'][0];
		}
		*/
		
		$upd["price"] = $request->input("price") ? floatval($request->input("price")) : 0.00;
		$upd["old_price"] = $request->input("old_price") ? floatval($request->input("old_price")) : 0.00;
		$upd["currency"] = 'RUB';
		
		$upd["response_id"] = $request->input("response_id") ? $request->input("response_id") : '';
		$upd["pack"] = $request->input("pack") ? $request->input("pack") : '';
		
		$upd["meta_title"] = $request->input("meta_title") ? $request->input("meta_title") : $upd["title"];
		$upd["meta_description"] = $request->input("meta_description") ? $request->input("meta_description") : strip_tags($upd["intro"]);
		$upd["meta_keywords"] = $request->input("meta_keywords") ? $request->input("meta_keywords") : $upd["title"];
		$upd["published_at"] = $request->input("published_at") ? date("Y-m-d H:i:s",strtotime($request->input("published_at"))) : date("Y-m-d H:i:s");
		
		$upd["started_at"] = $request->input("started_at") ? date("Y-m-d H:i:s",strtotime($request->input("started_at"))) : '0000-00-00 00:00:00';
		$upd["finished_at"] = $request->input("finished_at") ? date("Y-m-d H:i:s",strtotime($request->input("finished_at"))) : '0000-00-00 00:00:00';
		
		$upd["wid"] = $request->input("wid") ? $request->input("wid") : '';
		
		$parent = $this->learn_m->with('childrens')->find($upd["parent_id"]);
		if(!$parent) return redirect()->back()->withInput()->with('error','Не найдена категория');
		
		if(null !== $request->input("children")) {
			$upd["children"] = 1;
		}
		
		if(null !== $request->input("public")) {
			$upd["public"] = $request->input("public");
		}
		else {
			$upd["public"] = 0;
		}
		
		$upd["path"] = ($parent->path ? $parent->path : '/') . ($parent->wid ? $parent->wid . '/' : '');
		
		//find nounique by path & wid 
		if($path_wid = $this->learn_m->where('path','=',$upd["path"])->where('wid','=',$upd["wid"])->first()) {
			$upd["wid"] = substr( crypt( md5( time() . $upd['title'] ) , 2*time() ), 2, 6);
		}
		
		$upd["path_ids"] = ($parent->path_ids ? $parent->path_ids . '.' : ($parent->parent_id ? $parent->parent_id . '.' : '' )) . $parent->id;
		$upd["created_at"] = $upd["published_at"];
		
		foreach($upd AS $ak=>$av) {
			$learn->$ak =  $av;
		}
		
		$id = $learn->save() ? $learn->id : null;
		
		if(!$id) return redirect()->back()->withInput()->with('error','Ошибка при создании публикации');
		
		// change parent's children count
		$parent->children = $parent->childrens->count();
		$parent->save();
		
		return redirect()->route('admin.learn.show',[$id])->with('status','Создано успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');

		$data = $this->learn_m->with(['parent','childrens','authors'])->findOrFail($id);
		
		#dd($data);
		
		$pathes = $this->learn_m->where('children','>',0)->select('id','wid','path','title')->get();
		$crumbs = ($data->path_ids) ? $this->learn_m->whereIn('id',explode('.',$data->path_ids))->select('id','title')->get() : null;
		$authors = Author::where('type','=','iteam')->select('id','name')->get();
        $marks = Mark::all();
        $marksOld = MarkResource::where('type_resource', 3)->where('id_resource', $id)->get();
		return view('admin.learn.show', compact('url', 'data', 'pathes', 'crumbs', 'authors', 'marks', 'marksOld'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route("admin.learn.show",[$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LearnRequest $request, $id)
    {
		$learn = $this->learn_m->with('childrens')->findOrFail($id);
		$upd = [];
		
		$upd["title"] = $request->input("title") ? $request->input("title") : $learn->title;
		$upd["intro"] = $request->input("intro") ? $request->input("intro") : $learn->intro;
		$upd["text"] = $request->input("text") ? $request->input("text") : $learn->text;
		
		$upd["ptext"] = $request->input("ptext") ? $request->input("ptext") : $learn->ptext;
		
		
		$upd["parent_id"] = $request->input("parent_id") ? (int)$request->input("parent_id") : $learn->parent_id;
		if(is_null($upd["parent_id"])) return redirect()->back()->withInput()->with('error','Не определён ID категории');
		$upd["wid"] = $request->input("wid") ? $request->input("wid") : $learn->wid;
		$change_parent = ($learn->parent_id !== $upd["parent_id"]) ? 1 : 0;

		if($change_parent) {
			$parent = $this->learn_m->with('childrens')->find($upd["parent_id"]);
			if(!$parent) return redirect()->back()->withInput()->with('error','Не найдена категория');
			
			$upd["path"] = ($parent->path ? $parent->path : '/') . ($parent->wid ? $parent->wid . '/' : '');
			
			//find nounique by path & wid
			if($this->learn_m->where('path','=',$upd["path"])->where('wid','=',$upd["wid"])->get()->count() > 1) {
				$upd["wid"] = substr( crypt( md5( time() . $upd['title'] ) , 2*time() ), 2, 6);
			}
			$upd["path_ids"] = ($parent->path_ids ? $parent->path_ids . '.' : ($parent->parent_id ? $parent->parent_id . '.' : '' )) . $parent->id;
		}

		$upd["author_id"] = $request->input("author_id") ? $request->input("author_id") : $learn->author_id;
		if($upd["author_id"]) {
			$author = Author::find($upd["author_id"]);
			if($author && $author->name) $upd["author"] = $author->name;
			else $upd["author_id"] = 0;
		}
		if(!$upd["author_id"]) $upd["author"] = $request->input("author") ? $request->input("author") : $learn->author;
		
		if($rImg = $request->file('img')) {
			
			$fileName = md5($rImg->getFileName()).'.'.$rImg->extension();
			$destinationPath = 'filemanager/userfiles/user0/content';
			if($rImg->move($destinationPath, $fileName)){
				$upd["img"] = '/' . $destinationPath . '/' . $fileName;
			}
		}
		/*
		if($request->file('avatar')){
			$files = $upload->store($request, 'avatar');
			if($files['errors']) $errors = implode('<br>',$files['errors'][0]);
			if($files['files']) $user->avatar = $files['files'][0];
		}
		*/
		
		$upd["price"] = $request->input("price") ? floatval($request->input("price")) : $learn->price;
		$upd["old_price"] = $request->input("old_price") ? floatval($request->input("old_price")) : $learn->old_price;
		#$upd["currency"] = 'RUB';
		
		$upd["response_id"] = $request->input("response_id") ? $request->input("response_id") : $learn->response_id;
		$upd["pack"] = $request->input("pack") ? $request->input("pack") : $learn->pack;
		
		$upd["meta_title"] = $request->input("meta_title") ? $request->input("meta_title") : ($learn->meta_title ? $learn->meta_title : $upd["title"]);
		$upd["meta_description"] = $request->input("meta_description") ? $request->input("meta_description") :  ($learn->meta_description ? $learn->meta_description : strip_tags($upd["intro"]));
		$upd["meta_keywords"] = $request->input("meta_keywords") ? $request->input("meta_keywords") :  ($learn->meta_keywords ? $learn->meta_keywords : $upd["title"]);
		if($request->input("published_at")) {
			$published_at = date("Y-m-d H:i:s",strtotime($request->input("published_at")));
			if($published_at!==$learn->published_at) $upd["published_at"] = $published_at;
		}
		if($request->input("started_at")) {
			
			
			$started_at = date("Y-m-d H:i:s",strtotime($request->input("started_at")));
			
			
			if($started_at!==$learn->started_at) {
				$upd["started_at"] = $started_at;
				//dd($upd["started_at"]);
			}
			//dd('foo');
		}
		if($request->input("finished_at")) {
			$finished_at = date("Y-m-d H:i:s",strtotime($request->input("finished_at")));
			if($finished_at!==$learn->finished_at) $upd["finished_at"] = $finished_at;
		}

		$count_children = $learn->childrens->count();
		$change_children = 0;
		if(null !== $request->input("children")) {
			if($count_children > 0) {
				$upd["children"] = $count_children;
			}
			else $upd["children"] = 1;
		}
		elseif($count_children > 0) {
			$upd["children"] = 0;
			$change_children = 1;
		}
		else {
			$upd["children"] = 0;
		}
		
		if(null !== $request->input("public")) {
			$upd["public"] = $request->input("public");
		}
		else {
			$upd["public"] = 0;
		}
		
		$upd_msg = 'Обновлено успешно';
		if($change_children) {
			$changed_children = $this->learn_m
				->where('parent_id','=',$learn->id)
				->update([
					'parent_id' => $learn->parent_id,
					'path_ids' => $learn->path_ids,
					'path' => $learn->path
				]);
			if($changed_children) $upd_msg .= '. Вложенные материалы и разделы перемещены на уровень выше.';
		}
		
		foreach($upd AS $ak=>$av) {
			$learn->$ak =  $av;
		}
	
		if(!$learn->save()) return redirect()->back()->withInput()->with('error','Ошибка обновления');
		
		if($change_parent) {
			// change parent's children count
			$parent->children = $parent->childrens->count();
			$parent->save();
		}
		
		return redirect()->back()->with('status',$upd_msg);
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$learn = $this->learn_m->findOrFail($id);
		$learn->delete();
		return redirect()->route('admin.learn.index')->with('status','Удалено успешно');
    }
}
