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
                    <div class="col-md-12">
                            <h2 class="text-center">
                                INDEKS KEPUASAN MASYARAKAT (IKM)<br>
                                DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU<br>
                                PROVINSI JAWA TENGAH
                            </h2>
                        </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table table id="publikasi-table" class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th data-class="expand" rowspan="2">No</th>
                                        <th data-hide="tablet" rowspan="2">Bulan</th>
                                        <th data-hide="tablet, phone" rowspan="2">Jumlah Responden</th>
                                        <th data-hide="tablet, phone" rowspan="2">Jumlah Pertanyaan</th>
                                        <th data-hide="tablet, phone" rowspan="1" colspan="4"><div align="center">Jumlah Respon</div></th>
                                        <th data-hide="tablet, phone" rowspan="2">Nilai</th>
                                    </tr>
                                    <tr>
                                        <th>Kurang</th>
                                        <th>Cukup</th>
                                        <th>Baik</th>
                                        <th>Baik Sekali</th>
                                    </tr>
                                </tbody>
                            </table>
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
