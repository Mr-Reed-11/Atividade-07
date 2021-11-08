@extends('layouts.app')

@section('title', 'Alunos Cadastrados')

@section('content')

    <h1><center>Lista de Alunos Cadastrados</center></h1>

    <hr>
    <a href="{{route('front-create')}}" class="btn btn-success" style="margin-left: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg> Cadastrar
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Curso</th>
            <th scope="col">Idade</th>
            <th scope="col">Período</th>
            <th scope="col">Estagiando</th>
            <th scope="col" >Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <th>{{$aluno->id}}</th>
                    <td>{{$aluno->Nome}}</td>
                    <td>{{$aluno->Curso}}</td>
                    <td>{{$aluno->Idade}}</td>
                    <td>{{$aluno->Periodo}}</td>
                    <td>{{$aluno->Estagiando}}</td>
                    <td class="d-flex">
                        <a href="{{route('front-edit',['id'=>$aluno->id])}}" class="btn btn-primary me-2"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg> Editar
                        <a>
                            
                        <form action="{{route('front-destroy',['id'=>$aluno->id])}}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Deletar
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            </button>
                        </form>
                    </td>
                        
                        
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection