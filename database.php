<?php
$confi  = require 'confi.php';
try {
    $conexion = new PDO(
        'mysql:host=' . $confi['db']['host'] . ';dbname=' . $confi['db']['dbname']. ';charset=utf8',
        $confi['db']['user'],
        $confi['db']['pass'],
        $confi['db']['options']
    );
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}