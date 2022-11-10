@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR REGISTROS</h2>

<form action="/salas/{{$sala->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Sala</label>
    
    <select id="sala" name="sala" type="text" class="form-control" tabindex="1">
  <option value="{{$sala->Sala}}">{{$sala->Sala}}</option>
  <option value="sala1">Sala 1</option>
  <option value="sala2">Sala 2</option>
  <option value="sala3">Sala 3</option>
  <option value="sala4">Sala 4</option>
</select>  
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