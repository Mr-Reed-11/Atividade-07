@extends('layouts.app')

@section('title', 'Editar informações do Aluno')

@section('content')
    <div class='container mt-5'>
        <center><h1>Editar informações do Aluno</h1></center>
        <hr>
        <br>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('front-update',['id'=>$alunos->id])}}" method='POST'>
            @csrf
            @method('PUT')
            
            <div class='form-group'>
                <div class='form-group'>
                    <label for='Nome'>Nome:</label>
                    <input type='text' class='form-control' name='Nome' value="{{$alunos->Nome}}" placeholder="Nome do Aluno">
                </div>
                <div class='form-group'>
                    <label for='Curso'>Curso:</label>
                    <input type='text' class='form-control' name='Curso' value="{{$alunos->Curso}}" placeholder="Curso do Aluno">
                </div>
                <div class='form-group'>
                    <label for='Idade'>Idade:</label>
                    <input type='number' min='0' max='100' class='form-control' value="{{$alunos->Idade}}" name='Idade' placeholder="Idade do Aluno">
                </div>
                <div class='form-group'>
                    <label for='Periodo'>Periodo:</label>
                    <input type='number' min='1' max='10' class='form-control' value="{{$alunos->Periodo}}" name='Periodo' placeholder="Periodo do Aluno">
                </div>
                <div class='form-group'>
                    <label for='Estagiando'>Estagiando:</label><br>
                    <input type="radio" id="sim" name="Estagiando" value="Sim">
                    <label for="Estagiando">Sim</label>
                    <input type="radio" id="nao" name="Estagiando" value="Não">
                    <label for="Estagiando">Não</label>
                </div>
                <center><input type="submit" name='submit' class='btn btn-success' value="Atualizar Informações"></center>
            </div>
        </form>
    </div>
@endsection