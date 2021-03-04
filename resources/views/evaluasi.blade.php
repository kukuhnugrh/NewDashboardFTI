@extends('layouts/master')
@section('title', 'Evaluasi')
@section('content')
<div class="content">
    <div class="row ms-3">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 text-left card-title">
                            <h5>Evaluasi</h5>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-primary">Export PDF</button>
                            <select name="YearOfDropdown" id="YearOfDropdown" class="btn dropdown-primary btn-primary">
                                <option class="selected" value="0" hidden>-- Pilih Tahun --</option>
                                @for($i=2012 ; $i<=date("Y") ; $i++ )
                                    <option class="diselected" value="{{ $i }}">Tahun {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nim </th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col"> IPK </th>
                                <th scope="col">Total SKS</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswa as $mhs)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim}}</td>
                                <td>{{ $mhs->nama}}</td>
                                <td>{{ $mhs->status}}</td>
                                <td>{{ $mhs->ipk}}</td>
                                <td>{{ $mhs->total_sks}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </div>  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="pagination">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    {{ $mahasiswa->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection