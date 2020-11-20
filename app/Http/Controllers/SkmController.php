<?php

namespace App\Http\Controllers;

use App\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Warning;

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
        return view('form-skm');
    }
    public function storeDataSKM(){
        $id = Session::get('key');
        $
        dd($id);
    }
}
