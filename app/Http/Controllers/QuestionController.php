<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionModel;

class QuestionController extends Controller
{
    public function index(){
        $question = QuestionModel::get_all();
        return view('question.index', compact('question'));
    }

    public function create(){
        return view('question.form');
    }

    public function store(Request $request){
        $new_question = QuestionModel::save($request->all());
        return redirect('/pertanyaan');
    }

    public function show($id){
        $question = QuestionModel::find_id($id);
        $answer = QuestionModel::show($id);
        return view('question.show', compact('question','answer'));
    }

    public function edit($id){
        $question = QuestionModel::find_id($id);
        return view('question.edit',compact('question'));   
    }

    public function update($id, Request $request){
        $question = QuestionModel::update($id, $request->all());
        return redirect('/pertanyaan');
    }

    public function destroy($id){
        $question = QuestionModel::destroy($id);
        return redirect('/pertanyaan');
    }
}
