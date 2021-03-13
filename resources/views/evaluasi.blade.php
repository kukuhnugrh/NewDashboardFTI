@extends('layouts/master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
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
                                @if(isset($yearSelected))
                                    <option hidden>{{ $yearSelected }}</option>
                                @else
                                    <option hidden>-- Pilih Tahun --</option>
                                @endif
                                <option value="0" hidden>Semua Tahun Ajaran</option>
                                @for($i=2012 ; $i<=date("Y") ; $i++ )
                                    <option value="{{ substr($i, -2) }}">Tahun {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input id="cariNim" type="number" class="form-control" placeholder="Masukkan Nim" aria-label="Cari">
                            </div>  
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
                                        <a type="button" class="btn btn-success" href="/evaluasi/dataPribadi"><i class="fas fa-edit"></i></a>
                                        <a type="button" class="btn btn-danger" href="/evaluasi/delete"><i class="fas fa-trash-alt"></i></a>
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
@section('js')
<script>
    $(document).ready(function(){   
        $('#cariNim').on('keyup', function(){
            var key = $(this).val();
            $.ajax({
                url: '/pra-evaluasi/liveSearch/'+key,
                type: "GET",
                dataType: "json",
                success:function(data){
                    var i = 1;
                    $('#dtMahasiswa').empty();
                    $.each(data, function(key, value){
                        $('#dtMahasiswa').append("<tr><td scope='row'>"+i+
                            "</td><td>"+value.nim+
                            "</td><td>"+value.nama+
                            "</td><td>"+value.status+
                            "</td><td>"+value.ipk+
                            "</td><td>"+value.total_sks+
                            "</td><td>"+
                            "<div class='btn-group' role='group' aria-label='Basic mixed styles example'>"+
                                "<a type='button' class='btn btn-success' href='/evaluasi/dataPribadi"+value.nim+"'><i class='fas fa-edit'></i></a>"+
                                "<a type='button' class='btn btn-danger' href='/evaluasi/delete"+value.nim+"'><i class='fas fa-trash-alt'></i></a>"+
                            "</div>"+
                            "</td></tr>");
                            i++; 
                    });
                }
            });
        });
    });

    $(document).ready(function(){
        $('#YearOfDropdown').on('change', function(){
            var keyTahun = $(this).val();
            var url = "url('/pra-evaluasi/"+keyTahun+"')";
            window.location.href = "{{url('/pra-evaluasi')}}"+"/"+keyTahun;
        });
    });
</script>
@endsection