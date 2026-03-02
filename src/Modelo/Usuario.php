<?php

namespace App\Modelo;

/**
 * Clase que representa a un usuario del sistema.
 * 
 * Contiene la información necesaria para la autenticación:
 * - nombre de usuario
 * - contraseña (almacenada en forma cifrada o hash)
 */
class Usuario {
    
     /**
     * Nombre de usuario (identificador del usuario)
     * 
     * @var string
     */
    private string $usuario;
    
    /**
     * Contraseña del usuario
     * 
     * @var string
     */
    private string $pass;

    
    /**
     * Constructor de la clase Usuario.
     * 
     * @param string|null $usuario Nombre de usuario
     * @param string|null $pass Contraseña del usuario
     */
    public function __construct(?string $usuario = null, ?string $pass = null) {
        if (func_num_args() > 0) {
            $this->usuario = $usuario;
            $this->pass = $pass;
        }
    }
    
    
     /**
     * Obtiene el nombre de usuario.
     * 
     * @return string Nombre de usuario
     */
    public function getUsuario(): string {
        return $this->usuario;
    }

    /**
     * Establece el nombre de usuario.
     * 
     * @param string $usuario Nombre de usuario
     */
    public function setUsuario(string $usuario): void {
        $this->usuario = $usuario;
    }
    
    /**
     * Obtiene la contraseña del usuario.
     * 
     * @return string Contraseña del usuario
     */
    public function getPass(): string {
        return $this->pass;
    }

    /**
     * Establece la contraseña del usuario.
     * 
     * @param string $pass Contraseña del usuario
     */
    public function setPass(string $pass): void {
        $this->pass = $pass;
    }
}
