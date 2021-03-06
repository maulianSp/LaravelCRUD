@extends('layout.master')
@section('title','Pertanyaan Baru - Larahub')

@section('links')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
@endsection

@section('menuPertanyaan','active')

@section('bc')
    <li class="breadcrumb-item active"><a href="{{url('/pertanyaan')}}">List Pertanyaan</a></li>
    <li class="breadcrumb-item active">Edit Pertanyaan</li>
@endsection
    
@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Edit Pertanyaan</h3>
        </div>
        
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="/pertanyaan/{{$question->id}}">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                    <input type="text" value="{{$question->judul}}" name="judul" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Pertanyaan</label>
                    <div class="col-sm-10">
                    <textarea name="isi" class="form-control" cols="30" rows="10">{{$question->isi_pertanyaan}}</textarea>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-info">Edit Pertanyaan</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</section>
@endsection