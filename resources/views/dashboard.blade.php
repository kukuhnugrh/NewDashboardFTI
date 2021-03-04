@extends('layouts/master')
@section('title', 'Dashboard FTI')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 text-left card-title">
                            <h5>Rekap Evaluasi</h5>
                        </div>
                        <div class="col-6 text-end">
                        <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected hidden>Pilih Tahun</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart" style="position: relative; height:40vh; width:80vw"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection