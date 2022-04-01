<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "Comment";

    public function ttmonan()
    {
    	return $this->belongsTo('App\TTMonAn','idTTMonAn','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }
}
