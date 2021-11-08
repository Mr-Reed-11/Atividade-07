@extends('layouts.app')

@section('title', 'Login do Administrador')

@section('content')
    <style>
        .ajuste{
            margin-top: 10%;
        }
    </style>
    <div class='mt-5'>
        <center>
            <h1 >Login de Usuario</h1>
            <hr><br>
        </center>
    </div>
    <div class='form-group'>
        <div class='ajuste container mt-5'>
            <form method="post" action="{{route('front-authen')}}">
                @csrf
                <div class='container col-md-3'>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('danger'))
                        <div class='alert alert-danger'>
                            {{session('danger')}}
                        </div>
                    @endif
                </div>
                <div class='container col-md-2'>
                    <label for='Usuario'>E-mail:</label>
                    <input type="email" name='email' class='form-control' placeholder="Nome do Usuario ">
                </div>
                <br>
                <div class='container col-md-2'>
                    <label for='Password'>Password:</label>
                    <input type="password" name='password' class='form-control' placeholder="Digite o Password">
                </div>
                <br>
                <center><input type="submit" name='login' class='btn btn-primary' value="Fazer login"></center>
            </form>
        </div>
    </div>
@endsection