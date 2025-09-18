<!-- <?php
if (session_status() === PHP_SESSION_NONE) session_start();
use App\Helpers\AuthHelpers;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Crear alojamiento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card mx-auto" style="max-width:700px;">
      <div class="card-body">
        <h4 class="card-title">Crear alojamiento</h4>

        <?php if (!empty($_SESSION['error'])): ?>
          <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['success'])): ?>
          <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=alojamiento_store">
          <div class="mb-3">
            <label class="form-label">Título</label>
            <input class="form-control" name="title" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input class="form-control" name="address">
          </div>
          <div class="mb-3">
            <label class="form-label">Precio (USD)</label>
            <input class="form-control" name="price" type="number" step="0.01" value="0.00">
          </div>
          <button class="btn btn-primary">Crear</button>
          <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=alojamientos_index" class="btn btn-secondary ms-2">Volver</a>
        </form>

      </div>
    </div>
  </div>
</body>
</html> -->

<!-- <div class="container mt-5">
    <h2>Crear nuevo alojamiento</h2>
    <form method="POST" action="index.php?action=store_alojamiento">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" required></textarea>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" name="precio" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div> -->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear nuevo alojamiento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg w-100" style="max-width: 600px;">
      <div class="card-body p-4">
        <h2 class="text-center mb-4">Crear nuevo alojamiento</h2>
        
        <form action="index.php?action=accommodation_store" method="POST">
          <!-- Título -->
          <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control rounded-3" id="titulo" name="title" placeholder="Ej: Casa en la playa" required>
          </div>

          <!-- Descripción -->
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control rounded-3" id="descripcion" name="description" rows="4" placeholder="Describe brevemente el alojamiento..." required></textarea>
          </div>

          <!-- Ubicación -->
          <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control rounded-3" id="ubicacion" name="location" placeholder="Ej: San Salvador, El Salvador" required>
          </div>

          <!-- Precio -->
          <div class="mb-3">
            <label for="precio" class="form-label">Precio (USD)</label>
            <input type="number" class="form-control rounded-3" id="precio" name="price" placeholder="Ej: 100" min="0" required>
          </div>

          <!-- Botón -->
          <div class="d-grid">
            <button type="submit" class="btn btn-primary rounded-3">
              Crear Alojamiento
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


