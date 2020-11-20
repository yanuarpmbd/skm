@extends('layout.app')
@section('css')
    <section class="section section-shaped section-xl">
        <div class="shape shape-style-1 bg-gradient-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container pt-lg-12">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-white pb-5">
                            <a href="{{route('home')}}" class="btn btn-sm btn-danger btn-icon-only rounded-circle" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                            </a>
                            <div class="text-muted text-center mb-3"><h4>Data Pemohon</h4></div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form action="{{route('form-skm')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" name="nama" id="nama" placeholder="Nama" type="text" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                        </div>
                                        <input class="form-control" name="alamat" id="alamat" placeholder="Alamat" type="text" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                        </div>
                                        <input class="form-control" name="no_telp" id="no_telp" placeholder="No Telp / HP" type="text" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                        </div>
                                        <select class="form-control" name="status" id="status" placeholder="Jenis Layanan" type="text">
                                            <option value="Layanan Pengaduan dan Informasi">Layanan Pengaduan dan Informasi</option>
                                            <option value="Layanan LKPM">Layanan LKPM</option>
                                            <option value="Layanan OSS">Layanan OSS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Lanjut !</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
