@extends('layouts.master')

@section('content-title')
<div class="col-md-12 mb-2">
  Usuarios
</div>
@endsection

@section('content')
<div class="container">
  <div class="row ">
    <a href="{{url('usuarios/new')}}" class="btn btn-info mt-2 mb-2">Adicionar</a>
  </div>
  <div class="row">
    <div class="input-group">
      <input type="text" class="form-control mb-2" id="table-search">
      <div class="input-group-prepend">
        <span class=" btn btn-info mb-2">Pesquisar</span>
      </div>

    </div>
  </div>
  <div class="row">
    <table class="table display" id="user-table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Idade</th>
          <th scope="col">Telefone</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $u)

        <tr>
          <th scope="row">{{$u->id}}</th>
          <td>{{$u->nome}}</td>
          <td>{{$u->email}}</td>
          <td>{{$u->idade}}</td>
          <td class="phone-mask">{{$u->telefone}}</td>
          <td>
            <div class="d-flex">
              <a href="{{url('usuarios/update')}}/{{ $u->id }}" class="btn btn-warning mb-2 mr-2">Editar</a>

              <form action="usuarios/delete/{{$u->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-2">Excluir</button>
              </form>
            </div>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection