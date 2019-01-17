<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table ="orders";
    protected $fillable = [
        'id', 'user_id', 'username','phone','email','address','amount','data','payment','payment_info', 'create_at','status',
    ];
    public $timestamps= false;

    public function  product(){
        return $this->hasMany('App\OrderDetails','order_id','id');
    }

}
