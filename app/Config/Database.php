<?php
namespace Nurdin\BinaryTalk\Config;
use PDO;
class Database{
    private static ?PDO $connection = null;

    public static function getConnect() : PDO
    {
        if (self::$connection == null) {
            $host = "localhost";
            $port = 3306;
            $dbName = "real_time_chat";
            $username = "root";
            $password = "";
            
            self::$connection = new PDO("mysql:host=$host:$port;dbname=$dbName", $username, $password);
        } 
        return self::$connection;
    }

    public static function beginTransaction(){
        self::$connection->beginTransaction();
    }

    public static function commitTransaction(){
        self::$connection->commit();
    }

    public static function rollbackTransaction(){
        self::$connection->rollBack();
    }

}
