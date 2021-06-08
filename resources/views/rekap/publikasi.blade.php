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
                        <div class="col-sm-12">
                            <h2 class="text-center">
                                INDEKS KEPUASAN MASYARAKAT (IKM)<br>
                                DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU<br>
                                PROVINSI JAWA TENGAH
                            </h2>
                        </div>
                        <div class="col-sm-6">
                            <h1 class="text-center">NILAI IKM</h1>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-center">Layanan Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Jawa Tengah</h4>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="text-center" style="font-size: 200px">100</h1>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="text-center" style="font-size: 200px">130</h1>
                        </div>

                    </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}

@stop

@section('javascript')

@stop
