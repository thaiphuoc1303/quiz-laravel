<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\khoi;
use App\Models\theloai;
use App\Models\nhande;
use App\Models\lop;
use App\Models\hocsinh;
use App\Models\debai;
use App\Models\chuong;
use App\Models\baitap;
use App\Models\bailam;

class giaovienController extends Controller
{
    public function lop(){
        return view ('GiaoVien.lops', ['lops' => $lops = lop::all()]);
    }
    public function xoalop($id)
    {
        lop::find($id)->delete();
        return redirect('giao-vien/lops');
    }
    public function sualop($id)
    {
        return view('giaovien.sualop')->with('lop', lop::find($id));
    }
    public function themlop()
    {
        return view ('GiaoVien.themlop', ['khois'=> khoi::all()]);
    }
    public function postThemLop(Request $request)
    {
        lop::insert(['ten'=> $request->ten, 'khoi'=> $request->khoi]);
        return redirect('giao-vien/lops');
    }
    public function cong1($id)
    {
        $lop = lop::find($id);
        $lop->sobuoidahoc = $lop->sobuoidahoc +1;
        $lop->save();
        return redirect('giao-vien/lops');
    }
    public function danhsachlop($id)
    {
        $hocsinhs = hocsinh::all()->where('lop', $id);
        $lop = lop::find($id);
        return view('GiaoVien.danhsachlop', ['hocsinhs'=>$hocsinhs, 'lop'=>$lop]);
    }
    public function themhocsinh()
    {
        return view('GiaoVien.themhocsinh', ['lops' => lop::all()]);
    }
    public function xoahocsinh($id)
    {
        hocsinh::find($id)->delete();
        return redirect()->back();
    }
    public function postthemhocsinh(Request $request)
    {
        $khoi = lop::find($request->lop)->khoi;
        hocsinh::insert([
            'ten' => $request->ten,
            'namsinh' => $request->namsinh,
            'truong' => $request->truong,
            'email' => $request->email,
            'sodienthoai' => $request->sodienthoai,
            'khoi' => $khoi,
            'lop' => $request->lop,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        return redirect('giao-vien/themhocsinh');
    }
    public function suahocsinh($id)
    {
        return view('GiaoVien.suahocsinh', ['lops'=> lop::all(), 'hocsinh'=> hocsinh::find($id)]);
    }
    public function postsuahocsinh(Request $request)
    {
        $hocsinh = hocsinh::find($request->id);
        $hocsinh->ten = $request->ten;
        $hocsinh->namsinh = $request->namsinh;
        $hocsinh->truong = $request->truong;
        $hocsinh->email = $request->email;
        $hocsinh->sodienthoai = $request->sodienthoai;
        $hocsinh->lop = $request->lop;
        $hocsinh->save();
        return redirect('giao-vien/danhsachlop/'.$hocsinh->lop);
    }
    public function theloai($id)        
    {
        $chuongs = chuong::all()->where('khoi', $id);
        $theloais = DB::select('SELECT theloai.*, khoi.ten AS tenkhoi, chuong.ten AS tenchuong 
        FROM `theloai` 
        JOIN chuong on theloai.chuong = chuong.id 
        JOIN khoi on chuong.khoi = khoi.id 
        WHERE chuong.khoi = ?', [$id]);
        $khoi = khoi::find($id);
        return view('GiaoVien.theloai', ['chuongs'=>$chuongs, 'khoi'=>$khoi, 'theloais'=> $theloais]);
    }
    public function themtheloai($id)
    {
        return view('GiaoVien.themtheloai', ['chuongs'=> chuong::all()->where('khoi', $id), 'khois'=>khoi::all(), 'khoi'=> $id]);
    }
    
    public function posttheloai(Request $request)
    {
        theloai::insert([
            'ten'=> $request->ten,
            'khoi' => $request->khoi,
            'chuong' =>$request->chuong
        ]);
        return redirect('giao-vien/theloai/'.$request->khoi);
    }
    public function themchuong($id)
    {
        return view('GiaoVien.themchuong', ['khois'=>khoi::all(), 'khoi'=>khoi::find($id)]);
    }
    public function pthemchuong(Request $request)
    {
        chuong::insert([
            'ten'=>$request->ten,
            'khoi'=>$request->khoi,
            'dai_hinh' =>$request->dai,
            'ki' => $request->ki
        ]);
        return redirect('giao-vien/theloai/'.$request->khoi);
    }

    public function de()
    {
        return view('HocSinh.de', ['de'=> baitap::find(3)]);
    }
}
