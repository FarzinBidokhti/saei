<?php

namespace App\Support;

final class RoleNames
{
    public const OWNER       = 'owner';
    public const SUPER_ADMIN = 'super-admin';
    public const ADMIN       = 'admin';
    public const OPERATOR    = 'operator';

    public static function coreRoles(): array
    {
        return [
            self::OWNER,
            self::SUPER_ADMIN,
            self::ADMIN,
            self::OPERATOR
        ];
    }

    public static function labels(): array
    {
        return [
            self::OWNER       => 'Owner',
            self::SUPER_ADMIN => 'Super Admin',
            self::ADMIN       => 'Admin',
            self::OPERATOR    => 'Operator'
        ];
    }

    public static function label(string $role): string
    {
        return self::labels()[$role] ?? str($role)->headline()->toString();
    }
}
