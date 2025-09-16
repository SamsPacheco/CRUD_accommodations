<?php

// namespace App\Core;

// use PDO;
// use PDOException;

// class Database {
//     private static ?PDO $instance = null;

//     public static function getConnection(): PDO {
//         if (self::$instance === null) {
//             $config = require __DIR__ . '/../../config/config.php';
//             $db = $config['db'];

//             $dsn = "mysql:host={$db['host']};dbname={$db['name']}";

//             try {
//                 self::$instance = new PDO($dsn, $db['user'], $db['pass'], [
//                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                 ]);
//             } catch (PDOException $e) {
//                 die("Error de conexión: " . $e->getMessage());
//             }
//         }
//         return self::$instance;
//     }
// }


namespace App\Core;

use PDO;
use PDOException;

class Database {
    private string $host = 'bnvmqiowse0paufpztfx-mysql.services.clever-cloud.com';
    private string $db_name = 'bnvmqiowse0paufpztfx';
    private string $username = 'ursxzk4pmf2uawdg';
    private string $password = 'zuLgbfJ30UN9Eg0QhLUp';
    // private string $charset = 'utf8mb4';
    private static ?PDO $pdo = null;

    public function getConnection(): PDO {
        if (self::$pdo !== null) return self::$pdo;

        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";
        try {
            self::$pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return self::$pdo;
        } catch (PDOException $e) {
            // En dev mostrar error; en prod loggear y mostrar genérico
            throw $e;
        }
    }
}
