<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;

class Lista_Controller extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('front.lista_alunos',['alunos'=>$alunos]);
    }

    public function create()
    {
        return view('front.create');
    }

    public function store(Request $_request)
    {
        $this->validate($_request,[
            'Nome' => 'required',
            'Curso' => 'required',
            'Periodo' => 'required',
            'Estagiando' => 'required'],[
            'Nome.required' => 'O nome é obrigatorio',
            'Curso.required' => 'O curso é obrigatoria',
            'Periodo.required' => 'O periodo é obrigatoria',
            'Estagiando.required' => 'O estagio é obrigatoria']
        );
        Aluno::create($_request->all());
        return redirect()->route('front-index');
    }

    public function edit($id)
    {   
        $alunos = Aluno::where('id', $id)->first();
        if(!empty($alunos))
        {
            return view('front.edit', ['alunos'=>$alunos]);
        }
        else
        {
            return redirect()->route('front-index');
        }
    }

    public function update(Request $_request, $id)
    {
        $this->validate($_request,[
            'Nome' => 'required',
            'Curso' => 'required',
            'Periodo' => 'required',
            'Estagiando' => 'required'],[
            'Nome.required' => 'O nome é obrigatorio',
            'Curso.required' => 'O curso é obrigatoria',
            'Periodo.required' => 'O periodo é obrigatoria',
            'Estagiando.required' => 'O estagio é obrigatoria']
        );

        $data = [
            'nome' => $_request -> Nome,
            'curso' => $_request -> Curso,
            'periodo' => $_request -> Periodo,
            'estagiando' => $_request -> Estagiando         
        ];
        Aluno::where('id', $id)->update($data);
        return redirect()->route('front-index');
        
    }

    public function destroy($id) 
    {
        Aluno::where('id', $id)->delete();
        return redirect()->route('front-index');
    }

}

