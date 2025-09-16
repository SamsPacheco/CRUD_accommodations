<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8f9fa;
        }

        .card {
            width: 400px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="card p-4">
        <h2 class="text-center mb-4">Login</h2>
        <!-- <form method="POST" action="index.php?page=doRegister"> -->
        <form method="POST" action="?action=login">
            <div class="mb-3">
                <label>Email:</label><br>
                <input class="form-control" type="email" name="email" required>
            </div>

            <div class="mb-3">

                <label>Contraseña:</label><br>
                <input class="form-control" type="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>

        <br>
        <p class="text-center mt-2">¿No tienes cuenta? <a href="?action=register">Regístrate aquí</a></p>
    </div>
</body>

</html>