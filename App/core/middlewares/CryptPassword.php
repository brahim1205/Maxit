<?php

namespace App\Core\Middleware;

class CryptPassword
{
    public static function handle(): void
    {
        if (isset($_POST['password'])) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }
}
