<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table ="district";
    protected $fillable = [
        'district_id', 'name','province_id',
    ];
    public $timestamps= false;
    public function city()
    {
        return $this->belongsTo('App\Province');
    }
}
