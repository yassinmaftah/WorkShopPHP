<?php

class Database 
{
    private static $host = "localhost" ;
    private static $dbmane = "library_db";
    private static $password = "sqlyassine2025";
    private static $username = "root";
    private static $conn = null;

    public static function GetConn ()
    {
        if (!self::$conn)
        {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbmane . ";",
                self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // echo "OK";
            } catch(PDOException $e) {
                die("Connection Error: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}

