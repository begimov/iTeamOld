<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use App\Models\Learn;
//use DB;

class Order extends Model  {

	use DatePresenter;
	
	#protected $table = 'orders';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $fillable =  ['id','product_id','user_id','admin_id','sum','payment_sum','currency','email','details','company','company_id','ptype','payment_type','status','text','created_at','viewed_at','confirmed_at','payed_at','deleted_at','updated_at'];
	
	#public $timestamps = false;

	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() 
	{
		#return $this->belongsTo('App\Models\User', 'email', 'email');
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}	
	/**
	 * One to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function learn() 
	{
		return $this->belongsTo('App\Models\Learn', 'product_id', 'id');
	}

    public function test()
    {
        return $this->belongsTo('App\Test', 'test_id', 'id');
    }

    public function test_name() {
	    return $this->belongsTo('App\Test', 'test_id', 'id');
    }

    /**
	 * One to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product() 
	{
		return $this->belongsTo('App\Models\Product', 'product_id', 'id');
	}
	
}