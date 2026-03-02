
{{-- Usamos la vista app como plantilla --}}
@extends('app')
{{-- Sección aporta el título de la página --}}
@section('title', "Listado de productos")

@section('header')
<div class="float float-end d-inline-flex m-3">
    <i class="bi bi-person-fill fs-3 me-2"></i>
    <input type="text" size='10px' value="{{ $usuario->getUsuario() }}" 
           class="form-control mr-2 bg-transparent text-white font-weight-bold" disabled>
    <a href="index.php?logout" class="btn btn-warning mr-2">Salir</a>
</div>
@endsection

@section('pageTitle', "Listado de Productos")
@section('content')
<table class="table table-striped table-dark">
    <thead>
        <tr class="text-center">
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Valoración</th>
            <th scope="col" colspan="2">Valorar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr class="text-center">
            <td scope="row">{{ $producto->getId() }}</td>
            <td>{{ $producto->getNombre() }}</td>
            <td>
                <div id="votos_{{ $producto->getId() }}"class="float-left">
                   {!! renderEstrellas($producto->getPuntos(), $producto->getVotos()) !!}
                
                </div>
            </td>
     
            <td>
                <select name="puntos" id="puntos_{{ $producto->getId() }}" class="form-control">
                    @for ($i = 1; $i <= 5; $i++)
                    <option>{{ $i }}</option>
                    @endfor
                </select>
            </td>
            <td>
                <button class="btn btn-info boton-votar" data-producto="{{ $producto->getId() }}">Votar</button>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@endsection

@section('scripts')
<script src="./js/votar.js"></script>
@endsection

