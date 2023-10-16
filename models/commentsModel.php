<?php

require_once '../models/db.php';

class comments {
    public int $id = 0;
    public string $date = '';
    public string $content = '';
    public int $id_users = 0;
    public int $id_scans = 0;
    private $db;

    public function __construct() {
        $this->db = db::connect();
    }

    /**
     * Ajoute un commentaire
     * @param string content Contenu du commentaire
     * @param int id_scans      Id de l'article commenté
     * @param int id_users Id de l'auteur du commentaire
     * @return bool Renvoie true si la requête est executée sinon renvoie false
     */
    public function add(){
        $query = 'INSERT INTO `a5cy8_comments` (`date`, `content` , `id_users` , `id_scans`) 
        VALUES (NOW(), :content, :id_users, :id_scans);';
        $request = $this->db->prepare($query);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':id_scans', $this->id_scans, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getCommentsById() {
        $query = 'SELECT `id` , DATE_FORMAT(`date`, "%d/%m/%Y à %Hh%i") AS `date`, `content` , `id_users` , `id_scans`
        FROM `a5cy8_comments` 
        WHERE `id_users` = :id_users
        ORDER BY `date` DESC
        LIMIT 10;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users',$this->id_users, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentsListByScans() {
        $query = 'SELECT  DATE_FORMAT(`date`, "%d/%m/%Y à %Hh%i") AS `date`,`content`, `username` 
        FROM `a5cy8_comments` 
        INNER JOIN `a5cy8_users` ON `a5cy8_users`.`id` = `id_users` 
        WHERE `id_scans` = :id_scans;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_scans', $this->id_scans, PDO::PARAM_INT);            
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
        }

}