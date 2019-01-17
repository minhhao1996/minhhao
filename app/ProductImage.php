<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table ="product_images";
    protected $fillable = [
        'id', 'product_id', 'file_name','creat_at', 'update_at',
    ];
    public $timestamps= false;

    public function  product(){
        return $this->belongsTo('App\Product');
    }
}