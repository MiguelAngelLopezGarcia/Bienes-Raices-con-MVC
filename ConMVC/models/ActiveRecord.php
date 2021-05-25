<?php

namespace Model;

class ActiveRecord {
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    protected static $errores = [];

    public static function setDb($database) {
        self::$db = $database;
    }

    public static function all($limite=false) {
        $limite ? $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $limite : $query = "SELECT * FROM " . static::$tabla;
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function consultarSQL($query) {
        $resultado =  self::$db->query($query);

        $array = [];

        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar memoria
        $resultado->free();

        return $array;
    }

    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key=>$value){
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public function guardar() {
        is_null($this->id) ? $this->crear() : $this->actualizar();
    }

    public function crear() {
        // Sanitizar datos de entrada
        $atributos = $this->sanitizarAtributos();

        // Insertar en base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "')";
    
        $resultado = self::$db->query($query);

        $this->volverIndex($resultado, '1');
    }

    public function actualizar() {
        // Sanitizar datos de entrada
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key=>$value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id= '" . self::$db->escape_string($this->id) . "' LIMIT 1";

        $resultado = self::$db->query($query);
        $this->volverIndex($resultado, '2');
    }

    public function setImage($imagen) {
        //Elimina imagen previa si existe
        if(!is_null($this->id)) {
            $this->borrarImagen();
        }

        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    public static function getErrores() {
        return static::$errores;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    public function sincronizar($args = []) {
        foreach($args as $key=>$value) {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public function borrarImagen() {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public function eliminar() {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $this->borrarImagen();
        $resultado = self::$db->query($query); 
        $this->volverIndex($resultado, '3');
    }

    public function volverIndex($resultado, $id) {
        if($resultado) {
            header('Location: /admin?resultado=' . $id);
        }
    }

}