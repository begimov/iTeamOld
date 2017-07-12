<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
//use DB;

class Product extends Model  {

	use DatePresenter;
	
	#protected $table = 'products';

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
	public function authors() 
	{
		return $this->belongsTo('App\Models\Author', 'author_id', 'id');
	}	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function orders() 
	{
		return $this->hasMany('App\Models\Order', 'id', 'product_id');
	}

	/**
	 * One to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function parent()
	{
		return $this->hasOne('App\Models\Product', 'id', 'parent_id');
	}
	public function childrens()
	{
		return $this->hasMany('App\Models\Product', 'parent_id', 'id');
	}
	
}