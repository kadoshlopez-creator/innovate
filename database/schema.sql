CREATE TABLE IF NOT EXISTS `users` (
    `id`         INT AUTO_INCREMENT PRIMARY KEY,
    `name`       VARCHAR(100)                NOT NULL,
    `email`      VARCHAR(150)                NOT NULL UNIQUE,
    `password`   VARCHAR(255)                NOT NULL,
    `role`       ENUM('admin','editor')      NOT NULL DEFAULT 'admin',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `services` (
    `id`                INT AUTO_INCREMENT PRIMARY KEY,
    `title`             VARCHAR(200)  NOT NULL,
    `slug`              VARCHAR(200)  NOT NULL UNIQUE,
    `icon`              VARCHAR(100)  NOT NULL DEFAULT 'fas fa-cogs',
    `short_description` TEXT,
    `description`       LONGTEXT,
    `active`            TINYINT(1)    NOT NULL DEFAULT 1,
    `order_index`       INT           NOT NULL DEFAULT 0,
    `created_at`        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at`        TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `contacts` (
    `id`         INT AUTO_INCREMENT PRIMARY KEY,
    `name`       VARCHAR(100) NOT NULL,
    `email`      VARCHAR(150) NOT NULL,
    `phone`      VARCHAR(30),
    `company`    VARCHAR(100),
    `service`    VARCHAR(100),
    `message`    TEXT         NOT NULL,
    `read_at`    TIMESTAMP    NULL DEFAULT NULL,
    `created_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `settings` (
    `id`         INT AUTO_INCREMENT PRIMARY KEY,
    `key`        VARCHAR(100) NOT NULL UNIQUE,
    `value`      LONGTEXT,
    `group`      VARCHAR(50)  NOT NULL DEFAULT 'general',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
