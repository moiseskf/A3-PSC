-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para gestaodespesas
DROP DATABASE IF EXISTS `gestaodespesas`;
CREATE DATABASE IF NOT EXISTS `gestaodespesas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `gestaodespesas`;

-- Copiando estrutura para tabela gestaodespesas.base
DROP TABLE IF EXISTS `base`;
CREATE TABLE IF NOT EXISTS `base` (
  `idBase` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nomeBase` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `responsavelBase` varchar(45) DEFAULT NULL,
  `telefoneBase` varchar(45) DEFAULT NULL,
  `celularBase` varchar(45) DEFAULT NULL,
  `emailBase` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S',
  PRIMARY KEY (`idBase`,`idUsuario`),
  KEY `fk_base_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_base_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela gestaodespesas.credor
DROP TABLE IF EXISTS `credor`;
CREATE TABLE IF NOT EXISTS `credor` (
  `idCredor` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nomeCredor` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `responsavelCredor` varchar(45) DEFAULT NULL,
  `telefoneCredor` varchar(45) DEFAULT NULL,
  `celularCredor` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S',
  PRIMARY KEY (`idCredor`,`idUsuario`),
  KEY `fk_credor_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_credor_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela gestaodespesas.despesa
DROP TABLE IF EXISTS `despesa`;
CREATE TABLE IF NOT EXISTS `despesa` (
  `idDespesa` int(11) NOT NULL AUTO_INCREMENT,
  `idCredor` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomeDespesa` varchar(45) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`idDespesa`,`idCredor`,`idUsuario`),
  KEY `fk_despesa_credor_idx` (`idCredor`),
  KEY `fk_despesa_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_despesa_credor` FOREIGN KEY (`idCredor`) REFERENCES `credor` (`idCredor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesa_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela gestaodespesas.lancamento
DROP TABLE IF EXISTS `lancamento`;
CREATE TABLE IF NOT EXISTS `lancamento` (
  `idLancamento` int(11) NOT NULL AUTO_INCREMENT,
  `idBase` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idDespesa` int(11) NOT NULL,
  `competenciaDespesa` char(2) NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorLiquido` float(10,2) NOT NULL,
  `valorMulta` float(10,2) NOT NULL,
  `valorCorrecao` float(10,2) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  `observacao` text DEFAULT NULL,
  PRIMARY KEY (`idLancamento`,`idBase`,`idUsuario`,`idDespesa`),
  KEY `fk_lancamento_despesa1_idx` (`idDespesa`),
  KEY `fk_lancamento_base1_idx` (`idBase`),
  KEY `fk_lancamento_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_lancamento_base1` FOREIGN KEY (`idBase`) REFERENCES `base` (`idBase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lancamento_despesa1` FOREIGN KEY (`idDespesa`) REFERENCES `despesa` (`idDespesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lancamento_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela gestaodespesas.perfil
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `nomePerfil` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela gestaodespesas.perfilsessao
DROP TABLE IF EXISTS `perfilsessao`;
CREATE TABLE IF NOT EXISTS `perfilsessao` (
  `idPerfil` int(11) NOT NULL,
  `idSessao` int(11) NOT NULL,
  PRIMARY KEY (`idPerfil`,`idSessao`),
  KEY `fk_perfil_has_sessao_sessao1_idx` (`idSessao`),
  KEY `fk_perfil_has_sessao_perfil1_idx` (`idPerfil`),
  CONSTRAINT `fk_perfil_has_sessao_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_sessao_sessao1` FOREIGN KEY (`idSessao`) REFERENCES `sessao` (`idSessao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela gestaodespesas.sessao
DROP TABLE IF EXISTS `sessao`;
CREATE TABLE IF NOT EXISTS `sessao` (
  `idSessao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeSessao` varchar(255) NOT NULL,
  `dataCadsatro` datetime DEFAULT NULL,
  PRIMARY KEY (`idSessao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela gestaodespesas.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `loginUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `telefoneCelular` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S',
  PRIMARY KEY (`idUsuario`,`idPerfil`),
  KEY `fk_usuario_perfil1_idx` (`idPerfil`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
