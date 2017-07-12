<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsCreateRequest;

use App\Http\Requests;
use App\Models\News;
use DB;
use App\Mark;
use App\MarkResource;

class NewsController extends Controller
{
    protected $news_m;
    protected $paginate = 50;

    public function __construct(News $news_m)
    {
        $this->news_m = $news_m;
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');
		$route = 'admin.news.index';
		$data = [];
		
		$search = $request->search ? $request->search : false;
		$order_by = $request->order_by ? $request->order_by : 'published_at';
		$sort_by = $request->sort_by ? $request->sort_by : 'desc';
		
		$news = $this->news_m->where('path','LIKE','/%');
		
		if($search!==false){
			#$news = $news->where('title','LIKE','%'.$search.'%');
			$news = $news->where(function ($query) use ($search) {
                $query->where('title','LIKE','%'.$search.'%')
                      ->orWhere('author','LIKE','%'.$search.'%');
            });
		}

	
		$news = $news->orderBy($order_by, $sort_by);
		$news = $news->paginate($this->paginate);
		

		$links = $news->appends([
									'search' => $request->search, 
									'order_by' => $request->order_by, 
									'sort_by' => $request->sort_by
								])->render();
			
		$order_by = ['ID'=>'id','Название'=>'title','Дата новости'=>'published_at'];
		
		return view('admin.news.index', compact('news', 'links', 'order_by'));
		
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
		
		$data = $this->news_m;
		
		$pathes = $this->news_m->where('children','>',0)->select('id','wid','path','title')->get();
		
		return view('admin.news.create', compact('url', 'data', 'pathes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        
		$news = $this->news_m;
		$upd = [];

		$upd["title"] = $request->input("title") ? $request->input("title") : '';
		$upd["author"] = $request->input("author") ? $request->input("author") : '';

		$upd["intro"] = $request->input("intro") ? $request->input("intro") : '';
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

		if(null !== $request->input("public")) {
			$upd["public"] = $request->input("public");
		}
		else {
			$upd["public"] = 0;
		}
		
		$upd["path"] = '/';
		
		//find nounique by path & wid 
		if($path_wid = $this->news_m->where('path','=',$upd["path"])->where('wid','=',$upd["wid"])->first()) {
			$upd["wid"] = substr( md5( time() . $upd['title'] ), 2, 6);
		}
		
		$upd["created_at"] = $upd["published_at"];
		
		foreach($upd AS $ak=>$av) {
			$news->$ak =  $av;
		}
		
		$id = $news->save() ? $news->id : null;
		
		if(!$id) return redirect()->back()->withInput()->with('error','Ошибка при создании новости');
		
		return redirect()->route('admin.news.show',[$id])->with('status','Создано успешно');
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

		$data = $this->news_m->findOrFail($id);
		
		$pathes = $this->news_m->where('children','>',0)->select('id','wid','path','title')->get();
		$crumbs = ($data->path_ids) ? $this->news_m->whereIn('id',explode('.',$data->path_ids))->select('id','title')->get() : null;
        $marks = Mark::all();
        $marksOld = MarkResource::where('type_resource', 2)->where('id_resource', $id)->get();
		return view('admin.news.show', compact('url', 'data', 'pathes', 'crumbs', 'marks', 'marksOld'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route("admin.news.show",[$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCreateRequest $request, $id)
    {

		$news = $this->news_m->findOrFail($id);
		$upd = [];
		
		$upd["title"] = $request->input("title") ? $request->input("title") : $news->title;
		$upd["intro"] = $request->input("intro") ? $request->input("intro") : $news->intro;
		$upd["text"] = $request->input("text") ? $request->input("text") : $news->text;
		
		
		$upd["author"] = $request->input("author") ? $request->input("author") : $news->author;
		$upd["wid"] = $request->input("wid") ? $request->input("wid") : $news->wid;
				
		$upd["meta_title"] = $request->input("meta_title") ? $request->input("meta_title") : ($news->meta_title ? $news->meta_title : $upd["title"]);
		$upd["meta_description"] = $request->input("meta_description") ? $request->input("meta_description") :  ($news->meta_description ? $news->meta_description : strip_tags($upd["intro"]));
		$upd["meta_keywords"] = $request->input("meta_keywords") ? $request->input("meta_keywords") :  ($news->meta_keywords ? $news->meta_keywords : $upd["title"]);
		if($request->input("published_at")) {
			$published_at = date("Y-m-d H:i:s",strtotime($request->input("published_at")));
			if($published_at!==$news->published_at) $upd["published_at"] = $published_at;
		}
		
		if(null !== $request->input("public")) {
			$upd["public"] = $request->input("public");
		}
		else {
			$upd["public"] = 0;
		}
		
		$upd_msg = 'Обновлено успешно';
				
		foreach($upd AS $ak=>$av) {
			$news->$ak =  $av;
		}
	
		if(!$news->save()) return redirect()->back()->withInput()->with('error','Ошибка обновления');

		
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
		$news = $this->news_m->findOrFail($id);
		$news->delete();
		return redirect()->route('admin.news.index')->with('status','Удалено успешно');
    }
}
