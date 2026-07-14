<?php
require_once 'conexion.php';

$id_minimo = 0; 
$limite = 50;

$sql = "SELECT id, nombre, apellido, usuario, email
        FROM usuarios 
        WHERE id > :id_minimo 
        ORDER BY id DESC 
        LIMIT :limite";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id_minimo', $id_minimo, PDO::PARAM_STR);
$stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de usuarios</title>
    </head>
<body>
    <h2>Datos registrados recientemente</h2>
    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $fila): ?>
            <tr>
                <td><?= htmlspecialchars($fila['id']) ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['apellido']) ?></td>
                <td><?= htmlspecialchars($fila['usuario']) ?></td>
                <td><?= htmlspecialchars($fila['email']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>