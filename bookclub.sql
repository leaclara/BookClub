-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 24. Nov 2018 um 14:54
-- Server-Version: 5.7.23
-- PHP-Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `bookclub`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `AuthorBook`
--

CREATE TABLE `AuthorBook` (
  `authorbookID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `AuthorBook`
--

INSERT INTO `AuthorBook` (`authorbookID`, `bookID`, `authorID`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Authors`
--

CREATE TABLE `Authors` (
  `authorID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `ssn` varchar(100) NOT NULL,
  `birthYear` varchar(4) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Authors`
--

INSERT INTO `Authors` (`authorID`, `firstName`, `lastName`, `ssn`, `birthYear`, `url`) VALUES
(1, 'J.K.', 'Rowling', '196531071234', '1965', 'https://www.jkrowling.com'),
(2, 'Agatha', 'Christie', '189009151234', '1890', 'https://www.agathachristie.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Books`
--

CREATE TABLE `Books` (
  `bookID` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET dec8 NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `numPages` int(11) NOT NULL,
  `numEdition` int(11) NOT NULL,
  `datePublished` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Books`
--

INSERT INTO `Books` (`bookID`, `title`, `ISBN`, `numPages`, `numEdition`, `datePublished`, `status`) VALUES
(1, 'Harry Potter and the Prisoner of Askaban', '3551354030', 480, 475, '2007-02-23', 0),
(2, 'Evil under the Sun', '3455650279', 224, 100, '2015-06-13', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `imageid` int(11) NOT NULL,
  `imagename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`imageid`, `imagename`) VALUES
(10, 'Bildschirmfoto 2018-09-30 um 13.13.08.png'),
(13, 'Bildschirmfoto 2018-10-06 um 14.29.03.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Library`
--

CREATE TABLE `Library` (
  `LibraryID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `dueDate` datetime NOT NULL,
  `bookBorrower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Publisher`
--

CREATE TABLE `Publisher` (
  `PublisherID` int(11) NOT NULL,
  `companyName` varchar(40) NOT NULL,
  `publishedBooksNum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `personalNumber` varchar(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `userpwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=dec8;

--
-- Daten für Tabelle `User`
--

INSERT INTO `User` (`UserID`, `firstName`, `lastName`, `personalNumber`, `user_email`, `userName`, `userpwd`) VALUES
(1, 'Lea', 'Beck', '9802057654', 'lea.sophie.beck@gmx.de', 'bele1712', 'bele1712Pwd');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `AuthorBook`
--
ALTER TABLE `AuthorBook`
  ADD PRIMARY KEY (`authorbookID`),
  ADD UNIQUE KEY `book_id` (`bookID`),
  ADD UNIQUE KEY `author_id` (`authorID`);

--
-- Indizes für die Tabelle `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Indizes für die Tabelle `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageid`);

--
-- Indizes für die Tabelle `Library`
--
ALTER TABLE `Library`
  ADD PRIMARY KEY (`LibraryID`),
  ADD KEY `BookID` (`BookID`),
  ADD KEY `UserID` (`bookBorrower`);

--
-- Indizes für die Tabelle `Publisher`
--
ALTER TABLE `Publisher`
  ADD PRIMARY KEY (`PublisherID`);

--
-- Indizes für die Tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `AuthorBook`
--
ALTER TABLE `AuthorBook`
  MODIFY `authorbookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `Authors`
--
ALTER TABLE `Authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `Books`
--
ALTER TABLE `Books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `Library`
--
ALTER TABLE `Library`
  MODIFY `LibraryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Publisher`
--
ALTER TABLE `Publisher`
  MODIFY `PublisherID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `AuthorBook`
--
ALTER TABLE `AuthorBook`
  ADD CONSTRAINT `author_id` FOREIGN KEY (`authorID`) REFERENCES `Authors` (`authorID`),
  ADD CONSTRAINT `book_id` FOREIGN KEY (`bookID`) REFERENCES `Books` (`bookID`);

--
-- Constraints der Tabelle `Library`
--
ALTER TABLE `Library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `Library` (`LibraryID`),
  ADD CONSTRAINT `library_ibfk_2` FOREIGN KEY (`bookBorrower`) REFERENCES `User` (`UserID`);