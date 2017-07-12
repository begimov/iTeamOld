<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Company extends Model  {

	use DatePresenter;
	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function project() 
	{
		return $this->belongsTo('App\Models\Project');
	}
}