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
        
                //get artists ID from html POST
                $ID = $_POST["edit"];
                
                //get artist information from artistID
                $sql = "SELECT * FROM artists WHERE artistID='" . $ID. "'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $artist = $row["name"];
                $country = $row["country"];
                $year = $row["yearformed"];
                
                //Current Entry Info for reference
                echo "<br>" . $artist;
                echo "<br>" . $country;
                echo "<br>" . $year;
                echo "<h1>Type Artists Information Below</h1>";
                    
                    //Form to update artist
                    echo "<!-- INSERT FORM -->";
                    echo "<div class='formBox'>";
                        echo "<form method='post' action='update.php'>";
                            //NAME
                            echo "Artist Name<br> <input type='text' name='name' value='" . $artist . "' required><br><br>";
                            //COUNTRY
                            echo "Country<br> <input type='text' name='country' value='" . $country . "' required><br><br>";
                            //YEAR
                            echo "Year Formed<br> <input type='number' name='year' min='1900' max='3000' value='" . $year . "' required><br><br>";
                            //ID
                            echo "<input type='hidden' name='ID' value='".$ID."'>";
                            echo "<input class='submitButton' type='submit' name='submit'>";
                        echo "</form>";
                    echo "</div>";


                $conn->close();
            ?>
    </body>

</html>