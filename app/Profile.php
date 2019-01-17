<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table ="profile";
    protected $fillable = [
        'id', 'user_id', 'sex','phone','birthday', 'address','city_id','county_id',
    ];
    public $timestamps= false;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
