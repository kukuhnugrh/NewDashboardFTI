@extends('layouts/master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
@section('title', 'Detail Pribadi Mahasiswa')
@section('content')
<div class="content">
    <div class="row ms-3">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <h3 class="fw-bold text-dark">Info Pribadi</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row p-3" id="form-content">
                            @foreach( $mahasiswa as $mhs)
                            <div class="col-6"> 
                                <div class="mb-3">
                                    <label for="Nama" class="fw-bold">Nama</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Nama" aria-label="Nama" value="{{ $mhs->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="Nim" class="fw-bold">Nim</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Nim" aria-label="Nim" value="{{ $mahasiswaPemutihan->isEmpty() ? $mhs->nim : $mahasiswaPemutihan[0][nim_baru] }}">
                                </div>
                                <div class="mb-3">
                                    <label for="Nim Lain" class="fw-bold">Nim Lain(Pemutihan)</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Nim Lain" aria-label="Nim Lain" value="{{ $mahasiswaPemutihan->isEmpty() ? '-' : $mahasiswaPemutihan[0][nim_lama] }}">
                                </div>
                                <div class="mb-3">
                                    <label for="Dosen Wali" class="fw-bold">Dosen Wali</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Dosen Wali" aria-label="Dosen Wali">
                                </div>
                                <div class="mb-3">
                                    <label for="Status Sekarang" class="fw-bold">Status Sekarang</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Status Sekarang" aria-label="Status Sekarang" value="{{ $mhs->status }}">
                                </div>
                                <div class="mb-3">
                                    <label for="No Telepon" class="fw-bold">No Telepon</label>
                                    <input class="form-control form-control-sm" type="number" placeholder="No Telepon" aria-label="No Telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="Alamat" class="fw-bold">Alamat</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Alamat" aria-label="Alamat" value="{{ $mhs->alamat }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="IPK" class="fw-bold">IPK</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="IPK" aria-label="IPK" value="{{ $mhs->ipk }}">
                                </div>
                                <div class="mb-3">
                                    <label for="Total SKS" class="fw-bold">Total SKS</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Total SKS" aria-label="Total SKS" value="{{ $mhs->total_sks }}">
                                </div>
                                <div class="mb-3">
                                    <label for="SKS Lulus" class="fw-bold">SKS Lulus</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="SKS Lulus" aria-label="SKS Lulus">
                                </div>
                                <div class="mb-3">
                                    <label for="Status ICE" class="fw-bold">Status ICE</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Status ICE" aria-label="Status ICE">
                                </div>
                                <div class="mb-3">
                                    <label for="Status Tiap Semester" class="fw-bold">Status Tiap Semester</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Status Tiap Semester" aria-label="Status Tiap Semester">
                                </div>
                                <div class="mb-3">
                                    <label for="Surat Pernyataan" class="fw-bold">Surat Pernyataan</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Surat Pernyataan" aria-label="Surat Pernyataan">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection