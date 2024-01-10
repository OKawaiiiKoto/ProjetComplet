<?php
require_once '../models/db.php';
// Définition de la classe "transaction" pour gérer les transactions de la base de données
class transaction {
    // Propriété privée pour stocker la connexion à la base de données
    private $db;

    // Constructeur de la classe
    public function __construct() {
        $this->db = db::connect();
    }

    // Méthode pour commencer une transaction
    public function beginTransaction() {
        // Appelle la méthode "beginTransaction" de l'objet PDO pour démarrer une transaction
        return $this->db->beginTransaction();
    }
    // Méthode pour commencer une transaction
    public function commit() { 
        return $this->db->commit();
    }

    // Méthode pour annuler une transaction
    public function rollBack() {
        return $this->db->rollBack();
    }

    // Méthode pour obtenir l'ID de la dernière insertion dans la base de données
    public function lastInsertId() {
        // Appelle la méthode "lastInsertId" de l'objet PDO pour obtenir l'ID de la dernière insertion
        return $this->db->lastInsertId();
    }
}
