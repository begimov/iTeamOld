<?php namespace App\Http\Controllers\Iteam;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Articles;
use DB;
use App\MarkResource;

class ArticleController extends Controller
{
    protected $arti_m;
    protected $user;
    protected $paginate = 20;

    public function __construct(Articles $arti_m)
    {
        $this->arti_m = $arti_m;
        $this->user = Auth::user();
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $link = '/')
    {
		if(!$link || $link === '/') return $this->indexHome();

		$links = explode('/',$link);
		$wid = array_pop($links);
		$path = implode('/',$links);
		$path = ($path) ? '/publications/' . $path . '/' : '/publications/';

		$table = $this->arti_m->getTable();

		$parent = $path.$wid.'/';

		$page = $this->arti_m
					->with('parent')
					->with('childrens')
					->where($table.'.wid','=',$wid)
					->where($table.'.path','=',$path)
					->where($table.'.public','>',-1)
					->where($table.'.published_at','<',date("Y-m-d H:i:s"))
					->first();

		if($page)
		{

			$childrens = [];
			$categories = [];
			$posts = [];

			if($page->childrens->count())
			{

				$collection = $page->childrens;
				$categories = $collection->filter(function ($item) {
					return ($item->childrens->count()  || $item->children);
				});
				$posts = $collection->filter(function ($item) {
					return (!$item->childrens->count() && !$item->children);
				})->sortByDesc('created_at');

				if($page->show_all_children) {
					$childrens = $this->arti_m->with('parent');
					$childrens = $childrens->where($table.'.path','LIKE',$parent.'%');
					$childrens = $childrens->where($table.'.title','NOT LIKE','');
					$childrens = $childrens->where($table.'.children','=','0');
					$childrens = $childrens->where($table.'.public','>',0);
					$childrens = $childrens->where($table.'.published_at','<',date("Y-m-d H:i:s"));
					$childrens = $childrens->orderBy($table.'.published_at', 'desc');
					$childrens = $childrens->paginate($this->paginate);
				}

			}
			else {
				$page->increment('viewed');
			}

			$c = count($links);
			$pathes = [];
			foreach($links AS $n=>$l){
				$pathes[] = '/publications/' . implode('/',array_slice($links, 0, $c-$n)) . '/';
			}
			$pathes[] = '/publications/';
			krsort($pathes);
			$pathes_str =  "'" . implode("','", $pathes) . "'";

			$crumbs = DB::select('SELECT id,title,wid,path,outro,
								(CHAR_LENGTH(path)-CHAR_LENGTH(REPLACE(path,"/",""))) AS deep 
								FROM '.$table.' 
								WHERE CONCAT(path,wid,"/") IN ('.$pathes_str.') 
								ORDER BY deep ASC');

			$outro = $page->outro;

			if(!$outro) {
				$kcrumbs = array_reverse($crumbs);
				foreach($kcrumbs AS $kcr){
					if($kcr->outro){
						$outro = $kcr->outro;
						break;
					}
				}
			}

			$user = $this->user;
			$current_path = parse_url(url()->current(), PHP_URL_PATH) . '/';
            $marks = MarkResource::where('type_resource', 1)->where('id_resource', $page->id)->get();
			if(!$page->childrens->count())  return view('iteam.article.show', compact('page', 'childrens', 'categories', 'posts', 'crumbs', 'outro', 'current_path', 'user', 'marks'));



			return view('iteam.article.index', compact('page', 'childrens', 'categories', 'posts', 'crumbs', 'outro', 'current_path', 'user', 'marks'));
		}
		else
		{
			abort(404);
		}
    }


    /**
     * Display a Articles Main Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHome()
    {

		$table = $this->arti_m->getTable();

		$page = $this->arti_m
					->where($table.'.wid','=','')
					#->where($table.'.path','=','')
					->first();

		if($page)
		{

			$childrens = [];

			if($page->children)
			{

				$childrens = $this->arti_m
								->with('parent')
								->where($table.'.path','LIKE','/publications/%')
								->where($table.'.title','NOT LIKE','')
								->where($table.'.children','=','0')
								->where($table.'.public','>',0)
								->where($table.'.published_at','<',date("Y-m-d H:i:s"))
								->orderBy($table.'.published_at', 'desc')
								->paginate($this->paginate);
			}


			$crumbs = [];
			$user = $this->user;
			$current_path = parse_url(url()->current(), PHP_URL_PATH) . '/';

			$categories = [];
			$posts = [];
			$outro = $page->outro;

            $marks = MarkResource::where('type_resource', 2)->where('id_resource', $page->id)->get();

			return view('iteam.article.home', compact('page', 'childrens', 'categories', 'posts', 'crumbs', 'outro', 'current_path', 'user', 'marks'));
		}
		else
		{
			abort(404);
		}

    }

}