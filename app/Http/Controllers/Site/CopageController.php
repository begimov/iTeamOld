<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Models\Copage;

class CopageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $link = '/')
    {
		
		if(!$link || $link === '/') return redirect($request->getPathInfo().'/about');
		
		$links = explode('/',$link);
		$wid = array_pop($links);
		$path = implode('/',$links);
		$path = ($path) ? '/' . $path . '/' : '/';
		
		$Copage_M = new Copage;
		$page = $Copage_M
				->where('copages.wid','=',$wid)
				->where('copages.path','=',$path)
					->leftJoin('copages AS children','children.parent_id','=','copages.id')
					->leftJoin('copages AS parent','parent.id','=','copages.parent_id')
				->select('children.id as cid','parent.id as pid','copages.*')
					->groupBy('copages.id')
				->first();
		
		
		$pack = 'site.company.index';
		
		if($page)
		{
			$deep = count($links);
			$crumbs = [];
			$crumb_path = '';
			for($i=0;$i<$deep;$i++) {
				$crumb_path .= '/';
				$crumb_wid = $links[$i];
				$crumbs[] = $Copage_M
							->where('path','LIKE',$crumb_path)
							->where('wid','=',$crumb_wid)
							->select('id','title','wid','path')
							->first();
				$crumb_path .= $crumb_wid;
			}
			
			//dd($crumbs);
			
			if($page->cid)
			{
				$parent = ($wid) ? $path . $wid . '/' : '/';
				$childrens = $Copage_M
					->where('copages.path','LIKE',$parent.'%')
					->where('copages.children','=','0')
					->where('copages.title','NOT LIKE','')
						->leftJoin('copages AS parent','copages.parent_id','=','parent.id')
					->select('copages.*', 'parent.title as parent_title')
					->orderBy('copages.created_at', 'desc')
					//->skip(0)->take(50)
					->paginate(20);
			}
			else
			{
				//$page->summary = $page->content;
				$pack = 'site.company.show';
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
 
}