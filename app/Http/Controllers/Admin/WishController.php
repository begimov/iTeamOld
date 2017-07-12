<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller AS BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
#use \Illuminate\Support\Facades\Auth;

use App\Models\Wish;
use App\Models\Author;
use Mail;

class WishController extends BaseController
{

    protected $paginate = 50;
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Wish
     */

    public function index(Request $request)
    {

		$search = $request->search ? $request->search : false;
		$year = $request->year ? $request->year : false;
		$public = (null !== $request->public && $request->public !== "") ? $request->public : false;
		$daterange = $request->daterange ? $request->daterange : false;
		$order_by = $request->order_by ? $request->order_by : 'created_at';
		$sort_by = $request->sort_by ? $request->sort_by : 'desc';
		
		$wishes = Wish::with(['author']);
		
		if($search!==false){
			$wishes = $wishes->where(function ($query) use ($search) {
                $query->where('text','LIKE','%'.$search.'%')
                      ->orWhere('author_email','LIKE','%'.$search.'%')
                      ->orWhere('author_name','LIKE','%'.$search.'%');
            });
		}
		if($year!==false){
			$wishes = $wishes->where('year','=',$year);
		}
		if($public!==false){
			$wishes = $wishes->whereIn('public',$public);
		}
		
		/*
		if($daterange!==false){
			$dateranges = explode('-',$daterange);
			$startdate = isset($dateranges[0]) ? date("Y-m-d H:i:s",strtotime(trim($dateranges[0]))) : date("Y-m-d H:i:s",time()-(24*60*60-1));
			$enddate = isset($dateranges[1]) ? date("Y-m-d H:i:s",strtotime(trim($dateranges[1]))+(24*60*60-1)) : date("Y-m-d H:i:s",time()+(24*60*60-1));
			
			$orders = $orders->where(function ($query) use ($startdate,$enddate) {
                $query->where('created_at','>',$startdate)
                      ->where('created_at','<',$enddate);
            });
		}
		*/
		
		$wishes = $wishes->orderBy($order_by, $sort_by);
		$wishes = $wishes->paginate($this->paginate);
		

		$links = $wishes->appends([
									'search' => $request->search,
									'public' => $request->public, 
									'year' => $request->year, 
									'daterange' => $request->daterange, 
									'order_by' => $request->order_by, 
									'sort_by' => $request->sort_by
								])->render();
			
		$this_year = date('m')>11 ? date("Y", strtotime("+1 year", time())) : date("Y");
		$years = range(2015,$this_year);
		$publics = [-1=>'Спам',0=>'На модерацию',1=>'Опубликовано'];
		$order_by = ['ID'=>'id','Дата'=>'created_at','Email'=>'user_email'];
		
		return view('admin.wish.index', compact('wishes', 'links', 'order_by', 'publics', 'years', 'this_year'));

	}
	
    public function show(Request $request, $id)
    {
		return redirect()->route('admin.wish.index');
	}
	
    public function create(Request $request)
    {
		return redirect()->route('admin.wish.index');
	}
	
    public function store(Request $request)
    {
		
		return redirect()->route('admin.wish.index');
	}
	
    public function edit(Request $request, $id)
    {
		$url = config('files.url') . '?langCode=' . config('app.locale');

		$wish = Wish::with('author')->findOrFail($id);
		
		#$authors = Author::select('id','name')->get();
		$authors = null;
		$publics = [-1=>'Спам',0=>'На модерацию',1=>'Опубликовано'];
		return view('admin.wish.show', compact('wish', 'url', 'publics', 'authors'));
	}
	
    public function update(Request $request, $id)
    {
		$save = false;
		$wish = Wish::with('author')->findOrFail($id);
		$public = (null !== $request->public && $request->public !== "") ? (int)$request->public : false;
		
		$author_name = (null !== $request->author_name && $request->author_name !== "") ? $request->author_name : false;
		$title = (null !== $request->title && $request->title !== "") ? $request->title : false;
		$text = (null !== $request->text && $request->text !== "") ? $request->text : false;
		
		$edit = false;
		if($author_name && $author_name!==$wish->author_name) {
			$edit = true;
			$wish->author_name = $author_name;
		}
		if($title && $title!==$wish->title) {
			$edit = true;
			$wish->title = $title;
		}
		if($text && $text!==$wish->text) {
			$edit = true;
			$wish->text = $text;
		}
			
		if(!$edit && $public===false){
			return redirect()->back()->with('error','Не определён статус обновления');
		}
		else {
			
			if(!$edit && $public===$wish->public){
				return redirect()->back()->with('status','Не требует обновления');
			}
			else {
				
				if($wish->published_at === '000-00-00 00:00:00') $wish->published_at = date('Y-m-d H:i:s');
				
				$wish->public = $public;
				$save = $wish->save();
				
				if(0 && !$edit && $save && $wish->public<>0){
					$status = $wish->public>0 ? ' опубликовано и передано Бизнес-Деду Морозу. Скоро всё сбудется!' : 'не прошло модерацию';
					$send = Mail::send('emails.auth.template', ['title' => 'Бизнес-Дед Мороз iTeam', 'text' => 'Ваше желание '.$status], function ($m) use ($wish) {
						$m->to($wish->author_email, $wish->author_name)->subject('iTeam: статус желания');
					});
				}
			}
		}
		return ($save) ? redirect()->back()->with('status','Обновлено успешно') : redirect()->back()->with('error','Ошибка обновления');
	}
	
    public function destroy($id)
    {
		
		$wish = Wish::with('author')->findOrFail($id);
		$wish->delete();
		return redirect()->route('admin.wish.index')->with('status','Удалено успешно');
	}

}