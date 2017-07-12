<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\ArticleCreateRequest;

use App\Http\Requests;
use App\Models\Articles;
use DB;
use App\Mark;
use App\MarkResource;

class ArticleController extends Controller
{
    protected $art_m;
    protected $paginate = 50;

    public function __construct(Articles $art_m)
    {
        $this->art_m = $art_m;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');
		$route = 'admin.article.index';//['orders.index',$id]
		$data = [];
		

		$search = $request->search ? $request->search : false;
		$parent_id = $request->parent_id ? $request->parent_id : false;
		$categorize = ($request->categorize !== null && $request->categorize !== '') ? ($request->categorize ? 1 : 0) : false;
		$order_by = $request->order_by ? $request->order_by : 'published_at';
		$sort_by = $request->sort_by ? $request->sort_by : 'desc';
		
		$articles = $this->art_m->with(['parent','childrens']);
		
		
		if($search!==false){
			#$articles = $articles->where('title','LIKE','%'.$search.'%');
			$articles = $articles->where(function ($query) use ($search) {
                $query->where('title','LIKE','%'.$search.'%')
                      ->orWhere('author','LIKE','%'.$search.'%');
            });
		}
		
		if($parent_id!==false){
			$articles = $articles->where('parent_id','=',$parent_id);
		}
		
		if($categorize!==false){
			$articles = ($categorize) ? $articles->where('children','>',0) : $articles->where('children','=',0);
		}

		$articles = $articles->where('path','LIKE','/publications/%');
	
		$articles = $articles->orderBy($order_by, $sort_by);
		$articles = $articles->paginate($this->paginate);
		

		$links = $articles->appends([
									'search' => $request->search, 
									'parent_id' => $request->parent_id, 
									'order_by' => $request->order_by, 
									'sort_by' => $request->sort_by
								])->render();
			
		$pathes = $this->art_m->where('children','>',0)->select('id','wid','path','title')->get();
		$order_by = ['ID'=>'id','Название'=>'title','Дата публикации'=>'published_at'];
		
		return view('admin.article.index', compact('articles', 'links', 'order_by', 'pathes'));
		
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
		
		$data = $this->art_m;
		
		$pathes = $this->art_m->where('children','>',0)->select('id','wid','path','title')->get();
		
		return view('admin.article.create', compact('url', 'data', 'pathes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        
		$article = $this->art_m;
		$upd = [];

		$upd["title"] = $request->input("title") ? $request->input("title") : '';
		$upd["author"] = $request->input("author") ? $request->input("author") : '';
		$upd["parent_id"] = $request->input("parent_id") ? $request->input("parent_id") : null;
		if(is_null($upd["parent_id"])) return redirect()->back()->withInput()->with('error','Не определён ID категории');
		
		$upd["intro"] = $request->input("intro") ? $request->input("intro") : '';
		$upd["outro"] = $request->input("outro") ? $request->input("outro") : '';
		$upd["text"] = $request->input("text") ? $request->input("text") : '';
		$upd["wid"] = $request->input("wid") ? $request->input("wid") : '';
		if(!$upd["wid"]) {
			$upd["wid"] = substr( crypt( md5( time() . $upd['title'] ) , time() ), 2, 6);
		}
		$upd["meta_title"] = $request->input("meta_title") ? $request->input("meta_title") : $upd["title"];
		$upd["meta_description"] = $request->input("meta_description") ? $request->input("meta_description") : strip_tags($upd["intro"]);
		$upd["meta_keywords"] = $request->input("meta_keywords") ? $request->input("meta_keywords") : $upd["title"];
		$upd["published_at"] = $request->input("published_at") ? date("Y-m-d H:i:s",strtotime($request->input("published_at"))) : date("Y-m-d H:i:s");
		$upd["created_at"] = $upd["published_at"];
		
		$upd["wid"] = $request->input("wid") ? $request->input("wid") : '';
		
		$parent = $this->art_m->with('childrens')->find($upd["parent_id"]);
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
		
		$upd["path"] = ($parent->path ? $parent->path : '/publications/') . ($parent->wid ? $parent->wid . '/' : '');
		
		//find nounique by path & wid 
		if($path_wid = $this->art_m->where('path','=',$upd["path"])->where('wid','=',$upd["wid"])->first()) {
			$upd["wid"] = substr( crypt( md5( time() . $upd['title'] ) , 2*time() ), 2, 6);
		}
		
		$upd["path_ids"] = ($parent->path_ids ? $parent->path_ids . '.' : ($parent->parent_id ? $parent->parent_id . '.' : '' )) . $parent->id;
		$upd["created_at"] = $upd["published_at"];
		
		foreach($upd AS $ak=>$av) {
			$article->$ak =  $av;
		}
		
		$id = $article->save() ? $article->id : null;
		
		if(!$id) return redirect()->back()->withInput()->with('error','Ошибка при создании публикации');
		
		// change parent's children count
		$parent->children = $parent->childrens->count();
		$parent->save();
		
		return redirect()->route('admin.article.show',[$id])->with('status','Создано успешно');
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
		$data = $this->art_m->findOrFail($id);
		$pathes = $this->art_m->where('children','>',0)->select('id','wid','path','title')->get();
		$crumbs = ($data->path_ids) ? $this->art_m->whereIn('id',explode('.',$data->path_ids))->select('id','title')->get() : null;
        $marks = Mark::all();
        $marksOld = MarkResource::where('type_resource', 1)->where('id_resource', $id)->get();
		return view('admin.article.show', compact('url', 'data', 'pathes', 'crumbs', 'marks', 'marksOld'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route("admin.article.show",[$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleCreateRequest $request, $id)
    {

		$article = $this->art_m->with('childrens')->findOrFail($id);
		$upd = [];
		
		$upd["title"] = $request->input("title") ? $request->input("title") : $article->title;
		$upd["intro"] = $request->input("intro") ? $request->input("intro") : $article->intro;
		$upd["text"] = $request->input("text") ? $request->input("text") : $article->text;
		
		$upd["outro"] = $request->input("outro") ? $request->input("outro") : $article->outro;
		
		$upd["author"] = $request->input("author") ? $request->input("author") : $article->author;
		$upd["parent_id"] = $request->input("parent_id") ? (int)$request->input("parent_id") : $article->parent_id;
		if(is_null($upd["parent_id"])) return redirect()->back()->withInput()->with('error','Не определён ID категории');
		$upd["wid"] = $request->input("wid") ? $request->input("wid") : $article->wid;
		$change_parent = ($article->parent_id !== $upd["parent_id"]) ? 1 : 0;

		if($change_parent) {
			$parent = $this->art_m->with('childrens')->find($upd["parent_id"]);
			if(!$parent) return redirect()->back()->withInput()->with('error','Не найдена категория');
			
			$upd["path"] = ($parent->path ? $parent->path : '/publications/') . ($parent->wid ? $parent->wid . '/' : '');
			
			//find nounique by path & wid
			if($this->art_m->where('path','=',$upd["path"])->where('wid','=',$upd["wid"])->get()->count() > 1) {
				$upd["wid"] = substr( crypt( md5( time() . $upd['title'] ) , 2*time() ), 2, 6);
			}
			$upd["path_ids"] = ($parent->path_ids ? $parent->path_ids . '.' : ($parent->parent_id ? $parent->parent_id . '.' : '' )) . $parent->id;
		}
		
		$upd["meta_title"] = $request->input("meta_title") ? $request->input("meta_title") : ($article->meta_title ? $article->meta_title : $upd["title"]);
		$upd["meta_description"] = $request->input("meta_description") ? $request->input("meta_description") :  ($article->meta_description ? $article->meta_description : strip_tags($upd["intro"]));
		$upd["meta_keywords"] = $request->input("meta_keywords") ? $request->input("meta_keywords") :  ($article->meta_keywords ? $article->meta_keywords : $upd["title"]);
		if($request->input("published_at")) {
			$published_at = date("Y-m-d H:i:s",strtotime($request->input("published_at")));
			if($published_at!==$article->published_at) $upd["published_at"] = $published_at;
		}
		
		$count_children = $article->childrens->count();
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
			$changed_children = $this->art_m
				->where('parent_id','=',$article->id)
				->update([
					'parent_id' => $article->parent_id,
					'path_ids' => $article->path_ids,
					'path' => $article->path
				]);
			if($changed_children) $upd_msg .= '. Вложенные статьи и разделы перемещены на уровень выше.';
		}
		
		foreach($upd AS $ak=>$av) {
			$article->$ak =  $av;
		}
	
		if(!$article->save()) return redirect()->back()->withInput()->with('error','Ошибка обновления');
		
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
		$article = $this->art_m->findOrFail($id);
		$article->delete();
		return redirect()->route('admin.article.index')->with('status','Удалено успешно');
    }
}
