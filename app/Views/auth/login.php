<!-- <!DOCTYPE html>
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

</html> -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-card {
            max-width: 500px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background: #fff;
            padding: 2rem;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-login {
            background: #0d1117;
            color: #fff;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-login:hover {
            background: #21262d;
        }
        .text-muted-custom {
            font-size: 0.85rem;
            margin-top: 15px;
        }

        /* Ajustes responsivos */
        @media (max-width: 768px) {
            .login-card {
                padding: 1rem; /* Reducir padding en móviles */
                margin: 1rem; /* Margen alrededor del card */
            }
            .input-group-text {
                font-size: 0.9rem; /* Reducir tamaño de íconos en inputs */
            }
            .form-label {
                font-size: 0.9rem; /* Reducir tamaño de etiquetas */
            }
            .btn-login {
                font-size: 0.9rem; /* Reducir tamaño del botón */
                padding: 0.5rem; /* Ajustar padding del botón */
            }
            .text-muted-custom {
                font-size: 0.75rem; /* Reducir tamaño del texto mutado */
            }
            .form-check-label {
                font-size: 0.9rem; /* Ajustar tamaño de la etiqueta de "Recordarme" */
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h4 class="text-center mb-3">
            <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión
        </h4>
        <p class="text-center text-muted">Ingresa tus credenciales para acceder al sistema</p>

        <form method="POST" action="?action=login">
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="•••••" required>
                </div>
                <div class="text-end mt-1">
                    <a href="#" class="text-decoration-none text-primary">¿Olvidaste tu contraseña?</a>
                </div>
            </div>

            <!-- Recordarme -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="remember">
                <label class="form-check-label" for="remember"> Mantener sesión iniciada </label>
            </div>

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión
                </button>
            </div>
        </form>

        <div class="text-center mt-3">
            <p class="mb-0 text-center mt-2">¿No tienes cuenta? <a href="?action=register">Regístrate aquí</a></p>
        </div>
        <p class="text-center text-muted-custom">
            <i class="fa-solid fa-shield-halved"></i> Este es un sistema seguro. Tus datos están protegidos.
        </p>
    </div>
</body>
</html>