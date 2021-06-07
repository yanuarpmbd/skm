<?php

namespace App\Http\Controllers;

use App\DataSkm;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RekapDataSKMController extends Controller{
    public function index(Request $request){
        $no = 1;
        if ($request->ajax()) {
            if(!empty($request->from_date)){
                $query = DataSkm::latest()->whereBetween('created_at', array(date($request->from_date), date($request->to_date)))->get();
            }
            else{
                $query = DataSkm::latest()->get();
            }
            foreach ($query as $key => $value) {
                $obj = new \stdClass();
                $obj->no = $no++;
                $obj->nama = $value->skm->nama;
                $obj->alamat = $value->skm->alamat;
                $obj->no_telp = $value->skm->no_telp;
                $obj->pendidikan = $value->skm->pendidikan;
                $obj->jenis_kelamin = $value->skm->jenis_kelamin;
                $obj->usia = $value->skm->usia;
                $obj->status = $value->skm->status;
                $obj->p1 = $value->p1;
                $obj->p2 = $value->p2;
                $obj->p3 = $value->p3;
                $obj->p4 = $value->p4;
                $obj->p5 = $value->p5;
                $obj->p6 = $value->p6;
                $obj->p7 = $value->p7;
                $obj->p8 = $value->p8;
                $obj->p9 = $value->p9;
                $obj->hasil_skm = $value->hasil_skm;
                $data[] = $obj;
            }
            return Datatables::of($data)
                ->make(true);
        }
        return view('rekap.rekap-data-skm');
    }
}
