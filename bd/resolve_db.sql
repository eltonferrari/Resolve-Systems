SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+03:00";

--
-- Cria Banco, caso não exista
--

CREATE DATABASE	IF NOT EXISTS resolve_db; 

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
	`iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  	`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  	`password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  	`image` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vazio.png',
  	`type` int(1) NOT NULL DEFAULT 0,
  	`active` int(1) NOT NULL DEFAULT 1,
	`created_by` int(10) NOT NULL DEFAULT 0,
  	`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  	`updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  	PRIMARY KEY (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`iduser`, `name`, `email`, `password`, `image`, `type`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Elton Ferrari', 'eltonferrari@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'vazio.png', 1, 1, '2023-03-13 23:03:18', '2023-03-14 14:38:26'),
(2, 'Tiago Vaz', 'tiagovaz@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'vazio.png', 0, 1, '2023-03-13 17:03:53', '2023-03-14 14:15:46');

--
-- Estrutura da tabela `log_users`
--

DROP TABLE IF EXISTS `log_users`;
CREATE TABLE IF NOT EXISTS `log_users` (
	`idloguser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`iduser` int(10) NOT NULL,
  	`descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`active` int(1) NOT NULL DEFAULT 1,
	`created_by` int(10) NOT NULL DEFAULT 0,
  	`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  	PRIMARY KEY (`idloguser`),
	FOREIGN KEY(iduser) REFERENCES users(iduser)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `log_users` (`idloguser`, `iduser`, `descricao`, `active`, `created_at`) VALUES
(1, 1, 'Troca de nome para Elton Mario Rodriguez Ferrari.', 1, '2023-03-13 17:03:37'),
(2, 2, 'Troca de nome para Tiago Emidio Pieretti Vaz.', 1, '2023-03-13 17:04:18'),
(3, 2, 'Troca de nome para Tiago Vaz.', 1, '2023-03-13 17:04:26'),
(4, 2, 'Troca de nome para Tiago Emidio Pieretti Vaz.', 1, '2023-03-13 17:09:09'),
(5, 2, 'Troca de tipo de perfil para administrador.', 1, '2023-03-13 17:09:09'),
(6, 2, 'Usuário alterado para inativo.', 1, '2023-03-13 17:09:09'),
(7, 2, 'Troca de tipo de perfil para usuário.', 1, '2023-03-13 17:09:14'),
(8, 2, 'Usuário alterado para ativo.', 1, '2023-03-13 17:09:17'),
(9, 2, 'Troca de nome para Tiago Vaz.', 1, '2023-03-13 17:09:24'),
(10, 2, 'Troca de nome para Tiago Emidio Pieretti Vaz.', 1, '2023-03-13 17:10:42'),
(11, 1, 'Troca de nome para Elton Ferrari.', 1, '2023-03-14 12:01:24'),
(12, 1, 'Troca de nome para Elton Mario Rodriguez Ferrari.', 1, '2023-03-14 12:12:36'),
(13, 1, 'Troca de nome para Elton Ferrari.', 1, '2023-03-14 12:20:35'),
(14, 1, 'Troca de nome para Elton Mario Rodriguez Ferrari.', 1, '2023-03-14 12:34:24'),
(15, 1, 'Troca de nome para Elton Ferrari.', 1, '2023-03-14 12:43:31'),
(16, 1, 'Troca de nome para Elton Mario Rodriguez Ferrari.', 1, '2023-03-14 12:43:55'),
(17, 2, 'Troca de nome para Tiago Vaz.', 1, '2023-03-14 14:16:01'),
(18, 1, 'Troca de nome para Elton Ferrari.', 1, '2023-03-14 14:16:38'),
(19, 1, 'Troca de tipo de perfil para usuário.', 1, '2023-03-14 14:38:00'),
(20, 1, 'Usuário alterado para inativo.', 1, '2023-03-14 14:38:26'),
(21, 1, 'Usuário alterado para ativo.', 1, '2023-03-14 14:38:32');

COMMIT;