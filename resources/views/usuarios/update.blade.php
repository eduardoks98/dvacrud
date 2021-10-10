@extends('layouts.master')

@section('content-title')
<div class="col-md-12 mb-2">
<button class="btn btn-primary" onclick="window.location='{{ url('/') }}'"><i class="fas fa-arrow-left"></i></button> Editar Usuário
</div>
@endsection

@section('content')

<form class="col-md-6  mt-4" action="{{ url('usuarios/edit') }}/{{$usuario->id}}" method="post">
  @csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="Nome completo" value="{{old('nome', $usuario->nome)}}">
    @error('nome')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{old('email', $usuario->email)}}">
    @error('email')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="data_nascimento">Data Nascimento</label>
    <input type="text" name="data_nascimento" class="form-control birth-mask @error('data_nascimento') is-invalid @enderror" id="data_nascimento" placeholder="Data de nasicmento" value="{{old('data_nascimento', $usuario->data_nascimento)}}">
    @error('data_nascimento')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" class="form-control phone-mask @error('telefone') is-invalid @enderror" id="telefone" placeholder="Telefone" value="{{old('telefone',$usuario->telefone)}}">
    @error('telefone')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Gravar</button>
</form>



@endsection