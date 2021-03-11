<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    use HasFactory;


    public function getAllData(){
        return DB::table('tb_siswa')->leftJoin('tb_mapel', 'tb_mapel.id_mapel', '=', 'tb_siswa.id_mapel')->get();
    }

    public function getDetailData($id_siswa){
        return DB::table('tb_siswa')->where('id', $id_siswa)->first();
    }

    public function storeData($dataStore){
        DB::table('tb_siswa')->insert($dataStore);
    }

    public function updateData($data, $id_siswa){
        DB::table('tb_siswa')->where('id', $id_siswa)->update($data);
    }

    public function deleteData($id){
        DB::table('tb_siswa')->where('id', $id)->delete();
    }
}
