<?php

namespace App\Models;

class Service extends Model
{
    protected static string $table = 'services';

    protected static array $allowedOrderBy = [
        'id', 'title', 'slug', 'active', 'order_index', 'created_at', 'updated_at',
    ];

    /** Languages that have dedicated translated columns in the DB (e.g. title_en) */
    private const DB_LANGS = ['en', 'zh'];

    public static function active(): array
    {
        $lang = current_lang();
        if ($lang === 'es' || !in_array($lang, self::DB_LANGS)) {
            $sql = "SELECT * FROM services WHERE active = 1 ORDER BY order_index ASC, id ASC";
        } else {
            $sql = "SELECT *, 
                    IFNULL(NULLIF(title_{$lang}, ''), title) as title,
                    IFNULL(NULLIF(short_description_{$lang}, ''), short_description) as short_description,
                    IFNULL(NULLIF(description_{$lang}, ''), description) as description
                    FROM services WHERE active = 1 ORDER BY order_index ASC, id ASC";
        }

        $stmt = static::db()->query($sql);
        return $stmt->fetchAll();
    }

    public static function findBySlug(string $slug): ?array
    {
        $lang = current_lang();
        if ($lang === 'es' || !in_array($lang, self::DB_LANGS)) {
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
            "INSERT INTO services (title, title_en, title_zh, slug, icon, short_description, short_description_en, short_description_zh, description, description_en, description_zh, active, order_index)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $data['title'],
            $data['title_en']             ?? '',
            $data['title_zh']             ?? '',
            $data['slug'],
            $data['icon']                 ?? 'fas fa-cogs',
            $data['short_description']    ?? '',
            $data['short_description_en'] ?? '',
            $data['short_description_zh'] ?? '',
            $data['description']          ?? '',
            $data['description_en']       ?? '',
            $data['description_zh']       ?? '',
            isset($data['active']) ? (int) $data['active'] : 1,
            (int) ($data['order_index'] ?? 0),
        ]);
        return (int) static::db()->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $stmt = static::db()->prepare(
            "UPDATE services
             SET title=?, title_en=?, title_zh=?, slug=?, icon=?, short_description=?, short_description_en=?, short_description_zh=?, description=?, description_en=?, description_zh=?, active=?, order_index=?, updated_at=NOW()
             WHERE id=?"
        );
        return $stmt->execute([
            $data['title'],
            $data['title_en']             ?? '',
            $data['title_zh']             ?? '',
            $data['slug'],
            $data['icon']                 ?? 'fas fa-cogs',
            $data['short_description']    ?? '',
            $data['short_description_en'] ?? '',
            $data['short_description_zh'] ?? '',
            $data['description']          ?? '',
            $data['description_en']       ?? '',
            $data['description_zh']       ?? '',
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
