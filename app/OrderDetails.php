<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = "order_details";

    protected $fillable = [
        'id', 'order_id','product_id', 'qty','price','status','created_at'
    ];
    public $timestamps= false;
    public function order(){
        return $this->belongsTo('App\Order');
    }
}
