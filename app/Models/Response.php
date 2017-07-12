<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
//use DB;

class Response extends Model  {

    use DatePresenter;

    #protected $table = 'responses';

    /**
     * The database table used by the model.
     *
     * @var string
     */

    #protected $fillable =  ['author_id', 'parent_table', 'parent_id', 'author_name', 'author_email', 'author_avatar', 'author_info', 'company_info', 'title', 'text', 'response_type', 'public', 'style', 'creator_id', 'created_at', 'published_at', 'hidden_at', 'updated_at'];
    protected $fillable =  ['author_id', 'learn_id', 'product_id', 'author_name', 'author_info', 'company_info', 'text', 'public'];


    #public $timestamps = false;


    /**
     * Many to One relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id', 'id');
    }
    /**
     * Many to One relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learn()
    {
        return $this->belongsTo('App\Models\Learn', 'learn_id', 'id');
    }

    public function learn2()
    {
        return $this->hasOne('App\Models\Learn', 'id', 'learn_id');
    }
    /**
     * Many to One relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}