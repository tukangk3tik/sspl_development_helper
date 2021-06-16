# sspl_development_helper
This tools was created for help me developing integrated system in a plantation company.
Can use for other project.

Note:
* Only for SQL Server
* For CLI only
* Please config the connection first

#### How to config the connection: ####
1. Create connection.php inside tools folder.
2. Here is the contents of the file:
```
$serverName = "DESKTOP-VTQEC12"; 
$connectionInfo = array( "Database"=>"your_database", "UID"=>"your_username", "PWD"=>"your_password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
```
