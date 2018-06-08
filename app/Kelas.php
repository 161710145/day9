<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
   protected $table = 'kelas';
   protected $fillable = ['kelas','wali_kelas'];
   public $timestamps = true;


   public function Siswa(){
       return $this->hasmany('App\Siswa','id_kelas');
   }  
}
