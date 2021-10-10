@extends('layouts.master')

@section('content-title')
<div class="col-md-12 mb-2">
  Usuarios
</div>
@endsection

@section('content')

<div class="container">
  <div class="form-row ">
    <a href="{{url('usuarios/new')}}" class="btn btn-primary mt-2 col">Adicionar</a>
    <div class="input-group col-md-10 mt-2">
      <div class="input-group-prepend">
        <span class=" btn btn-primary "><i class="fas fa-search"></i></span>
      </div>

      <input type="text" class="form-control" id="table-search">

    </div>
  </div>
  <div class="row session-message">
    @if (session('message'))
    <div class="col-md-12 alert alert-success">
      {{ session('message') }}
    </div>
    @endif
  </div>
  <div class="row mt-2">
    <table class="table display table-striped" id="user-table">
      <thead class="thead-dark">
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
          <td>{{$u->idade}} anos</td>
          <td class="phone-mask">{{$u->telefone}}</td>
          <td>
            <div class="d-flex ">
              <a href="{{url('usuarios/update')}}/{{ $u->id }}" class="btn btn-warning mr-2">Editar</a>

              <form action="usuarios/delete/{{$u->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
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