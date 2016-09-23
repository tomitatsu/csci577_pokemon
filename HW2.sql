-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2016 at 01:31 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `TatsPokemonDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_15_190258_create_pokemons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pokemons`
--

CREATE TABLE IF NOT EXISTS `pokemons` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pokemons`
--

INSERT INTO `pokemons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'bbb', '2016-09-23 12:03:33', '2016-09-23 12:03:33'),
(3, 'aaa', '2016-09-23 12:06:24', '2016-09-23 12:06:24'),
(5, 'pica', '2016-09-24 01:49:23', '2016-09-24 01:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hometown` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pokemon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isAdmin` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hometown`, `password`, `remember_token`, `pokemon`, `isAdmin`, `created_at`, `updated_at`) VALUES
(13, 'Joy', 'Joy@gmail.com', 'CulverCity', '$2y$10$SgQhUgMghaY99DrWy29qw.39P5o0aEMpOAsaxXOh344T1l9SvHksG', 'hhtOkjckrOtrQT6subfSeW0NLTYXCHXr8tJh7ybuMiPTGsyNfdC4p57kltaI', 'pica', 1, '2016-09-21 06:18:31', '2016-09-24 01:53:23'),
(14, 'Oak', 'Oak@gmail.com', 'Los Angeles', '$2y$10$ixPck3Q2F6FzwwZSVSKUYOtmI./5igbKs.r/68x6jQ/WGzYHZxmlC', NULL, NULL, 1, '2016-09-21 06:19:17', '2016-09-21 06:19:17'),
(15, 'tats', 'tats@tats.jp', 'tats', '$2y$10$/eJODDjt64RA5mufcRqYlOdXeY/2iFFJHDYtgXnyn9tYbmUJmAy.O', 'hzPOyFuEkkvrb91YmQHe9gDS8fwKsN047eDGgrNEBs5LGn1AUJAIFpNHeOz7', 'pica', 1, '2016-09-23 11:19:51', '2016-09-24 01:53:40'),
(16, 'hoge', 'hoge@hoge.jp', 'hoge', '$2y$10$4uTvecuq235HiiU6fz/18.QPHl8ARVvaRKJQN.9EtQbqp/9Jq28zS', 'pGbvQ8gsRwrWW8cn0Adw5A6ANkMzPmMBlQl7REYjD6hawFPGPnTMK3nvNPeC', NULL, 0, '2016-09-23 12:10:26', '2016-09-24 01:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pokemons`
--
ALTER TABLE `pokemons`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pokemons_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`hometown`), ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemons`
--
ALTER TABLE `pokemons`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
