<?php namespace App\Http\Controllers\Iteam;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Iteam;
use App\Models\Articles;
use App\Models\Learn;
use App\Models\News;
use App\Mark;

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
		if($link === 'abtest') return $this->indexHome2();

		$links = explode('/',$link);
		$wid = array_pop($links);
		$path = implode('/',$links);
		$path = ($path) ? '/' . $path . '/' : '/';


		$page = Iteam::getFirstByPathAndSlug($path, $wid);
		$crumbs = Iteam::getCrumbsByPathArr($links);

		$pack = 'front.blog.iteam';

		if($page)
		{
			if($page->cid)
			{
				$parent = ($wid) ? $path . $wid . '/' : '/';
				$childrens = Iteam::getAllChildrenByPath($parent);
			}
			else
			{
				$pack = 'front.blog.simple';
				$childrens = [];
			}

			$user = Auth::user();

            $countArticles = count(Articles::all());
            $countLearns = count(Learn::all());

            if ($user = auth()->user()) {
                if ($user->email === 'amelihovv@ya.ru') {
//                    dump($pack);
//                    dd($page);
                }
            }

			return view($pack, compact(
                'page',
                'childrens',
                'crumbs',
                'user',
                'countArticles',
                'countLearns'
            ));
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

			$marks = Mark::all();

//            $countArticles = count(Articles::all());
//            $countLearns = count(Learn::all());
//            $url = 'https://api-metrika.yandex.ru/stat/v1/data';
//            $params1 = [
//                'ids'         => '30664892',
//                'oauth_token' => 'AQAAAAATiKohAARbjyWXek_AjUCQpGECBHR2_JQ',
//                'metrics'     => 'ym:s:users',
//                'dimensions'  => 'ym:s:date',
//                'sort'        => 'ym:s:date',
//            ];
//
//            try {
//                $result = file_get_contents( $url . '?' . http_build_query($params1), false);
//                $countUsers = json_decode($result)->totals;
//            } catch (\ErrorException $e) {
//                $countUsers = [13648];
//            }
//
//            try {
//                $result2 = file_get_contents('https://api-metrika.yandex.ru/stat/v1/data?date1=2016-01-01&date2=today&id=31848061&metrics=ym:s:goal<goal_id>reaches&goal_id=31276918&ym:pv:datePeriod<group>&group=year&oauth_token=AQAAAAATiKohAARbjyWXek_AjUCQpGECBHR2_JQ', false);
//                $countDownloads = json_decode($result2)->totals;
//            } catch (\ErrorException $e) {
//                $countDownloads = [1656];
//            }
return view('iteam.newhome', compact('page'));
            // return view('iteam.home', compact(
            //     'page',
            //     'childrens',
            //     'news',
            //     'breakfast',
            //     'crumbs',
            //     'user',
            //     'marks'
//                'countArticles',
//                'countLearns',
//                'countUsers',
//                'countDownloads'
            // ));
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
    public function indexHome2()
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

			$marks = Mark::all();

			return view('iteam.newhome2', compact('page'));
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

//    public function search(Request $request)
//    {
//        require "sphinxapi.php";
//
//        $s = new SphinxClient();
////    dd($s);
//
////    dd($s->setServer("localhost", 9312));
//        $s->setServer("localhost", 9312);
//        $s->setMatchMode(SPH_MATCH_ANY);
//        $s->setMaxQueryTime(3);
//        $s->SetSortMode(SPH_SORT_RELEVANCE);
//        $s->SetArrayResult(true);
//
//        $result = $s->query("processes");
//        dd($result["matches"]);
//        foreach ($result["matches"] as $res) {
//            dump($res['attrs']['model_id']);
//
//            switch ($res['attrs']['model_id']) {
//                case 1:
//                    $learn = \App\Models\Learn::find($res["id"]);
//                    dump($learn);
//                    break;
//                case 2:
//                    $article = \App\Models\Articles::find($res["id"]);
//                    dump($article);
//                    break;
//            }
//        }
////    foreach ($result["matches"] as $prod => $info) {
////        dump($prod);
////    }
//    }
}
