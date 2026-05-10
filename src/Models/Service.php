<?php

namespace App\Models;

class Service extends Model
{
    protected static string $table = 'services';

    protected static array $allowedOrderBy = [
        'id', 'title', 'slug', 'active', 'order_index', 'created_at', 'updated_at',
    ];

    public static function active(): array
    {
        $lang = current_lang();
        $sql = "SELECT *, 
                IFNULL(NULLIF(title_{$lang}, ''), title) as title,
                IFNULL(NULLIF(short_description_{$lang}, ''), short_description) as short_description,
                IFNULL(NULLIF(description_{$lang}, ''), description) as description
                FROM services WHERE active = 1 ORDER BY order_index ASC, id ASC";
        
        if ($lang === 'es') {
            $sql = "SELECT * FROM services WHERE active = 1 ORDER BY order_index ASC, id ASC";
        }

        $stmt = static::db()->query($sql);
        return $stmt->fetchAll();
    }

    public static function findBySlug(string $slug): ?array
    {
        $lang = current_lang();
        if ($lang === 'es') {
            return static::findWhere('slug', $slug);
        }

        $stmt = static::db()->prepare(
            "SELECT *, 
             IFNULL(NULLIF(title_{$lang}, ''), title) as title,
             IFNULL(NULLIF(short_description_{$lang}, ''), short_description) as short_description,
             IFNULL(NULLIF(description_{$lang}, ''), description) as description
             FROM services WHERE slug = ? LIMIT 1"
        );
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public static function create(array $data): int
    {
        $stmt = static::db()->prepare(
            "INSERT INTO services (title, slug, icon, short_description, description, active, order_index)
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['icon']              ?? 'fas fa-cogs',
            $data['short_description'] ?? '',
            $data['description']       ?? '',
            isset($data['active']) ? (int) $data['active'] : 1,
            (int) ($data['order_index'] ?? 0),
        ]);
        return (int) static::db()->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $stmt = static::db()->prepare(
            "UPDATE services
             SET title=?, slug=?, icon=?, short_description=?, description=?, active=?, order_index=?, updated_at=NOW()
             WHERE id=?"
        );
        return $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['icon']              ?? 'fas fa-cogs',
            $data['short_description'] ?? '',
            $data['description']       ?? '',
            isset($data['active']) ? (int) $data['active'] : 1,
            (int) ($data['order_index'] ?? 0),
            $id,
        ]);
    }

    public static function generateSlug(string $title): string
    {
        $map  = ['á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u','ñ'=>'n','ü'=>'u',
                 'Á'=>'a','É'=>'e','Í'=>'i','Ó'=>'o','Ú'=>'u','Ñ'=>'n','Ü'=>'u'];
        $slug = strtr(strtolower($title), $map);
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        return trim($slug, '-');
    }
}
