<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
use App\Slide;
use App\LoaiDiaDiem;
use App\TTMonAn;
use App\Pages;
use App\User;

use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);

    }
    function trangchu()
    {
        $user = Auth::user();
        return view('pages.trangchu',['nguoidung'=>$user]);
    }

    function gioithieu()
    {
        $user = Auth::user();
        return view('pages.gioithieu',['nguoidung'=>$user]);
    }

     function lienhe()
    {
        $user = Auth::user();
        return view('pages.lienhe',['nguoidung'=>$user]);
    }

     function loaidiadiem($id)
    {
        $user = Auth::user();
        $loaidiadiem = LoaiDiaDiem::find($id);
        $ttmonan = TTMonAn::where('idLoaiDiaDiem',$id)->paginate(5);
        return view('pages.loaidiadiem',['loaidiadiem'=>$loaidiadiem, 'ttmonan'=>$ttmonan,'nguoidung'=>$user]);
    }

    function ttmonan($id)
    {
        $user = Auth::user();
        $ttmonan = TTMonAn::find($id);
        $tinnoibat = TTMonAn::where('NoiBat',1)->take(4)->get();
        $tinlienquan = TTMonAn::where('idLoaiDiaDiem', $ttmonan->idLoaiDiaDiem)->take(4)->get();
        return view('pages.ttmonan',['ttmonan'=>$ttmonan,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan,'nguoidung'=>$user]);
    }

     function getDangnhap()
    {
        $user = Auth::user();
        return view('pages.dangnhap',['nguoidung'=>$user]);
    }
    
    function postDangnhap(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Password không được nhỏ hơn 3 kí tự',
            'password.max'=>'Password không được lớn hơn 32 kí tự'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
                return redirect('trangchu');
            }
        else
            {
                return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
            }
    }

    function getDangxuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }

    function getNguoidung()
    {
        $user = Auth::user();
        return view('pages.nguoidung',['nguoidung'=>$user]);
    }

    function postNguoidung(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|min:3',

        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự'
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if($request->changePassword == "on")
        {
            $this->validate($request,[
            'password' =>'required|min:3|max:32',
            'passwordAgain' =>'required|same:password'
        ],
        [
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
        ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('nguoidung')->with('thongbao','Bạn đã sửa thành công');
    }

    function getDangky()
    {
        return view('pages.dangky');
    }

    function postDangky(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|min:3',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|min:3|max:32',
            'passwordAgain' =>'required|same:password'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();

        return redirect('dangky')->with('thongbao','Đăng ký thành công');
    }

    function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $ttmonan = TTMonAn::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->orwhere('NoiDung','like',"%$tukhoa%")->take(10)->paginate(5);
        return view('pages.timkiem', ['ttmonan'=>$ttmonan,'tukhoa'=>$tukhoa]);
    }

    function theotheloai($id)
    {
        $user = Auth::user();
        $loaidiadiem = LoaiDiaDiem::find($id);
        $ttmonan = TTMonAn::where('idLoaiDiaDiem',$id)->paginate(5);
        return view('pages.loaidiadiem',['loaidiadiem'=>$loaidiadiem, 'ttmonan'=>$ttmonan,'nguoidung'=>$user]);
    }
}
