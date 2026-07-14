<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Sistema de Usuarios</h1>
    <p>Registro de Usuario</p>

    <form action="conexion.php" method="POST">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                placeholder="Ingrese su nombre"
                minlength="3"
                maxlength="30"
                required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input
                type="text"
                id="apellido"
                name="apellido"
                placeholder="Ingrese su apellido"
                minlength="3"
                maxlength="30"
                required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Ingrese un usuario"
                minlength="4"
                maxlength="20"
                required>
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="ejemplo@correo.com"
                required>
        </div>

        <div class="form-group">
            <label for="clave">Contraseña</label>
            <input
                type="password"
                id="clave"
                name="clave"
                placeholder="Ingrese una contraseña"
                minlength="6"
                required>
        </div>

        <div class="form-group">
            <label for="confirmar_clave">Confirmar contraseña</label>
            <input
                type="password"
                id="confirmar_clave"
                name="confirmar_clave"
                placeholder="Confirme la contraseña"
                minlength="6"
                required>
        </div>

        <button type="submit">Registrarse</button>

    </form>

    <div class="link">
        <p>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión</a></p>
    </div>

</div>

</body>
</html>