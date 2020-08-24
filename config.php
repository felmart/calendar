<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$config = parse_ini_file('./config.ini', true);
$DB_SERVER = $config['database']['servername'];
$DB_NAME = $config['database']['dbname'];
$DB_USERNAME = $config['database']['username'];
$DB_PASSWORD = $config['database']['password'];
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'kinaro');
// define('DB_PASSWORD', 'Class1cJ5rk9#');
// define('DB_NAME', 'calendar');
 
/* Attempt to connect to MySQL database */
try {
    $link = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    echo "Connection failed " . $th->getMessage();
} finally {
    // echo "<p>Closing Connection...</p>";
    $link = null;
}
# $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. "); #. mysqli_connect_error());
}
?>