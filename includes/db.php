<?php
    class Database{
        private static $dbHost = 'localhost';
        private static $dbName = 'ams';
        private static $dbUsername = 'root';
        private static $dbUserPassword = '';
        private static $cont = null;

        public static function connect(){
            if(null == self::$cont){
                try{
                    self::$cont = new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbName, self:: $dbUsername, self::$dbUserPassword);

                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }
            //echo "connect in db";
            return self::$cont;
        }

        public static function disconnect(){
            self::$cont = null;
        }
    }
?>