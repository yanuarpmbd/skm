@extends('voyager::master')

@section('css')
    <style>
        .row-all-border {
            content: "";
            display: block;
            border-style: solid;
            margin: 0 15px;
            border-radius: 10px;
        }
        .row-bordered:after {
            content: "";
            display: block;
            border-bottom: 1px solid #ccc;
            margin: 0 15px;
        }
        .row-double-bordered:after {
            content: "";
            display: block;
            border-bottom: 1px solid #ccc;
            margin: 0 15px;
            border-style: double;
        }
        .text-very-large {
            font-size: 500px;
        }
    </style>
@stop

@section('page_title', 'Publikasi SKM')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-calendar"></i>Publikasi SKM
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row row-all-border">
                            <div class="col-md-12">
                                <h1 class="text-center row-double-bordered">
                                    INDEKS KEPUASAN MASYARAKAT (IKM)<br>
                                    DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU<br>
                                    PROVINSI JAWA TENGAH<br>
                                    BULAN ---- TAHUN ----
                                </h1>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <div class="row row-bordered">
                                            <div class="col-md-12">
                                                <h1>NILAI SKM</h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="text-very-large">76</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <div class="row row-bordered">
                                            <div class="col-md-12 border-bottom border-dark border-1">
                                                <h1>RESPONDEN</h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-left">
                                                <h1>Jumlah : </h1>
                                                <h1>Jenis Kelamin : L = 1/P = 2</h1>
                                                <h1>Pendidikan : </h1>
                                                <h1>SD = 1</h1>
                                                <h1>SMP = 1</h1>
                                                <h1>SMA = 1</h1>
                                                <h1>Diploma = 1</h1>
                                                <h1>Sarjana = 1</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-center">
                                    TERIMA KASIH ATAS PENILAIAN YANG TELAH ANDA BERIKAN<br>
                                    MASUKAN ANDA SANGAT BERMANFAAT UNTUK KEMAJUAN UNIT KAMI AGAR TERUS MEMPERBAIKI<br>
                                    DAN MENINGKATKAN KUALITAS PELAYANAN BAGI MASYARAKAT<br>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}

@stop

@section('javascript')
@stop
