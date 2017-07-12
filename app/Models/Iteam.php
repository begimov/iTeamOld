<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use DB;

class Iteam extends Model  {

	use DatePresenter;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	#protected $table = 'iteams';
	protected $pgnt = 20;


	public static function getFirstByPathAndSlug($path = '', $wid = '') 
	{
		return DB::table('iteams')
			->where('iteams.wid','=',$wid)
			->where('iteams.path','=',$path)
				->leftJoin('iteams AS children','children.parent_id','=','iteams.id')
				->leftJoin('iteams AS parent','parent.id','=','iteams.parent_id')
			->select('children.id as cid','parent.id as pid','iteams.*')
				->groupBy('iteams.id')
			->first();
	}
	
	public static function getCrumbsByPathArr($links = []) 
	{
		$count = count($links);
		$crumbs = [];
		$path = '';
		for($i=0;$i<$count;$i++) {
			$path .= '/';
			$wid = $links[$i];
			$crumbs[] = DB::table('iteams')
				->where('path','LIKE',$path)
				->where('wid','=',$wid)
				->select('id','title','wid','path','outro')
				->first();
			$path .= $wid;
		}
		return $crumbs;
	}
	public static function getChildrenByPath($path = '') 
	{
		return DB::table('iteams')
			->where('iteams.path','=',$path)
			->select('iteams.*')
			->paginate(20);
			//->get();
	}
	public static function getAllChildrenByPath($path = '') 
	{
		return DB::table('iteams')
			->where('iteams.path','LIKE',$path.'%')
			->where('iteams.children','=','0')
			->where('iteams.title','NOT LIKE','')
				->leftJoin('iteams AS parent','iteams.parent_id','=','parent.id')
			->select('iteams.*', 'parent.title as parent_title')
			->orderBy('iteams.created_at', 'desc')
			//->skip(0)->take(50)
			->paginate(20);
			//->get();
	}
	public static function getAllArticlesByPath($path = '') 
	{
		return DB::table('iteams')
			->where('iteams.path','LIKE',$path.'%')
			->where('iteams.path','LIKE','/publications/%')
			->where('iteams.children','=','0')
				->leftJoin('iteams AS parent','iteams.parent_id','=','parent.id')
			->select('iteams.*', 'parent.title as parent_title')
			->orderBy('iteams.created_at', 'desc')
			//->skip(0)->take(50)
			->paginate(20);
			//->get();
	}
	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() 
	{
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
	} 

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function comments()
	{
		return $this->hasMany('App\Models\Comment', 'post_id', 'id');#->wherePostId($this->id)->count();
	}
	

}