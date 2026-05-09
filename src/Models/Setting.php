<?php

namespace App\Models;

class Setting extends Model
{
    protected static string $table = 'settings';

    protected static array $allowedOrderBy = [
        'id', 'key', 'group', 'created_at', 'updated_at',
    ];

    private static array $cache = [];

    public static function get(string $key, string $default = ''): string
    {
        if (array_key_exists($key, self::$cache)) {
            return self::$cache[$key];
        }

        $stmt = static::db()->prepare("SELECT value FROM settings WHERE `key` = ? LIMIT 1");
        $stmt->execute([$key]);
        $value = $stmt->fetchColumn();

        self::$cache[$key] = ($value !== false) ? $value : $default;
        return self::$cache[$key];
    }

    public static function set(string $key, string $value): void
    {
        $stmt = static::db()->prepare(
            "INSERT INTO settings (`key`, value) VALUES (?, ?)
             ON DUPLICATE KEY UPDATE value = VALUES(value), updated_at = NOW()"
        );
        $stmt->execute([$key, $value]);
        self::$cache[$key] = $value;
    }

    public static function setMany(array $pairs): void
    {
        foreach ($pairs as $key => $value) {
            static::set((string) $key, (string) $value);
        }
    }

    public static function getGroup(string $group): array
    {
        $stmt = static::db()->prepare("SELECT `key`, value FROM settings WHERE `group` = ?");
        $stmt->execute([$group]);
        $result = [];
        foreach ($stmt->fetchAll() as $row) {
            $result[$row['key']] = $row['value'];
            self::$cache[$row['key']] = $row['value'];
        }
        return $result;
    }

    public static function all(string $orderBy = 'key', string $dir = 'ASC'): array
    {
        $dir     = strtoupper($dir) === 'DESC' ? 'DESC' : 'ASC';
        $orderBy = static::sanitizeOrderBy($orderBy);
        $stmt    = static::db()->query("SELECT * FROM settings ORDER BY `{$orderBy}` {$dir}");
        return $stmt->fetchAll();
    }
}
