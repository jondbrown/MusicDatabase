<!DOCTYPE html>
<html>

    <head>
        <title>Artist Database</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <h1>My Favorite Artists</h1>
        <a href="artists.php" class="button">Artist List</a>
        <br>
        <br>
        <?php
            error_reporting(E_ALL);
            $servername = "db662455209.db.1and1.com";
            $username = "dbo662455209";
            $password = "password";
            $dbname = "db662455209";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            echo "Connected<br>";
            
            //Delete and drop table entries and tables
            $sql = "DROP * FROM songs";
            $conn->query($sql);
            $sql = "DROP TABLE songs";
            $conn->query($sql);
            $sql = "DROP * FROM albums";
            $conn->query($sql);
            $sql = "DROP TABLE albums";
            $conn->query($sql);
            $sql = "DROP * FROM artists";
            $conn->query($sql);
            $sql = "DROP TABLE artists";

            if ($conn->query($sql) === TRUE){
                echo 'Success<br>';
                echo 'Database is Destroyed!<br>';
            } else {
                echo 'YOU SCREWED UP!';
            }
            /*
            
            
            RESET DATABASE



            SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
            SET time_zone = '+00:00';
            */

            /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
            /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
            /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
            /*!40101 SET NAMES utf8 */;
            /*
            --
            -- Database: `db662455209`
            --

            -- --------------------------------------------------------

            --
            -- Table structure for table `albums`
            --
            */
            $sql = "CREATE TABLE IF NOT EXISTS `albums` (
                `albumID` int(11) NOT NULL AUTO_INCREMENT, 
                `title` varchar(255) NOT NULL, 
                `artistID` int(11) NOT NULL, 
                `year` int(11) NOT NULL, 
                PRIMARY KEY (`albumID`), 
                KEY `artistID` (`artistID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

            $conn->query($sql);
            if ($conn->query($sql) === TRUE){
                echo 'Success<br>';
                echo 'Albums Created!<br>';
            } else {
                echo 'YOU SCREWED UP!';
            }
            /*
            -- --------------------------------------------------------

            --
            -- Table structure for table `artists`
            --
            */
            $sql = "CREATE TABLE IF NOT EXISTS `artists` (
              `name` varchar(255) NOT NULL,
              `yearformed` int(11) NOT NULL,
              `country` varchar(255) NOT NULL,
              `artistID` int(11) NOT NULL AUTO_INCREMENT,
              PRIMARY KEY (`artistID`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18" ;

            $conn->query($sql);
            if ($conn->query($sql) === TRUE){
                echo 'Success<br>';
                echo 'Artists Created!<br>';
            } else {
                echo 'YOU SCREWED UP!';
            }
            /*
            --
            -- Dumping data for table `artists`
            --
            */

            $sql = "INSERT INTO `artists` (`name`, `yearformed`, `country`, `artistID`) VALUES
            ('Muse', 1994, 'United Kingdom', 1),
            ('Nirvana', 1987, 'United States', 2),
            ('Vince Guaraldi', 1953, 'United States', 3)";


            if ($conn->query($sql) === TRUE){
                echo 'Success<br>';
                echo 'Sample Artists Added!<br>';
            } else {
                echo 'YOU SCREWED UP!';
            }
            /*
            -- --------------------------------------------------------

            --
            -- Table structure for table `songs`
            --
            */
            $sql = "CREATE TABLE IF NOT EXISTS `songs` (
              `title` varchar(255) NOT NULL,
              `albumID` int(11) NOT NULL,
              `artistID` int(11) NOT NULL,
              KEY `albumID` (`albumID`),
              KEY `artistID` (`artistID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
            $conn->query($sql);
            if ($conn->query($sql) === TRUE){
                echo 'Success<br>';
                echo 'Songs created!<br>';
            } else {
                echo 'YOU SCREWED UP!';
            }
            /*
            --
            -- Constraints for dumped tables
            --

            --
            -- Constraints for table `albums`
            --
            */

            $sql = "ALTER TABLE `albums`
              ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artistID`) REFERENCES `artists` (`artistID`)";
            if ($conn->query($sql) === TRUE){
                echo 'Success<br>';
                echo 'FK From Albums to ArtistID<br>';
            } else {
                echo 'YOU SCREWED UP!';
            }
            /*--
            -- Constraints for table `songs`
            --*/
            $sql = "ALTER TABLE `songs`
              ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`albumID`) REFERENCES `albums` (`albumID`),
              ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`artistID`) REFERENCES `artists` (`artistID`)";
            if ($conn->query($sql) === TRUE){
                echo 'Success<br>';
                echo 'FK from Songs to album an artists<br>';
            } else {
                echo 'YOU SCREWED UP!';
            }
            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
            /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
            /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION ;
            ";*/



            $conn->close();
            ?>
        <meta http-equiv='Refresh' content='2; url=artists.php'>
    </body>

</html>