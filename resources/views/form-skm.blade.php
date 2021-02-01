@extends('layout.app')
@section('css')
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
@endsection
@section('content')
    <section class="sections section-xl section-shaped">
        <div class="shape shape-style-1 shape-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container py-md">
            <div class="col-lg-12">
                <div class="bg-secondary shadow border-0">
                    <div class="card-header bg-white pb-5">
                        <div class="text-muted text-center mb-3"><h4>Form Survey Kepuasan Masyarakat</h4></div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <form action="{{route('form-data-skm')}}" method="post">
                            @csrf
                            @foreach($pertanyaans as $pertanyaan)
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">{{$pertanyaan->pertanyaan}}</h5>
                                    <input class="js-range-slider" name="slider[]" id="slider[]" type="text">
                                </div>
                            </div>
                            @endforeach
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Simpan !</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script>
        $(".js-range-slider").ionRangeSlider({
            skin: "big",
            min : "0",
            max : "100",
            from: "50",
            grid : "true",
            grid_num : "5",
        });
    </script>
@endsection
