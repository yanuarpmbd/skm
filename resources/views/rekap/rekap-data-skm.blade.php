@extends('voyager::master')

@section('css')
@stop

@section('page_title', 'Rekap Data SKM')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-calendar"></i>Rekap Data SKM <p id="title"></p>
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    @include('voyager::alerts')
    <div class="row input-daterange">
        <div class="col-md-1">
        </div>
        <div class="col-md-4">
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
        </div>
        <div class="col-md-4">
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
        </div>
        <div class="col-md-3">
            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table table id="skm-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Pendidikan</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Status</th>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>P4</th>
                                <th>P5</th>
                                <th>P6</th>
                                <th>P7</th>
                                <th>P8</th>
                                <th>P9</th>
                                <th>Nilai</th>
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
        $(document).ready(function(){
        $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
        });
        load_data();
        function load_data(from_date = '', to_date = ''){
                $('#skm-table').DataTable({
                    dom: 'Bfrtip',
                    processing: true,
                    responsive: true,
                    buttons: [
                        'excel', 'csv', 'pdf', 'copy', 'print'
                    ],
                    ajax: {
                        url: "{{ route('rekap-data-skm.index') }}",
                        data: {from_date:from_date, to_date:to_date}
                    },
                    columns: [
                        { defaultContent: "",data: 'no', name: 'no', className: "text-center" },
                        { defaultContent: "",data: 'nama', name: 'nama' },
                        { defaultContent: "",data: 'alamat', name: 'alamat' },
                        { defaultContent: "",data: 'no_telp', name: 'no_telp', className: "text-center" },
                        { defaultContent: "",data: 'pendidikan', name: 'pendidikan', className: "text-center" },
                        { defaultContent: "",data: 'jenis_kelamin', name: 'jenis_kelamin', className: "text-center" },
                        { defaultContent: "",data: 'usia', name: 'usia', className: "text-center" },
                        { defaultContent: "",data: 'status', name: 'status' },
                        { defaultContent: "",data: 'p1', name: 'p1', className: "text-center" },
                        { defaultContent: "",data: 'p2', name: 'p2', className: "text-center" },
                        { defaultContent: "",data: 'p3', name: 'p3', className: "text-center" },
                        { defaultContent: "",data: 'p4', name: 'p4', className: "text-center" },
                        { defaultContent: "",data: 'p5', name: 'p5', className: "text-center" },
                        { defaultContent: "",data: 'p6', name: 'p6', className: "text-center" },
                        { defaultContent: "",data: 'p7', name: 'p7', className: "text-center" },
                        { defaultContent: "",data: 'p8', name: 'p8', className: "text-center" },
                        { defaultContent: "",data: 'p9', name: 'p9', className: "text-center" },
                        { defaultContent: "",data: 'hasil_skm', name: 'hasil_skm', className: "text-center" },
                    ]
                });
            }
            $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' &&  to_date != '')
                {
                    $('#skm-table').DataTable().destroy();
                    load_data(from_date, to_date);
                    document.getElementById("title").innerHTML = from_date + " - " + to_date;
                }
                else
                {
                    alert('Tanggal Harus Diisi');
                }
            });

            $('#refresh').click(function(){
                $('#from_date').val('');
                $('#to_date').val('');
                $('#skm-table').DataTable().destroy();
                load_data();
            });
        });
    </script>

@stop
