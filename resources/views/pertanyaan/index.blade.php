@extends('layout.master')
@section('title','Daftar Pertanyaan - Larahub')

@section('links')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
@endsection

@section('judul')
    <a href="{{url('/pertanyaan/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Pertanyaan Baru</a>
@endsection

@section('menuPertanyaan','active')

@section('bc')
    <li class="breadcrumb-item active">List Pertanyaan</li>
@endsection
    
@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
        <h3 class="card-title">List Pertanyaan</h3>
        </div>
        
        <div class="card-body">
            <ul class="list-group">
                @forelse ($pertanyaan as $item)
                    <li class="list-group-item">
                        <div class="float-left">
                            <h4>{{$item->judul}}</h4>
                            <span class="text-secondary">{{$string = Str::of($item->isi_pertanyaan)->substr(0, 80)}}...</span>
                            <br>
                            
                        </div>
                        <div class="float-right font-italic">
                            <small>dibuat pada : {{$item->created_at}}</small>
                            <br>
                            <a href="/jawaban/{{$item->id}}" class="btn btn-xs btn-success float-right">lihat Jawaban</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">
                        Belum Ada Pertanyaan
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</section>
@endsection