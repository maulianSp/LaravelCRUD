<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class AnswerModel{
    public static function save($data){
        $new_data = DB::table('jawabans')->insert(
            [
                'id_pertanyaan' => $data['id_pertanyaan'],
                'isi_jawaban' => $data['isi_jawaban'],
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return $new_data;
    }
}
