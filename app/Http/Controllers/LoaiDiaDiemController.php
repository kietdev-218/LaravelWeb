<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiDiaDiem;

class LoaiDiaDiemController extends Controller
{
    //
    public function getDanhSach()
    {
    	$loaidiadiem = LoaiDiaDiem::all();
    	return view('admin.loaidiadiem.danhsach',['loaidiadiem'=>$loaidiadiem]);
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
    	return view('admin.loaidiadiem.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'Ten' => 'required|unique:LoaiDiaDiem,Ten|min:2|max:20',
                'TheLoai'=>'required'
    		],
    		[
    			'Ten.required'=>'Hãy nhập loại địa điểm muốn thêm',
    			'Ten.unique'=>'Tên loại địa điểm đã tồn tại',
    			'Ten.min'=>'Tên loại địa điểm phải có độ dài từ 2 đến 20 kí tự',
    			'Ten.max'=>'Tên loại địa điểm phải có độ dài từ 2 đến 20 kí tự',
                'TheLoai.required'=>'Hãy chọn thể loại'
    		]);
    	$loaidiadiem = new LoaiDiaDiem;
    	$loaidiadiem->Ten = $request->Ten;
    	$loaidiadiem->TenKhongDau = changeTitle($request->Ten);
        $loaidiadiem->idTheLoai = $request->TheLoai;
    	$loaidiadiem->save();

    	return redirect('admin/loaidiadiem/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {   
        $theloai = TheLoai::all();
    	$loaidiadiem = LoaiDiaDiem::find($id);
    	return view('admin.loaidiadiem.sua',['loaidiadiem'=>$loaidiadiem, 'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id)
    {
    	$loaidiadiem = LoaiDiaDiem::find($id);
    	$this->validate($request,
    		[
    			'Ten' => 'required|unique:LoaiDiaDiem|min:2|max:20'
    		],
    		[
    			'Ten.required'=>'Hãy nhập tên loại địa điểm',
    			'Ten.unique'=>'Tên loại địa điểm đã tồn tại',
    			'Ten.min'=>'Tên loại địa điểm phải có độ dài từ 2 đến 20 kí tự',
    			'Ten.max'=>'Tên loại địa điểm phải có độ dài từ 2 đến 20 kí tự'
    		]
    	);
        $loaidiadiem = loaidiadiem::find($id);
    	$loaidiadiem->Ten = $request->Ten;
    	$loaidiadiem->TenKhongDau = changeTitle($request->Ten);
        $loaidiadiem->idTheLoai = $request->TheLoai;
    	$loaidiadiem->save();

    	return redirect('admin/loaidiadiem/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    
    public function getXoa($id)
    {
    	$loaidiadiem = LoaiDiaDiem::find($id);
    	$loaidiadiem->delete();

    	return redirect('admin/loaidiadiem/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
