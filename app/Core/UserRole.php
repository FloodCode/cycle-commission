<?php

namespace App\Core;

use Mockery\Exception;

class UserRole
{
    const USER = 0;
    const ADMIN = 1;
    const COMMISSION = 2;

    private static $nameToRoleMapping = [
        'user' => self::USER,
        'admin' => self::ADMIN,
        'commission' => self::COMMISSION
    ];

    public static function toCode($roleName)
    {
        if (!array_key_exists($roleName, self::$nameToRoleMapping))
        {
            throw new Exception('Role `' . $roleName . '` does not exists');
        }

        return self::$nameToRoleMapping[$roleName];
    }
}