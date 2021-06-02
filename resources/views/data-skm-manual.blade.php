@extends('layout.app')
@section('css')
    <section class="section section-shaped section-xl">
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
                                    <h6>Nama</h6>
                                    <div class="input-group input-group-alternative mb-3">
                                        <input class="form-control" name="nama" id="nama" placeholder="Nama" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Alamat</h6>
                                    <div class="input-group input-group-alternative mb-3">
                                        <input class="form-control" name="alamat" id="alamat" placeholder="Alamat" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Nomor Telepon / HP</h6>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="no_telp" id="no_telp" placeholder="No Telp / HP" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Jenis Kelamin</h6>
                                    <div class="input-group input-group-alternative">
                                        <select class="form-control" name="gender" id="gender" placeholder="Jenis Kelamin" type="text" required>
                                            <option disabled selected value></option>
                                            <option value="L">Laki-Laki</option>
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
                                    <h6>Jenis Layanan</h6>
                                    <div class="input-group input-group-alternative">
                                        <select class="form-control" name="status" id="status" placeholder="Jenis Layanan" type="text" required>
                                            <option disabled selected value></option>
                                            <option value="Layanan Perizinan">Layanan Perizinan</option>
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
