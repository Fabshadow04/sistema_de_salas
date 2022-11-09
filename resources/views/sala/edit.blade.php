@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR REGISTROS</h2>

<form action="/salas/{{$sala->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Sala</label>
    <input id="sala" name="sala" type="text" class="form-control" value="{{$sala->Sala}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$sala->Descripcion}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Inicio</label>
    <input id="inicio" name="inicio" type="datetime-local" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Final</label>
    <input id="final" name="final" type="datetime-local" step="any"  class="form-control" tabindex="3">
  </div>
  <a href="/salas" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection