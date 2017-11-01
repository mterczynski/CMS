<?php
    function getNewConnection(){
        $dbName = "projekt_cms";
        $dbUser = "janek";
        $dbPassword = "janek";
        $dbAddress = "127.0.0.1";

        $connection = new mysqli($dbAddress, $dbUser, $dbPassword, $dbName) or die("Connection failed : " . mysql_error());
        if(!$connection) {
            die("Connection failed : " . mysql_error());
        }
        return $connection;
    }
    function clearSession(){
        session_unset();
        session_destroy();
    }
?>
