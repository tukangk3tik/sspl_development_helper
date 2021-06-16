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

$table_name = readline("Masukkan nama tabel: ");

$sql = "select table_name from information_schema.tables WHERE table_name = '$table_name'";
$stmt = sqlsrv_query( $conn, $sql);

if ($stmt){
    $statusUpdate = "\033[32mUpdate Success!";
    $tgl_sekarang =  date("Y-m-d H:i:s");

    $qUpdate = "UPDATE " . $table_name .
                " SET created_at = '$tgl_sekarang',
                updated_at = '$tgl_sekarang' WHERE
                deleted_at IS NULL";

    $result = sqlsrv_query( $conn, $qUpdate );

    if (!$result) {
        $statusUpdate = "\033[31mError (sqlsrv_query): ".print_r(sqlsrv_errors(), true);
    }
} else {
    $statusUpdate = "\033[31mError (sqlsrv_query): ".print_r(sqlsrv_errors(), true);
}

echo $statusUpdate . PHP_EOL;
echo "\033[37m";

?>