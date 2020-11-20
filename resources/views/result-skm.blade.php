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
                    <h3 class="display-3 text-white">Terima Kasih sudah mengisi<span class="text-white">Aplikasi <strong>Survey Kepuasan Masyarakat</strong></span>DPMPTSP Provinsi Jawa Tengah</h3>
                </div>
                <div class="col-lg-5 mb-lg-auto">
                    <div class="transform-perspective-right">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h6>Hasil Penilaian Anda Terhadap Kualitas Pelayanan DPMPTSP Provinsi Jawa Tengah</h6>
                                </div>
                                <div class="text-center mb-4">
                                    <h1 class="display-1 text-gray-dark">99.65</h1>
                                </div>
                                <div class="text-center">
                                    <a href="{{route('home')}}" type="button" class="btn btn-primary my-4">Home</a>
                                </div>
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
