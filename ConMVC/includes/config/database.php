<?php

function conectardDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices');

    if (!$db){
        echo 'Error, no se pudo conectar';
        exit;
    };

    return $db;
};