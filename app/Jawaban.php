<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    public function pertanyaans()
    {
        return $this->belongsTo('App\Pertanyaan');
    }
}
