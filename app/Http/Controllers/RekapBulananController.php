<?php

namespace App\Http\Controllers;

use App\DataSkm;
use App\DataUser;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;
use TCG\Voyager\Voyager;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RekapBulananController extends Controller{
    /*public function index() {
        $years = DataSkm::select(DB::raw('YEAR(created_at) tahun'))
            ->groupby('tahun')
            ->get();
        $user = DataUser::all();

        Return view('vendor.voyager.rekap-bulanans.browse', compact('years','user'));
    }*/

    public function index(Request $request){
        /*$query = DataSkm::with('skm')->get();
        $jenis_izin = $query->groupBy('skm.jenis_izin');
        $data = [];
        $no = 1;
        foreach ($jenis_izin as $key => $value){
            foreach ($value as $val){
            }
            if ($key != null){
                $obj = new \stdClass();
                $obj->no = $no++;
                $obj->jenis_izin = $key;
                $obj->hasil_skm = $val->hasil_skm;
                $data[] = $obj;
            }
        }

        if ($request->ajax()) {
            return Datatables::of($data)
                ->make(true);
        }*/

        $query = DataSkm::with('skm')
            ->whereYear('created_at','=','2021')
            ->get()
            ->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('m');
        });
        $no = 1;
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');;
        foreach ($query as $q) {
        }
        foreach ($bulan as $d){
            $obj = new \stdClass();
            $obj->no = $no++;
            $obj->bulan = $d;
            $data[] = $obj;
            dump($obj);
        }
        die();
        //dd($obj);
        if ($request->ajax()) {
            return Datatables::of($data)
                ->make(true);
        }
        return view('vendor.voyager.rekap-bulanans.browse');
    }
}
