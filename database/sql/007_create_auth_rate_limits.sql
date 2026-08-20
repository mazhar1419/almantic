CREATE TABLE IF NOT EXISTS auth_rate_limits (

    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

    rate_key VARCHAR(191) NOT NULL,

    attempts INT UNSIGNED NOT NULL DEFAULT 0,

    window_started_at DATETIME NOT NULL,

    expires_at DATETIME NOT NULL,

    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (id),

    UNIQUE KEY uq_auth_rate_limits_rate_key (rate_key),

    KEY idx_auth_rate_limits_expires_at (expires_at)

)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;