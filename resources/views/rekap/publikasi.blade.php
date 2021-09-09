@extends('voyager::master')

@section('css')
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
                        <div class="row">
                            <div class="col-md-12 border-dark">
                                <h1 class="text-center">
                                    INDEKS KEPUASAN MASYARAKAT (IKM)<br>
                                    DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU<br>
                                    PROVINSI JAWA TENGAH<br>
                                </h1>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <div class="row">
                                            <div class="col-md-12 border-bottom border-dark border-1">
                                                <h1>NILAI SKM</h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1>76</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="text-center">NILAI SKM</h1>
                                        <h1 class="text-center">76</h1>
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
