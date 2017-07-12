<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use \Illuminate\Support\Facades\Auth;

use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a search results.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
		$page = Company::find(1);
		$user = Auth::user();
		$childrens = [];
		return view('c.company.search', compact('page', 'childrens', 'user', 'request'));			
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
		$slug = array_pop($links);
		$path = implode('/',$links);
		$path = ($path) ? '/' . $path . '/' : '/';
		
	#	$page = Company::where('slug', '=', $slug)->with('comments')->with('tags')->with('user')->firstOrFail();
	#	$posts['post'] = $page; 
		
		$page = Company::getFirstByPathAndSlug($path, $slug);
		$crumbs = Company::getCrumbsByPathArr($links);
		
		$pack = 'c.company.index';
		
		if($page)
		{
			if($page->cid)
			{
				$parent = ($slug) ? $path . $slug . '/' : '/';
				#$childrens = Company::getChildrenByPath($parent);
				$childrens = Company::getAllChildrenByPath($parent);
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
		$slug = '';
		$path = '/';
		
		$page = Company::getFirstByPathAndSlug($path, $slug);
		$crumbs = Company::getCrumbsByPathArr($links);
		
		if($page)
		{
			if($page->cid)
			{
				$parent = ($slug) ? $path . $slug . '/' : '/';
				$childrens = Company::getAllArticlesByPath($parent);
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
