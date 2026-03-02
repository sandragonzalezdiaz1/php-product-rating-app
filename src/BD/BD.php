<?php
namespace App\BD;

use PDO;

/**
 * Clase BD.
 * 
 * Gestiona la conexión a la base de datos utilizando el patrón Singleton,
 * asegurando que solo exista una única conexión PDO durante toda la aplicación.
 */
class BD
{
    /**
     * Instancia única de la conexión PDO.
     * 
     * @var PDO|null
     */
    protected static $bd = null;
    
    /** Datos de configuración de la base de datos */
    const DB_HOST = '127.0.0.1';
    const DB_PORT = '3306';
    const DB_DATABASE = 'valoraciones';
    const DB_USERNAME = 'gestor';
    const DB_PASSWORD = 'secreto';
    
    
    /**
     * Constructor privado.
     * 
     * Se define como privado para evitar la creación de instancias
     * desde fuera de la clase (patrón Singleton).
     * 
     * Inicializa la conexión PDO y configura el modo de errores
     * para que lance excepciones.
     */
    private function __construct()
    {
            self::$bd = new PDO("mysql:host=" . BD::DB_HOST . ";dbname=" . BD::DB_DATABASE, BD::DB_USERNAME, BD::DB_PASSWORD);
            // Configura PDO para lanzar excepciones en caso de error
            self::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Obtiene la conexión a la base de datos.
     * 
     * Si la conexión aún no existe, la crea.
     * 
     * @return PDO Instancia única de la conexión PDO
     */
    public static function getConexion()
    {
        if (!self::$bd) {
            new BD();
        }
        return self::$bd;
    }
}
