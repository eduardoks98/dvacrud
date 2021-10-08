@extends('layouts.master')
@section('content-title')
Usuarios
@endsection
@section('content')
<table class="table">
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
      <td>{{$u->telefone}}</td>
      <td>
        <button>Editar</button>
        <button>Excluir</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection