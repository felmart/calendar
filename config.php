<?php
/**
 * Database config
 * Create a 'config.ini' file with the following format
 * 
 * [database]
 * servername = "localhost"
 * dbname = "calendar"
 * username = ""
 * password = ""
 * 
 */
$config = parse_ini_file('./config.ini', true);
$DB_SERVER = $config['database']['servername'];
$DB_NAME = $config['database']['dbname'];
$DB_USERNAME = $config['database']['username'];
$DB_PASSWORD = $config['database']['password'];
 
/* Attempt to connect to MySQL database */
try {
    $link = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    echo "Connection failed " . $th->getMessage() . "in " . $th->getFile() . "on line " . $th->getLine() . "\n";
} finally {
    // Terminate the connection whether you succeeded or not, to free resources
    $link = null;
}

// Check connection
if($link === false){
    die("ERROR: Could not connect. ");
}
