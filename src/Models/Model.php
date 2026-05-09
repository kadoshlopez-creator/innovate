<?php

namespace App\Models;

use App\Core\Database;
use PDO;

abstract class Model
{
    protected static string $table = '';

    /**
     * Columns allowed in ORDER BY clauses.
     * Subclasses should override this to add domain-specific columns.
     * An empty array means only 'id' is allowed.
     */
    protected static array $allowedOrderBy = ['id', 'created_at', 'updated_at'];

    protected static function db(): PDO
    {
        return Database::getInstance();
    }

    public static function all(string $orderBy = 'id', string $dir = 'ASC'): array
    {
        $dir     = strtoupper($dir) === 'DESC' ? 'DESC' : 'ASC';
        $orderBy = static::sanitizeOrderBy($orderBy);
        $stmt    = static::db()->query("SELECT * FROM `" . static::$table . "` ORDER BY `{$orderBy}` {$dir}");
        return $stmt->fetchAll();
    }

    /**
     * Validate an ORDER BY column name against the model's whitelist.
     * Falls back to 'id' if the column is not allowed.
     */
    protected static function sanitizeOrderBy(string $column): string
    {
        $allowed = array_merge(['id'], static::$allowedOrderBy);
        return in_array($column, $allowed, true) ? $column : 'id';
    }

    public static function find(int $id): ?array
    {
        $stmt = static::db()->prepare("SELECT * FROM `" . static::$table . "` WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function findWhere(string $column, mixed $value): ?array
    {
        $stmt = static::db()->prepare("SELECT * FROM `" . static::$table . "` WHERE `{$column}` = ? LIMIT 1");
        $stmt->execute([$value]);
        return $stmt->fetch() ?: null;
    }

    public static function where(string $column, mixed $value): array
    {
        $stmt = static::db()->prepare("SELECT * FROM `" . static::$table . "` WHERE `{$column}` = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }

    public static function count(): int
    {
        $stmt = static::db()->query("SELECT COUNT(*) FROM `" . static::$table . "`");
        return (int) $stmt->fetchColumn();
    }

    public static function delete(int $id): bool
    {
        $stmt = static::db()->prepare("DELETE FROM `" . static::$table . "` WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
