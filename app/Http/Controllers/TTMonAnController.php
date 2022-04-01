<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiDiaDiem;
use App\TTMonAn;

class TTMonAnController extends Controller
{
    //
    public function getDanhSach()
    {
    	$ttmonan = TTMonAn::orderby('id','DESC')->get();
    	return view('admin.ttmonan.danhsach',['ttmonan'=>$ttmonan]);
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        $loaidiadiem = LoaiDiaDiem::all();
    	return view('admin.ttmonan.them',['theloai'=>$theloai,'loaidiadiem'=>$loaidiadiem]);
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
                'LoaiDiaDiem'=>'required',
                'TieuDe'=>'required|min:5|unique:TTMonAn,TieuDe',
    			'TomTat' => 'required',
                'NoiDung'=>'required',
                'Hinh'=>'required'
    		],
    		[
    			'LoaiDiaDiem.required'=>'Bạn chưa chọn loại địa điểm',
                'TieuDe.required'=>'Tiêu đề không được bỏ trống',
    			'TieuDe.unique'=>'Tiêu đề đã tồn tại',
    			'TieuDe.min'=>'Tiêu đề phải có ít nhất 5 kí tự',
    			'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'NoiDung.required'=>'Bạn chưa nhập nội dung',
                'Hinh.required'=>'Hãy chọn hình ảnh'
    		]);

    	$ttmonan = new TTMonAn;
    	$ttmonan->TieuDe = $request->TieuDe;
    	$ttmonan->TieuDeKhongDau = changeTitle($request->TieuDe);
        $ttmonan->idLoaiDiaDiem = $request->LoaiDiaDiem;
        $ttmonan->TomTat = $request->TomTat;
        $ttmonan->NoiDung = $request->NoiDung;
        $ttmonan->SoLuotXem = 0;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/ttmonan/them')->with('loi','Bạn chỉ chon file có đuôi là: jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("public/upload/ttmonan/".$Hinh)) {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("public/upload/ttmonan",$Hinh);
            $ttmonan->Hinh=$Hinh;
        }

    	$ttmonan->save();

    	return redirect('admin/ttmonan/them')->with('thongbao','Bạn đã thêm thông tin địa điểm thành công');
    }

    public function getSua($id)
    {   
        $theloai = TheLoai::all();
        $loaidiadiem = LoaiDiaDiem::all();
    	$ttmonan = TTMonAn::find($id);
    	return view('admin.ttmonan.sua',['ttmonan'=>$ttmonan, 'loaidiadiem'=>$loaidiadiem, 'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id)
    {
    	$ttmonan = TTMonAn::find($id);
    	$this->validate($request,
            [
                'LoaiDiaDiem'=>'required',
                'TieuDe'=>'required|min:5|unique:TTMonAn,TieuDe',
                'TomTat' => 'required',
                'NoiDung'=>'required',
                // 'Hinh'=>'required'
            ],
            [
                'LoaiDiaDiem.required'=>'Bạn chưa chọn loại địa điểm',
                'TieuDe.required'=>'Tiêu đề không được bỏ trống',
                'TieuDe.unique'=>'Tiêu đề đã tồn tại',
                'TieuDe.min'=>'Tiêu đề phải có ít nhất 5 kí tự',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'NoiDung.required'=>'Bạn chưa nhập nội dung',
                // 'Hinh.required'=>'Hãy chọn hình ảnh'
            ]);
       $ttmonan->TieuDe = $request->TieuDe;
        $ttmonan->TieuDeKhongDau = changeTitle($request->TieuDe);
        $ttmonan->idLoaiDiaDiem = $request->LoaiDiaDiem;
        $ttmonan->TomTat = $request->TomTat;
        $ttmonan->NoiDung = $request->NoiDung;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/ttmonan/them')->with('loi','Bạn chỉ chon file có đuôi là: jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("public/upload/ttmonan/".$Hinh)) 
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("public/upload/ttmonan",$Hinh);
            unlink("public/upload/ttmonan/".$ttmonan->Hinh);
            $ttmonan->Hinh=$Hinh;
        }

        $ttmonan->save();

    	return redirect('admin/ttmonan/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    
    public function getXoa($id)
    {
    	$ttmonan = TTMonAn::find($id);
    	$ttmonan->delete();

    	return redirect('admin/ttmonan/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
