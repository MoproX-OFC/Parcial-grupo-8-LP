<?php
session_start();

$usuarioInput = $claveInput = "";
$mensaje = "";
$errores = [];

$usuarios = [
    "admin" => [
        "nombre" => "Administrador",
        "email" => "admin@empresa.com",
        "password" => password_hash("123456", PASSWORD_BCRYPT)
    ]
];

function limpiar($valor) {
    return trim($valor ?? "");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $usuarioInput = limpiar($_POST["usuario"] ?? "");
        $claveInput = $_POST["clave"] ?? "";

        if ($usuarioInput === "") {
            $errores[] = "El usuario o correo es obligatorio.";
        }

        if ($claveInput === "") {
            $errores[] = "La contraseña es obligatoria.";
        } elseif (strlen($claveInput) < 6) {
            $errores[] = "La contraseña debe tener al menos 6 caracteres.";
        }

        if (empty($errores)) {
            $usuarioEncontrado = null;

            foreach ($usuarios as $usuario => $datos) {
                if ($usuarioInput === $usuario || $usuarioInput === $datos["email"]) {
                    $usuarioEncontrado = $datos;
                    break;
                }
            }

            if ($usuarioEncontrado && password_verify($claveInput, $usuarioEncontrado["password"])) {
                session_regenerate_id(true);
                $_SESSION["usuarioActivo"] = [
                    "usuario" => $usuarioInput,
                    "nombre" => $usuarioEncontrado["nombre"]
                ];
                $mensaje = "Inicio de sesión correcto.";
            } else {
                $errores[] = "Credenciales inválidas.";
            }
        }
    } catch (Throwable $e) {
        $errores[] = "No fue posible procesar la solicitud en este momento.";
    }
}

if (isset($_GET["logout"])) {
    session_destroy();
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Estudiante 3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        .contenedor {
            max-width: 420px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #2e86de;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #1f6fb2;
        }

        .mensaje {
            padding: 10px;
            background: #dff0d8;
            color: #3c763d;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .errores {
            padding: 10px 15px;
            background: #f8d7da;
            color: #721c24;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .sesion {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Estudiante 3 - Seguridad</h1>

        <?php if ($mensaje !== "") : ?>
            <div class="mensaje"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>

        <?php if (!empty($errores)) : ?>
            <div class="errores">
                <ul>
                    <?php foreach ($errores as $error) : ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["usuarioActivo"])) : ?>
            <div class="sesion">
                <p>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuarioActivo"]["nombre"]); ?>.</p>
                <a href="?logout=1">Cerrar sesión</a>
            </div>
        <?php else : ?>
            <form method="post" action="">
                <label for="usuario">Usuario o Email</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuarioInput); ?>" required>

                <label for="clave">Clave</label>
                <input type="password" id="clave" name="clave" required>

                <button type="submit">Ingresar</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>

