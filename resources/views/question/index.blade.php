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
                @forelse ($question as $item)
                    <li class="list-group-item">
                        <div class="float-left">
                            <h4>{{$item->judul}}</h4>
                            <span class="text-secondary">{{$string = Str::of($item->isi_pertanyaan)->substr(0, 80)}}...</span>
                            <br>
                            
                        </div>
                        <div class="float-right font-italic">
                            <small>dibuat pada : {{$item->created_at}}</small>
                            <br>
                            
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-default{{$item->id}}">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a href="/pertanyaan/{{$item->id}}/edit" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                            <a href="/pertanyaan/{{$item->id}}" class="btn btn-xs btn-success float-right">lihat Jawaban</a>
                        </div>
                        {{-- MODAL HAPUS--}}
                        <div class="modal fade" id="modal-default{{$item->id}}">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Peringatan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <p>Yakin ingin Menghapus Pertanyaan<br>
                                <b>{{$item->judul}}</b>?
                                </p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Gak Yakin</button>
                                
                                <form action="/pertanyaan/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Yakin</button>
                                </form>
                                
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        {{-- AKHIR MODAL HAPUS --}}
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