-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 05. Okt 2018 um 09:09
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
  `email` varchar(30) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=dec8;

--
-- Daten für Tabelle `User`
--

INSERT INTO `User` (`UserID`, `firstName`, `lastName`, `personalNumber`, `email`, `userName`, `password`) VALUES
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













#alternative login code

session_start();

#check if submit button has been clicked

if(isset($_POST['submit'])){


  #include data from login form + security -> makes sure no one can type any kind of malicious code in there
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


  //Error handlers
  //Check if inputs are empty
  if (empty($username) || empty($pwd)) {
    echo 'please enter username and password';//doesn't tell user what kind of error->more secure
    
  } else {//check if username exists in DB
    //select statement to select any username from the user table in DB
    $sql = "SELECT * FROM User WHERE UserID='$username'";
    //run this inside DB by couring it 
    $result = mysql_query($conn, $sql);
    //check if we had any results -> returns any kind of indicaters that tell us how many rows were found inside the database using the search parameters above
    $resultCheck = mysql_num_rows($result);
    //if no results in DB
    if ($resultCheck < 1) {
      echo 'no user like that existing';
    } else {//see if user did type in correct password
      if ($row = mysqli_fetch_assoc($result)) {//take data that we got returened frm DB when we searched for a user and gets inserted in an array calles $row
        //check if password that user typed in fits to one in db connected to username
        //DE-hashing the passoword
        $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
        //check if returned as ture/false statement
        if ($hashedPwdCheck == false) {
          echo 'wrong password';
        } elseif ($hashedPwdCheck == true) {
          //Log in the user here
          //use superglobal that has a var that we can access inside all pages in the website
          $_SESSION['u_id'] = $row['UserID'];
          $_SESSION['u_f'] = $row['firstName'];
          $_SESSION['u_l'] = $row['lastName'];
          $_SESSION['u_p'] = $row['personalNumber'];
          $_SESSION['u_e'] = $row['user_email'];
          $_SESSION['u_uid'] = $row['userName'];
          $_SESSION['u_pwd'] = $row['user_pwd'];
          header('Location: admin.php?login=success');
          exit();
        }
      }
    }

  }

} else { //if try to acces admin page without having cklicked the button
  echo 'please enter username and password';
}