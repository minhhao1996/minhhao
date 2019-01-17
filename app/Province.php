<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table ="province";
    protected $fillable = [
        'province_id', 'name',
    ];
    public $timestamps= false;
    public function  province(){
        return $this->hasMany('App\District','province_id','province_id');
    }
}
