{{-- Usamos la vista app como plantilla --}}
@extends('app')

{{-- Sección aporta el título de la página --}}
@section('title', "Listado de productos")

@section('header')
<div class="d-flex justify-content-end align-items-center pt-4 pe-4">
    <i class="bi bi-person-fill fs-3 me-2"></i>
    <input type="text" size='10px' value="{{ $usuario->getUsuario() }}" 
           class="form-control w-auto me-2 bg-light-subtle fw-bold" disabled>
    <a href="index.php?logout" class="btn btn-warning me-2">Salir</a>
</div>
@endsection

@section('pageTitle', "Listado de Productos")
@section('content')
<table class="table table-striped table-dark text-center mb-5">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Valoración</th>
            <th scope="col" colspan="2">Valorar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr class="align-middle">
            <th scope="row">{{ $producto->getId() }}</th>
            <td>{{ $producto->getNombre() }}</td>
            <td>
                <div id="votos_{{ $producto->getId() }}">
                   {!! renderEstrellas($producto->getPuntos(), $producto->getVotos()) !!}
                </div>
            </td>
            <td colspan="2">
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <select name="puntos" id="puntos_{{ $producto->getId() }}" class="form-select w-auto">
                        @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    
                    <button class="btn btn-info boton-votar" data-producto="{{ $producto->getId() }}">Votar</button>
                </div>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@endsection

@section('scripts')
<script src="./js/votar_1.js"></script>
@endsection

