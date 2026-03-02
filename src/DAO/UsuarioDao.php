<?php

namespace App\DAO;

use PDO;
use App\Modelo\Usuario;


/**
 * Clase de acceso a datos para la entidad Usuario.
 * 
 * Se encarga de realizar las operaciones CRUD sobre la tabla usuarios.
 */
class UsuarioDao {
    
    /**
     * @var $bd Conexión a la Base de Datos
     */
    private PDO $bd;
    
     /**
     * Constructor de la clase UsuarioDAO
     * 
     * @param PDO $bd Conexión a la base de datos
     * 
     * @returns UsuarioDAO
     */
    public function __construct(PDO $bd) {
        $this->bd = $bd;
    }
    
    
    public function crea(Usuario $usuario): bool {
        
    }
    
    public function modifica(Usuario $usuario): bool {
        
    }
    
    public function elimina(Usuario $usuario): bool {
        
    }
    
    
    /**
     * Recupera un objeto Usuario a partir de sus credenciales.
     * 
     * La contraseña recibida se cifra utilizando el algoritmo SHA-256
     * para compararla con la almacenada en la base de datos.
     * 
     * @param string $nombre Nombre de usuario
     * @param string $password Contraseña en texto plano
     * 
     * @return Usuario|null Devuelve el usuario correspondiente si las credenciales son correctas,
     *                      o null si no existe coincidencia
     */
    public function recuperaPorCredencial(string $nombre, string $password): ?Usuario {
        // Se genera el hash SHA-256 de la contraseña introducida
        $passwordHashed = hash('sha256', $password);
        
        $sql = "select * from usuarios where usuario=:nombre and pass=:passwordHashed";
        // Preparación de la consulta para evitar inyección SQL
        $sth = $this->bd->prepare($sql);
        // Ejecución de la consulta con los parámetros correspondientes
        $sth->execute([":nombre"=> $nombre, ":passwordHashed" => $passwordHashed]);
        // Se indica que el resultado se devuelva como objeto de la clase Usuario
        $sth->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        $usuario = ($sth->fetch());
        return $usuario ?: null;
         
    }
    
}
    
    
