<?php

namespace App\Http\Controllers;

use App\DataSkm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublikasiController extends Controller
{
    public function index(){
        $bulan = Carbon::now();
        $nama_bulan = $bulan->format('F');
        $tahun = Carbon::now()->year;
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
                        MONTH(created_at) = '6' AND YEAR(created_at) = $tahun"));
        foreach ($query as $q){
            if ($q->jumlah_pertanyaan != 0) {
                $nilai = round((($q->nilai / $q->jumlah_pertanyaan) * 25), 1);
            }
            else {
                $nilai = 0;
            }
                $obj = new \stdClass();
                $obj->jumlah = $q->jumlah;
                $obj->jumlah_pertanyaan = $q->jumlah_pertanyaan;
                $obj->nilai = $nilai;
                $data[] = $obj;
        }
        //dd($data);

        return view('rekap.publikasi', compact('data', 'tahun', 'nama_bulan'));
    }
}
