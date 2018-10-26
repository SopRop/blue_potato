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
    }
}