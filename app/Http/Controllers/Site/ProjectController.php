<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;


class ProjectController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Project
     */
    public function index(Request $request)
    {
		$projects = Project::with('company')->paginate(50);
		
		return view('site.company.projects',compact('projects'));
	}

}