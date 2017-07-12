<?php namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Product;

class ProductController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order_m, Request $request, $link = '/')
    {
		#if(!$link || $link === '/') return $this->indexHome();
		
		
		$links = explode('/',$link);
		$wid = array_pop($links);
		$path = implode('/',$links);
		$path = ($path) ? '/' . $path . '/' : '/';
		
		$page = Product::where('wid','=',$wid)
					->where('path','=',$path)
					->where('public','>',-1)
					->first();

		if($page)
		{

			$path_ids = explode('.',$page->path_ids);
			$crumbs = Product::whereIn('id',$path_ids)
								->get();
								
			$childrens = Product::where('path','LIKE',$path.$wid.'/')
								->where('title','NOT LIKE','')
								->where('public','>',0)
								->orderBy('published_at', 'desc')
								->paginate(50);
			
			$user = Auth::user();
			$order = null;
			
			if($user) {
				$order = Order::whereProductId($page->id)->whereUserId($user->id)->where('status','>',-5)->first();
			}
			
			if($childrens->total()) return view('c.product.index', compact('page', 'childrens', 'crumbs', 'user'));
			
			$view = 'c.product.show';
			if($page->pack && view()->exists($view . '_' . $page->pack)) {
				$view = $view . '_' . $page->pack;
			}
			
			#dd($page);
			
			return view($view, compact('page', 'crumbs', 'order', 'user'));			
		}
		else
		{
			abort(404);
		}
		
	}
	
    /**
     * Display a Product Main Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHome()
    {
		$page = Product::where('wid','=','')
					->where('path','=','')
					->first();
		
		if($page)
		{
			$childrens = Product::where('path','LIKE','/')
								->where('title','NOT LIKE','')
								->orderBy('created_at', 'desc')
								->paginate(20);

			
			$user = Auth::user();
			$order = [];
			
			return view('c.product.home', compact('page', 'childrens', 'user'));		
		}
		else
		{
			abort(404);
		}

    }

}