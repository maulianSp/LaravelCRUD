<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class QuestionModel{
    public static function get_all(){
        $result = DB::table('pertanyaans')->orderBy('id','desc')->get();
        return $result;
    }

    public static function save($data){
        $new_data = DB::table('pertanyaans')->insert(
            [
                'judul' => $data['judul'],
                'isi_pertanyaan' => $data['isi'],
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return $new_data;
    }

    public static function find_id($id){
        $result = DB::table('pertanyaans')->where('id','=',$id)->first();
        return $result;
    }

    public static function show($id){
        $result = DB::table('pertanyaans')
        ->join('jawabans','pertanyaans.id','=','jawabans.id_pertanyaan')
        ->where('pertanyaans.id',$id)
        ->select('pertanyaans.*','jawabans.*')
        ->get();
        return $result;
    }

    public static function update($id,$request){
        $update_data = DB::table('pertanyaans')
        ->where('id',$id)
        ->update(
            [
                'judul' => $request['judul'],
                'isi_pertanyaan' => $request['isi'],
                'updated_at' => now()
            ]
        );
        return $update_data;
    }

    public static function destroy($id){
        $delete_data = DB::table('pertanyaans')
        ->where('id',$id)
        ->delete();

        return $delete_data;
    }
}
