@extends('adminlte::page')

@section('title', 'Nova Página')

@section('content_header')
    <div class="container">
        <h1>Nova Página</h1>
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
        <form action="{{route('pages.store')}}" method="POST" >
            @csrf
            <div class="form-group">
                    <label class="col-form-label">Título da página</label>
                    <input value="{{old('title')}}" type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label class="col-form-label">Corpo da página</label>
                    <textarea name="body" class="form-control" id="bodyfield">{{old('body')}}</textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label"></label>
                <input type="submit" value="Criar" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('bodyfield');
</script>

{{-- {
        stylesSet = '{{asset('assets/css/content.css')}}',
    } --}}
@endsection