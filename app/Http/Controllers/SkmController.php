<?php

namespace App\Http\Controllers;

use App\DataSkm;
use App\DataUser;
use App\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SkmController extends Controller
{
    public function getData(Request $request){
        $nomor_tiket = $request->input('nomor_tiket');
        $user = 'skmpt5p';
        $key = md5('5kMp7$p#'.date('dmY'));
        $id = base64_encode($nomor_tiket);
        $url = "https://perizinan.jatengprov.go.id/skm/getdetaildata?user=$user&key=$key&id=$id";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        $datas = json_decode($result,true);
        $data_users = DataUser::all();
        foreach ($data_users as $data_user){
        }
        if (is_array($datas) || is_object($datas)){
            foreach ($datas as $data){
            }
        }
        $request_id = ($data['ticket']);
        $nama = ($data['namalengkap']);
        $nama_perusahaan = ($data['fullname_perusahaan']);
        $sektor = ($data['parent_name']);
        $jenis_izin = ($data['name']);

        if ($request_id == null){
            return Redirect::back()->with('bad', 'Data Tidak Ditemukan');
        }
        elseif ($request_id == $data_user->request_id){
            return Redirect::back()->with('bad', 'Maaf, Anda Sudah Pernah Mengisi Survey Kepuasan Masyarakat, Terimakasih');
        }
        else{
            return view('data-skm', compact('request_id', 'nama', 'nama_perusahaan', 'sektor', 'jenis_izin'));
        }
    }
    public function storeDataUser(Request $request)
    {
        $data_users = DataUser::all();
        foreach ($data_users as $data_user){
        }

        $request_id = $request->input('request_id');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $pendidikan = $request->input('pendidikan');
        $usia = $request->input('usia');
        $sektor = $request->input('sektor');
        $jenis_izin = $request->input('jenis_izin');
        $status = $request->input('status');

        if($nama == $data_user->nama){
            return Redirect::route('home')->with('bad', 'Maaf, Anda Sudah Pernah Mengisi Survey Kepuasan Masyarakat, Terimakasih');
        }
        $store = new DataUser();
        $store->request_id = $request_id;
        $store->nama = $nama;
        $store->alamat = $alamat;
        $store->no_telp = $no_telp;
        $store->jenis_kelamin = $jenis_kelamin;
        $store->pendidikan = $pendidikan;
        $store->usia = $usia;
        $store->sektor = $sektor;
        $store->jenis_izin = $jenis_izin;
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
        foreach ($request->except('_token') as $key => $datas){
            if ($datas == "Tidak Baik"){
                $data[$key] = 1;
            }
            elseif ($datas == "Kurang Baik"){
                $data[$key] = 2;
            }
            elseif ($datas == "Baik"){
                $data[$key] = 3;
            }
            else {
                $data[$key] = 4;
            }
        }
        $id = Session::get('key');
        $result = round(array_sum($data) / count($data) * 25 , 2);
        $store = new DataSkm();
        $store->user_id = $id;
        $store->p1 = $data['p1'];
        $store->p2 = $data['p2'];
        $store->p3 = $data['p3'];
        $store->p4 = $data['p4'];
        $store->p5 = $data['p5'];
        $store->p6 = $data['p6'];
        $store->p7 = $data['p7'];
        $store->p8 = $data['p8'];
        $store->p9 = $data['p9'];
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
        $skms_this_month = DataSkm::whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at', '=', Carbon::now()->month)->get();
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
            $total_skm_previous_month = 0;
            foreach ($skms_previous_month as $key=>$skm_previous_month){
                $total_skm_previous_month += $skm_previous_month->hasil_skm;
            }
            $total_previous_month = round($total_skm_previous_month / count($skms_previous_month), 2);
        }
        return view('total-skm', compact('total_this_month', 'total_previous_month'));
    }
}
