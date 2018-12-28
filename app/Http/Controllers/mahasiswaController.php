<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exel;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = 2008;
        $sem=1;
        for ($a=2;$sem<=$a;$sem++){
          for ($x=2017;$tahun<=$x;$tahun++){
            $siskom = DB::connection('mysql2')->select("SELECT count(mhsNiu) AS jumlah FROM mahasiswa WHERE mhsProdiKode IN ('421','422')
            AND EXISTS (SELECT mhsregMhsNiu FROM mahasiswa_registrasi WHERE mahasiswa.mhsNiu=mahasiswa_registrasi.mhsregMhsNiu AND mhsregSemId=$tahun$sem)");
            $si = DB::connection('mysql2')->select("SELECT count(mhsNiu) AS jumlah FROM mahasiswa WHERE mhsProdiKode IN ('83','84')
            AND EXISTS (SELECT mhsregMhsNiu FROM mahasiswa_registrasi WHERE mahasiswa.mhsNiu=mahasiswa_registrasi.mhsregMhsNiu AND mhsregSemId=$tahun$sem)");
            $y[$tahun]=$siskom;
            $z[$tahun]=$si;
          }
          $b[$sem]=$y;
          $c[$sem]=$z;
        }

        return view('mahasiswa', compact('b','c'));
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
    public function edit()
    {

        return 123;
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

    public function excel(){
      $tahun = 2008;
      $sem=1;
      for ($a=2;$sem<=$a;$sem++){
        for ($x=2017;$tahun<=$x;$tahun++){
          $siskom = DB::connection('mysql2')->select("SELECT count(mhsNiu) AS jumlah FROM mahasiswa WHERE mhsProdiKode IN ('421','422')
          AND EXISTS (SELECT mhsregMhsNiu FROM mahasiswa_registrasi WHERE mahasiswa.mhsNiu=mahasiswa_registrasi.mhsregMhsNiu AND mhsregSemId=$tahun$sem)");
          $si = DB::connection('mysql2')->select("SELECT count(mhsNiu) AS jumlah FROM mahasiswa WHERE mhsProdiKode IN ('83','84')
          AND EXISTS (SELECT mhsregMhsNiu FROM mahasiswa_registrasi WHERE mahasiswa.mhsNiu=mahasiswa_registrasi.mhsregMhsNiu AND mhsregSemId=$tahun$sem)");
          $y[$tahun]=$siskom;
          $z[$tahun]=$si;
        }
        $b[$sem]=$y;
        $c[$sem]=$z;
      }
      dd($c);

    }
}
