@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas Páginas
        <a href="{{route('pages.create')}}" class="btn btn-sm btn-primary ml-3">Nova Página</a>
    </h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr class="table-secondary">
                        <th width="50">ID</th>
                        <th>Título</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                @foreach ($pages as $page)
                    <tbody>
                        <td>{{$page->id}}</td>
                        <td>{{$page->title}}</td>
                        <td>
                            <a href="/{{$page->slug}}" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            <a href="{{route('pages.edit',['page' => $page->id])}}" class="btn btn-sm btn-warning">Editar</a>
                                <form class="d-inline" action="{{route('pages.destroy',['page' => $page->id])}}" method="post" onsubmit="return confirm('Deseja realmente excluir a página?!');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    {{$pages->links()}}



@endsection