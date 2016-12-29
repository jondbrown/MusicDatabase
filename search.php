<!DOCTYPE html>
<html>

<head>
    <title>Artist Database</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <h1>Search Artists</h1>
    <a href="insert.html" class="button">Add Artist</a>
    <br>
    <!-- Search FORM -->
    <div class="formBox">
        <form method="post" action="search.php">
            Artist Name
            <br>
            <input type="text" name="name">
            <br>
            <br> Country
            <br>
            <input type="text" name="country">
            <br>
            <br> Year Formed
            <br>
            <input type="number" name="year" min="1900" max="3000">
            <br>
            <br>
            <input class="submitButton" type="submit" name="submit">
        </form>
    </div>
    <br>
    <?php
        if ($_POST) {
                $name = $_POST['name'];
                $year = $_POST['year'];
                $country = $_POST['country'];
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
                
                //get search input from form POST
                if (empty(rtrim($year)) && empty(rtrim($country))) {
                    $sql = "SELECT * FROM artists WHERE (name LIKE '%" . $name . "%')";
                } else if (empty(rtrim($name)) && empty(rtrim($country))) {
                    $sql = "SELECT * FROM artists WHERE (yearformed LIKE '%" . $year . "%')";
                } else if (empty(rtrim($name)) && empty(rtrim($year))) {
                    $sql = "SELECT * FROM artists WHERE (country LIKE '%" . $country . "%')";
                } else if (empty(rtrim($name))) {
                    $sql = "SELECT * FROM artists WHERE (yearformed='" . $year . "') and (country LIKE '%" . $country . "%')";
                } else if (empty(rtrim($year))) {
                    $sql = "SELECT * FROM artists WHERE (name='" . $name . "') and (country LIKE '%" . $country . "%')";
                } else if (empty(rtrim($country))) {
                    $sql = "SELECT * FROM artists WHERE (name='" . $name . "') and (yearformed LIKE '%" . $year . "%')";
                } else {
                    $sql = "SELECT * FROM artists WHERE (name LIKE '%" . $name . "%') and (yearformed='" . $year . "') and (country LIKE '%" . $country . "%')";
                }
                
                if ($result = $conn->query($sql)) {
                    echo "SUCCESS";
                }else {
                    echo "Something is wrong";
                }
    
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
                    echo "<br>0 results";
                }
    
                
    
            $conn->close();
            }
            ?>
        <br>
        <br>
        <a href="artists.php" class="button">Database</a>
</body>

</html>