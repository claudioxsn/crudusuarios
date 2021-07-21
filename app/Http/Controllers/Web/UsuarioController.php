<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{

    public function index(){
        return view('cadastro');
    }

    public function store(Request $request)
    {

        
        $usuario = new Usuario($request->all());
        $usuario->validarCampos($request);
        try {
            $usuario->save();
            return redirect()->back()->with(['success' => 'Usuário cadastrado com sucesso!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['eror' => 'Ocorreu um erro ao cadastrar!']);
        }
    }

    public function list(Request $request){ 

        $usuarios = Usuario::where('nome', 'like', '%' . $request->input('pesquisa') . '%')->paginate(10);
        return view('listar', compact('usuarios'));

    }

    public function edit($id)
    {
        $usuario = Usuario::find(Crypt::decrypt($id));
        if (isset($usuario)) {
            return view('editar', compact('usuario'));
        } else {
            return redirect()->back()->with(['error' => 'Usuário não encontrado!']);
        }
    }

    public function update(Request $request)
    {
        $usuario = new Usuario();
        $usuario->validarCampos($request);

        $usuario = Usuario::find(Crypt::decrypt($request->id));
        if (isset($usuario)) {
            $usuario->update($request->all());
            return redirect()->back()->with(['success' => 'Cadastro atualizado com sucesso!']);
        } else {
            return redirect()->back()->with(['error' => 'ocorreu um erro ao atualizar']);
        }
    }

    public function delete($id)
    {

        $usuario = Usuario::find(Crypt::decrypt($id)); 
        if(isset($usuario)){ 
            try{ 
                $usuario->delete(); 
                return redirect()->back()->with(['success'=>'Usuário excluído com sucesso!']); 
            } catch(Exception $e){ 
                return redirect()->back()->with(['error'=>'Ocorreu um erro ao excluir o usuário']); 
            } 
        } else {
            return redirect()->back()->with(['error'=>'Usuário não encontrado!']); 
        }

    }
}
