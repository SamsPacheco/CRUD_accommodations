<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Alojamientos</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f5f7;
        }

        .sidebar {
            height: 100vh;
            background: #fff;
            border-right: 1px solid #dee2e6;
            padding: 1rem;
            position: relative;
        }

        .sidebar .nav-link {
            border-radius: 8px;
            margin-bottom: 8px;
            color: #333;
        }

        .sidebar .nav-link.active {
            background-color: #e9ecef;
            font-weight: 500;
        }

        .card-custom {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .btn-fav {
            border: none;
            background: none;
            color: #dc3545;
            font-size: 1.2rem;
        }

        .btn-fav:hover {
            color: #a71d2a;
        }

        .logout {
            position: absolute;
            bottom: 0;
            display: flex;
            justify-content: center;
            width: 90%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <div class="col-md-4 col-lg-2 d-none d-md-block sidebar pt-3">
                <h5 class="text-center mb-4">👋 Hola, <?= htmlspecialchars($user['name']) ?> </h5>
                <hr />
                <nav class="nav flex-column">
                    <a href="?action=home" class="nav-link">
                        <i class="fa-solid fa-house"></i> Alojamientos
                    </a>
                    <a href="?action=home" class="nav-link active">
                        <i class="fa-solid fa-heart"></i> favoritos
                    </a>
                </nav>

                <div class="mt-auto py-2 logout">
                    <hr />
                    <a href="?action=logout" class="nav-link text-danger">
                        <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                    </a>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-9 col-md-10 p-4">
               
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Mis alojamientos favoritos</h4>
                </div>

                <!-- Card alojamiento -->
                <?php foreach ($favorites as $a): ?>
                    <div class="card card-custom mb-3">
                        <div class="card-body d-flex justify-content-between align-items-start position-relative">
                            <div>
                                <h4 class="card-title mb-2"><?= htmlspecialchars($a['title']) ?></h4>
                                <p class="mb-1">
                                    <i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($a['location']) ?>
                                </p>
                                <p class="text-muted">
                                    <?= htmlspecialchars($a['description']) ?>
                                </p>
                          <p class="text-muted ">
                                    Precio: $<?= htmlspecialchars($a['price']) ?>
                                </p>
                                <p class="text-muted position-absolute bottom-0 end-0 px-3 py-2">
                                    Estado: <?= htmlspecialchars($a['state']) ?>
                                </p>
                            </div>

                            <div>
                                <button class="btn btn-outline-success btn-sm"> <i class="fa-solid fa-heart"></i> favoritos</button>
                                <form method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=remove_favorite" style="display:inline">
                                    <input type="hidden" name="accomodation_id" value="<?= (int)$a['accommodation_id'] ?>">
                                    <button class="btn btn-outline-danger btn-sm"> <i class="fa-solid fa-trash" aria-hidden="true"></i> Eliminar favorito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>      

                <!--
                <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>
                -->

