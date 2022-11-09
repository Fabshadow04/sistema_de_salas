
@extends('layouts.plantillabase')

@section('contenido')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->
<a href="salas/create" class="btn btn-primary">CREAR</a>


<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Código</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($salas as $sala)
    <tr>
        <td>{{$sala->id}}</td>
        <td>{{$sala->Sala}}</td>
        <td>{{$sala->Descripcion}}</td>
        <td>{{$sala->Inicio}}</td>
        <td>{{$sala->Final}}</td>
        <td>
         <form action="{{ route('salas.destroy',$sala->id) }}" method="POST">
          <a href="/salas/{{$sala->id}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
