-- Adminer 4.8.0 MySQL 5.5.5-10.5.17-MariaDB-1:10.5.17+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(6,	'Denish Rao A/L Subramamian',	'ricardina6576@hotmail.com',	'$2y$10$NiO65F9J04oR/kNTzNCYIORdElSsGZK.8efVvzb1xUnyhK2nQ45s.',	'user',	'2023-05-23 07:12:43'),
(7,	'Samuel Otto',	'samuelo73@hotmail.com',	'$2y$10$.OA.TLjZCgS1UemGcVEyT.Vp4WVWqV3fQlzmPd93N8hNoeHhAq19K',	'user',	'2023-05-25 01:22:32'),
(8,	'Alvin',	'leekaichun710@gmail.com',	'$2y$10$61BQ3BG603tqbQAU8dFM9u5Gu1io1h7nWT1YuD8bd.80m9ns5d/jS',	'admin',	'2023-05-25 03:24:22');

-- 2023-05-25 13:36:24
