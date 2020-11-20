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
                                    <h6>Nomor Tiket</h6>
                                    <div class="input-group input-group-alternative mb-3">
                                        <input class="form-control" name="request_id" id="request_id" placeholder="Nomot Tiket" value="{{$request_id}}" type="text" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Nama / Nama Perusahaan</h6>
                                    <div class="input-group input-group-alternative mb-3">
                                        <input class="form-control" name="nama" id="nama" placeholder="Nama" value="{{$nama}} {{$nama_perusahaan}}" type="text" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Bidang Perizinan / Rekomendasi</h6>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="sektor" id="sektor" placeholder="Bidang Perizinan / Rekomendasi" value="{{$sektor}}" type="text" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Nama Perizinan / Rekomendasi</h6>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="jenis_izin" id="jenis_izin" placeholder="Nama Perizinan / Rekomendasi" value="{{$jenis_izin}}" type="text" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Status</h6>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="status" id="status" placeholder="Status" value="Layanan Perizinan" type="text" readonly required>
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
