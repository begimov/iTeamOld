<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller AS BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProjectRequest;

use App\Models\Project;
use App\Models\Company;

class ProjectController extends BaseController
{

    protected $paginate = 50;
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Project
     */

    public function index(Request $request)
    {
		
		$search = $request->search ? $request->search : false;

		$order_by = $request->order_by ? $request->order_by : 'created_at';
		$sort_by = $request->sort_by ? $request->sort_by : 'desc';
		
		$projects = Project::with('company');
		
		if($search!==false){
			$projects = $projects->where(function ($query) use ($search) {
                $companies = Company::where('company_name','LIKE','%'.$search.'%')->select('id')->pluck('id')->toArray();
				$query->whereIn('company_id',$companies);
            });
		}
		
		
		$projects = $projects->orderBy($order_by, $sort_by);
		$projects = $projects->paginate($this->paginate);
		

		$links = $projects->appends([
									'search' => $request->search,
									'order_by' => $request->order_by, 
									'sort_by' => $request->sort_by
								])->render();
			

		$order_by = ['ID'=>'id','Дата'=>'created_at'];
		
		//dd($projects);
		return view('admin.project.index', compact('projects', 'links', 'order_by'));

	}
	
    public function show(Request $request, $id)
    {
		return redirect()->route('admin.project.edit', ['id'=>$id]);
	}
	
    public function create(Request $request)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');

		$project = new Project;
		if($request->company_id) $project->company_id = (int)$request->company_id;
		$companies = Company::get();
		
		return view('admin.project.create', compact('project', 'url', 'companies'));
	}
	
    public function store(ProjectRequest $request)
    {
		$store = false;
		
		$project = new Project;
		
		if($request->company_id) $project->company_id = $request->company_id;
		if($request->project_info) $project->project_info = $request->project_info;
		
		if(!$project->company_id) return redirect()->back()->with('error','Не указана компания');
		$real_project = $project->whereCompanyId($project->company_id)->first();
		if($real_project && $real_project->id) return redirect()->route('admin.project.edit', ['id'=>$real_project->id])->with('error','Проект для этой компании существует, Вы были перенаправлены на страницу редактирования, будьте внимательны');
		
		$store = $project->save();
		
		return ($store) ? redirect()->route('admin.project.edit', ['id'=>$project->id])->with('status','Создано успешно') : redirect()->back()->with('error','Ошибка добавления');
	}
	
    public function edit(Request $request, $id)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');

		$project = Project::with('company')->findOrFail($id);
		$companies = Company::get();
		
		return view('admin.project.edit', compact('project', 'url', 'companies'));
	}
	
    public function update(ProjectRequest $request, $id)
    {
//		$save = false;
//
//		$project = new Project;
//		$project = $project->findOrFail($id);
//
//		if($request->company_id) {
//			$company_id = $request->company_id;
//
//			$real_project = $project->whereCompanyId($company_id)->first();
//			if($real_project && $real_project->id) return redirect()->route('admin.project.edit', ['id'=>$real_project->id])->with('error','Проект для этой компании существует, Вы были перенаправлены на страницу редактирования, будьте внимательны');
//
//			$project->company_id = $company_id;
//		}
//		if($request->project_info) $project->project_info = $request->project_info;
//
//		$save = $project->save();
//        dd($request);
        $project = Project::find($id);
		$project->project_info = $request->project_info;
		$save = $project->update();

		return ($save) ? redirect()->back()->with('status','Обновлено успешно') : redirect()->back()->with('error','Ошибка обновления');
	}
	
    public function destroy($id)
    {
		$project = Project::findOrFail($id);
		$project->delete();
		return redirect()->route('admin.project.index')->with('status','Удалено успешно');
	}

}