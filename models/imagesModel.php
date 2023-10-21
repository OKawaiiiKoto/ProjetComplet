<?php
require_once '../models/db.php';

class images {
    public $images;
    public $id_scans;
    public $id_books;
    public $id_users;
    private $db;

public function __construct()
    {
     $this->db = db::connect();
    }

    public function add()
    {
        $query = 'INSERT INTO `a5cy8_images`( `images`, `id_scans`) 
        VALUES (:images , :id_scans )';
        $request = $this->db->prepare($query);
        $request->bindValue(':images', $this->images, PDO::PARAM_STR);
        $request->bindValue(':id_scans', $this->id_scans, PDO::PARAM_INT);
        return $request->execute();
    }
    public function getImagesByIdScans() {
        $query = 'SELECT `images` 
        FROM `a5cy8_images` 
        WHERE `id_scans` = :id_scans;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_scans',$this->id_scans, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}