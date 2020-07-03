@extends('layout.master')
@section('title','Daftar Pertanyaan - Larahub')

@section('links')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
@endsection

@section('bc')
    <li class="breadcrumb-item active"><a href="#">{{$question->judul}}</a></li>
    <li class="breadcrumb-item active">Jawaban</li>
@endsection

@section('menuPertanyaan','active')
    
@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <div class="jumbotron">
                <h1 class="display-4">{{$question->judul}}</h1>
                <small>ditanyakan oleh <a href="#">Nama User</a> <br><i>{{$question->created_at}}</i></small>
                <hr>
                <p class="lead">{{$question->isi_pertanyaan}}</p>
            </div>
        </div>
        
        <div class="card-body">
            
            @forelse ($answer as $data)
            <ul class="list-group">
            <li class="list-group-item">
                <div>
                <div class="float-left">
                    <img src="{{asset('img/profile.jpg')}}" width="30" alt="..." class="img-thumbnailmr-3">
                </div>
                <div>
                    <h5 class="text-info">Nama User</h5> <small class="text-secondary">{{$data->created_at}}</small>
                </div>
                </div>
                {{$data->isi_jawaban}}
            </li>
            </ul>
            @empty
            <ul class="list-group">
            <li class="list-group-item">
                Belum ada Jawaban
            </li>
            </ul>
            @endforelse
            
            <br>
            <form method="post" action="{{url('/jawaban')}}">
                @csrf
                <input type="hidden" name="id_pertanyaan" value="{{$question->id}}" id="">
                <div class="form-group">
                <input type="text" name="isi_jawaban" placeholder="Reply Jawaban Disini" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Jawab</button>
            </form>
        </div>
    </div>
</section>
@endsection