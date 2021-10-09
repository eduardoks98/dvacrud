@extends('layouts.master')

@section('content-title')
<div class="col-md-12 mb-2">
  Adicionar Usuário
</div>
@endsection

@section('content')

<form class="col-md-6  mt-4" action="{{ url('usuarios/add') }}" method="post">
@csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">
  </div>

  <div class="form-group">
    <label for="nome">Email</label>
    <input type="email" name="email"  class="form-control" id="nome" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="nome">Data Nascimento</label>
    <input type="text" name="data_nascimento" class="form-control birth-mask" id="nome" placeholder="Data de nasicmento">
  </div>

  <div class="form-group">
    <label for="nome">Telefone</label>
    <input type="text" name="telefone"  class="form-control phone-mask" id="nome" placeholder="Telefone">
  </div>
  <button type="submit" class="btn btn-primary">Gravar</button>
</form>



@endsection