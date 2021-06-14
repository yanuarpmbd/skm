@extends('voyager::master')

@section('css')
@stop

@section('page_title', 'Rekap Per Unsur')

@section('page_header')
    <div class="container-fluid" >
        <h1 class="page-title">
            <i class="voyager-calendar"></i>Rekap Per Unsur<p id="title"></p>
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
                            <table table id="skm-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Bulan</th>
                                        <th rowspan="2">Jumlah Responden</th>
                                        <th rowspan="2">Jumlah Pertanyaan</th>
                                        <th rowspan="1" colspan="9"><div align="center">Nilai Unsur Pelayanan</div></th>
                                        <th rowspan="2">Jumlah Nilai</th>
                                        <th rowspan="2">Nilai</th>
                                    </tr>
                                    <tr>
                                        <th>p1</th>
                                        <th>p2</th>
                                        <th>p3</th>
                                        <th>p4</th>
                                        <th>p5</th>
                                        <th>p6</th>
                                        <th>p7</th>
                                        <th>p8</th>
                                        <th>p9</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td>OK</td>
                                    </tr>
                                </tfoot>
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
                    "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api(), data;
                        var intVal = function (i) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
                        pageTotal = api
                            .column( 5, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        // Update footer
                        $( api.column( 5 ).footer() ).html(
                            '$'+pageTotal
                        );
                    },
                    dom: 'Bfrtip',
                    processing: true,
                    serverSide: true,
                    paging: false,
                    responsive: true,
                    buttons: [
                        'excel', 'csv', 'pdf', 'copy', 'print'
                    ],
                    ajax: {
                        url: "{{ route('rekap-perunsur.index') }}",
                        data: {tahun:tahun}
                    },
                    columns: [
                        { defaultContent: "",data: 'no', name: 'no', className: "text-center" },
                        { defaultContent: "",data: 'bulan', name: 'bulan' },
                        { defaultContent: "",data: 'jumlah', name: 'jumlah', className: "text-center" },
                        { defaultContent: "",data: 'jumlah_pertanyaan', name: 'jumlah_pertanyan', className: "text-center" },
                        { defaultContent: "",data: 'p1', name: 'p1', className: "text-center" },
                        { defaultContent: "",data: 'p2', name: 'p2', className: "text-center" },
                        { defaultContent: "",data: 'p3', name: 'p3', className: "text-center" },
                        { defaultContent: "",data: 'p4', name: 'p4', className: "text-center" },
                        { defaultContent: "",data: 'p5', name: 'p5', className: "text-center" },
                        { defaultContent: "",data: 'p6', name: 'p6', className: "text-center" },
                        { defaultContent: "",data: 'p7', name: 'p7', className: "text-center" },
                        { defaultContent: "",data: 'p8', name: 'p8', className: "text-center" },
                        { defaultContent: "",data: 'p9', name: 'p9', className: "text-center" },
                        { defaultContent: "",data: 'jml_nilai', name: 'jml_nilai', className: "text-center" },
                        { defaultContent: "",data: 'nilai', name: 'nilai', className: "text-center" },
                    ]
                });
            }
            $('#filter').click(function(){
                var tahun = $('#tahun').val();

                if(tahun != '') {
                    $('#skm-table').DataTable().destroy();
                    fill_datatable(tahun, tahun);
                    document.getElementById("title").innerHTML = tahun;
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
