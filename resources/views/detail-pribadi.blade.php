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
                            <div class="container-fluid p-3" style="background-color: #E0E0E0">
                                <h4 class="text-dark">Total SKS</h4>
                                <div class="d-flex justify-content-around">
                                    <div class="container-sm p-2 border rounded-3 bg-light m-2">
                                        <span class="d-block align-items-start h-75 pb-3">
                                            Total SKS Lulus
                                        </span>
                                        <span class="d-block text-dark h-25">
                                            {{ $khs }}/144
                                        </span>
                                    </div>
                                    <div class="container-sm p-2 border rounded-3 bg-light m-2">
                                        <span class="d-block align-items-start h-75 pb-3">
                                            Total SKS Matakuliah Wajib
                                        </span>
                                        <span class="d-block text-dark h-25">
                                            {{ $sksWajib }}
                                        </span>
                                    </div>
                                    <div class="container-sm p-2 border rounded-3 bg-light m-2">
                                        <span class="d-block align-items-start h-75 pb-3">
                                            Total SKS Wajib Profil
                                        </span>
                                        <span class="d-block  text-dark h-25">
                                        {{ $sksWajibProfil }}
                                        </span>
                                    </div>
                                    <div class="container-sm p-2 border rounded-3 bg-light m-2">
                                        <span class="d-block align-items-start h-75 pb-3">
                                            Total SKS Bebas Prodi
                                        </span>
                                        <span class="d-block text-dark h-25">
                                            {{ $sksBebasProdi }}
                                        </span>
                                    </div>
                                    <div class="container-sm p-2 border rounded-3 bg-light m-2">
                                        <span class="d-block align-items-start h-75 pb-3">
                                            Total SKS Bebas Non Prodi
                                        </span>
                                        <span class="d-block text-dark h-25">
                                            {{ $sksBebasNonProdi }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-around">
                        @foreach( $mahasiswa as $mhs)
                            <div class="col-3 border rounded-3">
                                <div class="container-fluid p-0 py-2">
                                    <h5 class="text-dark m-2">Informasi Pribadi</h5>
                                    <div class="container-fluid border border-secondary mb-4"></div>
                                    <div class="mb-3">
                                        <label for="namaMhs" class="fw-bold">Nama</label>
                                        <input type="text" class="form-control" id="namaMhs" value="{{ $mhs->nama }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nimMhs" class="fw-bold">Nim</label>
                                        <input type="text" class="form-control" id="nimMhs" value="{{ $mhs->nim }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nimLainMhs" class="fw-bold">Nim Lain</label>
                                        <input type="text" class="form-control" id="nimLainMhs" value="{{ $mahasiswaPemutihan->isEmpty() ? '-' : $mahasiswaPemutihan[0][nim_lama] }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamatMhs" class="fw-bold">Alamat</label>
                                        <input type="text" class="form-control" id="alamatMhs" value="{{ $mhs->alamat }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="noHpMhs" class="fw-bold">No Hp</label>
                                        <input type="text" class="form-control" id="noHpMhs" value="-" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dosenWaliMhs" class="fw-bold">Dosen Wali</label>
                                        <input type="text" class="form-control" id="dosenWaliMhs" value="-" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="statusICEMhs" class="fw-bold">Status ICE</label>
                                        <input type="text" class="form-control" id="statusICEMhs" value="-" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 border rounded-3 py-3">
                                <div class="container-fluid">
                                    <div class="border border-secondary d-block h-50 my-1">
                                        asd
                                    </div>
                                    <div class="border border-secondary d-block h-50 my-1 overflow-auto">
                                        <div class="row p-3">
                                            <div class="col-3">
                                                <h4 class="text-dark">KHS</h4>
                                            </div>
                                            <div class="col-9 d-flex flex-row-reverse">
                                                <select name="YearOfDropdown" id="YearOfDropdown" class="btn dropdown-primary btn-primary">
                                                    @if(isset($yearSelected))
                                                        <option hidden>{{ $yearSelected }}</option>
                                                    @else
                                                        <option hidden>-- Pilih Semester --</option>
                                                    @endif
                                                    <option value="0" hidden>Semester Sekarang</option>
                                                    @for($i=2012 ; $i<=date("Y") ; $i++ )
                                                        <option value="{{ substr($i, -2) }}">Semester {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">Matakuliah</th>
                                                    <th scope="col">SKS</th>
                                                    <th scope="col">Nilai</th>
                                                    <th scope="col">Bobot</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($daftarKHS as $daftar)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $daftar->kode_matakuliah }}</td>
                                                        <td>{{ $daftar->nama_matakuliah }}</td>
                                                        <td>{{ $daftar->sks }}</td>
                                                        <td>{{ $daftar->nilai_angka }}</td>
                                                        <td>{{ $daftar->harga }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 border rounded-3">
                                <div class="container-fluid p-0 py-2">
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
                    </div>
                    <!-- <div class="d-flex justify-content-center">
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection