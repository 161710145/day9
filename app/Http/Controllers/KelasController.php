<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Session;
class KelasController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $a = Kelas::all();
        return view('kelas.index',compact('a'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
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
            'kelas' => 'required|unique:kelas',
            'wali_kelas' => 'required|unique:kelas'
        ]);
        $a = new Kelas;
        $a->kelas = $request->kelas;
        $a->wali_kelas = $request->wali_kelas;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->kelas</b>"
        ]);
        return redirect()->route('kelas.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
        $a = Kelas::findOrFail($id);
        return view('kelas.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
   {
        $a = Kelas::findOrFail($id);
        return view('kelas.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
     {
        $this->validate($request,[
            'kelas' => 'required|',
            'wali_kelas' => 'required|'
        ]);
        $a = Kelas::findOrFail($id);
        $a->kelas = $request->kelas;
        $a->wali_kelas = $request->wali_kelas;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->kelas</b>"
        ]);
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Kelas::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kelas.index');
    }
}
