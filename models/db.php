<?php
class db {
    private static $db = NULL ;
    static function connect() {
        if (is_null(self::$db)) {
            try {
                self::$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'a5cy8_admin', 'Pk9GkCX8sa84');
            } catch (PDOException $e) {
                //Renvoyer vers une page d'erreur
            }
        }
    return self::$db;
    } 
}