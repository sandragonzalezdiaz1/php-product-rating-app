<?php

require "../vendor/autoload.php";
require "../src/error_handler.php";
require_once __DIR__ . "/../src/estrellas_helper.php"; // Helper para generar el HTML de las estrellas 

use eftec\bladeone\BladeOne;
use App\BD\BD;
use App\Modelo\Voto;
use App\Modelo\Producto;
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

// Creación de los objetos DAO para acceder a la BD
$productoDao = new ProductoDao($bd);
$votoDao = new VotoDao($bd);

// Si el usuario ya esta validado
if(isset($_SESSION['usuario'])){
    // Recuperamos el usuario autenticado desde la sesion
    $usuario = $_SESSION['usuario'];
    
    if(filter_has_var(INPUT_POST, "votar")){
       
        $productoId = filter_input(INPUT_POST, 'producto', FILTER_VALIDATE_INT);
        $puntos = filter_input(INPUT_POST, 'puntos', FILTER_VALIDATE_INT);
        
        // Crea el voto con los datos recibidos
        $voto = new Voto($puntos, $productoId, $usuario->getUsuario());
        
        // Array para construir la respuesta JSON
        $response = [];
        
        try {
            // Guarda el voto en la base de datos
            $votoDao->crea($voto);
            // Recupera el producto actualizado para recalcular valoración
            $producto = $productoDao->recuperaProductoPorId($productoId);
            
            // Datos que se enviarán al cliente
            $response['votos'] = $producto->getVotos();
            $response['puntos'] = $producto->getPuntos();
            // Genera el HTML actualizado de las estrellas
            $response['html'] = renderEstrellas($producto->getPuntos(), $producto->getVotos());
            
        } catch (Exception $ex) {
            // En caso de error (por ejemplo: voto duplicado)
            $response['error'] = true;
        }
        
        // Devuelve respuesta en formato JSON para el script votar.js
        header('Content-type: application/json');
        echo json_encode($response);
        die;
        
    // Si no muestra el listado de productos    
    } else {
        try {
            $productos = $productoDao->recuperaProductos();
            
        } catch (PDOException $ex) {
            die("Error al recuperar los productos " . $ex->getMessage());
        }
        
        // Renderiza la vista productos.blade.php
        echo $blade->run("productos", compact("usuario", "productos"));
        
    }
   
// En cualquier otro caso
} else {
    // Muestra formulario de login
    echo $blade->run('login');
}