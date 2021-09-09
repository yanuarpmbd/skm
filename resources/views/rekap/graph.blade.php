@extends('voyager::master')

@section('css')
@stop

@section('page_title', 'Grafik SKM')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-calendar"></i>Grafik Nilai SKM Tahun {{$now}}
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div>
        <canvas id="canvas"></canvas>
    </div>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        $(function(){
            //get the pie chart canvas
            var cData = JSON.parse(`<?php echo $chart; ?>`);
            var ctx = $("#canvas");

            var data = {
                labels: cData.label,
                datasets: [
                    {
                        label: "Nilai SKM",
                        data: cData.data,
                        borderColor: [
                            "#E41B1D",
                        ],
                    },
                    {
                        label: "Jumlah Responden",
                        data: cData.jumlah,
                        borderColor: [
                            "#1BE4E2",
                        ],
                    }
                ]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Grafik Survey Kepuasan Masyarakat",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "top",
                },
            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: "line",
                data: data,
                options: options
            });

        });
    </script>
@stop
