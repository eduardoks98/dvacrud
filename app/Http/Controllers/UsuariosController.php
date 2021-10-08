<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Usuarios;
use Carbon\Carbon;


class UsuariosController extends Controller
{

    //Converte a data de nascimento para idade
    public function getUsuarioIdade($user)
    {
        // Log::info($user);
        return Carbon::parse($user['data_nascimento'])->age;
    }

    public function convertUsuariosToview($usuarios)
    {
        foreach ($usuarios as $u) {
            $u['idade'] = $this->getUsuarioIdade($u);
        }
        Log::info($usuarios);
        return $usuarios;
    }



    public function index()
    {
        $usuarios = Usuarios::get();
        return view('usuarios', ['usuarios' => $this->convertUsuariosToview($usuarios)]);
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

    public function delUsuario($id)
    {
        $x = Usuarios::find($id);
        if (is_null($x)) {
            return response()->json(['mensagem' => 'Nenhum usuário encontrado!'], 404);
        }
        $x->delete();
        return response(null, 204);
    }
}
