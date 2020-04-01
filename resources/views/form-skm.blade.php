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
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-white pb-5">
                        <a href="{{route('data-pemohon')}}" class="btn btn-sm btn-danger btn-icon-only rounded-circle" type="button">
                            <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        </a>
                        <div class="text-muted text-center mb-3"><h4>Form Survey Kepuasan Masyarakat</h4></div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form">
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan yang ditetapkan dengan yang diminta oleh petugas?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan dan pengaduan di Dinas Perizinan?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang jangka waktu penyelesaian pelayanan?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang kesesuaian antara biaya/tarif yang dibayarkan dengan biaya yang telah ditetapkan?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang kesesuaian hasil pelayanan dengan ketentuan yang telah di tetapkan?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang kemampuan yang dimilki petugas dalam memberikan pelayanan baik dari aspek pengetahuan, keahlian, ketrampilan dan pengalaman?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang perilaku petugas dalam memberikan pelayanan?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang sarana prasarana pelayanan?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-slider-container">
                                    <h5 class="text-dark font-weight-bold">Bagaimana pendapat saudara tentang mekanisme dan respon penanganan pengaduan dalam penyelenggara pelayanan publik?</h5>
                                    <input class="js-range-slider" type="text" data-min="0" data-max="100">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{route('home')}}" type="button" class="btn btn-primary mt-4">Simpan !</a>
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
            skin: "square",
        });
    </script>
    </script>
@endsection
