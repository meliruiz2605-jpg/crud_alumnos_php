<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "INSERT INTO alumnos (nombre, apellido, email, edad)
            VALUES (:nombre, :apellido, :email, :edad)";

    $stmt = $conexion->prepare($sql);

    if ($stmt->execute([
        ':nombre' => $_POST['nombre'],
        ':apellido' => $_POST['apellido'],
        ':email' => $_POST['email'],
        ':edad' => $_POST['edad']
    ])) {
        header("Location: index.php?mensaje=creado");
        exit();
    } else {
        echo "Error al guardar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2 class="text-center mb-4">➕ Registrar nuevo alumno</h2>

<div class="card shadow p-4 mx-auto" style="max-width: 600px;">
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido:</label>
        <input type="text" name="apellido" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Edad:</label>
        <input type="number" name="edad" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between">
        <a href="index.php" class="btn btn-secondary">⬅ Volver</a>
        <button class="btn btn-primary">Guardar alumno</button>
    </div>
</form>
</div>

</body>
</html>
