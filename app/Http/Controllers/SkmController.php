<?php

namespace App\Http\Controllers;

use App\DataSkm;
use App\DataUser;
use App\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Warning;
use PhpParser\Node\Stmt\Return_;

class SkmController extends Controller
{
    public function getData(Request $request){
        $nomor_tiket = $request->input('nomor_tiket');
        $user = 'skmptsp';
        $key = md5('5kMp7$p#'.date('dmY'));
        $id = base64_encode($nomor_tiket);
        $url = "http://beta-perizinan.dpmptsp.jatengprov.go.id/skm/getdetaildata?user=$user&key=$key&id=$id";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        $datas = json_decode($result,true);
        if (is_array($datas) || is_object($datas)){
            foreach ($datas as $data){
            }
        }
        $request_id = ($data['ticket']);
        $nama = ($data['namalengkap']);
        $nama_perusahaan = ($data['fullname_perusahaan']);
        $sektor = ($data['parent_name']);
        $jenis_izin = ($data['name']);

        if ($request_id != null){
            return view('data-skm', compact('request_id', 'nama', 'nama_perusahaan', 'sektor', 'jenis_izin'));
        }
        else{
            return Redirect::back()->with('bad', 'Data Tidak Ditemukan');
        }
    }
    public function storeDataUser(Request $request)
    {
        $request_id = $request->input('request_id');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $sektor = $request->input('sektor');
        $jenis_izin = $request->input('jenis_izin');
        $status = $request->input('status');

        $store = new DataUser();
        $store->request_id = $request_id;
        $store->nama = $nama;
        $store->alamat = $alamat;
        $store->no_telp = $no_telp;
        $store->sektor = $sektor;
        $store->jenis_izin = $jenis_izin;
        $store->status = $status;
        $store->status = $status;
        //dd($store);
        $store->save();
        Session::put('key', $store->id);
        return redirect()->route('get-pertanyaan');
    }
    public function getPertanyaan(){
        $pertanyaans = Pertanyaan::all();
        //dd($pertanyaans);
        Return view('form-skm', compact('pertanyaans'));
    }
    public function storeDataSKM(Request $request){
        $data = $request->slider;
        $id = Session::get('key');
        $result = round(array_sum($data) / count($data), 2);

        $store = new DataSkm();
        $store->user_id = $id;
        $store->nilai_pertanyaan = json_encode($data);
        $store->hasil_skm = $result;
        //dd($store);
        $store->save();

        Session::put('hasil', $result);
        Return redirect()->route('result-skm');
    }
    public function getResultSKM(){
        $res = Session::get('hasil');

        Return view('result-skm', compact('res'));
    }
    public function getTotalSKM(){
        $skms_this_month = DataSkm::whereYear('created_at', '=', Carbon::now('m'))->whereMonth('created_at', '=', Carbon::now('m'))->get();
        $skms_previous_month = DataSkm::whereYear('created_at', '=', Carbon::now()->subMonth()->format('Y'))->whereMonth('created_at', '=', Carbon::now()->subMonth()->format('m'))->get();
        if ($skms_this_month->isEmpty()){
            $total_this_month = '00.00';
        }
        else{
            $total_skm_this_month = 0;
            foreach ($skms_this_month as $key=>$skm_this_month){
                $total_skm_this_month += $skm_this_month->hasil_skm;
            }
            $total_this_month = round($total_skm_this_month / count($skms_this_month), 2);
        }
        if($skms_previous_month->isEmpty()){
            $total_previous_month = '00.00';
        }
        else{
            $total_previous_month = 0;
            foreach ($skms_previous_month as $key=>$skm_previous_month){
                $total_skm_previous_month += $skms_previous_month;
            }
            $total_previous_month = round($total_skm_previous_month / count($skms_previous_month), 2);
        }
        return view('total-skm', compact('total_this_month', 'total_previous_month'));
    }
}
