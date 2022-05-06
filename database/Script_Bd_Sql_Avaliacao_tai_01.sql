-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.33 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para bd_avaliacao_tai_01
CREATE DATABASE IF NOT EXISTS `bd_avaliacao_tai_01` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `bd_avaliacao_tai_01`;

-- Copiando estrutura para tabela bd_avaliacao_tai_01.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `lugar` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `descricao` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `convidado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `convidado_id` (`convidado_id`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`convidado_id`) REFERENCES `contato` (`id_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela bd_avaliacao_tai_01.agenda: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id_agenda`, `titulo`, `data_inicio`, `hora_inicio`, `data_fim`, `hora_fim`, `lugar`, `descricao`, `convidado_id`) VALUES
	(8, 'amigos', '2022-05-18', '02:08:00', '2022-05-26', '18:09:00', 'casa', 'viagem', 2),
	(11, 'eeeee', '2022-06-01', '04:24:00', '2022-06-04', '22:28:00', 'casa', 'viagem', 2);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_avaliacao_tai_01.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `sobrenome` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefone1` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_telefone1` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefone2` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_telefone2` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela bd_avaliacao_tai_01.contato: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`id_contato`, `nome`, `sobrenome`, `telefone1`, `tipo_telefone1`, `telefone2`, `tipo_telefone2`, `email`) VALUES
	(1, 'maria', 'do carmo', '88888888', 'celular', '', '', 'Maria@gmail.com'),
	(2, 'Pedro', 'machado', '444444', 'celular', '', '', 'Pedrinho@gmail.com');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
