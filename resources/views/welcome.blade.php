@extends('layout.app')
@section('content')
    <section class="section section-xxl section-shaped">
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
            <div class="row row-grid justify-content-between align-items-center">
                <div class="col-lg-7">
                    <h3 class="display-3 text-white">DPMPTSP Provinsi Jawa Tengah<span class="text-white">Aplikasi <strong>Survey Kepuasan Masyarakat</strong></span></h3>
                    <p class="lead text-white">Selamat Datang di Aplikasi SKM DPMPTSP Provinsi Jawa Tengah</p>
                    <div class="btn-wrapper">
                        <a href="" class="btn btn-success">Lihat Nilai SKM</a>
                    </div>
                </div>
                <div class="col-lg-5 mb-lg-auto">
                    <div class="transform-perspective-right">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h6>Silahkan Masukkan Nomor Tiket Anda</h6>
                                </div>
                                <form role="form">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Nomor Tiket..." type="text">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('data-pemohon')}}" type="button" class="btn btn-primary my-4">Submit !</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>--}}
    </section>
@endsection
