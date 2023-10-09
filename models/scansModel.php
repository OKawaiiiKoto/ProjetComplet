<?php
require_once '../models/db.php';

class scans
{
    public $id;
    public $chapter;
    public $id_books;
    public $id_users;
    private $db;

    public function __construct()
    {
     $this->db = db::connect();
    }

    public function add()
    {
        $query = 'INSERT INTO `a5cy8_scans`( `chapter`, `id_books`, `id_users`) 
        VALUES (:chapter, :id_books , :id_users )';
        $request = $this->db->prepare($query);
        $request->bindValue(':chapter', $this->chapter, PDO::PARAM_STR);
        $request->bindValue(':id_books', $this->id_books, PDO::PARAM_INT);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $request->execute();
    }
}