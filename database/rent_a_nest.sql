-- Prevent automatic incrementing
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

-- Ensuring consistent time handling
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS rent_a_nest;
USE rent_a_nest;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `rental_registrations`
CREATE TABLE IF NOT EXISTS `rental_registrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rooms` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `complaints`
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_info` varchar(100) DEFAULT NULL,
  `complaint` varchar(200) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Insert data only if it doesn't exist
INSERT IGNORE INTO `users` (`id`, `fullname`, `mobile`, `username`, `email`, `password`, `address`, `role`, `status`)
VALUES
(1, 'Ravi Rauniyar', '9821129864', 'ravigrauniyar', 'ravigrauniyar@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Hetauda=04', 'admin', 1),
(2, 'Jane Smith', '9876543210', 'jane_smith', 'jane@example.com', 'hashed_password_2', '123 Main St', 'user', 1),
(3, 'Michael Johnson', '5551234567', 'michael_johnson', 'michael@example.com', 'hashed_password_3', '456 Elm St', 'user', 1),
(4, 'Emily Williams', '1112223333', 'emily_williams', 'emily@example.com', 'hashed_password_4', '789 Oak St', 'user', 1),
(5, 'William Brown', '4445556666', 'william_brown', 'william@example.com', 'hashed_password_5', '234 Maple St', 'user', 1),
(6, 'John Doe', '1234567890', 'john_doe', 'john@example.com', 'hashed_password_1', '567 Pine St', 'user', 1);

INSERT IGNORE INTO `rental_registrations` (`id`, `user_id`, `address`, `rent`, `deposit`, `rooms`, `description`, `image`)
VALUES
(1, 2, '123 Main St', '1000', '500', '2', 'Cozy apartment near downtown', 'apartment1.jpg'),
(2, 3, '456 Elm St', '1200', '600', '3', 'Spacious house with backyard', 'house1.jpg'),
(3, 4, '789 Oak St', '800', '400', '1', 'Studio apartment with a view', 'studio1.jpg'),
(4, 5, '234 KTM St', '1500', '750', '4', 'Modern townhouse in a quiet neighborhood', 'townhouse1.jpg'),
(5, 6, '567 Pine St', '1100', '550', '2', 'Charming duplex with vintage vibes', 'duplex1.jpg'),
(6, 2, '789 Htd St', '950', '475', '2', 'Bright apartment with balcony', 'apartment2.jpg'),
(7, 3, '345 Oak St', '1050', '525', '2', 'Renovated apartment in prime location', 'apartment3.jpg');

INSERT IGNORE INTO `complaints` (`id`, `apartment_info`, `complaint`, `user_id`)
VALUES
(1, 'Cozy Apartment - John Doe', 'Water leakage in the bathroom', 4),
(2, 'Garden House - Jane Smith', 'Heater not working in the living room', 2),
(3, 'City View Studio - Michael Johnson', 'Broken window in the kitchen', 5),
(4, 'Modern Downtown - Emily Williams', 'AC making strange noises', 4),
(5, 'Renovated Duplex - William Brown', 'Clogged drain in the backyard', 3);