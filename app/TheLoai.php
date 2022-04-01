<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = "TheLoai";

    public function loaidiadiem()
    {
    	return $this->hasMany('App\LoaiDiaDiem','idTheLoai','id');
    }

    public function ttmonan()
    {
    	return $this->hasManyThrough('App\ttmonan','App\LoaiDiaDiem','idTheLoai','idLoaiDiaDiem','id');
    }
}
