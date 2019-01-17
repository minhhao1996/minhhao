<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'id', 'cat_id','maker_id', 'name','code','contents','discount','avatar',
        'created_at','views','title','warranty','total','buyed','gifts','status', 'update_at'
    ];
    public $timestamps= false;
    public function productImage(){
        return $this->hasMany('App\ProductImage');
    }
    public function catalog(){
        return $this->belongsTo('App\Catalog');
    }
    public function maker(){
        return $this->belongsTo('App\MakerModel');
    }
}