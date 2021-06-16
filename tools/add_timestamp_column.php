<?php

//import connection
require "connection.php";

if( $conn ) {
     echo "\033[32mConnection established." . PHP_EOL;
}else{
     echo "\033[31mConnection could not be established." . PHP_EOL;
     die( print_r( sqlsrv_errors(), true));
}

echo "\033[37m==========================================." . PHP_EOL;

$sql = "select table_name from information_schema.tables ORDER BY table_name";
$stmt = sqlsrv_query( $conn, $sql);

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
     $statusUpdate = "\033[32mAlter Success!";
     $table_name = "[" . $row["table_name"] . "]";

     $qUpdate = "ALTER TABLE " . $table_name .
                    " ADD created_at datetime,
                    updated_at datetime,
                    deleted_at datetime";

     $result = sqlsrv_query( $conn, $qUpdate );

     if ($result == false){
          $statusUpdate = "\033[31mError (sqlsrv_query): ".print_r(sqlsrv_errors(), true);
     }

     echo "\033[37m" . $row['table_name']. " - " . $statusUpdate . PHP_EOL;
}

echo "\033[37m";

if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
?>