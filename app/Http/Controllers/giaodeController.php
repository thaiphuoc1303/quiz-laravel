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

class giaodeController extends Controller
{
    public function show($lop)
    {
        $dagiao = DB::table('nhande')
            ->join('debai', 'nhande.debai', '=', 'debai.id')
            ->orderBy('id', 'desc')
            ->select('nhande.*', 'debai.ten')
            ->where('lop', $lop)->get();
        $l = lop::find($lop);
        $debais = debai::all()->where('khoi', $l->khoi);
        return view('GiaoVien.baidagiao', ['dagiao'=>$dagiao, 'lop'=>$l, 'debais'=>$debais]);
    }
    public function create(Request $request, $lop)
    {
        $date = Carbon::parse($request->deadline);
        nhande::insert([
            'lop'=>$lop,
            'debai'=>$request->debai,
            'ngaygiao'=> Carbon::now(),
            'hannop'=> Carbon::parse($request->deadline),
            'giaodapan'=>Carbon::parse($request->pointcheck)
        ]);
        return redirect()->back();
    }
}
