<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerModel;

class AnswerController extends Controller
{
    public function store(Request $request){
        $new_answer = AnswerModel::save($request->all());
        return redirect()->route('show', ['id' => $request['id_pertanyaan']]);
    }
}
