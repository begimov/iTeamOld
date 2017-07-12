<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
//use DB;

class Wish extends Model  {

	use DatePresenter;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $fillable =  ['author_id', 'parent_table', 'parent_id', 'author_name', 'author_email', 'author_avatar', 'author_info', 'company_info', 'title', 'text', 'response_type', 'public', 'style', 'creator_id', 'created_at', 'published_at', 'hidden_at', 'updated_at'];

	
	#public $timestamps = false;

	
	/**
	 * Many to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author() 
	{
		return $this->belongsTo('App\Models\Author', 'author_id', 'user_id');
	}
	/**
	 * Many to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() 
	{
		return $this->belongsTo('App\Models\User', 'author_email', 'email');
	}
}