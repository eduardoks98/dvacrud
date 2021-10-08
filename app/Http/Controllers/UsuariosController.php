<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{

    public function index(){
        return view('usuarios');
    }
    
    public function getUsuarios()
    {
        return response()->json(Usuarios::all(), 200);
    }

    public function getUsuarioId($id)
    {
        $x = Usuarios::find($id);
        if (is_null($x)) {
            return response()->json(['mensagem' => 'Nenhum usuário encontrado!'], 404);
        }
        return response()->json($x, 200);
    }

    public function addUsuario(Request $req)
    {
        $x = Usuarios::create($req->all());
        return response($x, 201);
    }

    public function editUsuario(Request $req, $id)
    {
        $x = Usuarios::find($id);
        if (is_null($x)) {
            return response()->json(['mensagem' => 'Nenhum usuário encontrado!'], 404);
        }
        $x->update($req->all());
        return response($x, 200);
    }

    public function delUsuario($id){
        $x = Usuarios::find($id);
        if (is_null($x)) {
            return response()->json(['mensagem' => 'Nenhum usuário encontrado!'], 404);
        }
        $x->delete();
        return response(null, 204);
    }
}
