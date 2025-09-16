<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ?action=login");
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4 text-center" style="max-width: 400px; width: 100%;">
        <h3 class="mb-3">¡Hola, <?= htmlspecialchars($user['name']) ?> 👋!</h3>
        <p>Has iniciado sesión con el rol <b><?= htmlspecialchars($user['role_id']) ?></b></p>
        <a href="?action=logout" class="btn btn-danger">Cerrar sesión</a>
    </div>
</body>
</html>
