<?php
//CHANGE ALL PROPERTIES LIKE HEROKU SEC SETTINGS FILE
class Database_Conexion {

    private static $dbName = 'd4p2ahn06gr2og';
    private static $dbHost = 'ec2-23-21-162-90.compute-1.amazonaws.com';
    private static $dbPort = 5432;
    private static $dbUserName = 'uqholhcelolukd';
    private static $dbUserPassword = '4e85c8de6a39e8b2a648646af0398c6dcb3a3d63538e90e7e159b705cd53e69e';
    private static $conexion = null;
    //-------------------------------------------
    private static $Db_Connection = null;
    private static $connect_string = null;

    public function __construct() {
        exit('No se permite instanciar esta clase');
    }

    public static function Connect() {
        if (null == self::$conexion) {
            try {
                
                self::$conexion = new PDO("pgsql:host=".self::$dbHost .";" ."port=" . self::$dbPort.";". "dbname=" . self::$dbName.";" ."user=" . self::$dbUserName. ";"."password="  .self::$dbUserPassword);               
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    public static function Disconnect() {
        self::$conexion = null;
    }
    
    /*
    //===========================PG-SQL--METHOD-=========================
    
     public static function Connect() {
        if (null == self::$conexion) {
            try {         
                $conexion = new PDO("pgsql:host=". self::$dbHost .";" ."port=" . self::$dbPort.";"."dbname=" . self::$dbName.";"."user=" . self::$dbUserName . ";". "password=" . self::$dbUserPassword);               
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }


    public static function Disconnect() {
        self::$conexion = null;
    }
    
    
    //*/
    //================================================

}
