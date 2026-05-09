<?php

namespace App\Models;

class Contact extends Model
{
    protected static string $table = 'contacts';

    protected static array $allowedOrderBy = [
        'id', 'name', 'email', 'read_at', 'created_at',
    ];

    public static function create(array $data): int
    {
        $stmt = static::db()->prepare(
            "INSERT INTO contacts (name, email, phone, company, service, message)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone']   ?? '',
            $data['company'] ?? '',
            $data['service'] ?? '',
            $data['message'],
        ]);
        return (int) static::db()->lastInsertId();
    }

    public static function unreadCount(): int
    {
        $stmt = static::db()->query("SELECT COUNT(*) FROM contacts WHERE read_at IS NULL");
        return (int) $stmt->fetchColumn();
    }

    public static function markRead(int $id): void
    {
        $stmt = static::db()->prepare("UPDATE contacts SET read_at = NOW() WHERE id = ? AND read_at IS NULL");
        $stmt->execute([$id]);
    }

    public static function paginate(int $page = 1, int $perPage = 20): array
    {
        $offset = ($page - 1) * $perPage;
        $stmt   = static::db()->prepare(
            "SELECT * FROM contacts ORDER BY created_at DESC LIMIT ? OFFSET ?"
        );
        $stmt->execute([$perPage, $offset]);
        return $stmt->fetchAll();
    }

    public static function recent(int $limit = 5): array
    {
        $stmt = static::db()->prepare(
            "SELECT * FROM contacts ORDER BY created_at DESC LIMIT ?"
        );
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }
}
