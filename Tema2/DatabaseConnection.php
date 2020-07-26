<?php


class DatabaseConnection
{
    private static $instance = null;

    public static function connection() {
        $server_name = "localhost";
        $username = "root";
        $database_name = "pentalog";

        if(is_null(self::$instance)) {
            self::$instance = new PDO("mysql:host=$server_name;dbname=$database_name", $username);
        }
        return self::$instance;
    }
}