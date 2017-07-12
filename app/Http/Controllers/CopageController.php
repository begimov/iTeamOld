<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use \Illuminate\Support\Facades\Auth;

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
		
		#if(!$link || $link === '/') return $this->indexHome();
		
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
		
		
		$pack = 'c.company.index';
		
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
				$pack = 'c.company.show';
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
		
		$links = [];
		$wid = '';
		$path = '/';
		
		$Copage_M = new Copage;
		$page = $Copage_M
				->where('copages.wid','=',$wid)
				->where('copages.path','=',$path)
					->leftJoin('copages AS children','children.parent_id','=','copages.id')
					->leftJoin('copages AS parent','parent.id','=','copages.parent_id')
				->select('children.id as cid','parent.id as pid','copages.*')
					->groupBy('copages.id')
				->first();
				
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
		
			$user = Auth::user();
			return view('c.home', compact('page', 'childrens', 'crumbs', 'user'));			
		}
		else
		{
			abort(404);
		}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
