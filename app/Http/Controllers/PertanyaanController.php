<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\PertanyaanModel;

class PertanyaanController extends Controller
{
    //
    public function index(){
        $pertanyaan = Pertanyaan::orderBy('id','desc')->get();
        return view('pertanyaan.index',compact('pertanyaan'));
    }

    public function create(){
        return view('pertanyaan.create');
    }

    public function store(Request $request){
        $pert = new Pertanyaan();
        $pert->judul = $request['judul'];
        $pert->isi_pertanyaan = $request['isi'];
        $pert->save();

        return redirect()->route('pertanyaan');
    }
}
