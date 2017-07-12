<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
//use DB;

class News extends Model  {

	use DatePresenter;
	
	#protected $table = '_i_news';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $fillable =  ['title', 'wid', 'intro', 'text', 'created_at', 'updated_at'];
	
	#public $timestamps = false;

	
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
	 * /
	public function tags()
	{
		return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
	} 

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 * /
	public function comments()
	{
		return $this->hasMany('App\Models\Comment', 'post_id', 'id');#->wherePostId($this->id)->count();
	}
	*/
	
}