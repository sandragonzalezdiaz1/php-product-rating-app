{{-- Usamos la vista app como plantilla --}}
@extends('app')

{{-- Sección aporta el título de la página --}}
@section('title', "Login")

@section('pageTitle', "Login")

@section('content')
<div class="container-md mt-3">
     <div class="d-flex flex-column align-items-center">
        <div id='mensaje' class="d-none alert alert-danger my-3" style="width: 20rem;" role="alert">
            Usuario o contraseña incorrectos
        </div>
        <div class="card " style="width: 20rem;">
            <div class="card-header">
                <h3><i class="bi bi-gear p-2"></i>Login</h3>
            </div>
            <div class="card-body">
                <form id="form-login" method="POST" action="productos.php">
                    <div class="input-group my-2">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" placeholder="usuario" id='usuario' name="usuario" value="{{ $usuario ?? '' }}" required>
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                        <input type="password" class="form-control" placeholder="contraseña" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn float-right btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@section ('scripts')
<script src="./js/validar.js"></script>
@endsection

