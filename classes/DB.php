<?php
class DB {
    public static function getConnection()
    {
        $host = 'localhost';
        $dbname = 'db_users';
        $user = 'root';
        $password = '4496456Buz';
        
        $db = new PDO ("mysql:host=$host; dbname=$dbname", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
        return $db;
    }
}
