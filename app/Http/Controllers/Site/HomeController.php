<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Iteam;
use App\Models\Articles;
use App\Models\Learn;
use App\Models\News;

class HomeController extends Controller
{
    protected $paginate = 10;


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
		$path = ($path) ? '/' . $path . '/' : '/';

		
		$page = Iteam::getFirstByPathAndSlug($path, $wid);
		$crumbs = Iteam::getCrumbsByPathArr($links);
		
		$pack = 'site.iteam';
		
		if($page)
		{
			if($page->cid)
			{
				$parent = ($wid) ? $path . $wid . '/' : '/';
				$childrens = Iteam::getAllChildrenByPath($parent);
			}
			else
			{
				$pack = 'site.simple';
				$childrens = [];
			}
		
			$user = Auth::user();

			return view($pack, compact('page', 'childrens', 'crumbs', 'user'));			
		}
		else
		{
			abort(404);
		}
    }
	
    /**
     * Display a Home Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHome()
    {
		
		$page = Articles::where('wid','=','')
					->where('path','=','')
					->first();
		
		if($page)
		{

			$childrens = [];
			
			if($page->children)
			{

				$childrens = Articles::with('parent')
								->where('path','LIKE','/publications/%')
								->where('title','NOT LIKE','')
								->where('children','=','0')
								->where('public','>','0')
								->where('published_at','<',date("Y-m-d H:i:s"))
								->orderBy('published_at', 'desc')
								->take($this->paginate)
								->get();
			}

			$crumbs = [];
			$user = Auth::user();
			
			$news = News::where('public','>','0')
								->orderBy('created_at', 'desc')
								->take(3)
								->get();
								
			$breakfast = Learn::where('path','=','/breakfast/')
								->where('public','>','0')
								->where('published_at','<',date("Y-m-d H:i:s"))
								->orderBy('published_at', 'desc')
								->first();

			return view('site.home', compact('page', 'childrens', 'news', 'breakfast', 'crumbs', 'user'));	
		}
		else
		{
		
			abort(404);
		}

    }

    /**
     * Display a search results.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
		$page = Articles::find(1);
		$user = Auth::user();
		$childrens = [];
		return view('iteam.search', compact('page', 'childrens', 'user', 'request'));			
	}
}