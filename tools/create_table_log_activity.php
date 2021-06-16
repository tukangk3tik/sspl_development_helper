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

$sql = "CREATE TABLE log_activity (
	id int IDENTITY(1,1) PRIMARY KEY,
	id_modul int NOT NULL,
	id_pegawai int NOT NULL,
	id_data int NOT NULL,
	tabel_asal varchar(100) NOT NULL,
	aksi varchar(1) NOT NULL,
	nilai_lama text NULL,
	keterangan text NULL,
	created_at datetime NOT NULL
)";

$result = sqlsrv_query( $conn, $sql);

if ($result == false){
	echo "\033[31mTabel log_activity gagal dibuat!" . PHP_EOL;
	echo "\033[37mError (sqlsrv_query): ".print_r(sqlsrv_errors(), true);
} else {
	echo "\033[32mTabel log_activity berhasil dibuat!" . PHP_EOL;
}

echo "\033[37m";
?>