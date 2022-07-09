@extends('template.users')
@section('title', 'Novo Produto')
@section ('body')


<h1> Novo Produto</H1>
@if($errors->any()) 
      <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
      </div>
  @endif


<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="Name">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    <input type="description" class="form-control" id="description" name="description">
  </div>
    <div class="mb-3">
  <label for="quantity" class="form-label">Quantidade</label>
    <input type="quantity" class="form-control" id="quantity" name="quantity">
  </div>
    <div class="mb-3">
  <label for="cost" class="form-label">Preço de Custo</label>
    <input type="cost" class="form-control" id="cost" name="cost">
  </div>
    <div class="mb-3">
  <label for="value" class="form-label">Preço de Venda</label>
    <input type="value" class="form-control" id="value" name="value">
  </div>
         <div class="mb-3">
          <label for="image" class="form-label"> Selecione uma Imagem</label>
          <input type="file" class="form-control form control-md" id="image" name="image"/>
        </div>
        <button type="submit" class="btn btn-primary">enviar</button>
  
</form>
@endsection
