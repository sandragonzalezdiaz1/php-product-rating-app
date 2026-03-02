<?php

namespace App\Modelo;

/**
 * Clase que representa un voto realizado por un usuario sobre un producto.
 * 
 * Cada objeto Voto contiene:
 * - La cantidad o valoración asignada
 * - El identificador del producto votado
 * - El identificador del usuario que realiza el voto (su nombre) 
 */
class Voto {

    /**
     * Valor del voto (puntuación de 1 a 5)
     * 
     * @var int
     */
    private int $cantidad;
    
    /**
     * Identificador del producto votado
     * 
     * @var int
     */
    private int $idProducto;
    
    /**
     * Identificador del usuario que realiza el voto
     * 
     * @var string
     */
    private string $idUsuario;

    
    /**
     * Constructor de la clase Voto.
     * 
     * Los parámetros son opcionales para permitir la creación del objeto
     * sin valores iniciales. Esto facilita la hidratación automática desde
     * la base de datos cuando se utiliza PDO::FETCH_CLASS.
     * 
     * @param int|null $cantidad Valor del voto
     * @param int|null $idProducto Identificador del producto
     * @param string|null $idUsuario Identificador del usuario
     */
    public function __construct(?int $cantidad = null, ?int $idProducto = null, ?string $idUsuario = null) {
        // Se comprueba si se han pasado argumentos al constructor
        if (func_num_args() > 0) {
            $this->cantidad = $cantidad;
            $this->idProducto = $idProducto;
            $this->idUsuario = $idUsuario;
        }
    }

    /**
     * Obtiene el valor del voto.
     * 
     * @return int Puntuación asignada al producto
     */
    public function getCantidad(): int {
        return $this->cantidad;
    }

    /**
     * Obtiene el identificador del producto votado.
     * 
     * @return int Id del producto
     */
    public function getIdProducto(): int {
        return $this->idProducto;
    }

    /**
     * Obtiene el identificador del usuario que realizó el voto.
     * 
     * @return string Id o nombre del usuario
     */
    public function getIdUsuario(): string {
        return $this->idUsuario;
    }

    /**
     * Establece el valor del voto.
     * 
     * @param int $cantidad Nueva puntuación
     */
    public function setCantidad(int $cantidad): void {
        $this->cantidad = $cantidad;
    }

    /**
     * Establece el identificador del producto.
     * 
     * @param int $idProducto Id del producto
     */
    public function setIdProducto(int $idProducto): void {
        $this->idProducto = $idProducto;
    }

     /**
     * Establece el identificador del usuario.
     *
     * @param string $idUsuario Id del usuario
     */
    public function setIdUsuario(string $idUsuario): void {
        $this->idUsuario = $idUsuario;
    }
}