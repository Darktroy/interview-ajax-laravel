<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_items extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'order_id',
                  'item_id',
                  'price_per_one',
                  'quantity'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
               'deleted_at'
           ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the order for this model.
     *
     * @return App\Models\Order
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Orders','order_id');
    }

    /**
     * Get the item for this model.
     *
     * @return App\Models\Item
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Items','item_id');
    }



}
