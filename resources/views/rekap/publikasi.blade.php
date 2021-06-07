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
            <div class="col-md-6">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="publikasi-table" class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td><h3>NILAI IKM</h3></td>
                                    </tr>
                                    <tr style="height: 300px;">
                                        <td><h1>100</h1></td>
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
