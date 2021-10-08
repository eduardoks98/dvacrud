<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Usuarios;
use App\Http\Requests\StoredUserRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class UsuariosController extends Controller
{

    /** USADO PARA API */
    //Retorna todos os registros
    public function get_all()
    {
        return response()->json(Usuarios::all(), 200);
    }

    //Retorna um usuario pelo id
    public function get_one($id)
    {
        $x = Usuarios::find($id);
        if (is_null($x)) {
            return response()->json(['mensagem' => 'Nenhum usuário encontrado!'], 404);
        }
        return response()->json($x, 200);
    }

    //Adiciona um novo usuario
    public function add(Request $req)
    {
        $x = Usuarios::create($req->all());
        return response()->json($x, 201);
    }

    //Edita um usuario pelo id
    public function edit(Request $req, $id)
    {
        $x = Usuarios::find($id);
        if (is_null($x)) {
            return response()->json(['mensagem' => 'Nenhum usuário encontrado!'], 404);
        }
        $x->update($req->all());
        return response($x, 200);
    }

    //Deleta um usuario pelo id
    public function delete($id)
    {
        $x = Usuarios::find($id);
        if (is_null($x)) {
            return response()->json(['mensagem' => 'Nenhum usuário encontrado!'], 404);
        }
        $x->delete();
        return response(null, 204);
    }


    //TESTE FRONTEND COM O PROPRIO LAVAREL
    public function index()
    {
        $usuarios = Usuarios::get();
        return view('usuarios.list', ['usuarios' => $this->convert_to_view($usuarios)]);
    }

    public function new()
    {
        return view('usuarios.new');
    }

    public function update($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario['data_nascimento'] = $this->get_dt_nasc_to_view($usuario);
        return view('usuarios.update', ['usuario' => $usuario]);
    }

    //Converte a data de nascimento para idade
    public function get_idade($user)
    {
        // Log::info($user);
        return Carbon::parse($user['data_nascimento'])->age;
    }

    //Converte a data de nascimento para o formato do mysql
    public function get_dt_nasc_novo_to_mysql($user)
    {
        return Carbon::parse($user['data_nascimento'])->format('Y-m-d');
    }
    //Converte a data do input que contem / para - e coloca no formato do mysql
    public function get_dt_nasc_editar_to_mysql($user)
    {
        return Carbon::createFromFormat('d/m/Y', $user['data_nascimento'])->format('Y-m-d');
    }

    //Converte a data de nascimento do formato do mysql para dia/mes/ano
    public function get_dt_nasc_to_view($user)
    {
        // Log::info($user);
        return Carbon::parse($user['data_nascimento'])->format('d-m-Y');
    }

    //Converte os dados para a view, nesse exemplo apenas adiciona o campo da idade
    public function convert_to_view($usuarios)
    {
        foreach ($usuarios as $u) {
            $u['idade'] = $this->get_idade($u);
        }
        // Log::info($usuarios);
        return $usuarios;
    }

    //Adiciona um novo usuario
    public function novo(StoredUserRequest $req)
    {
        $usuario = $req->all();
        $usuario['data_nascimento'] = $this->get_dt_nasc_novo_to_mysql($req);

        $usuario = Usuarios::create($usuario);

        return Redirect::to('/');
    }

    //Edita um  usuario
    public function editar(StoredUserRequest $req, $id)
    {
        $this->validate($req, $this->rules(), $this->messages());
        $usuario = Usuarios::findOrFail($id);

        $req_data = $req->all();
        $req_data['data_nascimento'] = $this->get_dt_nasc_editar_to_mysql($req);

        $usuario->update($req_data);
        return Redirect::to('/');
    }

    //Deleta um usuario
    public function deletar($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario->delete();
        return Redirect::to('/');
    }
}
