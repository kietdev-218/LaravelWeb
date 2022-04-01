<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiDiaDiem;
use App\TTMonAn;

class AjaxController extends Controller
{
    //
    public function getLoaiDiaDiem($idTheLoai)
    {
    	$loaidiadiem = LoaiDiaDiem::where('idTheLoai',$idTheLoai)->get();
    	foreach ($loaidiadiem as $ldd) {
    		echo "<option value='".$ldd->id."'>".$ldd->Ten."</option>";
    	}
    }
}
?>