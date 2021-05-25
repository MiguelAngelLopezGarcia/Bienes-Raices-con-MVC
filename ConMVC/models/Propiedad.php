<?php 
namespace Model;

use mysqli;

class Propiedad extends ActiveRecord {
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 
    'estacionamiento', 'creado', 'vendedorId'];
    protected static $tabla = 'propiedades';

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar() {
        if(!$this->titulo) {
            static::$errores[] = 'El título de la propiedad está vacío';
        };

        if(!$this->precio) {
            static::$errores[] = 'El precio de la propiedad está vacío';
        };

        if(!$this->imagen){
            static::$errores[] = 'Debes seleccionar una imagen';
        };

        if(strlen($this->descripcion) < 50 ) {
            static::$errores[] = 'La descripción de la propiedad debe tener mínimo 50 caracteres';
        };

        if(!$this->habitaciones) {
            static::$errores[] = 'Debes indicar el número de habitaciones';
        };

        if(!$this->wc) {
            static::$errores[] = 'Debes indicar el número de baños';
        };

        if(!$this->estacionamiento) {
            static::$errores[] = 'Debes indicar el número de estacionamientos';
        };

        if(!$this->vendedorId) {
            static::$errores[] = 'Debes indicar quién es el vendedor';
        };

        return static::$errores;
    }
}

