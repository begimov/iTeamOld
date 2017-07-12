<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
//use DB;

class Project extends Model  {

	use DatePresenter;
	
	#protected $table = 'projects';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	#protected $fillable =  ['user_id', 'creator_id', 'name', 'info', 'avatar', 'type', 'created_at', 'updated_at', 'company_info', 'company_id'];

	#public $timestamps = false;

	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company() 
	{
		#return $this->belongsTo('App\Models\Company', 'company_id', 'id');
		#return $this->hasOne('App\Models\Company', 'company_id', 'id');
		return $this->hasOne('App\Models\Company', 'id', 'company_id');
	}
}