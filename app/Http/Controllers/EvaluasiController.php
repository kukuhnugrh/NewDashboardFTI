<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodeSemesterTerakhir = DB::table('mahasiswa_status')
                    ->orderBy('kode_semester', 'desc')
                    ->pluck('kode_semester')
                    ->first();

        $mahasiswa = DB::table('mahasiswa')
                    ->join('mahasiswa_status', 'mahasiswa.nim', '=', 'mahasiswa_status.nim')  
                    ->where('mahasiswa_status.kode_semester', $kodeSemesterTerakhir)  
                    ->Paginate(25);
        return view('evaluasi', ['mahasiswa'=>$mahasiswa]);
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
    public function show($keyTahun)
    {
        $kodeSemesterTerakhir = DB::table('mahasiswa_status')
                    ->orderBy('kode_semester', 'desc')
                    ->pluck('kode_semester')
                    ->first();
        
        if($keyTahun == "0"){
            $mahasiswa = DB::table('mahasiswa')
                    ->join('mahasiswa_status', 'mahasiswa.nim', '=', 'mahasiswa_status.nim')  
                    ->where('mahasiswa_status.kode_semester', $kodeSemesterTerakhir)  
                    ->Paginate(25);
        }else{
            $mahasiswa = DB::table('mahasiswa')
                    ->join('mahasiswa_status', 'mahasiswa.nim', '=', 'mahasiswa_status.nim')
                    ->where('mahasiswa.nim', 'like' ,'71'.$keyTahun.'%')    
                    ->where('mahasiswa_status.kode_semester', $kodeSemesterTerakhir)
                    ->Paginate(25);
            $yearSelected = 'Tahun 20'.$keyTahun;
        }
        return view('evaluasi', ['mahasiswa'=>$mahasiswa, 'yearSelected'=>$yearSelected]);
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
        
    }

    public function liveSearch($key){
        $kodeSemesterTerakhir = DB::table('mahasiswa_status')
                    ->orderBy('kode_semester', 'desc')
                    ->pluck('kode_semester')
                    ->first();

        $mahasiswa = DB::table('mahasiswa')
                    ->join('mahasiswa_status', 'mahasiswa.nim', '=', 'mahasiswa_status.nim')  
                    ->where('mahasiswa.nim', 'like', '%'.$key.'%')  
                    ->where('mahasiswa_status.kode_semester', $kodeSemesterTerakhir)
                    ->get();
        return $mahasiswa;
    }

    public function cetak_pdf(){
        $kodeSemesterTerakhir = DB::table('mahasiswa_status')
                    ->orderBy('kode_semester', 'desc')
                    ->pluck('kode_semester')
                    ->first();

        $mahasiswa = DB::table('mahasiswa')
                    ->join('mahasiswa_status', 'mahasiswa.nim', '=', 'mahasiswa_status.nim')    
                    ->get();
        $pdf = DF::loadview('pdf/pdf-evaluasi', ['mahasiswa' => $mahasiswa])->setPaper('a4', 'landscape');
    }
}
