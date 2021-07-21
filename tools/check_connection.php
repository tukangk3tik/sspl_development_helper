<?php

//import connection
require "connection.php";

echo "\n";

if( $conn ) {
     echo "\033[32mConnection established." . PHP_EOL;
     echo "\033[37m=======================" . PHP_EOL;
     echo "\033[37mServer\t\t: " . $serverName . PHP_EOL;
     echo "\033[37mDatabase\t: " . $dbName . PHP_EOL;
}else{
     echo "\033[31mConnection could not be established." . PHP_EOL;
     die( print_r( sqlsrv_errors(), true));
}

echo "\033[37m" . PHP_EOL;
