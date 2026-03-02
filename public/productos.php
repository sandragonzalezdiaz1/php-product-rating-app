<?php

require "../vendor/autoload.php";
require "../src/error_handler.php";
require_once __DIR__ . "/../src/estrellas_helper.php";

use eftec\bladeone\BladeOne;
use App\BD\BD;
use App\Modelo\Voto;
use App\DAO\ProductoDao;
use App\DAO\VotoDao;

session_start();

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

$productoDao = new ProductoDao($bd);
$votoDao = new VotoDao($bd);

// Si el usuario ya esta validado
if(isset($_SESSION['usuario'])){
    // Recuperamos el usuario de la sesion
    $usuario = $_SESSION['usuario'];
    
    if(filter_has_var(INPUT_POST, "votar")){
        // Lee el id del producto y sus puntos del formulario
        $productoId = filter_input(INPUT_POST, 'producto', FILTER_VALIDATE_INT);
        $puntos = filter_input(INPUT_POST, 'puntos', FILTER_VALIDATE_INT);
        
        // Crea el voto
        $voto = new Voto($puntos, $productoId, $usuario->getUsuario());
        $response = [];
        
        try {
            // Persiste el voto 
            $votoDao->crea($voto);
            $producto = $productoDao->recuperaProductoPorId($productoId);
            
            $response['votos'] = $producto->getVotos();
            $response['puntos'] = $producto->getPuntos();
            
        } catch (Exception $ex) {
            $response['error'] = true;
        }
        
        header('Content-type: application/json');
        echo json_encode($response);
        die;
        
    // Si no mostramos la tabla de productos    
    } else {
        try {
            $productos = $productoDao->recuperaProductos();
            
        } catch (PDOException $ex) {
            die("Error al recuperar los productos " . $ex->getMessage());
        }
        
        echo $blade->run("productos", compact("usuario", "productos"));
        
    }
   
// En cualquier otro caso
} else {
    // Muestra formulario de login
    echo $blade->run('login');
}