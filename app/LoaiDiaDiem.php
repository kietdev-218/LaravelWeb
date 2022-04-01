<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiDiaDiem extends Model
{
    //
    protected $table = "LoaiDiaDiem";

    public function theloai()
    {
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');

    }

    public function ttmonan()
    {
    	return $this->hasMany('App\TTMonAn','idLoaiDiaDiem','id');
    }
}
