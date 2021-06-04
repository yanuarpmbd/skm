<?php

namespace App\Http\Controllers;

use App\DataSkm;
use App\DataUser;
use App\Exports\RekapBulananExport;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;
use TCG\Voyager\Voyager;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\RekapBulananDataTable;
use Yajra\DataTables\CollectionDataTable;


class RekapController extends Controller{
    /*public function index() {
        $years = DataSkm::select(DB::raw('YEAR(created_at) tahun'))
            ->groupby('tahun')
            ->get();
        $user = DataUser::all();

        Return view('vendor.voyager.rekap-bulanans.browse', compact('years','user'));
    }*/

    public function rekapBulanan(Request $request){
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
        $no = 1;
        foreach ($bulan as $key => $value){
            $query = DB::select(DB::raw("SELECT count(*) AS jumlah, (count(*) * 9) AS jumlah_pertanyaan,
				(SUM(IF(p1=1,1,0)) + SUM(IF(p2=1,1,0)) + SUM(IF(p3=1,1,0)) + SUM(IF(p4=1,1,0)) + SUM(IF(p5=1,1,0)) + SUM(IF(p6=1,1,0)) + SUM(IF(p7=1,1,0)) + SUM(IF(p8=1,1,0)) + SUM(IF(p9=1,1,0)) ) AS tidak_baik,
			    (SUM(IF(p1=2,1,0)) + SUM(IF(p2=2,1,0)) + SUM(IF(p3=2,1,0)) + SUM(IF(p4=2,1,0)) + SUM(IF(p5=2,1,0)) + SUM(IF(p6=2,1,0)) + SUM(IF(p7=2,1,0)) + SUM(IF(p8=2,1,0)) + SUM(IF(p9=2,1,0)) ) AS kurang_baik,
			    (SUM(IF(p1=3,1,0)) + SUM(IF(p2=3,1,0)) + SUM(IF(p3=3,1,0)) + SUM(IF(p4=3,1,0)) + SUM(IF(p5=3,1,0)) + SUM(IF(p6=3,1,0)) + SUM(IF(p7=3,1,0)) + SUM(IF(p8=3,1,0)) + SUM(IF(p9=3,1,0)) ) AS baik,
			    (SUM(IF(p1=4,1,0)) + SUM(IF(p2=4,1,0)) + SUM(IF(p3=4,1,0)) + SUM(IF(p4=4,1,0)) + SUM(IF(p5=4,1,0)) + SUM(IF(p6=4,1,0)) + SUM(IF(p7=4,1,0)) + SUM(IF(p8=4,1,0)) + SUM(IF(p9=4,1,0)) ) AS sangat_baik,
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
			MONTH(created_at) = $key AND YEAR(created_at) = 2021"));
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
                    $obj->tidak_baik = $q->tidak_baik;
                    $obj->kurang_baik = $q->kurang_baik;
                    $obj->baik = $q->baik;
                    $obj->sangat_baik = $q->sangat_baik;
                    $obj->nilai = $nilai;
                    $data[] = $obj;
                }
            }
        }
        if ($request->ajax()) {
            return Datatables::of($data)
                ->make(true);
        }
        return view('vendor.voyager.rekap-bulanans.browse');
    }
}
