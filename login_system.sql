-- Credenciais do Banco de Dados
-- Username: user
-- Password: "test_user"
DROP SCHEMA IF EXISTS `login_system`;

CREATE SCHEMA IF NOT EXISTS `login_system`
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `login_system`;

CREATE TABLE IF NOT EXISTS `login_system`.`user` (
	`id` int(5) NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
	`phone` varchar(13) NOT NULL,
	`email` varchar(40) NOT NULL,
	`password` varchar(32) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Usuários:
-- Nome: "root", Senha: "root"
-- Nome: "Fulano", Senha: "fulano"
-- Nome: "Ciclano", Senha: "ciclano"
-- Nome: "Beltrano", Senha: "beltrano"
INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`) VALUES
	(DEFAULT, 'root', '551234568910', 'root@hotmail.com', '63a9f0ea7bb98050796b649e85481845'),
	(DEFAULT, 'Fulano', '111111111111', 'fulano@gmail.com', '3342949e2e99fc2f304de6fdd626a188'),
	(DEFAULT, 'Ciclano', '222222222222', 'ciclano@outlook.com', 'fe798a81c2e1eb4fd9695138276e52ed'),
	(DEFAULT, 'Beltrano', '333333333333', 'beltrano@google.com', 'e9910cf6ea24255eff7066643c6cb145');