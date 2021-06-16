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

$prefix = readline("Masukkan prefix tabel: ");

$sql = "SELECT table_name FROM information_schema.tables WHERE table_name LIKE '$prefix%'";
$stmt = sqlsrv_query( $conn, $sql);

if (sqlsrv_has_rows($stmt)){

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

        $statusUpdate = "\033[32mAlter Success!";
        $table_name = "[" . $row["table_name"] . "]";
   
        $qUpdate = "ALTER TABLE " . $table_name .
                       " DROP COLUMN created_at,
                       updated_at,
                       deleted_at";
   
        $result = sqlsrv_query( $conn, $qUpdate );
   
        if ($result == false){
             $statusUpdate = "\033[31mError (sqlsrv_query): ".print_r(sqlsrv_errors(), true);
        }
   
        echo "\033[37m" . $row['table_name']. " - " . $statusUpdate . PHP_EOL;
        
    }

} else {
    echo "\033[31mError (sqlsrv_query): ".print_r(sqlsrv_errors(), true);
}


echo "\033[37m";

?>