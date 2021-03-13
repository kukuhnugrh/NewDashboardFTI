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
                            <a href="#" id="dataPribadibtn" value="dataPribadi" type="button" class="btn {{ (session()->get('detailTab') == 'dataPribadi' ) ? 'btn-primary' : 'btn-outline-primary' }} w-100">Data Pribadi</a>
                            <a href="/evaluasi/dataAkademik" id="dataAkademikbtn" value="dataAkademik" type="button" class="btn {{ (session()->get('detailTab') == 'dataAkademik' ) ? 'btn-primary' : 'btn-outline-primary' }} w-100">Data Akademik</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row p-3" id="form-content">
                            <div class="col-6">
                                <input class="form-control form-control-sm" type="text" placeholder="Nama" aria-label="Nama example">
                                <input class="form-control form-control-sm" type="email" placeholder="Email" aria-label="Email example">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input class="form-control form-control-sm" type="text" placeholder="Nama" aria-label="Nama example">
                                <input class="form-control form-control-sm" type="email" placeholder="Email" aria-label="Email example">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection