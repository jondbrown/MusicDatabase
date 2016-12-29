<!DOCTYPE html>
<html>

    <head>
        <title>Artist Database</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <h1>My Favorite Artists</h1>
        <p>A demo database web app using PHP and a MySQL database.<br>
        Add/Edit/Search for any artist you like.<br>
        If you feel you have destroyed the database beyond repair, just restart it withe button on the bottom.</p>
        <a href="insert.html" class="button">Add Artist</a>
        <a href="search.php" class="button">Search Artists</a>
        <br>
        <br>
            <?php
                error_reporting(E_ALL);
        
                //connectio variables
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
                
                //Get artist Table data
                $sql = "SELECT * from artists order by name";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    // output data of each row in table
                    echo "<table border='1' width='100%' class='dbTable'>";
                    echo "<tr>";
                        echo "<th>Artist</th>";
                        echo "<th>Year Formed</th>";
                        echo "<th>Country</th>";
                        echo "<th class='edit'>Edit</th></tr>";
                    
                    while($row = $result->fetch_assoc()) {
                        
                        $id = $row["artistID"];
                        echo "<tr>";
                            echo"<td> " . $row["name"]. "</td>"; 
                            echo "<td> " . $row["yearformed"]. " </td>"; 
                            echo "<td> " . $row["country"]. " </td>"; 
                            echo "<td class='edit'>";
                        
                                //<!-- buttons to edit or delete entry -->
                                echo "<form action='edit.php' method='post'>";
                                    echo "<button type='submit' name='edit' value='" . $id . "'>Edit</button>";
                                echo "</form>";
                                echo "<form action='delete.php' method='post'>";
                                    echo "<button type='submit' name='delete' value='" . $id . "'>Delete</button>";
                                echo "</form>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
            <br>
            <br>
            <a href="restart.php" class="button">Reset Database</a>
    </body>

</html>