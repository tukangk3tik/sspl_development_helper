<?php

parse_str(implode('&', array_slice($argv, 1)), $_GET);

if (isset($_GET['cmd'])) {

    switch($_GET['cmd']) {
        case 'add_timestamp_all' :
            require "tools/add_timestamp_column.php";
            break;
        
        case 'add_timestamp_prefix':
            require "tools/add_timestamp_by_prefix.php";
            break;
        
        case 'drop_timestamp' :
            require "tools/remove_timestamp_column.php";
            break;

        case 'drop_timestamp_prefix':
            require "tools/drop_timestamp_by_prefix.php";
            break;

        case 'create_log_activity' :
            require "tools/create_table_log_activity.php";
            break;

        case 'create_log_login' :
            require "tools/create_table_log_login.php";
            break;
    
        case 'set_timestamp':
            require "tools/set_timestamp.php";
            break;

        case 'drop_column_prefix':
            require "tools/drop_column_by_prefix.php";
            break;

        default:
            echo "\033[33m\nCommand not found!\n\033[37m" . PHP_EOL;
            available_commands();
            break;
    }
} else {
    echo "\033[33m\nCommand is not set!\033[37m" . PHP_EOL;
    echo "\033[37m\nUsage: php sspl_tools.php cmd=<your_command>\n" . PHP_EOL;
    available_commands();
}


function available_commands() {
    echo "Available commands: " . PHP_EOL;
    echo " add_timestamp_all\t -> Add created_at, update_at, deleted_at column for all table\n";
    echo " add_timestamp_prefix\t -> Add created_at, update_at, deleted_at column for specific table by prefix\n";
    echo " drop_timestamp\t\t -> Drop created_at, update_at, deleted_at column for all table\n";
    echo " drop_timestamp_prefix\t -> Drop created_at, update_at, deleted_at column for specific table by prefix\n";
    echo " create_log_activity\t -> Create log_activity table\n";
    echo " create_log_login\t -> Create log_login table\n";
    echo " set_timestamp\t\t -> Set value for created_at and updated_at at choosen table\n";
    echo " drop_column_prefix\t -> Drop table by prefix\n";
}


