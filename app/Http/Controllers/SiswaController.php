<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use Illuminate\Http\Request;
use Session;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $s = Siswa::with('Kelas')->get();
        return view('siswa.index',compact('s'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $a = Kelas::all();
        return view('siswa.create',compact('a'));
    
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
            'nis' => 'required|unique:siswas',
            'nama' => 'required|',
            'jenis_kelamin' => 'required|',
            'id_kelas' => 'required',
            'no_telp' => 'required'
        ]);
        $s = new Siswa;
        $s->nis = $request->nis;
        $s->nama = $request->nama;
        $s->jenis_kelamin = $request->jenis_kelamin;
        $s->id_kelas = $request->id_kelas;
        $s->no_telp = $request->no_telp;
        $s->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$s->nama</b>"
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
        $s = Siswa::findOrFail($id);
        return view('siswa.show',compact('s'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s = Siswa::findOrFail($id);
        $a = Kelas::all();
        $selectedK = Siswa::findOrFail($id)->id_kelas;
        return view('siswa.edit',compact('s','a','selectedK'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
       $this->validate($request,[
            'nis' => 'required|',
            'nama' => 'required|',
            'jenis_kelamin' => 'required|',
            'id_kelas' => 'required',
            'no_telp' => 'required'
        ]);
        $s = Siswa::findOrFail($id);
        $s->nis = $request->nis;
        $s->nama = $request->nama;
        $s->jenis_kelamin = $request->jenis_kelamin;
        $s->id_kelas = $request->id_kelas;
        $s->no_telp = $request->no_telp;
        $s->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$s->nama</b>"
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Siswa::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('siswa.index');
    }
}
