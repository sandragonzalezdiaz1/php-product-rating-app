<?php

namespace App\DAO;

use PDO;
use App\Modelo\Producto;


/**
 * Clase DAO para la gestión de productos.
 * 
 * Se encarga de realizar las operaciones de acceso a datos
 * relacionadas con los productos y sus valoraciones.
 */
class ProductoDao {
    
    /**
     * @var $bd Conexión a la Base de Datos
     */
    private PDO $bd;

    
    /**
     * Constructor de la clase.
     * 
     * @param PDO $bd Conexión PDO a la base de datos
     */
    public function __construct(PDO $bd) {
        $this->bd = $bd;
    }
    
    
    public function crea(Producto $producto): bool {
       
    }

    public function modifica(Producto $producto): bool {
       
    }

    public function elimina(int $id): bool {
        
    }
    
    /**
     * Recupera todos los productos de la base de datos.
     * 
     * Además, para cada producto obtiene el número de votos
     * y la suma total de puntos para calcular su valoración.
     * 
     * @return Producto[] Array de objetos Producto
     */
    public function recuperaProductos(): array {
        
        $this->bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        
        $sql = "select id, nombre, nombre_corto as nombreCorto, descripcion, pvp, familia from productos order by nombre";
        $sth = $this->bd->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $productos = $sth->fetchAll();
        
        // Para cada producto se recuperan sus votos y puntos acumulados
        foreach ($productos as $producto){
            $votos = $this->recuperaVotosProducto($producto->getId());
            $puntos = $this->recuperaPuntosProducto($producto->getId());
            
            $producto->setVotos($votos);
            $producto->setPuntos($puntos);
        }
        
        return $productos;
       
    }
    
    
     /**
     * Recupera un producto por su identificador.
     * 
     * Si el producto existe, también se cargan sus votos y puntos.
     * 
     * @param int $id Identificador del producto
     * @return Producto|null Objeto Producto o null si no existe
     */
    public function recuperaProductoPorId(int $id): ?Producto {
        
        $this->bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
   
        $sql = "select id, nombre, nombre_corto as nombreCorto, descripcion, pvp, familia from productos where id=:id";
        $sth = $this->bd->prepare($sql);
        $sth->execute([":id" => $id]);
        $sth->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $producto = ($sth->fetch()) ?: null;
        
        // Si el producto existe, se recuperan sus votos y puntos
        if($producto){
            $votos = $this->recuperaVotosProducto($producto->getId());
            $puntos = $this->recuperaPuntosProducto($producto->getId());
            
            $producto->setVotos($votos);
            $producto->setPuntos($puntos);
           
        }
        
        return $producto;
        
    }
    
   
    /**
     * Obtiene el número total de votos de un producto.
     * 
     * Método privado usado internamente por el DAO.
     * 
     * @param int $id Identificador del producto
     * @return int Número de votos
     */
    private function recuperaVotosProducto(int $id): int {
        
        $sql = "select count(*) from votos where idPr=:idProducto";
        $sth = $this->bd->prepare($sql);
        $sth->execute([":idProducto" => $id]);
        $votos = $sth->fetchColumn();
        return (int)$votos;
        
    }
    
    
     /**
     * Obtiene la suma total de puntos de un producto.
     * 
     * Si el producto no tiene votos, devuelve 0.
     * 
     * @param int $id Identificador del producto
     * @return int Suma total de puntos
     */
    private function recuperaPuntosProducto(int $id): int {
        
        $sql = "select sum(cantidad) from votos where idPr=:idProducto";
        $sth = $this->bd->prepare($sql);
        $sth->execute([":idProducto" => $id]);
        $puntos = $sth->fetchColumn();
        // Si no hay votos, sum() devuelve null
        return $puntos ? (int)$puntos : 0;
    }
   
}