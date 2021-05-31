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
                                        <input class="form-control" name="request_id" id="request_id" placeholder="Nomor Tiket" value="{{$request_id}}" type="text" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Nama / Nama Perusahaan</h6>
                                    <div class="input-group input-group-alternative mb-3">
                                        <input class="form-control" name="nama" id="nama" placeholder="Nama" value="{{$nama}} {{$nama_perusahaan}}" type="text" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Alamat</h6>
                                    <div class="input-group input-group-alternative mb-3">
                                        <input class="form-control" name="alamat" id="alamat" placeholder="Alamat" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>No Telp</h6>
                                    <div class="input-group input-group-alternative mb-3">
                                        <input class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Jenis Kelamin</h6>
                                    <div class="input-group input-group-alternative">
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" type="text" required>
                                            <option disabled selected value></option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                            <option value="Lainnya">Lebih baik tidak menyebut</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Pendidikan</h6>
                                    <div class="input-group input-group-alternative">
                                        <select class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" type="text" required>
                                            <option disabled selected value></option>
                                            <option value="SD">SD/Sederajat</option>
                                            <option value="SMP">SMP/Sederajat</option>
                                            <option value="SMA">SMA/Sederajat</option>
                                            <option value="D1">D-1</option>
                                            <option value="D2">D-2</option>
                                            <option value="D3">D-3</option>
                                            <option value="D4">D-4</option>
                                            <option value="S1">S-1</option>
                                            <option value="S2">S-2</option>
                                            <option value="S3">S-3</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Usia</h6>
                                    <div class="input-group input-group-alternative">
                                        <select class="form-control" name="usia" id="usia" placeholder="Usia" type="text" required>
                                            <option disabled selected value></option>
                                            <option value="<20"><20 Tahun</option>
                                            <option value="20-30">21-30 Tahun</option>
                                            <option value="30-40">31-40 Tahun</option>
                                            <option value="41-50">41-50 Tahun</option>
                                            <option value=">50">>50 Tahun</option>
                                        </select>
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
