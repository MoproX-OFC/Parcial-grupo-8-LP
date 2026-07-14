//Horangel


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Sistema de Usuarios</h1>
    <p>Iniciar Sesión</p>

    <form action="login.php" method="POST">

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Ingrese su usuario"
                minlength="4"
                maxlength="20"
                required>
        </div>

        <div class="form-group">
            <label for="clave">Contraseña</label>
            <input
                type="password"
                id="clave"
                name="clave"
                placeholder="Ingrese su contraseña"
                minlength="6"
                required>
        </div>

        <button type="submit">Iniciar Sesión</button>

    </form>

    <div class="link">
        <p>¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
    </div>

</div>

</body>
</html>
