-- Elite Digital Clone — Schema MySQL 8 (PrestaShop 8 compatível)
-- Charset utf8mb4, prefix ps_

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS=0;

-- Tabelas PrestaShop base já existem numa instalação real.
-- Abaixo apenas as extensões para as 2 novas features.

-- ============================================
-- FEATURE 1 — RECONDICIONADOS
-- ============================================
DROP TABLE IF EXISTS `ps_reconditioned_product`;
CREATE TABLE `ps_reconditioned_product` (
  `id_product` INT UNSIGNED NOT NULL,
  `grade` ENUM('A+','A','B','C') NOT NULL DEFAULT 'A',
  `warranty_months` INT NOT NULL DEFAULT 24,
  `battery_health` TINYINT UNSIGNED DEFAULT 85 COMMENT 'percent 0-100',
  `battery_cycles` INT UNSIGNED DEFAULT 0,
  `cosmetic_notes` VARCHAR(255) DEFAULT NULL,
  `previous_use` VARCHAR(100) DEFAULT 'Empresarial',
  `co2_saved_kg` DECIMAL(6,2) DEFAULT 280.00,
  `includes_charger` TINYINT(1) DEFAULT 1,
  `includes_box` TINYINT(1) DEFAULT 0,
  `real_photos` TINYINT(1) DEFAULT 1,
  `certified` TINYINT(1) DEFAULT 1,
  `stock_serial` VARCHAR(64) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `grade` (`grade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `ps_reconditioned_lang`;
CREATE TABLE `ps_reconditioned_lang` (
  `id_product` INT UNSIGNED NOT NULL,
  `id_lang` INT UNSIGNED NOT NULL DEFAULT 1,
  `condition_description` TEXT,
  PRIMARY KEY (`id_product`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- FEATURE 2 — CONFIGURADOR DE PCs
-- ============================================
DROP TABLE IF EXISTS `ps_pc_component`;
CREATE TABLE `ps_pc_component` (
  `id_component` INT AUTO_INCREMENT PRIMARY KEY,
  `category` ENUM('cpu','motherboard','ram','gpu','storage','case','psu','cooler','extra') NOT NULL,
  `brand` VARCHAR(80) NOT NULL,
  `name` VARCHAR(180) NOT NULL,
  `sku` VARCHAR(40) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `price_old` DECIMAL(10,2) DEFAULT NULL,
  `stock` INT DEFAULT 25,
  `image` VARCHAR(255) DEFAULT NULL,
  `specs` JSON DEFAULT NULL,
  `socket` VARCHAR(30) DEFAULT NULL COMMENT 'ex: LGA1700, AM5, AM4',
  `ram_type` VARCHAR(10) DEFAULT NULL COMMENT 'DDR4/DDR5',
  `form_factor` VARCHAR(20) DEFAULT NULL COMMENT 'ATX,mATX,ITX',
  `watt_tdp` INT DEFAULT 0,
  `length_mm` INT DEFAULT NULL COMMENT 'GPU/case length',
  `height_mm` INT DEFAULT NULL,
  `active` TINYINT(1) DEFAULT 1,
  KEY `category` (`category`),
  KEY `socket` (`socket`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `ps_pc_build`;
CREATE TABLE `ps_pc_build` (
  `id_build` INT AUTO_INCREMENT PRIMARY KEY,
  `id_customer` INT UNSIGNED DEFAULT NULL,
  `hash` VARCHAR(32) NOT NULL,
  `name` VARCHAR(120) DEFAULT 'Minha Configuração',
  `total_price` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `watt_total` INT NOT NULL DEFAULT 0,
  `watt_psu` INT DEFAULT NULL,
  `is_compatible` TINYINT(1) DEFAULT 0,
  `compatibility_warnings` JSON DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `hash` (`hash`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `ps_pc_build_item`;
CREATE TABLE `ps_pc_build_item` (
  `id_build` INT NOT NULL,
  `id_component` INT NOT NULL,
  `qty` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_build`,`id_component`),
  FOREIGN KEY (`id_build`) REFERENCES `ps_pc_build`(`id_build`) ON DELETE CASCADE,
  FOREIGN KEY (`id_component`) REFERENCES `ps_pc_component`(`id_component`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Views auxiliares PrestaShop (compat)
DROP TABLE IF EXISTS `ps_category`;
CREATE TABLE IF NOT EXISTS `ps_category` (
  `id_category` INT AUTO_INCREMENT PRIMARY KEY,
  `id_parent` INT DEFAULT 2,
  `name` VARCHAR(128) NOT NULL,
  `link_rewrite` VARCHAR(128) NOT NULL,
  `active` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT IGNORE INTO `ps_category` (id_category, id_parent, name, link_rewrite) VALUES
(441, 2, 'Computadores Recondicionados', 'computadores-recondicionados'),
(442, 2, 'Configurador de PCs', 'configurador-pc');
