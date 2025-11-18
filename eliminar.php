<?php
require 'database.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = 'DELETE FROM alumnos WHERE id = :id';
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()) {
        header("Location: index.php?mensaje=Usuario eliminado con éxito");
        exit();
    } else {
        echo "Error al eliminar el usuario.";
    }
} else {
    die('ID de usuario no proporcionado');
}