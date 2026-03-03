<?php

require "../vendor/autoload.php";
require "../src/error_handler.php";

use eftec\bladeone\BladeOne;
use Dotenv\Dotenv;
use App\BD\BD;
use App\DAO\UsuarioDao;

session_start();


$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Inicializa el acceso a las variables de entorno
$vistas = __DIR__ . '/../vistas';
$cache = __DIR__ . '/../cache';
$blade = new BladeOne($vistas, $cache, BladeOne::MODE_DEBUG);

// Establece conexión a la base de datos PDO
try {
    $bd = BD::getConexion();
} catch (Exception $error) {
    echo $blade->run("cnxderror");
    die;
}

$usuarioDao = new UsuarioDao($bd);

// Si el usuario ya está autenticado
if (isset($_SESSION['usuario'])) {
    // Si se solicita cerrar la sesión
    if (filter_has_var(INPUT_GET, 'logout')) {
        // Destruye la sesión
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        // Muestra el formulario de login nuevamente
        echo $blade->run("login");
    } else {
        // Si está logueado y no es logout, redirige al listado de productos
        header('Location:productos.php');
        die;
    }

} elseif (filter_has_var(INPUT_POST, 'login')) {
    // Lee los valores del formulario
    $nombre = trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS));
    $pass = trim(filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW));
    
    try {
         $usuario = $usuarioDao->recuperaPorCredencial($nombre, $pass);
        
    } catch (PDOException $ex) {
         die("Error al recuperar el usuario " . $ex->getMessage());
         $usuario = null;
    }
    
    // Si recupera usuario, el login es correcto
    $usuario_valido = !is_null($usuario);

    if ($usuario_valido) {
        // Guardamos el usuario en sesión
        $_SESSION['usuario'] = $usuario;
    
    }

    // Devuelve una respuesta JSON para decidir si enviar el formulario
    header('Content-type: application/json');
    echo json_encode(['login' => $usuario_valido]);
    die;

// En cualquier otro caso
} else {
    // Muestra la vista del formulario de login
    echo $blade->run("login");
}