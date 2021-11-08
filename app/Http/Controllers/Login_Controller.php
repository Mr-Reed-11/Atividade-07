<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;

class Login_Controller extends Controller
{
    
    public function login()
    {
        return view('front.login');
    }

    public function authen(Request $_request)
    {
        $this->validate($_request,[
            'email' => 'required',
            'password' => 'required'],[
            'email.required' => 'O e-mail é obrigatorio',
            'password.required' => 'A senha é obrigatoria']
        );

        if(Auth::attempt(['email'=> $_request->email, 'password'=> $_request->password])){
            $alunos = Aluno::all();
            return view('front.lista_alunos',['alunos'=>$alunos]);
        }
        else{
            return redirect()->back()->with('danger','E-mail ou senha invalidos');
        }
    }
}

