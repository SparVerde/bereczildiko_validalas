-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2022. Jan 02. 19:17
-- Kiszolgáló verziója: 5.7.31
-- PHP verzió: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bankszamala_validalas`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szamlak`
--

DROP TABLE IF EXISTS `szamlak`;
CREATE TABLE IF NOT EXISTS `szamlak` (
  `loginname` varchar(70) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesiido` int(4) NOT NULL,
  `giro` varchar(36) COLLATE utf8_hungarian_ci NOT NULL,
  `bankkartya` varchar(19) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szamlak`
--

INSERT INTO `szamlak` (`loginname`, `password`, `szuletesiido`, `giro`, `bankkartya`) VALUES
('BereczIldiko', '$2y$10$8ilmXNxffp276QxjqBM5nOqZQdFunXN33LFBiYHFzdSIzNIIAoIPm', 0, '', '0'),
('BereczIldiko', '$2y$10$Eo59GXED/yRBB1vonnaT4.kZh3oczshq60ksTEK3qKr88aybRSbmq', 0, '', '0'),
('BereczIldiko', '$2y$10$xOcqZxNkjQRPq20If2CeBeGdZpLFccAT6X10OnBt66G7HZXIlweJi', 0, '', '0'),
('BereczIldiko', '$2y$10$iSR3LR2rx2ff4IPRtaH1Q.ntwfDYZKP10e7ue0Gpd33a.qz1AujpC', 0, '', '0'),
('BereczIldiko', '$2y$10$e4o9JvJxxGjs8OPw3Q073uspH2CJaKsAygR4pQw4JZQ71w23dgvOe', 0, '', '0'),
('BereczIldiko', '$2y$10$0yMb0nmaCC2oeN085BIko.xbY.d.V/ZwDhIQJhJLAIB70p0bfOCW6', 0, '', '0'),
('BereczIldiko', '$2y$10$zvmDU65ueee0kd85bz/dee5Juh5FmuXskurnCOQsDwf5hvFyQbV5O', 0, '', '0'),
('BereczIldiko', '$2y$10$KVh61DrsC9F5aQB99lDrkuVRXm/HiMk5uBFwGGchuVVn4eQe3Lnzq', 0, '', '0'),
('BereczIldiko', '$2y$10$OzyWLxXuR/dafb4XI9m5leqrnOQaCr8CC8OhybaVeJAg8goleMgc2', 0, '', '0'),
('bereildi', '$2y$10$NbPb7tX1rI5SWpIFwTyuiOkkTbl.TJzcv4jU/p7hWYlu0ggTly04e', 1971, '', '0'),
('BereczIldik', '$2y$10$XzlXu3BTw4MXUy/2inpSaurQDalbyAVC2qEtMUKTzM7xldoo5lERy', 1971, 'HU00000000-00000000-00000000', '0'),
('BereczIldi', '$2y$10$lDARqDHB4312b0VAU3wEy.n.bTiVrcoYpBKrSYcVMUmIkiMQPR8v6', 1971, 'HU00000000-00000000-00000000', '222'),
('BereczIldi', '$2y$10$TpkMUjqKaK/nW9z.Y28F1uG8I.bo7bvcjVRL4/uLgWCuf1y9wgjZK', 1971, 'HU00000000-00000000-00000000', '0000111100001111'),
('BereczIldi', '$2y$10$DvZ6H2LPWvt18qlfx6TIN.UwQyX/IFMGGlE.80s3Essz/zdTZ.ZOi', 1971, 'HU00000000-00000000-00000000', '0000111100001111');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
