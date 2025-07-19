<?php
use App\Core\Database;

$db = Database::getInstance()->getPDO();

$stmt = $db->query('SELECT NOW()');
echo $stmt->fetchColumn();
