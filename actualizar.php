<?php
require "database.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['edad'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $edad = $_POST['edad'];

        $sql = "UPDATE alumnos SET nombre = :nombre, apellido = :apellido, email = :email, edad = :edad WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: index.php?mensaje=Usuario actualizado con éxito");
            exit();
        } else {
            echo "Error al actualizar el usuario.";
        }
    } else {
        echo "Datos incompletos.";
    }
} else {
    echo "Método no permitido.";
}