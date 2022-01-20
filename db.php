<?php
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'clone');
$db_connection = mysqli_connect(dbhost, dbuser, dbpass, dbname);
if (!$db_connection) {
    echo mysqli_connect_errno() . "db not found";
}
