<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?Database $instance = null;
    public ?PDO $pdo = null;

    private function __construct()
    {
        $dsn = 'pgsql:host=localhost;port=5433;dbname=maxitdb';

        try {
            $this->pdo = new PDO($dsn, 'pguser', 'pgpassword');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPDO(): mixed
    {
        return $this->pdo;
    }
}
