<?php
require 'database.php';

if (!isset($_GET['id'])) {
    die("ID inválido.");
}

$id = $_GET['id'];

// Consultar alumno
$stmt = $conexion->prepare("SELECT * FROM alumnos WHERE id = ?");
$stmt->execute([$id]);
$alumno = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$alumno) {
    die("Alumno no encontrado.");
}

// Actualizar datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE alumnos SET nombre=?, apellido=?, email=?, edad=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['email'],
        $_POST['edad'],
        $id
    ]);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h2 class="text-center mb-4">✏ Editar alumno</h2>

    <div class="card shadow p-4 mx-auto" style="max-width: 600px;">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?= $alumno['nombre'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" value="<?= $alumno['apellido'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?= $alumno['email'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Edad:</label>
                <input type="number" name="edad" class="form-control" value="<?= $alumno['edad'] ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">⬅ Volver</a>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
        </form>
    </div>

</body>
</html>
