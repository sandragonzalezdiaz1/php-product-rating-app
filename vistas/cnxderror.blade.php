{{-- Usamos la vista app como plantilla --}}
@extends('app')
{{-- Sección aporta el título de la página --}}
@section('title', 'Error de conexión')

@section('header')
@endsection

@section('pageTitle', 'Error de conexión a la base de datos')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card border-danger" style="width: 26rem;">
        <div class="card-header bg-danger text-white">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Error de conexión
        </div>

        <div class="card-body text-center">
            <p class="card-text">
               No se ha podido establecer la conexión con la base de datos.
            </p>

            <p class="text-muted small">
                Por favor, inténtelo de nuevo más tarde.
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
