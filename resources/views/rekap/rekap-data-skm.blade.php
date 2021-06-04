@extends('voyager::master')

@section('css')
@stop

@section('page_title', 'Rekap Data SKM')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-calendar"></i>Rekap Data SKM
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h5>Dari Tanggal</h5>
                <input type="text" id="min" name="min" class="form-control">
            </div>
            <div class="form-group">
                <h5>Sampai Tanggal</h5>
                <input type="text" id="max" name="max" class="form-control">
            </div>
            <div class="form-group">
                <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
                <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table table id="skm-table" class="table table-hover">
                            <thead>
                            <tr>
                                <th data-class="expand">No</th>
                                <th data-hide="tablet">Nama</th>
                                <th data-hide="tablet, phone">Alamat</th>
                                <th data-hide="tablet, phone">No Telp</th>
                                <th data-hide="tablet, phone">Pendidikan</th>
                                <th data-hide="tablet, phone">Jenis Kelamin</th>
                                <th data-hide="tablet, phone">Usia</th>
                                <th data-hide="tablet, phone">Status</th>
                                <th data-hide="tablet, phone">P1</th>
                                <th data-hide="tablet, phone">P2</th>
                                <th data-hide="tablet, phone">P3</th>
                                <th data-hide="tablet, phone">P4</th>
                                <th data-hide="tablet, phone">P5</th>
                                <th data-hide="tablet, phone">P6</th>
                                <th data-hide="tablet, phone">P7</th>
                                <th data-hide="tablet, phone">P8</th>
                                <th data-hide="tablet, phone">P9</th>
                                <th data-hide="tablet, phone">Nilai</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        $(function() {
            fill_datatable();
            function fill_datatable(tahun = ''){
                var dataTable = $('#skm-table').DataTable({
                    dom: 'Bfrtip',
                    processing: true,
                    responsive: true,
                    buttons: [
                        'excel', 'csv', 'pdf', 'copy', 'print'
                    ],
                    ajax: {
                        url: "{{ route('rekap-data-skm.index') }}",
                        data: {tahun:tahun}
                    },
                    columns: [
                        { defaultContent: "",data: 'no', name: 'no' },
                        { defaultContent: "",data: 'nama', name: 'nama' },
                        { defaultContent: "",data: 'alamat', name: 'alamat' },
                        { defaultContent: "",data: 'no_telp', name: 'no_telp' },
                        { defaultContent: "",data: 'pendidikan', name: 'pendidikan' },
                        { defaultContent: "",data: 'jenis_kelamin', name: 'jenis_kelamin' },
                        { defaultContent: "",data: 'usia', name: 'usia' },
                        { defaultContent: "",data: 'status', name: 'status' },
                        { defaultContent: "",data: 'p1', name: 'p1' },
                        { defaultContent: "",data: 'p2', name: 'p2' },
                        { defaultContent: "",data: 'p3', name: 'p3' },
                        { defaultContent: "",data: 'p4', name: 'p4' },
                        { defaultContent: "",data: 'p5', name: 'p5' },
                        { defaultContent: "",data: 'p6', name: 'p6' },
                        { defaultContent: "",data: 'p7', name: 'p7' },
                        { defaultContent: "",data: 'p8', name: 'p8' },
                        { defaultContent: "",data: 'p9', name: 'p9' },
                        { defaultContent: "",data: 'hasil_skm', name: 'hasil_skm' },
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
    <script type="text/javascript">
        $(function() {

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>
@stop
