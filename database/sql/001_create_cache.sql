CREATE TABLE IF NOT EXISTS cache (
    `key` VARCHAR(255) NOT NULL,
    `value` MEDIUMTEXT NOT NULL,
    `expiration` INT NOT NULL,

    PRIMARY KEY (`key`),

    KEY idx_cache_expiration (`expiration`)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;