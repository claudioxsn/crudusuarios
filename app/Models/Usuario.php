<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Usuario extends Model
{
    use HasFactory;


    protected $fillable = ['nome', 'dataNascimento', 'rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'];

    public function validarCampos(Request $dados)
    {


        $regras = [
            'nome' => 'required|max:40|min:3',
            'dataNascimento' => 'required|date|before:today',
            'rua' => 'required|max:40|min:3',
            'numero' => 'required|max:6|min:1',
            'bairro' => 'required|max:40|min:5',
            'cidade' => 'required|max:40|min:3',
            'estado' => 'required|max:2|min:2',
            'cep' => 'required|max:8|min:8'
        ];

        $mensagens = [
            'nome.required' => 'Campo obrigatório',
            'nome.max' => 'Limite de caracteres excedido',
            'nome.min' => 'Mínimo de caracteres não preenchido',
            'dataNascimento.required' => 'Campo obrigatório',
            'dataNascimento.date' => 'Formato de data inválido',
            'dataNascimento.before' => 'Data não pode ser futura',
            'rua.required' => 'Campo obrigatório',
            'rua.max' => 'Limite de caracteres excedido',
            'rua.min' => 'Mínimo de caracteres não preenchido',
            'numero.required' => 'Campo obrigatório',
            'numero.max' => 'Limite de caracteres excedido',
            'numero.min' => 'Mínimo de caracteres não preenchido',
            'bairro.required' => 'Campo obrigatório',
            'bairro.max' => 'Limite de caracteres excedido',
            'bairro.min' => 'Mínimo de caracteres não preenchido',
            'cidade.required' => 'Campo obrigatório',
            'cidade.max' => 'Limite de caracteres excedido',
            'cidade.min' => 'Mínimo de caracteres não preenchido',
            'estado.required' => 'Campo obrigatório',
            'estado.max' => 'Limite de caracteres excedido',
            'estado.min' => 'Mínimo de caracteres não preenchido',

        ];

        return $dados->validate($regras, $mensagens);
    }

    public function convertToArray(Request $request)
    {
        return  [
            'nome' => $this->nome,
            'dataNascimento' => $this->dataNascimento,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'cep' => $this->cep
        ];
    }

    public function findByName($pesquisa)
    {
        return Usuario::where('nome', 'like', '%' . $pesquisa . '%')->paginate(10);
    }
}
