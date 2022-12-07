<?php

/**
 * This is custom script.
 * Created for remove prefix id from barcode at patologi nurseries detail.
 */

require "../tools/connection.php";
require "../lib/library.php";

if( $conn ) {
    echo "\033[32mConnection established." . PHP_EOL;
}else{
    echo "\033[31mConnection could not be established." . PHP_EOL;
    die( print_r( sqlsrv_errors(), true));
}

echo "\033[37m==========================================." . PHP_EOL;

// Define id nurseries
$idNurseries = "1060";

// Change this for remove character
$prefix = "-$idNurseries";

$sql = "SELECT id, barcode 
    FROM pat_nurseriesdetail 
    WHERE idnurseries = '$idNurseries' 
    AND deleted_at IS NULL";

$stmt = sqlsrv_query( $conn, $sql );

echo "\033[33m" . "Starting update..." . PHP_EOL;

$updatedCount = 0; 
$failCount = 0;

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

    // replace the barcode
    $barcode = str_replace($prefix, "", $row['barcode']); 
    
    $update = "UPDATE pat_nurseriesdetail 
        SET barcode = '$barcode',
        last_sync = '$waktu_sekarang',
        updated_at = '$waktu_sekarang'
        WHERE id = '$row[id]'";

    $result = sqlsrv_query($conn, $update);
    if (!$result){
        $failCount++;
    } else {
        $updatedCount++; 
    }
}

echo "\033[33m" . "Finish update..." . PHP_EOL;
echo "\033[37m---------------------------------". PHP_EOL;
echo "\033[32m" . "Success: $updatedCount" . PHP_EOL;
echo "\033[31m" . "Fail   : $failCount" . PHP_EOL;

echo "\033[37m";
