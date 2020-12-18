<?php

namespace App\Http\Controllers;

use App\DataPemohon;
use Illuminate\Http\Request;

class DataPemohonController extends Controller
{
    public function showForm(){
        return view('data-skm');
    }
    public function addDataPemohon(Request $request){
        $no_tiket=$request->input('no_tiket');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $bidang_izin = $request->input('bidang_izin');
        $nama_izin = $request->input('nama_izin');
        $lok_usaha = $request->input('lok_usaha');
        $status = $request->input('status');

        $pemohon = new DataPemohon();
        $pemohon->no_tiket = $no_tiket;
        $pemohon->nama = $nama;
        $pemohon->alamat = $alamat;
        $pemohon->no_telp = $no_telp;
        $pemohon->bidang_izin = $bidang_izin;
        $pemohon->nama_izin = $nama_izin;
        $pemohon->lok_usaha = $lok_usaha;
        $pemohon->status = $status;
        $pemohon->save();

        //$request->session()->put('notik', $no_tiket);
        //dd($pemohon);
        return redirect()->route('show.form-skm', $pemohon->id);
    }
}
