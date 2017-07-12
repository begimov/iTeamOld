<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
//use DB;

class Author extends Model  {

	use DatePresenter;
	
	protected $table = 'authors';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $fillable =  ['user_id', 'creator_id', 'name', 'info', 'avatar', 'type', 'created_at', 'updated_at', 'company_info', 'company_id'];

	#public $timestamps = false;

	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function response() 
	{
		return $this->hasOne('App\Models\Response', 'id', 'author_id');
	}
	
	/**
	 * Many to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() 
	{
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}
}