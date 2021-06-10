<?php

namespace App\Http\Controllers;

use App\DataSkm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RekapPerUnsurController extends Controller
{
    public function index(Request $request){
        $tahun = DataSkm::select(DB::raw('YEAR(created_at) tahun'))
            ->groupby('tahun')
            ->get();
        $bulan = array(
            '1'=>'Januari',
            '2'=>'Februari',
            '3'=>'Maret',
            '4'=>'April',
            '5'=>'Mei',
            '6'=>'Juni',
            '7'=>'Juli',
            '8'=>'Agustus',
            '9'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember',
        );
        $year = $request->tahun;
        $no = 1;
        $now = Carbon::now()->year;
        if ($request->ajax()){
            if(!empty($request->tahun)){
                foreach ($bulan as $key => $value){
                    $query = DB::select(DB::raw("SELECT
                        count(*) AS jumlah,
                        (count(*) * 9) AS jumlah_pertanyaan,
                        SUM(p1) AS p1,
                        SUM(p2) AS p2,
                        SUM(p3) AS p3,
                        SUM(p4) AS p4,
                        SUM(p5) AS p5,
                        SUM(p6) AS p6,
                        SUM(p7) AS p7,
                        SUM(p8) AS p8,
                        SUM(p9) AS p9,
                        (IFNULL(SUM(p1),0) + IFNULL(SUM(p2),0) + IFNULL(SUM(p3),0) + IFNULL(SUM(p4),0) + IFNULL(SUM(p5),0) + IFNULL(SUM(p6),0) + IFNULL(SUM(p7),0) + IFNULL(SUM(p8),0) + IFNULL(SUM(p9),0)) AS nilai
                    FROM
                        data_skms
                    WHERE
                        MONTH(created_at) = $key AND YEAR(created_at) = $request->tahun"));
                    foreach ($query as $q){
                        if ($q->jumlah_pertanyaan != 0) {
                            $nilai = round((($q->nilai / $q->jumlah_pertanyaan) * 25), 2);
                        }
                        else {
                            $nilai = 0;
                        }
                        if ($key != null){
                            $obj = new \stdClass();
                            $obj->no = $no++;
                            $obj->bulan = $value;
                            $obj->jumlah = $q->jumlah;
                            $obj->jumlah_pertanyaan = $q->jumlah_pertanyaan;
                            $obj->p1 = $q->p1;
                            $obj->p2 = $q->p2;
                            $obj->p3 = $q->p3;
                            $obj->p4 = $q->p4;
                            $obj->p5 = $q->p5;
                            $obj->p6 = $q->p6;
                            $obj->p7 = $q->p7;
                            $obj->p8 = $q->p8;
                            $obj->p9 = $q->p9;
                            $obj->jml_nilai = $q->nilai;
                            $obj->nilai = $nilai;
                            $data[] = $obj;
                        }
                    }
                }
            }
            else{
                foreach ($bulan as $key => $value){
                    $query = DB::select(DB::raw("SELECT
                        count(*) AS jumlah,
                        (count(*) * 9) AS jumlah_pertanyaan,
                        SUM(p1) AS p1,
                        SUM(p2) AS p2,
                        SUM(p3) AS p3,
                        SUM(p4) AS p4,
                        SUM(p5) AS p5,
                        SUM(p6) AS p6,
                        SUM(p7) AS p7,
                        SUM(p8) AS p8,
                        SUM(p9) AS p9,
                        (IFNULL(SUM(p1),0) + IFNULL(SUM(p2),0) + IFNULL(SUM(p3),0) + IFNULL(SUM(p4),0) + IFNULL(SUM(p5),0) + IFNULL(SUM(p6),0) + IFNULL(SUM(p7),0) + IFNULL(SUM(p8),0) + IFNULL(SUM(p9),0)) AS nilai
                    FROM
                        data_skms
                    WHERE
                        MONTH(created_at) = $key AND YEAR(created_at) = $now"));
                    foreach ($query as $q){if ($q->jumlah_pertanyaan != 0) {
                        $nilai = round((($q->nilai / $q->jumlah_pertanyaan) * 25), 2);
                    }
                    else {
                        $nilai = 0;
                    }
                        if ($key != null){
                            $obj = new \stdClass();
                            $obj->no = $no++;
                            $obj->bulan = $value;
                            $obj->jumlah = $q->jumlah;
                            $obj->jumlah_pertanyaan = $q->jumlah_pertanyaan;
                            $obj->p1 = $q->p1;
                            $obj->p2 = $q->p2;
                            $obj->p3 = $q->p3;
                            $obj->p4 = $q->p4;
                            $obj->p5 = $q->p5;
                            $obj->p6 = $q->p6;
                            $obj->p7 = $q->p7;
                            $obj->p8 = $q->p8;
                            $obj->p9 = $q->p9;
                            $obj->jml_nilai = $q->nilai;
                            $obj->nilai = $nilai;
                            $data[] = $obj;
                        }
                    }
                }
            }
            return Datatables::of($data)
                ->make(true);
        }
        return view('rekap.rekap-perunsur', compact('tahun', 'year'));
    }
}
