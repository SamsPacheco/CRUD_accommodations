<!DOCTYPE html>
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
    <!-- <form method="POST" action="index.php?page=doRegister"> -->
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
</html>
