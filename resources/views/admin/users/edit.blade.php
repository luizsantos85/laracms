@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <div class="container">
        <h1>Editar Usuário</h1>
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
        <form action="{{route('users.update',['user'=>$user->id])}}" method="POST" >
            @method('PUT')
            @csrf
            <div class="form-group">
                    <label class="col-form-label">Nome Completo</label>
                    <input value="{{$user->name}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label class="col-form-label">E-mail</label>
                    <input value="{{$user->email}}" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label class="col-form-label">Nova senha</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label class="col-form-label">Confirme a nova senha</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label class="col-form-label"></label>
                <input type="submit" value="Salvar alterações" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>


@endsection