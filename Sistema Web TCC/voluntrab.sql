-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2017 às 01:37
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voluntrab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalias`
--

CREATE TABLE `avalias` (
  `id` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` int(11) NOT NULL,
  `id_avaliador` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `avalias`
--

INSERT INTO `avalias` (`id`, `comentario`, `nota`, `id_avaliador`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Trabalhou muito bem!', 5, 6, 2, '2017-11-17 02:12:58', '2017-11-17 02:12:58'),
(2, 'Trabalhou Bem!', 4, 6, 3, '2017-11-17 02:13:21', '2017-11-17 02:13:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conquistas`
--

INSERT INTO `conquistas` (`id`, `nome`, `desc`, `icone`, `created_at`, `updated_at`) VALUES
(1, 'Cadastrar-se', 'Estar cadastrado no Site!', 'cadastro.png', '2017-11-16 02:00:00', '2017-11-16 02:00:00'),
(2, '1ª Doação', 'Ter participado de alguma doação (somente voluntários)', 'doacao1.png', '2017-11-16 02:00:00', '2017-11-16 02:00:00'),
(3, '5 Doações', 'Ter participado de pelo menos 5 doações (somente voluntários)', 'doacao5.png', '2017-11-16 02:00:00', '2017-11-16 02:00:00'),
(4, '1º Trabalho Voluntário', 'Ter participado de algum trabalho voluntário (somente voluntários)', '1trab.png', '2017-11-16 02:00:00', '2017-11-16 02:00:00'),
(5, '5 Trabalhos Voluntários', 'Ter participado de pelo menos 5 trabalhos voluntários (somente voluntários)', '5trab.png', '2017-11-16 02:00:00', '2017-11-16 02:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquista_user`
--

CREATE TABLE `conquista_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `conquista_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_delator` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacaos`
--

CREATE TABLE `doacaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `doacaos`
--

INSERT INTO `doacaos` (`id`, `item`, `local`, `data`, `status`, `desc`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Leite', '562, R. Santa Cruz, 524 - Jardim Santa Cruz, Mogi Mirim - SP, 13800-440', '08/12/2017', 0, 'Precisamos de 50 caixas de leite de 1 litro cada.', '1510876481.jpg', 7, '2017-11-17 01:54:41', '2017-11-17 01:54:41'),
(2, 'Papel higiênico', 'Avenida Brasília, n.º 350 - Lot. Nova Mogi, Mogi Mirim - SP, 13800-280', '16/12/2017', 0, 'Precisamos de 30 pacotes com 12 rolos de papel higiênico cada.', '1510876787.jpg', 5, '2017-11-17 01:59:47', '2017-11-17 01:59:47'),
(3, 'fralda', 'R. Vítor Salvato, 35 - Jardim Panorama, Mogi Mirim - SP, 13801-027', '30/01/2018', 1, 'Precisamos de fraldas para crianças.Ao total 30 pacotes com 12 unidades cada.', '1510877306.jpg', 6, '2017-11-17 02:08:26', '2017-11-17 02:13:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_05_010136_create_voluntrabs_table', 1),
(4, '2017_09_05_043609_create_user_voluntrab_table', 1),
(5, '2017_10_31_023341_create_doacaos_table', 1),
(6, '2017_10_31_043127_create_user_doacao_table', 1),
(7, '2017_11_07_044129_create_denuncias_table', 1),
(8, '2017_11_10_053957_create_conquistas_table', 1),
(9, '2017_11_10_055523_create_conquista_user_table', 1),
(10, '2017_11_14_015730_create_avalias_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datanasc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `tipo`, `avatar`, `cpf`, `datanasc`, `cnpj`, `tel`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Eduardo', 1, 'default.png', NULL, '13/02/1997', NULL, '(12) 8293-8192', 'eduardo@email.com', '$2y$10$Vi8y8B5SMDCo69I3GAm/G.3Tjq0HBHxCVWVW2KM3SI7/fN2D2MBfO', '6AWcZINbg0i8aMvcgF1LfIpbsw2AmsdMaUJCyNLpWPDxAeSvobhg1faZwchH', '2017-11-17 01:40:17', '2017-11-17 01:40:17'),
(3, 'Gabriela', 1, 'default.png', NULL, '14/08/1990', NULL, '(34) 3829-1029', 'gabriela@gmail.com', '$2y$10$I8k4m3H/6lNID9UPlAGscutTZPfcgUpp5qeGS4kGjgZw16HWw.4hy', 'vhVrnmoZXlughFJs5B0SNTInrQsZUsOTrDkjGpjFSqphUA8rkZO06GG2pPqT', '2017-11-17 01:41:14', '2017-11-17 01:41:14'),
(4, 'Matheus', 1, 'default.png', NULL, '18/04/1989', NULL, '(18) 2938-1940', 'matheus@email.com', '$2y$10$jU5/VJ7UejYU2NlvdiPc3uJrH04CktFdGTmZ3Z770C4zSBnkoSfkS', 'j1hdwfRxYQLXazTZwEEeDDFrBXEBHMtkdz5sipGkiIEtYTUpfZ0sWwTwdViG', '2017-11-17 01:41:56', '2017-11-17 01:41:56'),
(5, 'ICA', 2, 'default.png', NULL, NULL, NULL, '(19) 3862-3794', 'ica@email.com', '$2y$10$xmxsKjdcH7nxdeEIok8RWuieVUXEE6L2/vBrebFVF6c4TT0MAIZzu', 'Dp2CRhND9zy4kkK7NdCmBXz4f74tNIMmDTnY38zG6HkDb1czHr9GkQtBuJxX', '2017-11-17 01:43:22', '2017-11-17 01:43:22'),
(6, 'IPAEA', 2, 'default.png', NULL, NULL, NULL, '(29) 4810-3938', 'ipaea@email.com', '$2y$10$9KtYKnDtOVLBoaKenwuiQOKiM..dkeNySWrcFpjE2nE6j40JJu8M6', '8jXFza8NXhfZiJfchAQO2LFuSo5SClW77E7dxUijCMtU87h8deTlrAwsoNBy', '2017-11-17 01:45:00', '2017-11-17 01:45:00'),
(7, 'IEADM', 2, 'default.png', NULL, NULL, NULL, '(21) 9204-9238', 'ieadm@email.com', '$2y$10$9/6bxsteg6bfIKoWemwPSe.SXbI/sNlfU8gaAks5C7vOj26llO7T2', 'rUkDi2R3c35NRfzKYwnbuQT9q8Qsor2w8hPhO0s3bPEv2wQVWQ5XJ5nHfGRg', '2017-11-17 01:45:47', '2017-11-17 01:45:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_doacao`
--

CREATE TABLE `user_doacao` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `doacao_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `user_doacao`
--

INSERT INTO `user_doacao` (`user_id`, `doacao_id`, `created_at`, `updated_at`) VALUES
(2, 2, '2017-11-17 02:09:25', '2017-11-17 02:09:25'),
(3, 1, '2017-11-17 02:10:20', '2017-11-17 02:10:20'),
(3, 3, '2017-11-17 02:10:26', '2017-11-17 02:10:26'),
(4, 1, '2017-11-17 02:11:37', '2017-11-17 02:11:37'),
(4, 2, '2017-11-17 02:11:46', '2017-11-17 02:11:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_voluntrab`
--

CREATE TABLE `user_voluntrab` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `voluntrab_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `user_voluntrab`
--

INSERT INTO `user_voluntrab` (`user_id`, `voluntrab_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2017-11-17 02:09:08', '2017-11-17 02:09:08'),
(2, 3, '2017-11-17 02:09:16', '2017-11-17 02:09:16'),
(3, 2, '2017-11-17 02:10:12', '2017-11-17 02:10:12'),
(4, 1, '2017-11-17 02:11:21', '2017-11-17 02:11:21'),
(4, 2, '2017-11-17 02:11:28', '2017-11-17 02:11:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `voluntrabs`
--

CREATE TABLE `voluntrabs` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `voluntrabs`
--

INSERT INTO `voluntrabs` (`id`, `titulo`, `local`, `data`, `status`, `desc`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Limpar a Praça', 'Praça Rui Barbosa - Centro Mogi Mirim - SP 13800-060', '20/11/2017', 0, 'Precisamos de pessoas para limpar a praça.', '1510876316.jpg', 7, '2017-11-17 01:51:57', '2017-11-17 01:51:57'),
(2, 'Cuidar de Crianças', 'Avenida Brasília, n.º 350 - Lot. Nova Mogi, Mogi Mirim - SP, 13800-280', '30/11/2017', 0, 'Precisamos de pessoas para cuidar de crianças', '1510876640.jpg', 5, '2017-11-17 01:57:20', '2017-11-17 01:57:20'),
(3, 'Ajudar moradores de rua', 'R. Dário Ortiz de Campo, 370 - Jardim Ipe I, Mogi Guaçu - SP, 13846-043', '08/01/2018', 1, 'Precisamos de pessoas para ajudar moradores de rua.', '1510877190.jpg', 6, '2017-11-17 02:06:30', '2017-11-17 02:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avalias`
--
ALTER TABLE `avalias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avalias_user_id_foreign` (`user_id`);

--
-- Indexes for table `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conquista_user`
--
ALTER TABLE `conquista_user`
  ADD PRIMARY KEY (`user_id`,`conquista_id`),
  ADD KEY `conquista_user_conquista_id_foreign` (`conquista_id`);

--
-- Indexes for table `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `denuncias_user_id_foreign` (`user_id`);

--
-- Indexes for table `doacaos`
--
ALTER TABLE `doacaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doacaos_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_doacao`
--
ALTER TABLE `user_doacao`
  ADD PRIMARY KEY (`user_id`,`doacao_id`),
  ADD KEY `user_doacao_doacao_id_foreign` (`doacao_id`);

--
-- Indexes for table `user_voluntrab`
--
ALTER TABLE `user_voluntrab`
  ADD PRIMARY KEY (`user_id`,`voluntrab_id`),
  ADD KEY `user_voluntrab_voluntrab_id_foreign` (`voluntrab_id`);

--
-- Indexes for table `voluntrabs`
--
ALTER TABLE `voluntrabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voluntrabs_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avalias`
--
ALTER TABLE `avalias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doacaos`
--
ALTER TABLE `doacaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `voluntrabs`
--
ALTER TABLE `voluntrabs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avalias`
--
ALTER TABLE `avalias`
  ADD CONSTRAINT `avalias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `conquista_user`
--
ALTER TABLE `conquista_user`
  ADD CONSTRAINT `conquista_user_conquista_id_foreign` FOREIGN KEY (`conquista_id`) REFERENCES `conquistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conquista_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD CONSTRAINT `denuncias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `doacaos`
--
ALTER TABLE `doacaos`
  ADD CONSTRAINT `doacaos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `user_doacao`
--
ALTER TABLE `user_doacao`
  ADD CONSTRAINT `user_doacao_doacao_id_foreign` FOREIGN KEY (`doacao_id`) REFERENCES `doacaos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_doacao_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `user_voluntrab`
--
ALTER TABLE `user_voluntrab`
  ADD CONSTRAINT `user_voluntrab_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_voluntrab_voluntrab_id_foreign` FOREIGN KEY (`voluntrab_id`) REFERENCES `voluntrabs` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `voluntrabs`
--
ALTER TABLE `voluntrabs`
  ADD CONSTRAINT `voluntrabs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
