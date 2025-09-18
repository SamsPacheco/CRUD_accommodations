<!-- <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">  <style>
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
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="card p-4">
    <h2 class="text-center mb-4">Registro</h2>
      <form method="POST" action="?action=register">
      <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Phone</label>
        <input type="phone" name="phone" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <input type="hidden" name="role_id" value="2">
      <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>
    <p class="text-center mt-2">
      ¿Ya tienes cuenta? 
      <a href="index.php?page=login">Ir a Login</a> 
    </p>
  </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
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
            height: 100vh;
        }
        .register-card {
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
        .btn-register {
            background: #0d1117;
            color: #fff;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-register:hover {
            background: #21262d;
        }
        .text-muted-custom {
            font-size: 0.85rem;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <h4 class="text-center mb-3">
            <i class="fa-solid fa-user-plus"></i> Registro de Usuario
        </h4>
        <p class="text-center text-muted">Crea una cuenta para acceder al sistema de alojamientos</p>

        <form method="POST" action="?action=register">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input type="text" name="name" id="nombre" class="form-control" placeholder="Tu nombre" required>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>
            </div>

            
            <!-- Contraseña -->
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="•••••" required>
              </div>
            </div>
            
            <!-- Teléfono -->
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="+503 7000 0000" required>
                </div>
            </div>

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-register">
                    <i class="fa-solid fa-user-plus"></i> Registrarse
                </button>
            </div>
        </form>

        <div class="text-center mt-3">
            <p class="mb-0">¿Ya tienes cuenta? 
                <a href="index.php?page=login" class="text-decoration-none">Inicia sesión</a>
            </p>
        </div>
        <p class="text-center text-muted-custom">
            <i class="fa-solid fa-shield-halved"></i> Tus datos estarán protegidos.
        </p>
    </div>
</body>
</html>
