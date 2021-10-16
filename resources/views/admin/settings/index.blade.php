@extends('adminlte::page')

@section('title','Configurações')

@section('content_header')
    <div class="container">
        <h1>Configurações do Site</h1>
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

@if (session('warning'))
    <div class="alert alert-success container">
        {{session('warning')}}
    </div>
@endif

    <div class="card container">
        <div class="card-body">
            <form action="{{route('settings.save')}}" method="post" class="form-horizontal">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Título do site</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$settings['title']}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub-título do site</label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" value="{{$settings['subtitle']}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Descrição do site</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" value="{{$settings['description']}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail para contato</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$settings['email']}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do fundo</label>
                    <div class="col-sm-10">
                        <input type="color" name="bgcolor" value="{{$settings['bgcolor']}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do texto</label>
                    <div class="col-sm-10">
                        <input type="color" name="textcolor" value="{{$settings['textcolor']}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar alterações" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection