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

        $mahasiswaPemutihan = DB::table('mahasiswa_pemutihan')
                        ->where('mahasiswa_pemutihan.nim_lama', $nim)
                        ->get();

        $khs = DB::table('khs')
                        ->where('khs.nim', $nim)
                        ->count();
        return view('detail-pribadi', ['mahasiswa'=>$mahasiswa, 'mahasiswaPemutihan'=>$mahasiswaPemutihan, 'khs'=>$khs]);
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
