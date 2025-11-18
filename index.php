<?php require 'database.php'; ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos alumnos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h1 class="text-center mb-4">📚 Base de datos alumnos</h1>

    <!-- Botón crear -->
    <div class="mb-3">
        <a href="crear.php" class="btn btn-primary">➕ Crear nuevo alumno</a>
    </div>

    <!-- Tabla con Bootstrap -->
    <table class="table table-striped table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM alumnos';
            foreach ($conexion->query($sql) as $fila):
            ?>
                <tr>
                    <td><?= htmlspecialchars($fila['nombre']); ?></td>
                    <td><?= htmlspecialchars($fila['apellido']); ?></td>
                    <td><?= htmlspecialchars($fila['email']); ?></td>
                    <td><?= htmlspecialchars($fila['edad']); ?></td>
                    <td>
                        <a href="editar.php?id=<?= $fila['id']; ?>" class="btn btn-warning btn-sm">✏ Editar</a>
                        <a href="eliminar.php?id=<?= $fila['id']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Seguro que deseas eliminar este alumno?');">🗑 Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
