<?php

namespace App\DAO;

use PDO;
use App\Modelo\Voto;

/**
 * Clase DAO para la gestión de los votos en la base de datos
 */
class VotoDao {
    
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
    
    
    /**
     * Inserta un nuevo voto en la base de datos.
     * 
     * @param Voto $voto Objeto Voto con los datos a almacenar
     * 
     * @return bool true si la inserción se realiza correctamente,
     *              false en caso contrario
     */
    public function crea(Voto $voto): bool {
        
        $sql = "insert into votos(cantidad, idPr, idUs) values (:cantidad, :idProducto, :idUsuario)";
        $sth = $this->bd->prepare($sql);
        $resultado = $sth->execute([":cantidad" => $voto->getCantidad(), ":idProducto" => $voto->getIdProducto(), ":idUsuario" => $voto->getIdUsuario()]);
        return $resultado;
    }
    
    
    /**
    * Comprueba si existe un voto de un usuario para un producto.
    * 
    * @param Voto $voto Objeto Voto a comprobar
    * 
    * @return bool true si el voto existe, false en caso contrario
    */
    public function existeVoto(Voto $voto): bool {
        
        $sql = "select * from votos where idPr=:idProducto and idUs=:idUsuario";
        $sth = $this->bd->prepare($sql);
        $sth->execute([":idProducto" => $voto->getIdProducto(), ":idUsuario" => $voto->getIdUsuario()]);
        // rowCount() devuelve el número de filas encontradas
        // Si es distinto de 0, significa que el voto existe en la base de datos
        return ($sth->rowCount() !== 0); 
        
    }
    
}
