@extends('layouts/master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

@section('css')
<style>
    .multiselect {
        width: 20em;
        height: 15em;
        border: solid 1px #c0c0c0;
        overflow: auto;
    }

    .multiselect label {
        display: block;
    }

    .multiselect-on {
        color: #ffffff;
        background-color: #000099;
    }
</style>
@endsection

@section('title', 'Dashboard FTI')

@section('content')
<div class="content">
    <div class="row ms-3">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="d-flex bd-highlight">
                        <div class="me-auto bd-highlight">
                            <h5>Dashboard</h5>
                        </div>
                        <div class="bd-highlight">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                    Perbandingan Jumlah Status Mahasiswa Aktif per Semester
                                </div>
                                <div class="card-body">
                                    <figure>
                                        <div id="container"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                Persentase Jumlah Status Mahasiswa Aktif per Semester
                                </div>
                                <div class="card-body">
                                    <figure>
                                        <div id="container2"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    Rasio Dosen : Mahasiswa per Semester
                                </div>
                                <div class="card-body">
                                    <figure>
                                        <div id="container3"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                Perbandingan Jumlah Status Mahasiswa Keluar per Semester
                                </div>
                                <div class="card-body">
                                    <figure>
                                        <div id="container4"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                Persentase Jumlah Status Mahasiswa Keluar per Semester
                                </div>
                                <div class="card-body">
                                    <figure>
                                        <div id="container5"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        Rata-rata IPK Mahasiswa Drop Out
                                    </div>
                                    <div class="card-body">
                                        <!-- <h3>Rata-rata IPK Mahasiswa DO</h3> -->
                                        <h4><strong>{{round($ipkDropOut[0]->rataRata,2)}}</strong></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                    Rata-rata IPK Mahasiswa Undur Diri
                                    </div>
                                    <div class="card-body">
                                        <!-- <h3>Rata-rata IPK Mahasiswa UD</h3> -->
                                        <h4><strong>{{round($ipkUndurDiri[0]->rataRata,2)}}</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Perbandingan Jumlah Evaluasi Mahasiswa per Angkatan
                                </div>
                                <div class="card-body">
                                    <figure>
                                        <div id="container6"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Persentase Jumlah Lulusan per Angkatan
                                </div>
                                <div class="card-body">
                                    <figure>
                                        <div id="container7"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('tambahanModal')
<!-- MODAL FILTER -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="/filter" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="multiselect">
                        @foreach ($kodeSemesterFilter as $kode_semester)
                        <label><input type="checkbox" name="option[]" value="{{ $kode_semester->tahun_ajaran }}" />{{ $kode_semester->tahun_ajaran }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- AKHIR MODAL -->
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>

<script>
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: <?php echo json_encode($categories['tahunAjaran']) ?>,
            crosshair: false
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:14px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:12px">{series.name}: </td>' +
                '<td style="padding:0;font-size:12px"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            color: '#8CC152',
            name: 'Aktif',
            data: <?php echo json_encode($categories['aktif']) ?>
        }, {
            color: '#27B46E',
            name: 'Tidak Aktif',
            data: <?php echo json_encode($categories['tidakAktif']) ?>

        }, {
            color: '#4A89DC',
            name: 'Cuti Studi',
            data: <?php echo json_encode($categories['cutiStudi']) ?>

        }]
    });
    // Create the chart
    Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {

                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: "Browsers",
            colorByPoint: true,
            data: [{
                    color: '#8CC152',
                    name: "Aktif",
                    y: Number(<?php echo json_encode(number_format($status['aktif'] / $status['totaldalam'] * 100, 2)) ?>)
                },
                {
                    color: '#27B46E',
                    name: "Tidak Aktif",
                    y: Number(<?php echo json_encode(number_format($status['tidakAktif'] / $status['totaldalam'] * 100, 2)) ?>)
                },
                {
                    color: '#4A89DC',
                    name: "Cuti Studi",
                    y: Number(<?php echo json_encode(number_format($status['cutiStudi'] / $status['totaldalam'] * 100, 2)) ?>)
                }
            ]
        }]
    });

    Highcharts.chart('container4', {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: <?php echo json_encode($categories['tahunAjaran']) ?>,
            crosshair: false
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:14px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:12px">{series.name}: </td>' +
                '<td style="padding:0;font-size:12px"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            color: '#EB0022',
            name: 'Drop Out',
            data: <?php echo json_encode($categories['dropOut']) ?>
        }, {
            color: '#FB7B0C',
            name: 'Undur Diri',
            data: <?php echo json_encode($categories['undurDiri']) ?>
        }, {
            color: '#F3C507',
            name: 'Lulus',
            data: <?php echo json_encode($categories['lulus']) ?>
        }]
    });

    Highcharts.chart('container5', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {

                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: <br>{point.percentage:.1f} %</br>'
                }
            }
        },
        series: [{
            name: "Browsers",
            colorByPoint: true,
            data: [{
                    color: '#EB0022',
                    name: "Drop Out",
                    y: Number(<?php echo json_encode(number_format($status['dropOut'] / $status['totalluar'] * 100, 2)) ?>)
                },
                {
                    color: '#FB7B0C',
                    name: "Undur Diri",
                    y: Number(<?php echo json_encode(number_format($status['undurDiri'] / $status['totalluar'] * 100, 2)) ?>)
                },
                {
                    color: '#F3C507',
                    name: "lulus",
                    y: Number(<?php echo json_encode(number_format($status['lulus'] / $status['totalluar'] * 100, 2)) ?>)
                }
            ]
        }]
    });

    Highcharts.chart('container6', {
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: <?php echo json_encode($data['tahunAjaran']) ?>
        },

        series: [{
            type: 'column',
            color: '#8CC152',
            name: 'Aktif',
            data: <?php echo json_encode($data['aktif']) ?>
        }, {
            type: 'column',
            color: '#FB7B0C',
            name: 'Undur Diri',
            data: <?php echo json_encode($data['undurDiri']) ?>
        }, {
            type: 'column',
            color: '#EB0022',
            name: 'Drop Out',
            data: <?php echo json_encode($data['dropOut']) ?>
        }, {
            type: 'line',
            color: '#F3C507',
            name: 'Lulus',
            data: <?php echo json_encode($data['lulus']) ?>,
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }]
    });

    Highcharts.chart('container7', {
        chart: {
            type: 'column',
            inverted: true,
            polar: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        tooltip: {
            outside: true
        },
        pane: {
            size: '85%',
            innerSize: '20%',
            endAngle: 270
        },
        xAxis: {
            tickInterval: 1,
            labels: {
                align: 'right',
                useHTML: true,
                allowOverlap: true,
                step: 1,
                y: 3,
                style: {
                    fontSize: '13px'
                }
            },
            lineWidth: 0,
            categories: <?php echo json_encode($data2['angkatan']) ?>
        },
        yAxis: {
            crosshair: {
                enabled: true,
                color: '#333'
            },
            lineWidth: 0,
            tickInterval: 25,
            reversedStacks: false,
            endOnTick: true,
            showLastLabel: true
        },
        plotOptions: { 
            series: {
        	 colors: ['#e74c3c','#e67e22','#f1c40f','#2ecc71','#1abc9c','#3498db'],
            },
            column: {
                stacking: 'normal',
                borderWidth: 0,
                pointPadding: 0,
                groupPadding: 0.15
            }
        },
        series: [{
            colorByPoint: true,
            name: 'Lulus',
            data: <?php echo json_encode($data2['persen']) ?>
        }]
    });
</script>
@endsection