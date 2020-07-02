<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    public function jawabans()
    {
        return $this->hasMany('App\Jawaban', 'id', 'id_pertanyaan');
    }
}
