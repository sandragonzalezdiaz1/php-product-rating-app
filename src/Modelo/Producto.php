<?php

namespace App\Modelo;

/**
 * Clase que representa un producto.
 * 
 * Contiene la información básica del producto y datos adicionales
 * relacionados con sus valoraciones (número de votos y puntos totales).
 */
class Producto{
    
    /**
     * Identificador del producto
     * @var int
     */
    private int $id;
    
     /**
     * Nombre del producto
     * @var string
     */
    private string $nombre;
    
      /**
     * Nombre corto del producto
     * @var string
     */
    private string $nombreCorto;
    
    /**
     * Descripción del producto
     * @var string
     */
    private string $descripcion;
    
    /**
     * Precio de venta del producto
     * @var float
     */
    private float $pvp;
    
     /**
     * Familia a la que pertenece el producto
     * @var string
     */
    private string $familia;
    
    /**
     * Número de votos del producto.
     * Se inicializa a 0 y posteriormente se carga desde el DAO.
     * 
     * @var int
     */
    private int $votos = 0;
    
    /**
     * Puntuación total del producto.
     * Se inicializa a 0 y posteriormente se calcula desde la tabla votos.
     * 
     * @var int
     */
    private int $puntos = 0;
    
    
    /**
     * Constructor de la clase Producto.
     * 
     * Los parámetros son opcionales para permitir la creación del objeto
     * sin valores iniciales. Esto facilita la hidratación automática desde
     * la base de datos mediante PDO::FETCH_CLASS.
     * 
     * Los atributos votos y puntos no se inicializan aquí porque se obtienen
     * posteriormente mediante consultas a la tabla votos.
     * 
     * @param string|null $nombre Nombre del producto
     * @param string|null $nombreCorto Nombre corto
     * @param string|null $descripcion Descripción del producto
     * @param float|null $pvp Precio de venta
     * @param string|null $familia Familia del producto
     */
    public function __construct(?string $nombre = null, ?string $nombreCorto = null, ?string $descripcion = null, ?float $pvp = null, ?string $familia = null) {
        // Solo se asignan valores si el constructor recibe parámetros
        if (func_num_args() > 0) {
            $this->nombre = $nombre;
            $this->nombreCorto = $nombreCorto;
            $this->descripcion = $descripcion;
            $this->pvp = $pvp;
            $this->familia = $familia;
        }
    }

    
    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getNombreCorto(): string {
        return $this->nombreCorto;
    }

    public function getPvp(): float {
        return $this->pvp;
    }

    public function getFamilia(): string {
        return $this->familia;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setNombreCorto(string $nombreCorto): void {
        $this->nombreCorto = $nombreCorto;
    }

    public function setPvp(float $pvp): void {
        $this->pvp = $pvp;
    }

    public function setFamilia(string $familia): void {
        $this->familia = $familia;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    /**
     * Obtiene el número total de votos del producto.
     * 
     * @return int Número de votos
     */
    public function getVotos(): int {
        return $this->votos;
    }

    /**
     * Obtiene la puntuación total del producto.
     * 
     * @return int Puntos acumulados
     */
    public function getPuntos(): int {
        return $this->puntos;
    }

     /**
     * Establece el número de votos del producto.
     * Este valor se asigna desde el DAO.
     * 
     * @param int $votos Número de votos
     */
    public function setVotos(int $votos): void {
        $this->votos = $votos;
    }

    
    /**
     * Establece la puntuación total del producto.
     * Este valor se calcula a partir de la tabla votos.
     * 
     * @param int $puntos Puntos totales
     */
    public function setPuntos(int $puntos): void {
        $this->puntos = $puntos;
    }
}


