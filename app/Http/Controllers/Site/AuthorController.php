<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
#use \Illuminate\Support\Facades\Auth;

use App\Models\Author;
use App\Models\Learn;
use App\Models\Response;

class AuthorController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Author
     */
    public function index(Request $request)
    {
		$authors = Author::paginate(50);
		return view('c.company.author.index',compact('authors'));
	}
    public function show(Request $request, $author_id)
    {
		$author = Author::findOrFail($author_id);
		$more = '';
		if($author->type === 'iteam') {
			$childrens = Learn::where('author_id','=',$author->id)->where('title','NOT LIKE','')->where('public','>',0)->orderBy('published_at', 'desc')->paginate(50);
			$more .= '<hr><h3 align="center">Материалы автора</h3>';
			$more .= view('c.learn.loop',compact('childrens'));
		} 
		else {
			$responses = Response::where('author_id','=',$author->id)->where('public','>',0)->get();
			$learn_title = false;
			$more .= '<hr><h3 align="center">Отзывы автора</h3>';
			$more .= view('c.company.response.loop',compact('responses','learn_title'));
		}
		return view('c.company.author.show',compact('author','more'));
	}
    public function showByAuthorId($author_id)
    {
		$author = Author::find($author_id);
		return $author ? view('c.company.author.card',compact('author')) : '';
	}
}