@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')
    <div class="container">
        <h1>Editar Página</h1>
    </div>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger container">
        <h5><i class="icon fas fa-ban"></i> Ocorreu um Erro!</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card container">
    <div class="card-body">
        <form action="{{route('pages.update',['page'=>$page->id])}}" method="POST" >
            @csrf
            @method('PUT')

            <div class="form-group">
                    <label class="col-form-label">Título da página</label>
                    <input value="{{$page->title}}" type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label class="col-form-label">Corpo da página</label>
                    <textarea name="body" class="form-control">{{$page->body}}</textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label"></label>
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>


@endsection