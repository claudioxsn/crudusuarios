<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function store(Request $request)
    {
        $user = new Usuario($request->all());
        $user->validarCampos($request);

        try {
            $user->save();
            return response(200)->json(['success' => 'Usuario cadastrado com sucesso!']);
        } catch (Exception $e) {
            return response(400)->json(['error' => 'Ocorreu um erro ao cadastrar!' . $e]);
        }
    }

    public function list(Request $request)
    {
        $user = new Usuario();
        try {
            return json_encode($user->findByName($request->input('pesquisa')));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request)
    {
        $user = new Usuario($request->all());
        $user->validarCampos($request);
        $user = Usuario::find($request->input('id'));
        if (isset($user)) {
            try {
                $user->update($request->all());
                return response(200)->json(['success' => 'Usuario cadastrado com sucesso!']);
            } catch (Exception $e) {
                return response(400)->json(['error' => 'Ocorreu um erro ao cadastrar!' . $e]);
            }
        } else {
            return response()->json(['404' => 'usuario não encontrado']);
        }
    }

    public function findById($id)
    {
        $user = Usuario::find($id);
        if (isset($user)) {
            return response(json_encode($user), 200);
        } else {
            return response()->json(['404' => 'Usuario não encontrado']);
        }
    }

    public function delete(Request $request)
    {
        $usuario = Usuario::find($request->input('id'));
        print_r($usuario);
        if (isset($usuario)) {
            $usuario->delete();
            return response()->json(['success' => 'usuario excluido com sucesso!']);
        } else {
            return response()->json(['error' => 'usuário não encontrado!']);
        }
    }
}
