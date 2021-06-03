@extends('voyager::master')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"/>
@stop

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
                        <div class="table-responsive">
                            <table table id="skm-table" class="table table-hover">
                                {{--<thead>
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
                                </thead>--}}
                                <thead>
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
                                </thead>
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#skm-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('rekapbulanan.data') !!}',
                columns: [
                    { defaultContent: "",data: 'no', name: 'no' },
                    { defaultContent: "",data: 'bulan', name: 'bulan' },
                    { defaultContent: "",data: 'jml_res', name: 'jml_res' },
                ]
            });
        });
    </script>
@stop
