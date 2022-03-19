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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class hocsinhController extends Controller
{
    public function show()
    {   
        $hocsinh = Auth::user();
        $lop = lop::find($hocsinh->lop);

        return view('HocSinh.profile', ['hocsinh'=> $hocsinh, 'lop'=>$lop]);
    }
    public function listbaitap()
    {
        $user = Auth::user();
        $lop = $user->lop;
        // con han
        $conhan = nhande::join('debai', 'debai.id', '=', 'nhande.debai')
        ->select('nhande.hannop', 'nhande.giaodapan', 'nhande.ngaygiao','debai.ten', 'debai.thoigian', 'nhande.id')
        ->where('nhande.lop', $lop)
        ->where('nhande.hannop', '>', Carbon::now())
        ->get();
        // het han
        $hethan = nhande::join('debai', 'debai.id', '=', 'nhande.debai')
        ->select('nhande.hannop', 'nhande.giaodapan','debai.ten', 'nhande.ngaygiao', 'debai.thoigian', 'nhande.id')
        ->where('nhande.lop', $lop)
        ->where('nhande.hannop', '<', Carbon::now())
        ->get();
        return view('HocSinh.danhsachbaitap', ['conhan'=>$conhan, 'hethan'=>$hethan, 'hocsinh'=> Auth::user()]);
    }
    public function lambai($id)
    {
        $user =  Auth::user();
        $nhande = nhande::find($id);
        if($nhande->lop != $user->lop){
            return view('khongcoquyentruycap');
        }
        
        $deadline = Carbon::parse($nhande->hannop);
        if($deadline->isPast()){
            $debai = debai::find($nhande->debai);
            $idcauhoi = explode('-', $debai->de);
            $baitaps = array();
            foreach ($idcauhoi as $value) {
                $baitaps[] = baitap::find($value);
            }
            if(bailam::where('de', $id)->where('id_hs', $user->id)->doesntExist()){
                return view('HocSinh.xemlai', ['baitaps'=>$baitaps, 'id'=> $id,'hocsinh'=> $user, 'debai'=>$debai]);
            }
            else{
                $bailam = bailam::where('de', $id)->where('id_hs', $user->id)->first();
                $checkeds = explode('-', $bailam->dapan);
                return view('HocSinh.xemlai', ['baitaps'=>$baitaps, 'checked'=>$checkeds,
                'id'=> $id,'hocsinh'=> $user, 'debai'=>$debai, 'bailam'=> $bailam]);
            }
        }
        else{
            $debai = debai::find($nhande->debai);
            $idcauhoi = explode('-', $debai->de);
            $baitaps = array();
            foreach ($idcauhoi as $value) {
                $baitaps[] = baitap::find($value);
            }
            $bailam = bailam::firstOrNew(
                [
                    'de'=> $id,
                    'id_hs' => $user->id
                ],
                [
                    'de'=> $id,
                    'id_hs' => $user->id,
                    'thoigianlam'=> Carbon::now()
                ]
            );
            $remaining = $debai->thoigian - Carbon::now()->diffInMinutes($bailam->thoigianlam);
            $checkeds = explode('-', $bailam->dapan);
            if($remaining<0 && $debai->thoigian > 0){
                return view('HocSinh.xemlai', ['baitaps'=>$baitaps, 
                'checked'=>$checkeds,'id'=> $id,'hocsinh'=> $user, 'debai'=>$debai, 'bailam'=> $bailam]);
            }
            $bailam->luotlam = $bailam->luotlam +1;
            $bailam->save();
            return view('HocSinh.lambai', ['baitaps'=>$baitaps, 'remaining'=> $remaining,
             'checked'=>$checkeds,'id'=> $id,'hocsinh'=> $user, 'debai'=>$debai]);
        }
        
    }
    public function changecheck(Request $request, $id)
    {
        $user = Auth::user()->id;
        $bailam = bailam::where('id_hs', $user)->where('de', $id)->first();
        $bailam->lastcheck = Carbon::now();
        $bailam->dapan = $request->dapan;
        $bailam->save();
        return '';
    }
    public function submitbaitap(Request $request)
    {
        $user = Auth::user();
        $bailam = bailam::where('id_hs', $user->id)->where('de', $request->id)->first();
        $checkeds = explode('-', $bailam->dapan);
        $nhande = nhande::find($request->id);
        $debai = debai::find($nhande->debai);
        $idcauhoi = explode('-', $debai->de);
        $baitaps = array();
        foreach ($idcauhoi as $value) {
            $baitaps[] = baitap::find($value);
        }
        $point = 0;
        $i = 0;
        foreach ($baitaps as $baitap) {
            if($baitap->Da == $checkeds[$i]){
                $point++;
            }
            $i++;
        }
        $bailam->diem = $point;
        $bailam->thoigiannop = Carbon::now();
        $bailam->save();
        return redirect('hoc-sinh/baitap');
    }
}
