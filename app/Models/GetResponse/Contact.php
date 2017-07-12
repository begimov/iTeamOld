<?php namespace App\Models\GetResponse;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Contact extends Model  {

	use DatePresenter;
	
	protected $table = '_gr_contacts';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	#protected $fillable =  ['title', 'wid', 'intro', 'text', 'created_at', 'updated_at'];
	
	#public $timestamps = false;
	
	/**
	 * One to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasOne
	 */
	/*
	public function parent()
	{
		return $this->hasOne('App\Models\Articles', 'id', 'parent_id');
	}
	public function childrens()
	{
		return $this->hasMany('App\Models\Articles', 'parent_id', 'id');
	}
	*/

}