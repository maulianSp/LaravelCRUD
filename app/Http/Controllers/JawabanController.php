<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;

class JawabanController extends Controller
{
    public function index($id){
        $pertanyaan = Pertanyaan::where('id', $id)->get();;
        $jawaban = Jawaban::where('id_pertanyaan',$id)->get();
        return view('jawaban.index',compact('pertanyaan','jawaban'));
    }

    public function store(Request $request){
        $jaw = new Jawaban();
        $jaw->id_pertanyaan = $request['id_pertanyaan'];
        $jaw->isi_jawaban = $request['isi_jawaban'];
        $jaw->save();

        return redirect("/jawaban/$jaw->id_pertanyaan");
    }
}
