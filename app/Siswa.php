<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
	protected $table = 'siswas';
    protected $fillable = ['nis','nama','jenis_kelamin','id_kelas','no_telp'];
    public $timestamps = true;

    public function Kelas(){
        return $this->belongsTo('App\Kelas','id_kelas');
    }  
    public function Absensi(){
        return $this->hasmany('App\Absensi','id_siswa');
    }  
}
