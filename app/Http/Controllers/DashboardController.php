<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $queryTahunAjaran = DB::select('SELECT kode_semester AS tahun_ajaran FROM mahasiswa_status GROUP BY kode_semester DESC ');

        $lulus = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "LS" GROUP BY kode_semester DESC LIMIT 6');
        $aktif = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "AK" GROUP BY kode_semester DESC LIMIT 6');
        $cutiStudi = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "CS" GROUP BY kode_semester DESC LIMIT 6');
        $dropOut = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "DO" GROUP BY kode_semester DESC LIMIT 6');
        $tidakAktif = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "TA" GROUP BY kode_semester DESC LIMIT 6');
        $undurDiri = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "UD" GROUP BY kode_semester DESC LIMIT 6');
        $categories = array(
            'aktif' => [],
            'lulus' => [],
            'cutiStudi' => [],
            'dropOut' => [],
            'tidakAktif' => [],
            'undurDiri' => [],
            'tahunAjaran' => []
        );
        $status = array(
            'aktif' => 0,
            'lulus' => 0,
            'cutiStudi' => 0,
            'dropOut' => 0,
            'tidakAktif' => 0,
            'undurDiri' => 0,
            'totaldalam' => 0,
            'totalluar' => 0,
        );

        for ($i = 0; $i < count($queryTahunAjaran) - 6; $i++) {
            $categories['tahunAjaran'][$i] = $queryTahunAjaran[$i]->tahun_ajaran;
            $categories['aktif'][$i] = 0;
            $categories['lulus'][$i] = 0;
            $categories['cutiStudi'][$i] = 0;
            $categories['dropOut'][$i] = 0;
            $categories['tidakAktif'][$i] = 0;
            $categories['undurDiri'][$i] = 0;
            for ($j = 0; $j < count($lulus); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $lulus[$j]->tahun_ajaran) {
                    $categories['lulus'][$i] = $lulus[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($aktif); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $aktif[$j]->tahun_ajaran) {
                    $categories['aktif'][$i] = $aktif[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($cutiStudi); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $cutiStudi[$j]->tahun_ajaran) {
                    $categories['cutiStudi'][$i] = $cutiStudi[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($dropOut); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $dropOut[$j]->tahun_ajaran) {
                    $categories['dropOut'][$i] = $dropOut[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($tidakAktif); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $tidakAktif[$j]->tahun_ajaran) {
                    $categories['tidakAktif'][$i] = $tidakAktif[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($undurDiri); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $undurDiri[$j]->tahun_ajaran) {
                    $categories['undurDiri'][$i] = $undurDiri[$j]->jumlah_mahasiswa;
                }
            }
            $status['aktif'] += $categories['aktif'][$i];
            $status['lulus'] += $categories['lulus'][$i];
            $status['cutiStudi'] += $categories['cutiStudi'][$i];
            $status['dropOut'] += $categories['dropOut'][$i];
            $status['tidakAktif'] += $categories['tidakAktif'][$i];
            $status['undurDiri'] += $categories['undurDiri'][$i];
            $status['totaldalam'] += $categories['aktif'][$i] + $categories['tidakAktif'][$i] +  $categories['cutiStudi'][$i];
            $status['totalluar'] += $categories['lulus'][$i] + $categories['undurDiri'][$i] +  $categories['dropOut'][$i];
        }

        $ipkDropOut = DB::select('SELECT AVG(ipk) as rataRata FROM mahasiswa_status WHERE status="DO"');
        $ipkUndurDiri = DB::select('SELECT AVG(ipk) as rataRata FROM mahasiswa_status WHERE status="UD"');
        $data = $this->angkatanStatus();
        $data2 = $this->lulusAngkatan();
        // return view('admin.pages.dashboard', ['users'=>$users, 'categories'=>$categories, 'datas'=>$datas, 'usrs'=>$usrs, 'admins'=>$admins, 'musics'=>$result]);
        // return view("dashboard", ['categories'=>$categories, 'datas'=>$datas, 'status'=>$status, 'a1'=>$a1, 'a2'=>$a2, 'a3'=>$a3, 'a4', $a4, 'a5'=>$a5, 'a6'=>$a6]);
        // return view("dashboard", ['status' => $status, 'yearSelected' => $yearSelected, 'categories' => $categories, 'jumlahLulus' => $jumlahLulus, 'jumlahAktif' => $jumlahAktif, 'jumlahCutiStudi' => $jumlahCutiStudi, 'jumlahDropOut' => $jumlahDropOut, 'jumlahTidakAktif' => $jumlahTidakAktif, 'jumlahUndurDiri' => $jumlahUndurDiri]);
        return view("dashboard", ['categories' => $categories, 'status' => $status, 'ipkDropOut' => $ipkDropOut, 'ipkUndurDiri' => $ipkUndurDiri, 'data' => $data, 'data2' => $data2, 'kodeSemesterFilter' => $queryTahunAjaran]);
        // return view("dashboard");
    }

    protected function angkatanStatus()
    {

        $angkatanTerbaru = DB::select('SELECT nim FROM mahasiswa_status order by nim DESC LIMIT 1');
        $angkatanTerbaru = substr($angkatanTerbaru[0]->nim, 2, 2);

        $categories = array(
            'aktif' => [],
            'lulus' => [],
            'dropOut' => [],
            'undurDiri' => [],
            'tahunAjaran' => []
        );

        $lulus = array();
        $counter = 0;
        for ($i = $angkatanTerbaru - 3; $i <= $angkatanTerbaru; $i++) {
            # code...
            $aktif = DB::table('mahasiswa_status')
                ->select(
                    DB::raw('COUNT(DISTINCT(nim)) as jumlahAktif')
                )
                ->where('nim', 'like', '71' . $i . '%')
                ->where('status', 'AK')
                ->get();
            $lulus = DB::table('mahasiswa_status')
                ->select(
                    DB::raw('COUNT(DISTINCT(nim)) as jumlahLulus')
                )
                ->where('nim', 'like', '71' . $i . '%')
                ->where('status', 'LS')
                ->get();

            $dropOut = DB::table('mahasiswa_status')
                ->select(
                    DB::raw('COUNT(DISTINCT(nim)) as jumlahDrop')
                )
                ->where('nim', 'like', '71' . $i . '%')
                ->where('status', 'DO')
                ->get();
            $undurDiri = DB::table('mahasiswa_status')
                ->select(
                    DB::raw('COUNT(DISTINCT(nim)) as jumlahUndur')
                )
                ->where('nim', 'like', '71' . $i . '%')
                ->where('status', 'UD')
                ->get();
            $categories['tahunAjaran'][$counter] = '20' . $i;
            $categories['aktif'][$counter] = $aktif[0]->jumlahAktif;
            $categories['lulus'][$counter] = $lulus[0]->jumlahLulus;
            $categories['dropOut'][$counter] = $dropOut[0]->jumlahDrop;
            $categories['undurDiri'][$counter] = $undurDiri[0]->jumlahUndur;

            $counter++;
        }
        return $categories;
    }

    protected function lulusAngkatan()
    {
        $angkatanTerbaru = DB::select('SELECT nim FROM mahasiswa_status order by nim DESC LIMIT 1');
        $angkatanTerbaru = substr($angkatanTerbaru[0]->nim, 2, 2);
        $angkatanTerlama = DB::select('SELECT nim FROM mahasiswa_status order by nim ASC LIMIT 1');
        $angkatanTerlama = substr($angkatanTerlama[0]->nim, 2, 2);

        $lulusAngkatan = array(
            'angkatan' => [],
            'persen' => []
        );

        $counter = 0;
        for ($i = $angkatanTerlama; $i <= $angkatanTerbaru; $i++) {
            $total = DB::table('mahasiswa_status')
                ->select(
                    DB::raw('COUNT(DISTINCT(nim)) as totalSemua')
                )
                ->where('nim', 'like', '71' . $i . '%')
                ->get();
            $lulus = DB::table('mahasiswa_status')
                ->select(
                    DB::raw('COUNT(DISTINCT(nim)) as jumlahLulus')
                )
                ->where('nim', 'like', '71' . $i . '%')
                ->where('status', 'LS')
                ->get();
            $lulusAngkatan['persen'][$counter] = (float) number_format($lulus[0]->jumlahLulus / $total[0]->totalSemua * 100, 2);
            $lulusAngkatan['angkatan'][$counter] = '20' . $i . ': ' . $lulusAngkatan['persen'][$counter] . '%';

            $counter++;
        }

        return $lulusAngkatan;
    }

    public function indexfilter(Request $request)
    {
        //$queryTahunAjaran = DB::select('SELECT kode_semester AS tahun_ajaran FROM mahasiswa_status GROUP BY kode_semester DESC LIMIT 6');
        //var_dump($queryTahunAjaran);
        //var_dump($request->option);
        //$filter = ['20141', '20151', '20162', '20192', '20182', '20172'];
        $filterString = implode(",", $request->option);
        $queryTahunAjaran = DB::select("SELECT kode_semester AS tahun_ajaran FROM mahasiswa_status where kode_semester in (" . $filterString . ") GROUP BY kode_semester DESC");
        //var_dump($queryTahunAjaran);
        $lulus = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "LS" AND kode_semester in (' . $filterString . ') GROUP BY kode_semester DESC');
        $aktif = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "AK" AND kode_semester in (' . $filterString . ') GROUP BY kode_semester DESC');
        $cutiStudi = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "CS" AND kode_semester in (' . $filterString . ') GROUP BY kode_semester DESC');
        $dropOut = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "DO" AND kode_semester in (' . $filterString . ')GROUP BY kode_semester DESC');
        $tidakAktif = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "TA" AND kode_semester in (' . $filterString . ') GROUP BY kode_semester DESC');
        $undurDiri = DB::select('SELECT kode_semester AS tahun_ajaran, COUNT(status) as jumlah_mahasiswa FROM mahasiswa_status WHERE status = "UD" AND kode_semester in (' . $filterString . ') GROUP BY kode_semester DESC');
        $categories = array(
            'aktif' => [],
            'lulus' => [],
            'cutiStudi' => [],
            'dropOut' => [],
            'tidakAktif' => [],
            'undurDiri' => [],
            'tahunAjaran' => []
        );
        $status = array(
            'aktif' => 0,
            'lulus' => 0,
            'cutiStudi' => 0,
            'dropOut' => 0,
            'tidakAktif' => 0,
            'undurDiri' => 0,
            'totaldalam' => 0,
            'totalluar' => 0,
        );

        for ($i = 0; $i < count($queryTahunAjaran); $i++) {
            $categories['tahunAjaran'][$i] = $queryTahunAjaran[$i]->tahun_ajaran;
            $categories['aktif'][$i] = 0;
            $categories['lulus'][$i] = 0;
            $categories['cutiStudi'][$i] = 0;
            $categories['dropOut'][$i] = 0;
            $categories['tidakAktif'][$i] = 0;
            $categories['undurDiri'][$i] = 0;
            for ($j = 0; $j < count($lulus); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $lulus[$j]->tahun_ajaran) {
                    $categories['lulus'][$i] = $lulus[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($aktif); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $aktif[$j]->tahun_ajaran) {
                    $categories['aktif'][$i] = $aktif[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($cutiStudi); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $cutiStudi[$j]->tahun_ajaran) {
                    $categories['cutiStudi'][$i] = $cutiStudi[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($dropOut); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $dropOut[$j]->tahun_ajaran) {
                    $categories['dropOut'][$i] = $dropOut[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($tidakAktif); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $tidakAktif[$j]->tahun_ajaran) {
                    $categories['tidakAktif'][$i] = $tidakAktif[$j]->jumlah_mahasiswa;
                }
            }
            for ($j = 0; $j < count($undurDiri); $j++) {
                if ($queryTahunAjaran[$i]->tahun_ajaran == $undurDiri[$j]->tahun_ajaran) {
                    $categories['undurDiri'][$i] = $undurDiri[$j]->jumlah_mahasiswa;
                }
            }
            $status['aktif'] += $categories['aktif'][$i];
            $status['lulus'] += $categories['lulus'][$i];
            $status['cutiStudi'] += $categories['cutiStudi'][$i];
            $status['dropOut'] += $categories['dropOut'][$i];
            $status['tidakAktif'] += $categories['tidakAktif'][$i];
            $status['undurDiri'] += $categories['undurDiri'][$i];
            $status['totaldalam'] += $categories['aktif'][$i] + $categories['tidakAktif'][$i] +  $categories['cutiStudi'][$i];
            $status['totalluar'] += $categories['lulus'][$i] + $categories['undurDiri'][$i] +  $categories['dropOut'][$i];
        }
        $kodeSemesterFilter = DB::select('SELECT kode_semester AS tahun_ajaran FROM mahasiswa_status GROUP BY kode_semester DESC ');
        $ipkDropOut = DB::select('SELECT AVG(ipk) as rataRata FROM mahasiswa_status WHERE status="DO" AND kode_semester in (' . $filterString . ')');
        $ipkUndurDiri = DB::select('SELECT AVG(ipk) as rataRata FROM mahasiswa_status WHERE status="UD" AND kode_semester in (' . $filterString . ')');
        $data = $this->angkatanStatus();
        $data2 = $this->lulusAngkatan();
        // return view('admin.pages.dashboard', ['users'=>$users, 'categories'=>$categories, 'datas'=>$datas, 'usrs'=>$usrs, 'admins'=>$admins, 'musics'=>$result]);
        // return view("dashboard", ['categories'=>$categories, 'datas'=>$datas, 'status'=>$status, 'a1'=>$a1, 'a2'=>$a2, 'a3'=>$a3, 'a4', $a4, 'a5'=>$a5, 'a6'=>$a6]);
        // return view("dashboard", ['status' => $status, 'yearSelected' => $yearSelected, 'categories' => $categories, 'jumlahLulus' => $jumlahLulus, 'jumlahAktif' => $jumlahAktif, 'jumlahCutiStudi' => $jumlahCutiStudi, 'jumlahDropOut' => $jumlahDropOut, 'jumlahTidakAktif' => $jumlahTidakAktif, 'jumlahUndurDiri' => $jumlahUndurDiri]);
        return view("dashboard", ['categories' => $categories, 'status' => $status, 'ipkDropOut' => $ipkDropOut, 'ipkUndurDiri' => $ipkUndurDiri, 'data' => $data, 'data2' => $data2, 'kodeSemesterFilter' => $kodeSemesterFilter]);
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
