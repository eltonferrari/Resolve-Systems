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

INSERT INTO users(email,password,type) value('eltonferrari@gmail.com','e10adc3949ba59abbe56e057f20f883e',1);

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

COMMIT;