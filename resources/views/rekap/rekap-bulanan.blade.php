@extends('voyager::master')

@section('css')
@stop

@section('page_title', 'Rekap Bulanan')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-calendar"></i>Rekap Bulanan
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <select name="tahun" id="tahun" class="form-control">
                        <option disabled selected value>Pilih Tahun . .</option>
                        @foreach($tahun as $t)
                        <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" align="center">
                    <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
                    <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
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
            fill_datatable();
            function fill_datatable(tahun = ''){
                var dataTable = $('#skm-table').DataTable({
                    dom: 'Bfrtip',
                    processing: true,
                    serverSide: true,
                    paging: false,
                    responsive: true,
                    buttons: [
                        'excel', 'csv', 'pdf', 'copy', 'print'
                    ],
                    ajax: {
                        url: "{{ route('rekap-bulanan.index') }}",
                        data: {tahun:tahun}
                    },
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
            }
            $('#filter').click(function(){
                var tahun = $('#tahun').val();

                if(tahun != '') {
                    $('#skm-table').DataTable().destroy();
                    fill_datatable(tahun, tahun);
                }
                else {
                }
            });
            $('#reset').click(function(){
                $('#tahun').val('');
                $('#skm-table').DataTable().destroy();
                fill_datatable();
            });
        });
    </script>
@stop
