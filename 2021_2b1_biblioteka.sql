-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Paź 2021, 10:06
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `2021_2b1_biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `iduser` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `kol_pdst` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `kol_ciem` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `kol_jas` varchar(8) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`iduser`, `user`, `pass`, `kol_pdst`, `kol_ciem`, `kol_jas`) VALUES
(1, 'adam', 'qwerty', '#6ee00b', '#1b3503', '#375020'),
(2, 'marek', 'asdfg', '', '', ''),
(3, 'anna', 'zxcvb', '', '', ''),
(4, 'andrzej', 'asdfg', '', '', ''),
(5, 'justyna', 'yuiop', '', '', ''),
(6, 'kasia', 'hjkkl', '', '', ''),
(7, 'beata', 'fgthj', '', '', ''),
(8, 'jakub', 'ertyu', '', '', ''),
(9, 'janusz', 'cvbnm', '', '', ''),
(10, 'roman', 'dfghj', '', '', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `id` (`iduser`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
