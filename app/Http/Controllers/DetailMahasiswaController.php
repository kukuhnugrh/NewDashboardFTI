<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DetailMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nim)
    {
        $kodeSemesterTerakhir = DB::table('mahasiswa_status')
                    ->orderBy('kode_semester', 'desc')
                    ->pluck('kode_semester')
                    ->first();

        $mahasiswa = DB::table('mahasiswa')
                    ->join('mahasiswa_status', 'mahasiswa.nim', '=', 'mahasiswa_status.nim')
                    ->where('mahasiswa.nim',$nim)
                    ->where('mahasiswa_status.kode_semester', $kodeSemesterTerakhir)
                    ->get();

        $statusMahasiswa = DB::table('mahasiswa_status')
                        ->where('mahasiswa_status.nim', $nim)
                        ->get();

        $mahasiswaPemutihan = DB::table('mahasiswa_pemutihan')
                        ->where('mahasiswa_pemutihan.nim_lama', $nim)
                        ->get();

        $khs = DB::table("khs")
                        ->where('khs.nim', $nim)
                        ->join("matakuliah", "matakuliah.kode_matakuliah", "=", "khs.kode_matakuliah")
                        ->where(function ($query){
                            $query->where('khs.nilai', 'like', 'A%')
                                    ->orWhere('khs.nilai', 'like', 'B%')
                                    ->orWhere('khs.nilai', 'like', 'C%');
                        })
                        ->sum('matakuliah.sks');

                        

        $sksWajib = DB::table('khs')
                        ->join("matakuliah", "matakuliah.kode_matakuliah", "=", "khs.kode_matakuliah")
                        ->join("kelompok_matakuliah", "kelompok_matakuliah.kode_kelompok_matakuliah", "=", "matakuliah.kode_kelompok_matakuliah")
                        ->where('khs.nim', $nim)
                        ->where("kelompok_matakuliah.kode_kelompok_matakuliah", "K18")
                        ->sum('matakuliah.sks');

        $sksWajibProfil = DB::table('khs')
                        ->join("matakuliah", "matakuliah.kode_matakuliah", "=", "khs.kode_matakuliah")
                        ->join("kelompok_matakuliah", "kelompok_matakuliah.kode_kelompok_matakuliah", "=", "matakuliah.kode_kelompok_matakuliah")
                        ->where('khs.nim', $nim)
                        ->where("kelompok_matakuliah.kode_kelompok_matakuliah", "K16")
                        ->sum('matakuliah.sks');

        $sksBebasProdi = DB::table('khs')
                        ->join("matakuliah", "matakuliah.kode_matakuliah", "=", "khs.kode_matakuliah")
                        ->join("kelompok_matakuliah", "kelompok_matakuliah.kode_kelompok_matakuliah", "=", "matakuliah.kode_kelompok_matakuliah")
                        ->where('khs.nim', $nim)
                        ->where("kelompok_matakuliah.kode_kelompok_matakuliah", "K22")
                        ->sum('matakuliah.sks');

        $sksBebasNonProdi = DB::table('khs')
                        ->join("matakuliah", "matakuliah.kode_matakuliah", "=", "khs.kode_matakuliah")
                        ->join("kelompok_matakuliah", "kelompok_matakuliah.kode_kelompok_matakuliah", "=", "matakuliah.kode_kelompok_matakuliah")
                        ->where('khs.nim', $nim)
                        ->where("kelompok_matakuliah.kode_kelompok_matakuliah", "K21")
                        ->sum('matakuliah.sks');

        $daftarKHS = DB::table("khs")
                        ->join("matakuliah", "matakuliah.kode_matakuliah", "=", "khs.kode_matakuliah")
                        ->where('khs.nim', $nim)
                        ->where('khs.kode_tahun_ajaran', $kodeSemesterTerakhir)
                        ->get();

        
        return view('detail-pribadi', ['mahasiswa'=>$mahasiswa, 'mahasiswaPemutihan'=>$mahasiswaPemutihan, 'statusMahasiswa'=>$statusMahasiswa, 'daftarKHS'=>$daftarKHS,
                                        'khs'=>$khs, 'sksWajib'=>$sksWajib, 'sksWajibProfil'=>$sksWajibProfil, 'sksBebasProdi'=>$sksBebasProdi, 'sksBebasNonProdi'=>$sksBebasNonProdi ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
