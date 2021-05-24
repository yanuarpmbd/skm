@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' "Rekap Bulanans"')

{{--@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        </h1>
        @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan
        @can('delete', app($dataType->model_name))
            @include('voyager::partials.bulk-delete')
        @endcan
        @can('edit', app($dataType->model_name))
            @if(isset($dataType->order_column) && isset($dataType->order_display_column))
                <a href="{{ route('voyager.'.$dataType->slug.'.order') }}" class="btn btn-primary btn-add-new">
                    <i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>
                </a>
            @endif
        @endcan
        @can('delete', app($dataType->model_name))
            @if($usesSoftDeletes)
                <input type="checkbox" @if ($showSoftDeleted) checked @endif id="show_soft_deletes" data-toggle="toggle" data-on="{{ __('voyager::bread.soft_deletes_off') }}" data-off="{{ __('voyager::bread.soft_deletes_on') }}">
            @endif
        @endcan
        @foreach($actions as $action)
            @if (method_exists($action, 'massAction'))
                @include('voyager::bread.partials.actions', ['action' => $action, 'data' => null])
            @endif
        @endforeach
        @include('voyager::multilingual.language-selector')
    </div>
@stop--}}

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form name="formtahun" id="formtahun">
                            <select name=tahun id="tahun">

                            </select>
                        </form>
                        <table table id="dataTable" class="table table-hover">
                            <thead>
                            <tr>
                                <th rowspan="2" data-class="expand"><div align="center">No</div></th>
                                <th rowspan="2" data-hide="phone"><div align="center">Jenis Izin </div></th>
                                <th height="21" colspan="14"><div align="center">Bulan</div></th>
                            </tr>
                            <tr>
                                <th><div align="center">Jan</div></th>
                                <th data-hide="phone,tablet"><div align="center">Feb</div></th>
                                <th data-hide="phone,tablet"><div align="center">Mar</div></th>
                                <th data-hide="phone,tablet"><div align="center">Apr</div></th>
                                <th data-hide="phone,tablet"><div align="center">Mei</div></th>
                                <th data-hide="phone,tablet"><div align="center">Jun</div></th>
                                <th data-hide="phone,tablet"><div align="center">Jul</div></th>
                                <th data-hide="phone,tablet"><div align="center">Ags</div></th>
                                <th data-hide="phone,tablet"><div align="center">Sep</div></th>
                                <th data-hide="phone,tablet"><div align="center">Okt</div></th>
                                <th data-hide="phone,tablet"><div align="center">Nov</div></th>
                                <th data-hide="phone,tablet"><div align="center">Des</div></th>
                                <th data-hide="phone,tablet"><div align="center">Rata-Rata</div></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <canvas id="canvas"></canvas>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Responden</th>
                                    <th>Nilai</th>
                                </tr>
                                </thead>
                                <tbody>

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

@section('css')
@stop

@section('javascript')
@stop
