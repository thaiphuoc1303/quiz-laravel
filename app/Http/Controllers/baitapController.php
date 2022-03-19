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

class baitapController extends Controller
{
    public function danhsachbaitapchuong($chuong)
    {
        
        $baitaps = DB::table('baitap')
            ->join('theloai', 'baitap.theloai', '=', 'theloai.id')
            ->join('chuong', 'theloai.chuong', '=', 'chuong.id')
            ->join('khoi', 'chuong.khoi', '=', 'khoi.id')
            ->select('baitap.*', 'khoi.ten as tenkhoi', 'chuong.ten as tenchuong', 'theloai.ten as tentheloai')
            ->where('chuong.id', $chuong)->paginate(10);

        $chuong1 = chuong::find($chuong);

        return view('GiaoVien.danhsachbaitap', ['baitaps'=>$baitaps,'khoi'=>$chuong1->khoi, 'title_table'=>'Bài tập '.$chuong1->ten]);
    }
    public function danhsachbaitaptheloai($theloai)
    {
        $baitaps = DB::table('baitap')
            ->join('theloai', 'baitap.theloai', '=', 'theloai.id')
            ->join('chuong', 'theloai.chuong', '=', 'chuong.id')
            ->join('khoi', 'chuong.khoi', '=', 'khoi.id')
            ->select('baitap.*', 'khoi.ten as tenkhoi', 'chuong.ten as tenchuong', 'theloai.ten as tentheloai')
            ->where('theloai.id', $theloai)->paginate(10);
        $khoi = DB::table('theloai')->JOIN('chuong', 'theloai.chuong', '=', 'chuong.id')
        ->select('chuong.khoi')->where('theloai.id', $theloai)->first()->khoi;
        $tl = theloai::find($theloai);
        return view('GiaoVien.danhsachbaitap', ['baitaps'=>$baitaps,'khoi'=>$khoi, 'title_table'=>'Bài tập '.$tl->ten]);
    }
    public function thembaitap($id)
    {
        $khois = khoi::all();
        $khoi = khoi::find($id);
        $chuongs = chuong::all()->where('khoi', $id);
        // $theloais = DB::table('theloai')
        //     ->join('chuong', 'theloai.chuong', '=', 'chuong.id')
        //     ->select('theloai.*')
        //     ->where('chuong.khoi', $id);
        $theloais = DB::select('SELECT theloai.* FROM `theloai` JOIN chuong ON chuong.id = theloai.chuong WHERE chuong.khoi = ?', [$id]);
        return view('GiaoVien.thembaitap', ['chuongs'=>$chuongs, 'khois'=>$khois, 'k'=>$khoi->id, 
        'theloais'=>$theloais, 'submit'=>'postbaitap', 'title'=>'Thêm bài tập']);
    }
    public function loadtheloai($khoi, $chuong = null)
    {
        if($chuong==null) $chuong = chuong::all()->where('khoi', $khoi)->first()->id;
        $theloais = theloai::all()->where('chuong', $chuong);
        return view('GiaoVien.loadtheloai', ['theloais'=> $theloais]);
    }
    public function loadchuong($id)
    {
        $chuongs = chuong::all()->where('khoi', $id);
        return view('GiaoVien.loadchuong', ['chuongs'=> $chuongs]);
    }
    public function postbaitap(Request $request)
    {
        baitap::insert([
            'de' => $request->de,
            'theloai' => $request->theloai,
            'dokho' => $request->dokho,
            'DaA' => $request->DaA,
            'DaB' => $request->DaB,
            'DaC' => $request->DaC,
            'DaD' =>$request->DaD,
            'Da' => $request->dapan
        ]);
        $khois = khoi::all();
        $chuongs = chuong::all()->where('khoi', $request->khoi);
        $theloais = theloai::all()->where('khoi', $request->khoi);
        return redirect()->route('thembaitap', ['id'=> $request->khoi,'khois'=>$khois, 'chuongs'=>$chuongs, 'theloais'=>$theloais]);
        // return redirect('GiaoVien.thembaitap/'.$request->khoi, ['khois'=>$khois, 'chuongs'=>$chuongs, 'theloais'=>$theloais]);
    }
    public function xoabaitap($id)
    {
        baitap::find($id)->delete();
        return redirect()->back();
    }
    public function suabaitap($id)
    {
        $baitap = baitap::find($id);
        $item = DB::table('baitap')
            ->JOIN('theloai', 'baitap.theloai', '=', 'theloai.id')
            ->JOIN('chuong', 'theloai.chuong', '=', 'chuong.id')
            ->select('chuong.khoi', 'theloai.chuong', 'baitap.theloai')
            ->where('baitap.id', $id)->first();

        $khois = khoi::all();
        $khoi = khoi::find($item->khoi);
        $theloais = DB::select('SELECT theloai.* FROM `theloai` JOIN chuong ON chuong.id = theloai.chuong WHERE chuong.khoi = ?', [$item->khoi]);
        $chuongs = chuong::all()->where('khoi', $item->khoi);
        return view('GiaoVien.thembaitap', ['chuongs'=>$chuongs, 'baitap' => $baitap, 'khois'=>$khois, 'k'=>$khoi->id, 
        'theloais'=>$theloais, 'submit'=>'postsuabaitap/'.$id, 'title'=>'Sửa bài tập', 'flag'=>$item]);
    }
    public function postsuabaitap(Request $request, $id)
    {
        $baitap = baitap::find($id);
        $baitap->theloai = $request->theloai;
        $baitap->dokho = $request->dokho;
        $baitap->de = $request->de;
        $baitap->DaA = $request->DaA;
        $baitap->DaB = $request->DaB;
        $baitap->DaC = $request->DaC;
        $baitap->DaD = $request->DaD;
        $baitap->Da = $request->dapan;
        $baitap->save();
        return redirect('giao-vien/danhsachbaitap/theloai/'.$request->theloai);
    }
    public function loadbaitap($id)
    {
        return view('GiaoVien.loadbaitap', ['baitap'=> baitap::find($id)]);
    }
}
