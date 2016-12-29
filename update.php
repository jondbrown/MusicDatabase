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
        
        //BEGIN PHP
        <?php
        error_reporting(E_ALL);
        //Connection variables
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
        
        //Get Query statement variables from HTML POST
        $artist = $_POST["name"];
        $country = $_POST["country"];
        $year = $_POST["year"];
        $ID = $_POST["ID"];
        
        //sql STATEMENT
        $sql = "UPDATE artists SET name='" . $artist . "', yearformed='" . $year . "', country='" . $country ."' WHERE artistID='".$ID."'";
        
        //Execute Statement and check for result
        if ($conn->query($sql) === TRUE){
            echo "Success<br>";
            echo "Record is UPDATED in Artist table!<br>";
            echo "" . $artist . " formed in " . $year . " in " . $country . ".";
        } else {
            echo "YOU SCREWED UP!";
        }

        $conn->close();
        ?>
        <meta http-equiv="Refresh" content="2; url=artists.php">
    </body>

</html>