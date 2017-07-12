<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller AS BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
#use \Illuminate\Support\Facades\Auth;

use App\Models\Response;
use App\Models\Learn;
use Mail;

class ResponseController extends BaseController
{

    protected $paginate = 50;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search = $request->search ? $request->search : false;
        //$learn = $request->learn ? $request->learn : false;
        $learn = (null !== $request->learn && $request->learn !== "") ? $request->learn : false;
        $public = (null !== $request->public && $request->public !== "") ? $request->public : false;
        $order_by = $request->order_by ? $request->order_by : 'created_at';
        $sort_by = $request->sort_by ? $request->sort_by : 'desc';

        $responses = Response::with(['author','learn']);

        if($learn!==false){
            if($learn==="0"){
                $responses = $responses->where('learn_id','=',0);
            }
            else {
                $learns = Learn::where('title','LIKE','%'.$learn.'%')->select('id')->pluck('id')->toArray();
                $responses = $responses->whereIn('learn_id',$learns);
            }
        }

        if($search!==false){
            $responses = $responses->where(function ($query) use ($search) {
                $query->where('text','LIKE','%'.$search.'%')
                    ->orWhere('author_name','LIKE','%'.$search.'%');
            });
        }

        if($public!==false){
            $responses = $responses->whereIn('public',$public);
        }

        $responses = $responses->orderBy($order_by, $sort_by);
        $responses = $responses->paginate($this->paginate);


        $links = $responses->appends([
            'search' => $request->search,
            'public' => $request->public,
            'learn' => $request->learn,
            'order_by' => $request->order_by,
            'sort_by' => $request->sort_by
        ])->render();

        $this_year = date('m')>11 ? date("Y", strtotime("+1 year", time())) : date("Y");
        $years = range(2015,$this_year);
        $publics = [-1=>'Спам',0=>'На модерацию',1=>'Опубликовано'];
        $order_by = ['ID'=>'id','Дата'=>'created_at','Имя'=>'author_name'];

        return view('admin.response.index', compact('responses', 'links', 'order_by', 'publics'));

    }

    public function show(Request $request, $id)
    {
        return redirect()->route('admin.response.index');
    }

    public function create()
    {
        $learns = Learn::all();
        return view('admin.response.create', ['learns' => $learns]);
    }

    public function store(Request $request)
    {
//        dd($request->file('author_avatar')->getClientOriginalName());
        $response = new Response();
        $response->fill($request->all());
        ($request->public == 'on') ? $response->public = 1 : $response->public = 0;
        $response->learn_id = $request->learn_id;
        $response->product_id = $request->learn_id;

//        dd($request->file('author_avatar'));
        if($rImg = $request->file('author_avatar')) {
//            dd('qwe');
            $fileName = md5($rImg->getFileName()).'.'.$rImg->extension();
            $destinationPath = 'filemanager/userfiles/user0/content/comments';
            if($rImg->move($destinationPath, $fileName)){
                $response->author_avatar = '/' . $destinationPath . '/' . $fileName;
            }
        }
//        $response->author_avatar = $request->file('author_avatar')->getClientOriginalName();
//        $request->file('author_avatar')->move('images/author');
        $response->save();

        return redirect()->route('admin.response.index');
    }

    public function edit($id)
    {
        $response = Response::find($id);
        $learns = Learn::all();

        return view('admin/response/create', [
            'response' => $response,
            'learns' => $learns
        ]);
    }

//    public function update(Request $request, $id)
//    {
//		$save = false;
//		$response = Response::with('author')->findOrFail($id);
//		$public = (null !== $request->public && $request->public !== "") ? (int)$request->public : false;
//		if($public===false){
//			return redirect()->back()->with('error','Не определён статус обновления');
//		}
//		else {
//			if($public===$response->public){
//				return redirect()->back()->with('status','Не требует обновления');
//			}
//			else {
//				$response->public = $public;
//				$save = $response->save();
//
//				if($save && $response->public<>0){
//					$status = $response->public>0 ? ' опубликовано и передано Бизнес-Деду Морозу. Скоро всё сбудется!' : 'не прошло модерацию';
//					$send = Mail::send('emails.auth.template', ['title' => 'Бизнес-Дед Мороз iTeam', 'text' => 'Ваше желание '.$status], function ($m) use ($response) {
//						$m->to($response->author_email, $response->author_name)->subject('iTeam: статус желания');
//					});
//				}
//			}
//		}
//		return ($save) ? redirect()->back()->with('status','Обновлено успешно') : redirect()->back()->with('error','Ошибка обновления');
//	}

    public function update(Request $request, $id)
    {
        $response = Response::find($id);
        $response->fill($request->all());
        ($request->public == 'on') ? $response->public = 1 : $response->public = 0;
        $response->learn_id = $request->learn_id;
        $response->product_id = $request->learn_id;

        if($rImg = $request->file('author_avatar')) {
//            dd('qwe');
            $fileName = md5($rImg->getFileName()).'.'.$rImg->extension();
            $destinationPath = 'filemanager/userfiles/user0/content/comments';
            if($rImg->move($destinationPath, $fileName)){
                $response->author_avatar = '/' . $destinationPath . '/' . $fileName;
            }
        }

        $response->save();

        return redirect()->route('admin.response.index');
    }

//    public function destroy($id)
//    {
//
//		$response = Response::with('author')->findOrFail($id);
//		$response->delete();
//		return redirect()->route('admin.response.index')->with('status','Удалено успешно');
//	}

    public function destroy($id)
    {
        $response = Response::find($id);
        $response->delete();
        return redirect()->route('admin.response.index');
    }

}