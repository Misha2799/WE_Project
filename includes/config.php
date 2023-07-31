 <?php
 
 
$servername = "localhost";
$username = "root"; // default username for localhost is root
$password = ""; // default password for localhost is empty
$dbname = "parcelDB"; // database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>


