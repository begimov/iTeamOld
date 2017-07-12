<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Articles;
use DB;

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
					->where('wid','=',$wid)
					->where('path','=',$path)
					->where('public','>',-1)
					->where('published_at','<',date("Y-m-d H:i:s"))
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
					$childrens = $childrens->where('path','LIKE',$parent.'%');
					$childrens = $childrens->where('title','NOT LIKE','');
					$childrens = $childrens->where('children','=','0');
					$childrens = $childrens->where('public','>',0);
					$childrens = $childrens->where('published_at','<',date("Y-m-d H:i:s"));
					$childrens = $childrens->orderBy('published_at', 'desc');
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
				$page->outro = $outro;
			}

			$user = $this->user;
			$current_path = parse_url(url()->current(), PHP_URL_PATH) . '/';

			if(!$page->childrens->count())  return view('site.article.show', compact('page', 'childrens', 'categories', 'posts', 'crumbs', 'outro', 'current_path', 'user'));

			return view('site.article.index', compact('page', 'childrens', 'categories', 'posts', 'crumbs', 'current_path', 'user'));
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
		$page = $this->arti_m
					->with('childrens')
					->where('wid','=','')
					->first();

		if($page)
		{

			$childrens = [];
			$categories = [];

			if($page->children)
			{

				$collection = $page->childrens;
				$categories = $collection->filter(function ($item) {
					return ($item->childrens->count()  || $item->children);
				});
				#dd($categories);

				$childrens = $this->arti_m
								->with('parent')
								->where('path','LIKE','/publications/%')
								->where('title','NOT LIKE','')
								->where('children','=','0')
								->where('public','>',0)
								->where('published_at','<',date("Y-m-d H:i:s"))
								->orderBy('published_at', 'desc')
								->paginate($this->paginate);

				$categories = $collection->filter(function ($item) {
					return ($item->childrens->count()  || $item->children);
				});
			}


			$crumbs = [];
			$user = $this->user;
			$current_path = parse_url(url()->current(), PHP_URL_PATH) . '/';

			#$categories = [];
			$posts = [];

			return view('site.article.home', compact('page', 'childrens', 'categories', 'posts', 'crumbs', 'current_path', 'user'));
		}
		else
		{
			abort(404);
		}

    }

}