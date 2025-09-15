<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

// Test conexión DB
$db = Database::getConnection();
echo "Conexión a Clever-Cloud exitosa 🚀";
