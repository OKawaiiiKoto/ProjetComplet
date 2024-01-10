<?php
class db {
    private static $db = NULL ;

    // Méthode pour établir une connexion à la base de données
    static function connect() {
        if (is_null(self::$db)) {
            try {
                // Crée une nouvelle instance de PDO pour la connexion à la base de données MySQL
                self::$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'a5cy8_admin', 'Pk9GkCX8sa84');
            } catch (PDOException $e) {
                // Gère les erreurs de connexion en affichant un message d'erreur (actuellement commenté, devrait être implémenté)
                // Renvoyer vers une page d'erreur ou effectuer une autre action en cas d'échec de la connexion
            }
        }
        // Renvoie la connexion à la base de données (PDO)
        return self::$db;
    } 
}
