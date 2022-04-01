<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\TTMonAn;

class CommentController extends Controller
{
    //
    public function getXoa($id,$idTTMonAn)
    {
    	$comment = Comment::find($id);
    	$comment->delete();

    	return redirect('admin/ttmonan/sua/'.$idTTMonAn)->with('thongbao','Bạn đã xóa comment thành công');
    }

    public function postComment($id,Request $request)
    {
    	$idTTMonAn = $id;
    	$ttmonan = TTMonAn::find($id);
    	$comment = new Comment;
    	$comment->idTTMonAn = $idTTMonAn;
    	$comment->idUser = Auth::user()->id;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->save();

    	return redirect("ttmonan/$id/".$ttmonan->TieuDeKhongDau.".html")->with('thongbao','đã gửi bình luận thành công');
    }
}
