<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller AS BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CompanyRequest;

use App\Models\Company;

class CompanyController extends BaseController
{

    protected $paginate = 50;
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Company
     */

    public function index(Request $request)
    {
		$search = $request->search ? $request->search : false;

		$order_by = $request->order_by ? $request->order_by : 'created_at';
		$sort_by = $request->sort_by ? $request->sort_by : 'desc';
		
		$companies = Company::with('project');
		
		if($search!==false){
			$companies = $companies->where(function ($query) use ($search) {
                $query->where('company_name','LIKE','%'.$search.'%');
            });
		}
		
		
		$companies = $companies->orderBy($order_by, $sort_by);
		$companies = $companies->paginate($this->paginate);
		

		$links = $companies->appends([
									'search' => $request->search,
									'order_by' => $request->order_by, 
									'sort_by' => $request->sort_by
								])->render();
			

		$order_by = ['ID'=>'id','Дата'=>'created_at','Название'=>'company_name'];
		
		//dd($companies);
		return view('admin.company.index', compact('companies', 'links', 'order_by'));

	}
	
    public function show(Request $request, $id)
    {
		return redirect()->route('admin.company.edit', ['id'=>$id]);
	}
	
    public function create(Request $request)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');

		$company = new Company;
		
		return view('admin.company.create', compact('company', 'url'));
	}
	
    public function store(CompanyRequest $request)
    {
//        dd($request);
		$store = false;
		
		$company = new Company;
		
		if(null !== $request->company_name && $request->company_name !== "") $company->company_name = $request->company_name;
		if(null !== $request->company_prefix && $request->company_prefix !== "") $company->company_prefix = $request->company_prefix;
		if(null !== $request->company_postfix && $request->company_postfix !== "") $company->company_postfix = $request->company_postfix;
		if(null !== $request->company_url && $request->company_url !== "") $company->company_url = $request->company_url;
		if(null !== $request->company_info && $request->company_info !== "") $company->company_info = $request->company_info;
		if(null !== $request->entity_type && $request->entity_type !== "") $company->entity_type = $request->entity_type;

        $company->city = $request->city;
        $company->leader = $request->leader;
        $company->secretary = $request->secretary;
        $company->contacts = $request->contacts;
        $company->date_start = $request->date_start;
        $company->date_finish = $request->date_finish;
        $company->result_project = $request->result_project;
        $company->review = $request->review;

		if($logo = $request->file('company_logo_small')) {
			$fileName = md5($logo->getFileName()).'.'.$logo->extension();
			$destinationPath = 'filemanager/userfiles/user0/projects/logo';
			if($logo->move($destinationPath, $fileName)){
				$company->company_logo_small = '/' . $destinationPath . '/' . $fileName;
			}
		}
		
		if(!$company->company_name) return redirect()->back()->with('error','Не указано название компании');
		
		$store = $company->save();
		
		return ($store) ? redirect()->route('admin.company.edit', ['id'=>$company->id])->with('status','Создано успешно') : redirect()->back()->with('error','Ошибка добавления');
	}
	
    public function edit(Request $request, $id)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');

		$company = Company::with('project')->findOrFail($id);
		
		return view('admin.company.edit', compact('company', 'url'));
	}
	
    public function update(CompanyRequest $request, $id)
    {
		$save = false;
		
		$company = new Company;
		$company = $company->findOrFail($id);
		
		if(null !== $request->company_name && $request->company_name !== "") $company->company_name = $request->company_name;
		if(null !== $request->company_prefix && $request->company_prefix !== "") $company->company_prefix = $request->company_prefix;
		if(null !== $request->company_postfix && $request->company_postfix !== "") $company->company_postfix = $request->company_postfix;
		if(null !== $request->company_url && $request->company_url !== "") $company->company_url = $request->company_url;
		if(null !== $request->company_info && $request->company_info !== "") $company->company_info = $request->company_info;
		if(null !== $request->entity_type && $request->entity_type !== "") $company->entity_type = $request->entity_type;

		$company->city = $request->city;
		$company->leader = $request->leader;
		$company->secretary = $request->secretary;
		$company->contacts = $request->contacts;
		$company->date_start = $request->date_start;
		$company->date_finish = $request->date_finish;
		$company->result_project = $request->result_project;
		$company->review = $request->review;

		if($logo = $request->file('company_logo_small')) {
			$fileName = md5($logo->getFileName()).'.'.$logo->extension();
			$destinationPath = 'filemanager/userfiles/user0/projects/logo';
			if($logo->move($destinationPath, $fileName)){
				$company->company_logo_small = '/' . $destinationPath . '/' . $fileName;
			}
		}
		
		if(!$company->company_name) return redirect()->back()->with('error','Не указано название компании');
		
		$save = $company->save();
		
		return ($save) ? redirect()->back()->with('status','Обновлено успешно') : redirect()->back()->with('error','Ошибка обновления');
	}
	
    public function destroy($id)
    {
		$company = Company::findOrFail($id);
		$company->delete();
		return redirect()->route('admin.company.index')->with('status','Удалено успешно');
	}

}