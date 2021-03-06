<?php namespace App\Http\Controllers\Iteam;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\News;
use App\Mark;
use App\MarkResource;

class NewsController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $link = '/')
    {

		if(!$link || $link === '/') {

			$pack = 'iteam.news.home';
			$crumbs = [];
			$page = News::where('wid','=','')
						->where('path','=','');

			$childrens = News::where('path','LIKE','/')
								->where('title','NOT LIKE','')
								->where('public','>',0)
								->orderBy('created_at', 'desc')
								->paginate(20);
		}
		else {

			$links = explode('/',$link);
			$wid = array_pop($links);
			$path = implode('/',$links);
			$path = ($path) ? '/' . $path . '/' : '/';

			$crumbs = [['wid'=>'news','path'=>'','title'=>'Новости']];

			$page = News::where('wid','=',$wid)->where('path','=',$path);
			$childrens = [];

			if(!$childrens) {
				$pack = 'iteam.news.show';
				$page = $page->where('public','>',-1);
			}
			else {
				$pack = 'iteam.news.index';
				$page = $page->where('public','>',0);
			}

		}

		$page = $page->first();

		if($page) {

			$user = Auth::user();

            $marks = MarkResource::where('type_resource', 2)->where('id_resource', $page->id)->get();

			return view($pack, compact('page', 'childrens', 'crumbs', 'user', 'marks'));
		}
		else {
			abort(404);
		}
    }

}