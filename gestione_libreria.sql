-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 15, 2024 alle 14:59
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione_libreria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `id` int(11) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `autore` varchar(100) NOT NULL,
  `anno_pubblicazione` int(11) NOT NULL,
  `genere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`id`, `titolo`, `autore`, `anno_pubblicazione`, `genere`) VALUES
(1, 'Il Signore degli Anelli', 'J.R.R. Tolkien', 1954, 'Fantasy'),
(2, '1984', 'George Orwell', 1949, 'Distopia'),
(3, 'Orgoglio e Pregiudizio', 'Jane Austen', 1813, 'Romanzo'),
(4, 'Cronache del Ghiaccio e del Fuoco', 'George R.R. Martin', 1996, 'Fantasy'),
(5, 'La Ragazza di Fuoco', 'Suzanne Collins', 2009, 'Fantascienza'),
(6, 'Harry Potter e la Pietra Filosofale', 'J.K. Rowling', 1997, 'Fantasy'),
(7, 'Il Codice Da Vinci', 'Dan Brown', 2003, 'Thriller'),
(8, 'Cime Tempestose', 'Emily Brontë', 1847, 'Romanzo'),
(9, 'Guerra e Pace', 'Lev Tolstoj', 1869, 'Romanzo'),
(10, 'Il Piccolo Principe', 'Antoine de Saint-Exupéry', 1943, 'Fiaba'),
(11, 'Il Nome della Rosa', 'Umberto Eco', 1980, 'Mistero'),
(12, 'La Storia Infinita', 'Michael Ende', 1979, 'Fantasy'),
(13, 'Lo Hobbit', 'J.R.R. Tolkien', 1937, 'Fantasy'),
(14, 'Don Chisciotte', 'Miguel de Cervantes', 1605, 'Romanzo'),
(15, 'Cinquanta Sfumature di Grigio', 'E.L. James', 2011, 'Romanzo'),
(16, 'Il Cacciatore di Aquiloni', 'Khaled Hosseini', 2003, 'Romanzo'),
(17, 'La Casa degli Spiriti', 'Isabel Allende', 1982, 'Romanzo'),
(18, 'Il Vecchio e il Mare', 'Ernest Hemingway', 1952, 'Romanzo'),
(19, 'Il Giovane Holden', 'J.D. Salinger', 1951, 'Romanzo'),
(20, 'Lo Straniero', 'Albert Camus', 1942, 'Romanzo'),
--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;