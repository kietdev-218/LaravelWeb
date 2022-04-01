<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TTMonAn extends Model
{
    //
    protected $table = "TTMonAn";

    public function loaidiadiem()
    {
    	return $this->belongsTo('App\LoaiDiaDiem','idLoaiDiaDiem','id');
    }

    public function comment()
    {
    	return $this->hasMany('App\Comment','idTTMonAn','id');
    }
}
