<?php

namespace App\Http\Controllers;

use App\DataSkm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphSKMController extends Controller
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
        foreach ($bulan as $key => $value){
            $query = DB::select(DB::raw("SELECT count(*) AS jumlah, (count(*) * 9) AS jumlah_pertanyaan,
                        (IFNULL(SUM(p1),0) +
                        IFNULL(SUM(p2),0) +
                        IFNULL(SUM(p3),0) +
                        IFNULL(SUM(p4),0) +
                        IFNULL(SUM(p5),0) +
                        IFNULL(SUM(p6),0) +
                        IFNULL(SUM(p7),0) +
                        IFNULL(SUM(p8),0) +
                        IFNULL(SUM(p9),0) ) AS nilai
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
                    $obj->nilai = $nilai;
                    $data[] = $obj;
                }
            }
        }
        foreach($data as $row) {
            $data['label'][] = $row->bulan;
            $data['data'][] = $row->nilai;
            $data['jumlah'][] = $row->jumlah;
        }

        $data['chart'] = json_encode($data);

        return view('rekap.graph', $data, compact('now'));
    }
}
