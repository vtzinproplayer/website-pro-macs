<?php
// config/database.php — PrestaShop-like PDO wrapper (PHP 8.2)
return [
    'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'port' => $_ENV['DB_PORT'] ?? 3306,
    'name' => $_ENV['DB_NAME'] ?? 'elite_digital',
    'user' => $_ENV['DB_USER'] ?? 'root',
    'pass' => $_ENV['DB_PASS'] ?? '',
    'prefix' => $_ENV['DB_PREFIX'] ?? 'ps_',
    'charset' => 'utf8mb4',
];

class Db {
    private static ?PDO $pdo = null;
    public static function get(): PDO {
        if (self::$pdo) return self::$pdo;
        $c = require __DIR__.'/database.php';
        if (is_array($c) && isset($c['host'])) $cfg = $c; else $cfg = $c;
        // allow .env overload
        $dsn = "mysql:host={$cfg['host']};port={$cfg['port']};dbname={$cfg['name']};charset={$cfg['charset']}";
        self::$pdo = new PDO($dsn, $cfg['user'], $cfg['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        return self::$pdo;
    }
}
