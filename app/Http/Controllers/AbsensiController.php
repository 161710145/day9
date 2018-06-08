<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Siswa;
use Illuminate\Http\Request;
use Session;
class AbsensiController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $b = Absensi::with('Siswa')->get();
        return view('absensi.index',compact('b'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $s = Siswa::all();
        return view('absensi.create',compact('s','k'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $this->validate($request,[
            'tgl_absen' => 'required|',
            'id_siswa' => 'required|unique:absensis',
            'keterangan' => 'required|'
            
        ]);
        $b = new Absensi;
        $b->tgl_absen = $request->tgl_absen;
        $b->id_siswa = $request->id_siswa;
        $b->keterangan = $request->keterangan;
        $b->save();
        // attach fungsinya untuk melampirkan data,yang dilampirkan disini ialah data dari method Keterangan
        //  yang ada di model absensi
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$b->id_siswa</b>"
        ]);
        return redirect()->route('absensi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $b = Absensi::findOrFail($id);
        return view('absensi.show',compact('b'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $b = Absensi::findOrFail($id);
        $s = Siswa::all();
        $selecteds = Absensi::findOrFail($id)->id_siswa;
        $selectedk = Absensi::findOrFail($id)->id_keterangan;
        // dd($selected);
        return view('absensi.edit',compact('b','s','selecteds','selectedk'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tgl_absen' => 'required|',
            'id_siswa' => 'required|',
            'keterangan' => 'required|'
        
        ]);
        $b = Absensi::findOrFail($id);
        $b->tgl_absen = $request->tgl_absen;
        $b->id_siswa = $request->id_siswa;
         $b->keterangan = $request->keterangan;
        $b->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$b->id_siswa</b>"
        ]);
        return redirect()->route('absensi.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = Absensi::findOrFail($id);
        $b->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('absensi.index');
    }
}
