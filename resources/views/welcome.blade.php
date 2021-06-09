@extends('layout.app')
@section('content')
    <section class="section section-xxl section-shaped">
        <div class="container py-md">
            <div class="row row-grid justify-content-between align-items-center">
                <div class="col-md-10 mx-auto">
                    <h3 class="display-3 text-white">DPMPTSP Provinsi Jawa Tengah<span class="text-white">Aplikasi <strong>Survey Kepuasan Masyarakat</strong></span></h3>
                    <p class="lead text-white">Selamat Datang di Aplikasi SKM DPMPTSP Provinsi Jawa Tengah</p>
                    <div class="btn-wrapper">
                        <a href="{{route('total-skm')}}" class="btn btn-lg btn btn-success">Lihat Nilai SKM</a>
                    </div>
                </div>
            </div>
            <div class="row row-grid justify-content-between align-items-center">
                <div class="col-md-10 mx-auto">
                    <div class="card1 bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                @if (session()->has('bad'))
                                    <div class="alert alert-danger">
                                        {{session()->get('bad')}}
                                    </div>
                                @endif
                                <h6>Silahkan Masukkan Nomor Tiket Anda</h6>
                            </div>
                            <form action="{{route('data-pemohon')}}" method="get">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <label for="nomor_tiket"></label><input class="form-control" name="nomor_tiket" id="nomor_tiket" placeholder="Nomor Tiket..." type="number" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg my-4">Submit !</button>
                                </div>
                            </form>
                            <div class="text-center text-muted mb-4">
                                <a href="{{route('data-pemohon-manual')}}" type="button" class="btn btn-instagram btn-block btn-lg my-0">Tidak Memiliki Nomor Tiket?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="lead text-white text-center">Scan QR Code Untuk Pengisian SKM Melalui Smartphone</p>
                </div>
                <div class="col-md-12">
                    <img class="img-center" width="150px" height="150px" alt="qr" src="{{asset('img/qr-code.png')}}">
                    {{--<img alt="logo" src="{{asset('img/ptsp_.png')}}">--}}
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
