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
                            <h1 class="fw-bold text-dark">Info Pribadi</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        @foreach( $mahasiswa as $mhs)
                        <div class="p-2 bd-highlight w-25">
                            <div class="border border-secondary rounded w-100 p-3 bg-default">
                                <h4 class="fw-bold text-dark mb-5">Informasi Pribadi</h4>
                                <div class="mb-3">
                                    <label for="namaMhs" class="form-label fw-bold">Nama</label>
                                    <input type="text" class="form-control" id="namaMhs" value="{{ $mhs->nama }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nimMhs" class="form-label fw-bold">Nim</label>
                                    <input type="text" class="form-control" id="nimMhs" value="{{ $mhs->nim }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nimLainMhs" class="form-label fw-bold">Nim Lain</label>
                                    <input type="text" class="form-control" id="nimLainMhs" value="{{ $mahasiswaPemutihan->isEmpty() ? '-' : $mahasiswaPemutihan[0][nim_lama] }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="alamatMhs" class="form-label fw-bold">Alamat</label>
                                    <input type="text" class="form-control" id="alamatMhs" value="{{ $mhs->alamat }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="noHpMhs" class="form-label fw-bold">No Hp</label>
                                    <input type="text" class="form-control" id="noHpMhs" value="-" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="dosenWaliMhs" class="form-label fw-bold">Dosen Wali</label>
                                    <input type="text" class="form-control" id="dosenWaliMhs" value="-" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="statusICEMhs" class="form-label fw-bold">Status ICE</label>
                                    <input type="text" class="form-control" id="statusICEMhs" value="-" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight w-50">
                            <div class="d-flex justify-content-center h-100 d-inline-block">
                                <div class="d-flex flex-column bd-highlight w-100 px-3">
                                    <div class="bd-highligh h-50 d-inline-block">
                                        <div class="d-flex justify-content-center h-75 ">
                                            <div class="bd-highlight w-50 pe-3">
                                                <div class="card h-100">
                                                    <div class="card-body border border-secondary rounded bg-default">
                                                        <h2 class="card-title fw-bold text-center text-dark">Total SKS</h2>
                                                        <h1 class="card-text fw-bold text-center text-dark position-absolute top-50 start-50 translate-middle">144/144</h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-highlight w-50 ps-3">
                                                <div class="card h-100">
                                                    <div class="card-body border border-secondary rounded bg-default">
                                                        <h2 class="card-title fw-bold text-center text-dark">IPK</h2>
                                                        <h1 class="card-text fw-bold text-center text-dark position-absolute top-50 start-50 translate-middle">{{ $mhs->ipk }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight h-50 d-inline-block border border-secondary rounded bg-default">
                                        <h4 class="fw-bold text-dark mb-5">IP Semester</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight w-25">
                            <div class="border border-secondary rounded w-100 p-3 bg-default h-100">
                                <h4 class="fw-bold text-dark mb-5">Status</h4>
                                @foreach( $statusMahasiswa as $stmhs)
                                <div class="mb-3">
                                    <label for="namaMhs" class="form-label fw-bold">Tahun {{ $stmhs->kode_semester }}</label>
                                    <input type="text" class="form-control" id="namaMhs" value="{{ $stmhs->status }}" disabled>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- <form action="" method="post">
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
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection