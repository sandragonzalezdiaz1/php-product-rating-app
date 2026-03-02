<?php

namespace App\DAO;

use PDO;
use App\Modelo\Producto;




class ProductoDao {

    private PDO $bd;

    
    public function __construct(PDO $bd) {
        $this->bd = $bd;
    }
    
    
    public function crea(Producto $producto): bool {
       
    }

    public function modifica(Producto $producto): bool {
       
    }

    public function elimina(int $id): bool {
        
    }
    
    
    
    public function recuperaProductos(): array {
        
        $this->bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        
        $sql = "select id, nombre, nombre_corto as nombreCorto, descripcion, pvp, familia from productos order by nombre";
        $sth = $this->bd->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $productos = $sth->fetchAll();
        
        // Recorrer cada producto para recuperar los votos y puntos de ese producto y poder mostrarlos de nuevo en la pag
        foreach ($productos as $producto){
            $votos = $this->recuperaVotosProducto($producto->getId());
            $puntos = $this->recuperaPuntosProducto($producto->getId());
            
            $producto->setVotos($votos);
            $producto->setPuntos($puntos);
        }
        
        return $productos;
       
    }
    
    
    
    
    
    public function recuperaProductoPorId(int $id): ?Producto {
        
        $this->bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        
        $sql = "select id, nombre, nombre_corto as nombreCorto, descripcion, pvp, familia from productos where id=:id";
        $sth = $this->bd->prepare($sql);
        $sth->execute([":id" => $id]);
        $sth->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $producto = ($sth->fetch()) ?: null;
        
        // Si existe el producto recuperamos sus votos y puntos
        if($producto){
            $votos = $this->recuperaVotosProducto($producto->getId());
            $puntos = $this->recuperaPuntosProducto($producto->getId());
            
            $producto->setVotos($votos);
            $producto->setPuntos($puntos);
           
        }
        
        return $producto;
        
    }
    
    // Tienen que ser metodos privados para que no se pueda acceder desde fuera del objeto instanciado, solo en sus metodos
    
    
    private function recuperaVotosProducto(int $id): int {
        
        $sql = "select count(*) from votos where idPr=:idProducto";
        
        $sth = $this->bd->prepare($sql);
        $sth->execute([":idProducto" => $id]);
        
        //$obj = $sth->fetch(PDO::FETCH_OBJ);
        //$total = $obj->total;  // Habria que poner en la consulta "count(*) as total"
        
        $votos = $sth->fetchColumn();
        return (int)$votos;
       
    }
    
    
    private function recuperaPuntosProducto(int $id): int {
        
        $sql = "select sum(cantidad) from votos where idPr=:idProducto";
        
        $sth = $this->bd->prepare($sql);
        $sth->execute([":idProducto" => $id]);
        
        $puntos = $sth->fetchColumn();
        
        //Si no hay votos, SUM() devuelve null -> se convierte a 0
        return $puntos ? (int)$puntos : 0;
        
    }
   
}