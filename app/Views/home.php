<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['user'];
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
            overflow: hidden;
        }

        .main_container::-webkit-scrollbar {
            display: none;
        }

        .sidebar {
            height: 100vh;
            background: #fff;
            border-right: 1px solid #dee2e6;
            padding: 1rem;
            position: relative;
            height: 100dvh;
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

        .btn-outline-red {
            color: #dc3545;
            border-color: #dc3545;
            background-color: transparent;
        }

        .btn-outline-red:hover {
            color: #fff;
            background-color: #f3cdd1ff;
            border-color: #dc3545;
        }

        .btn-outline-red[disabled] {
            color: #e50a24ff;
            border-color: #dc3545;
            opacity: 0.65;
            cursor: not-allowed;
            background-color: #f0eeeeff;
        }

        /* Barra de navegación para móviles */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #fff;
            padding: 0.5rem;
            z-index: 1000;
            border-bottom: 1px solid #dee2e6;
        }

        .mobile-nav .nav-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 0.5rem;
            padding: 0.4rem 0.3rem;
            border-radius: 8px;
            color: #333;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .mobile-nav .nav-btn i {
            margin-right: 0.3rem;
        }

        .mobile-nav .nav-btn.active {
            background-color: #e9ecef;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .mobile-nav {
                display: flex;
                justify-content: center;
            }


            .card-body {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-body form {
                margin-top: 10px;
                width: 100%;
            }

            .btn-sm {
                width: 100%;
            }
        }

        @media (min-width: 768px) {
            .mobile-nav {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Barra de navegación para móviles -->
            <div class="mobile-nav">
                <a href="#" class="nav-btn active">
                    <i class="fa-solid fa-house"></i> Alojamientos
                </a>
                <a href="?action=favorites" class="nav-btn">
                    <i class="fa-solid fa-heart"></i> Favoritos
                </a>
                <a href="?action=logout" class="nav-btn text-danger">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                </a>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4 col-lg-2 d-none d-md-block sidebar pt-3">
                <h5 class="text-center mb-4">👋 Hola, <?= htmlspecialchars($user['name']) ?> </h5>
                <hr />
                <nav class="nav flex-column">
                    <a href="#" class="nav-link active">
                        <i class="fa-solid fa-house"></i> Alojamientos
                    </a>
                    <a href="?action=favorites" class="nav-link">
                        <i class="fa-solid fa-heart"></i> Favoritos
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
            <div class="col-12 col-md-8 col-lg-10 p-4 main-content overflow-y-auto main_container" style="height: 100dvh;">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Alojamientos</h4>
                    <?php if ($_SESSION['user']['rol_id'] == 1): ?>
                        <a href="index.php?action=accommodation_create" class="btn btn-primary mb-3"> <i
                                class="fa-solid fa-circle-plus"></i> Nuevo Alojamiento</a>
                    <?php endif; ?>
                </div>
                <!-- Card alojamiento -->
                <?php foreach ($accommodation as $a): ?>

                    <div class="card card-custom mb-3 col-sm-12">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title mb-1"><?= htmlspecialchars($a['title']) ?></h5>
                                <p class="mb-1 text-muted">
                                    <i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($a['location']) ?>
                                </p>
                                <p class="text-muted">
                                    <?= htmlspecialchars($a['description']) ?>
                                </p>
                            </div>

                            <?php if (isset($_SESSION['user']['rol_id']) && $_SESSION['user']['rol_id'] == 2): ?>
                                <form method="POST"
                                    action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=add_favorite"
                                    style="display:inline">
                                    <input type="hidden" name="accommodation_id" value="<?= (int) $a['accommodation_id'] ?>">
                                    <?php
                                    $isFavorite = in_array($a['accommodation_id'], $favoriteIds ?? []);
                                    $buttonClass = $isFavorite ? 'btn-outline-red' : 'btn-outline-success';
                                    $iconClass = $isFavorite ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
                                    $buttonDisabled = $isFavorite ? 'disabled' : '';
                                    ?>
                                    <button type="submit" class="btn <?= $buttonClass ?> btn-sm" <?= $buttonDisabled ?>>
                                        <i class="<?= $iconClass ?>"></i> <?= $isFavorite ? 'Ya en favoritos' : 'Guardar favorito' ?>
                                    </button>
                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                    
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</body>

</html>