<?php
require_once '../models/db.php';

class transaction {
    private $db;
    public function __construct() {
        $this->db = db::connect();
    }
    public function beginTransaction() {
       return $this->db->beginTransaction();
    }
    public function commit() {
       return $this->db->commit();
    }
    public function rollBack() {
       return $this->db->rollBack();
    }
    public function lastInsertId() {
         return $this->db->lastInsertId();
    }

}