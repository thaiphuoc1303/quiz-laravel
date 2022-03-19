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
use Illuminate\Support\Collection;

class debaiController extends Controller
{
    public function danhsachde($khoi)
    {
        $debais = debai::all()
        ->where('khoi', $khoi);
        return view('GiaoVien.danhsachde', ['debais'=>$debais, 'title_table'=>'Đề khối '.$khoi, 'khoi'=>$khoi]);
    }
    public function themdebai()
    {
        $khois = khoi::all();
        return view('GiaoVien.themdebai', ['khois'=>$khois]);
    }
    public function postdebai(Request $request)
    {
        $debai = debai::insertGetId([
            'khoi'=>$request->khoi,
            'dokho'=>$request->dokho,
            'ten'=>$request->ten,
            'thoigian'=>$request->thoigian
        ]);
        return redirect('giao-vien/debai/'.$debai.'/all');
    }
    public function addquestion($id, $baitap)
    {
        $de = debai::find($id);
        if ($de->de == '') {
            $de->de = $baitap;
            $de->save();
        } else {
            $de->de = $de->de.'-'.$baitap;
            $de->save();
        }
        $checks = explode('-', $de->de);
        return view('GiaoVien.tabupdatedebai', ['count'=>count($checks), 'id'=>$id]);
    }
    public function removequestion($id, $baitap)
    {
        $debai = debai::find($id);
        $checks = explode('-', $debai->de);
        $i=0;
        foreach($checks as $check){
            if($check == $baitap){
                unset($checks[$i]);
            }
            $i++;
        }
        $debai->de = implode('-', $checks);
        $debai->save();
        $checks = explode('-', $debai->de);
        return view('GiaoVien.tabupdatedebai', ['count'=>count($checks), 'id'=>$id]);
    }
    public function debaiAll($id)
    {
        $baitaps = DB::table('baitap')
            ->join('theloai', 'theloai.id', '=', 'baitap.theloai')
            ->join('chuong', 'chuong.id', '=', 'theloai.chuong')
            ->join('khoi', 'chuong.khoi', '=', 'khoi.id')
            ->select('baitap.*', 'khoi.ten as tenkhoi', 'chuong.ten as tenchuong')
            ->paginate(10);
        $debai = debai::find($id);
        $checks = explode('-', $debai->de);
        $baitapchecked = array();
        foreach($baitaps as $baitap){
            foreach($checks as $check){
                if($baitap->id == $check){
                    $baitap->chon = 'checked';
                }
            }
        }
        $khois = khoi::all();
        return view('GiaoVien.updatedebai', ['baitaps'=>$baitaps, 'debai'=>$debai, 'count'=>count($checks), 'khois'=>$khois, 'id'=>$id]);
    }
    public function debaikhoi($id, $khoi, $dai = null)
    {
        if($dai == null){
            $baitaps = DB::table('baitap')
            ->join('theloai', 'theloai.id', '=', 'baitap.theloai')
            ->join('chuong', 'chuong.id', '=', 'theloai.chuong')
            ->join('khoi', 'chuong.khoi', '=', 'khoi.id')
            ->select('baitap.*', 'khoi.ten as tenkhoi', 'chuong.ten as tenchuong')
            ->where('khoi.id', $khoi)
            ->paginate(10);
        }
        else{
             $baitaps = DB::table('baitap')
            ->join('theloai', 'theloai.id', '=', 'baitap.theloai')
            ->join('chuong', 'chuong.id', '=', 'theloai.chuong')
            ->join('khoi', 'chuong.khoi', '=', 'khoi.id')
            ->select('baitap.*', 'khoi.ten as tenkhoi', 'chuong.ten as tenchuong')
            ->where('khoi.id', $khoi)
            ->where('chuong.dai', $dai)
            ->paginate(10);
        }
        
        $debai = debai::find($id);
        $checks = explode('-', $debai->de);
        $baitapchecked = array();
        foreach($baitaps as $baitap){
            foreach($checks as $check){
                if($baitap->id == $check){
                    $baitap->chon = 'checked';
                }
            }
        }
        $khois = khoi::all();
        return view('GiaoVien.updatedebai', ['baitaps'=>$baitaps, 'debai'=>$debai, 'count'=>count($checks), 'khois'=>$khois, 'id'=>$id]);
    }
    public function debaichuong($id, $chuong)
    {
        $baitaps = DB::table('baitap')
            ->join('theloai', 'theloai.id', '=', 'baitap.theloai')
            ->join('chuong', 'chuong.id', '=', 'theloai.chuong')
            ->join('khoi', 'chuong.khoi', '=', 'khoi.id')
            ->select('baitap.*', 'khoi.ten as tenkhoi', 'chuong.ten as tenchuong')
            ->where('chuong.id', $chuong)
            ->paginate(10);
        $debai = debai::find($id);
        $checks = explode('-', $debai->de);
        $baitapchecked = array();
        foreach($baitaps as $baitap){
            foreach($checks as $check){
                if($baitap->id == $check){
                    $baitap->chon = 'checked';
                }
            }
        }
        $khois = khoi::all();
        return view('GiaoVien.updatedebai', ['baitaps'=>$baitaps, 'debai'=>$debai, 'khois'=>$khois, 'count'=>count($checks),'id'=>$id]);
    }
    public function debaitheloai($id, $theloai)
    {
        $baitaps = DB::table('baitap')
            ->join('theloai', 'theloai.id', '=', 'baitap.theloai')
            ->join('chuong', 'chuong.id', '=', 'theloai.chuong')
            ->join('khoi', 'chuong.khoi', '=', 'khoi.id')
            ->select('baitap.*', 'khoi.ten as tenkhoi', 'chuong.ten as tenchuong')
            ->where('theloai.id', $theloai)
            ->paginate(10);
        $debai = debai::find($id);
        $checks = explode('-', $debai->de);
        $baitapchecked = array();
        foreach($baitaps as $baitap){
            foreach($checks as $check){
                if($baitap->id == $check){
                    $baitap->chon = 'checked';
                }
            }
        }
        $khois = khoi::all();
        return view('GiaoVien.updatedebai', ['baitaps'=>$baitaps, 'debai'=>$debai, 'khois'=>$khois, 'count'=>count($checks),'id'=>$id]);
    }
    public function postlocbaitap(Request $request, $id)
    {
        if($request->theloai != ''){
            return redirect('giao-vien/debai/'.$id.'/theloai/'.$request->theloai);
        }
        else{
            if($request->chuong != ''){
                return redirect('giao-vien/debai/'.$id.'/chuong/'.$request->chuong);
            }
            else{
                if($request->khoi != ''){
                    return redirect('giao-vien/debai/'.$id.'/khoi/'.$request->khoi.'/dai/'.$request->dai);
                }
                else{
                    if($request->dai != ''){
                        return  redirect('giao-vien/debai/'.$id.'/dai/'.$request->dai);
                    }
                    else return  redirect('giao-vien/debai/'.$id.'/all');
                } 
            }
        }
    }
    public function ajaxlockhoi($khoi, $dai = null)
    {
        if($dai == null){
            $chuongs = chuong::all()->where('khoi', $khoi);
        }
        else{
            $chuongs = chuong::all()->where('khoi', $khoi)->where('dai_hinh', $dai);
        }
        return view('GiaoVien.loadchuong', ['chuongs'=>$chuongs]);
    }
    public function ajaxlocchuong($chuong)
    {
        $theloais = theloai::all()->where('chuong', $chuong);
        return view('GiaoVien.loadtheloai', ['theloais'=>$theloais]);
    }
    public function viewdebai($id)
    {
        $debai = debai::find($id);
        $idcauhoi = explode('-', $debai->de);
        $baitaps = array();
        foreach ($idcauhoi as $value) {
            $baitaps[] = baitap::find($value);
        }
        $collection = Collection::make($baitaps);
        $collection = $collection->sortBy('dokho');
        return view('GiaoVien.viewdebai', ['debai'=>$debai, 'baitaps'=>$collection]);
    }
}
