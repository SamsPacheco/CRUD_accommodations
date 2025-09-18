<?php
namespace App\Helpers;

class AuthHelpers {
    public static function isLogged(): bool {
        if (session_status() === PHP_SESSION_NONE) session_start();
        return !empty($_SESSION['user']);
    }

    public static function currentUser(): ?array {
        if (self::isLogged()) return $_SESSION['user'];
        return null;
    }

    public static function isAdmin(): bool {
        $user = self::currentUser();
        if (!$user) return false;
        // asumimos rol id 1 = admin
        return (int)($user['rol_id'] ?? $user['rol_id'] ?? 0) === 1;
    }

    public static function requireAdmin(): void {
        if (!self::isAdmin()) {
            $script = htmlspecialchars($_SERVER['SCRIPT_NAME']);
            header("Location: {$script}?action=login");
            exit;
        }
    }
}
