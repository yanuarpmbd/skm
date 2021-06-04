@extends('voyager::master')

@section('css')
@stop

@section('page_title', 'Rekap Bulanan')

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
    <script>
        $(function() {
            $('#skm-table').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                paging: false,
                responsive: true,
                buttons: [
                    'excel', 'csv', 'pdf', 'copy', 'print'
                ],
                ajax: '{!! route('rekapbulanan.data') !!}',
                columns: [
                    { defaultContent: "",data: 'no', name: 'no' },
                    { defaultContent: "",data: 'bulan', name: 'bulan' },
                    { defaultContent: "",data: 'jumlah', name: 'jumlah' },
                    { defaultContent: "",data: 'jumlah_pertanyaan', name: 'jumlah_pertanyan' },
                    { defaultContent: "",data: 'tidak_baik', name: 'tidak_baik' },
                    { defaultContent: "",data: 'kurang_baik', name: 'kurang_baik' },
                    { defaultContent: "",data: 'baik', name: 'baik' },
                    { defaultContent: "",data: 'sangat_baik', name: 'sangat_baik' },
                    { defaultContent: "",data: 'nilai', name: 'nilai' },
                ]
            });
        });
    </script>
@stop
