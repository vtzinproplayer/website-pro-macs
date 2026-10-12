CREATE TABLE IF NOT EXISTS `PREFIX_reconditioned_product` (
  `id_product` INT UNSIGNED NOT NULL,
  `grade` ENUM('A+','A','B') NOT NULL DEFAULT 'A',
  `warranty_months` INT NOT NULL DEFAULT 24,
  `battery_health` TINYINT UNSIGNED DEFAULT 85,
  `battery_cycles` INT UNSIGNED DEFAULT 0,
  `cosmetic_notes` VARCHAR(255) DEFAULT NULL,
  `co2_saved_kg` DECIMAL(6,2) DEFAULT 285.00,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
