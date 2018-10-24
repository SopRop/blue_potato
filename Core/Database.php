<?php
namespace Core;

use \RedBeanPHP\R;

class Database
{
    function __construct()
    {
        $dbname = conf('DBNAME');
        $dbuser = conf('DBUSER');
        $dbpass = conf('DBPASS');
        if(!R::testConnection())
        {
            $connexion = R::setup('mysql:host=localhost;dbname=' . $dbname, $dbuser, $dbpass);
        }
        // R::fancyDebug( TRUE );
        // $isConnected = R::testConnection();
        // var_dump($isConnected);

        // $worker2 = R::dispense( 'worker' );
        // $worker2->first_name = 'Jon';
        // $worker2->last_name = 'Jesaispas';
        // $id = R::store( $worker2 );
        
        // $worker1 = R::getAll( 'SELECT * FROM worker' );
        // var_dump($worker1);
    }
}