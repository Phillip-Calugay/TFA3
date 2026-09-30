

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(20),
  `created_at` DATETIME NOT NULL
);
INSERT INTO `customers` (`full_name`, `email`, `phone`, `created_at`) VALUES
('Ana Reyes', 'ana.reyes@example.com', '0917 123 4567', '2026-09-22 09:00:00'), ('Ben Santos', 'ben.santos@example.com', '0918 234 5678', '2026-09-22 09:00:00'), ('Carla Cruz', 'carla.cruz@example.com', '0919 345 6789', '2026-09-22 09:00:00'), ('Daniel Lim', 'daniel.lim@example.com', '0920 456 7890', '2026-09-22 09:00:00'), ('Ella Garcia', 'ella.garcia@example.com', '0921 567 8901', '2026-09-22 09:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `full_name` VARCHAR(100) NOT NULL,
  `avatar` VARCHAR(255) NULL,
  `created_at` DATETIME NOT NULL
);
INSERT INTO `users` (`username`, `full_name`, `created_at`) VALUES
('admin', 'Alex Mendoza', '2026-09-22 09:00:00'), ('cashier1', 'Carlos Ramos', '2026-09-22 09:00:00'), ('cashier2', 'Diane Torres', '2026-09-22 09:00:00'), ('manager1', 'Bianca Flores', '2026-09-22 09:00:00'), ('stock1', 'Ethan Bautista', '2026-09-22 09:00:00');
