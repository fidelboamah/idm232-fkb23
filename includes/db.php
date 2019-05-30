<?php
// Create a connection Server, username, password, name of database stored in variables 

$db_server = 'localhost'; 
// will change to your domain.com
// he defines these as constants and not varaibles so that it does not change by mistake. putting the name of the constants in all caps
 define('DB_SERVER', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', 'root');
 define('DB_NAME', 'Recipe');

 $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

 if (mysqli_connect_errno()) {
     die('Database connection failed: ' . mysqli_connect_errno() . '' . mysqli_connect_errno());
 }
    else {
        echo "It worked bro!";
    }

?>

<!-- // placed in the includes folder -->
