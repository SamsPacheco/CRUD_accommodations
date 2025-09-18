<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Alojamientos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Alojamientos</h3>
      <?php if (!empty($_SESSION['user']) && (int)($_SESSION['user']['rol_id'] ?? 0) === 1): ?>
        <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=alojamiento_create" class="btn btn-success">Crear nuevo</a>
      <?php endif; ?>
    </div>

    <?php if (!empty($_SESSION['success'])): ?>
      <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <?php if (empty($list)): ?>
      <div class="alert alert-info">No hay alojamientos aún.</div>
    <?php else: ?>
      <div class="row g-3">
        <?php foreach ($list as $item): ?>
          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($item['title']) ?></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars(substr($item['description'], 0, 200))) ?></p>
                <p class="mb-1"><small>Dirección: <?= htmlspecialchars($item['address']) ?></small></p>
                <p class="mb-1"><small>Precio: $<?= htmlspecialchars($item['price']) ?></small></p>
                <p class="mb-0"><small>Creado por: <?= htmlspecialchars($item['creator_name'] ?? '—') ?></small></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</body>
</html>
