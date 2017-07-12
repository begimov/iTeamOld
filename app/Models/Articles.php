<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
//use DB;

class Articles extends Model  {

	use DatePresenter;
	
	#protected $table = 'articles';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	protected $fillable =  ['title', 'wid', 'intro', 'text', 'created_at', 'updated_at'];
	
	#public $timestamps = false;
	
	/**
	 * One to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function parent()
	{
		return $this->hasOne('App\Models\Articles', 'id', 'parent_id');
	}
	public function childrens()
	{
		return $this->hasMany('App\Models\Articles', 'parent_id', 'id');
	}

}