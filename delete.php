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

            //retrieve artist ID from HTML POST
            $ID = $_POST["delete"];
            
            //sql statement
            $sql = "DELETE from artists where artistID='".$ID."'";
            
            //execute statement and check
            if ($conn->query($sql) === TRUE){
                echo "Success<br>";
                echo "Record is DELETED from Artist table!";
            } else {
                echo "YOU SCREWED UP!";
            }

            $conn->close();
        ?>

    </body>

</html>