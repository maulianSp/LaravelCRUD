@extends('layout.master')
@section('title','Daftar Pertanyaan - Larahub')

@section('links')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
@endsection

@section('menuPertanyaan','active')
    
@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            @foreach ($pertanyaan as $item)
            <div class="jumbotron">
                <h1 class="display-4">{{$item->judul}}</h1>
                <p class="lead">{{$item->isi_pertanyaan}}</p>
            </div>
            @endforeach
        </div>
        
        <div class="card-body">
            
            @forelse ($jawaban as $data)
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
                <input type="hidden" name="id_pertanyaan" value="{{$item->id}}" id="">
                <div class="form-group">
                <input type="text" name="isi_jawaban" placeholder="Reply Jawaban Disini" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Jawab</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('bc')
    <li class="breadcrumb-item active"><a href="#">{{$item->judul}}</a></li>
    <li class="breadcrumb-item active">Jawaban</li>
@endsection