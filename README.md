# sspl_development_helper
A tool that I created to help me develop an integrated system in a plantation company.
This tool can also be used for other projects

Note:
* DBMS used is MS. SQL Server
* PHP CLI
* Config the connection first

#### How to config the connection: ####
1. Create connection.php inside tools folder.
2. Add the following content to the file:
```
$serverName = "your_server"; 
$connectionInfo = array( "Database"=>"your_database", "UID"=>"your_username", "PWD"=>"your_password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
```
