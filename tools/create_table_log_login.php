<?php

//import connection
require "connection.php";

if( $conn ) {
     echo "\033[32mConnection established." . PHP_EOL;
     echo "\033[37m=======================" . PHP_EOL;
}else{
     echo "\033[31mConnection could not be established." . PHP_EOL;
     die( print_r( sqlsrv_errors(), true));
}

$sql = "CREATE TABLE log_login (
	id int IDENTITY(1,1) PRIMARY KEY,
	uid_user int NOT NULL,
	waktu_login datetime NOT NULL,
	id_session int NULL
)";

$result = sqlsrv_query( $conn, $sql);

if ($result == false){
	echo "\033[31mTabel log_login gagal dibuat!" . PHP_EOL;
	echo "\033[37mError (sqlsrv_query): ".print_r(sqlsrv_errors(), true);
} else {
	echo "\033[32mTabel log_login berhasil dibuat!" . PHP_EOL;
}

echo "\033[37m";
?>