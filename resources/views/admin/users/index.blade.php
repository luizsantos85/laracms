@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus usuários
        <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Novo Usuário</a>
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <table class="table table-hover">
            <thead>
                <tr class="table-secondary">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @foreach ($users as $user)
                <tbody>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('users.edit',['user' => $user->id])}}" class="btn btn-sm btn-warning">Editar</a>
                        @if ($loggedId !== intval($user->id))
                            <form class="d-inline" action="{{route('users.destroy',['user' => $user->id])}}" method="post" onsubmit="return confirm('Deseja realmente excluir o usuário?!');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        @endif
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
{{$users->links()}}



    @endsection