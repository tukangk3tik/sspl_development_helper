<?php

if (isset($argv[1])) 
{

    //ada 4 fungsi: add, create, set, drop

    $argument1 = trim($argv[1]);
    $split1 = explode(":", $argument1);

    if ($split1[0] == 'add') {

        if (isset($split1[1])) 
        {
            switch($split1[1]){

                case 'timestamp_column':
                    require "tools/add_timestamp_column.php";
                    break;
                
                case 'timestamp_prefix':
                    require "tools/add_timestamp_by_prefix.php";
                    break;

                default:
                    sub_commands();
                    break;
            }
        }
        else 
        {
            sub_commands();
        }

    } 
    elseif ($split1[0] == 'create') {

        if (isset($split1[1])) 
        {
            switch($split1[1]){

                case 'log_activity' :
                    require "tools/create_table_log_activity.php";
                    break;
        
                case 'log_login' :
                    require "tools/create_table_log_login.php";
                    break;
                
                default:
                    sub_commands();
                    break;

            }
        }
        else 
        {
            sub_commands();
        }

    } 
    elseif ($split1[0] == 'drop') 
    {

        if (isset($split1[1])) 
        {

            switch($split1[1])
            {

                case 'column_prefix':
                    require "tools/drop_column_by_prefix.php";
                    break;

                case 'timestamp' :
                    require "tools/remove_timestamp_column.php";
                    break;
        
                case 'timestamp_prefix':
                    require "tools/drop_timestamp_by_prefix.php";
                    break;

                default:
                    sub_commands();
                    break;

            }
        }
        else 
        {
            sub_commands();
        }

    }
    elseif ($split1[0] == 'set') {

        if (isset($split1[1])) 
        {
            switch($split1[1])
            {

                case 'timestamp':
                    require "tools/set_timestamp.php";
                    break;
    
            }
        } 
        else 
        {
            sub_commands();
        }

    } 
    elseif ($split1[0] == 'check') {

        if (isset($split1[1])) 
        {
            switch($split1[1])
            {

                case 'connection':
                    require "tools/check_connection.php";
                    break;
    
            }
        } 
        else 
        {
            sub_commands();
        }

    } 
    else 
    {
        echo "\033[33m\nWrong command!\033[37m" . PHP_EOL;
        echo "\033[37m\nUsage: php sspl_tools.php <your_command>:<sub_command>" . PHP_EOL;
        echo "\033[32m\nExample:\033[37m php sspl_tools.php add:timestamp_prefix\n" . PHP_EOL;
        available_commands();    
    }

} else {
    echo "\n";
    available_commands();
}

function available_commands() 
{
    echo "Available commands: \n" . PHP_EOL;
    echo " check:\n";
    echo " - connection\t\t -> Check database connection.\n";
    echo "\n";
    echo " add:\n";
    echo " - timestamp_all\t -> Add created_at, update_at, deleted_at column for all table\n";
    echo " - timestamp_prefix\t -> Add created_at, update_at, deleted_at column for specific table by prefix\n";
    echo "\n";
    echo " drop:\n"; 
    echo " - timestamp\t\t -> Drop created_at, update_at, deleted_at column for all table\n";
    echo " - timestamp_prefix\t -> Drop created_at, update_at, deleted_at column for specific table by prefix\n";
    echo " - column_prefix\t -> Drop table by prefix\n";
    echo "\n";
    echo " create:\n";
    echo " - log_activity\t\t -> Create log_activity table\n";
    echo " - log_login\t\t -> Create log_login table\n";
    echo "\n";
    echo " set:\n";
    echo " - timestamp\t\t -> Set value for created_at and updated_at at choosen table\n";
   
}

function sub_commands() 
{
    echo "\033[33m\nSubcommand is not set!\033[37m" . PHP_EOL;
    echo "\033[37m\nUsage: php sspl_tools.php <your_command>:<sub_command>\n" . PHP_EOL;
    available_commands();    
}


