<?php
    function getNewConnection(){
        $dbName = "projekt_cms";
        $dbUser = "dj82hdh2hHSDUH";
        $dbPassword = "q2d2SD@H*H@S";
        $dbAddress = "127.0.0.1";

        

        $connection = new mysqli($dbAddress, $dbUser, $dbPassword, $dbName) or die("Connection failed : " . mysql_error());
        if(!$connection) {
            die("Connection failed : " . mysql_error());
        }
        mysqli_set_charset($connection,"utf8");
        return $connection;
    }
?>
