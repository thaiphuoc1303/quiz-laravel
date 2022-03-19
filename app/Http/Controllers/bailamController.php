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
use Carbon\Carbon;

class bailamController extends Controller
{
    public function show($id, $lop)
    {
        $bailams = DB::table('bailam')
        ->join('hocsinh', 'bailam.id_hs', '=', 'hocsinh.id')
        ->select('bailam.*', 'hocsinh.ten')
        ->where('bailam.de', $id)
        ->where('hocsinh.lop', $lop)
        ->get();
    
        return view('GiaoVien.listbailam', ['bailams'=>$bailams]);
    }
    public function details($id)
    {
        $bailam = bailam::find($id);
        $hocsinh = hocsinh::find($bailam->id_hs);
        $checked = explode('-', $bailam->dapan);
        $nhande = nhande::join('debai', 'nhande.debai', '=', 'debai.id')
        ->select('nhande.ngaygiao', 'nhande.hannop', 'debai.ten', 'debai.thoigian', 'debai.de')
        ->find($bailam->de);
        $idbaitap = explode('-', $nhande->de);
        $baitaps = array();
        foreach ($idbaitap as $value) {
            $baitaps[] = baitap::find($value);
        }
        return view('GiaoVien.chitietbailam', ['hocsinh'=> $hocsinh, 'checked'=> $checked, 
        'bailam'=>$bailam, 'debai'=>$nhande, 'baitaps'=>$baitaps]);
    }
}
