<?php
class books
{
    public $id;
    public $name;
    public $year;
    public $summary;
    public $image;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'a5cy8_admin', 'Pk9GkCX8sa84');
        } catch (PDOException $e) {
            //Renvoyer vers une page d'erreur
        }
    }

    public function add()
    {
        $query = 'INSERT INTO `a5cy8_books`( `name` , `year` , `summary` , `image`) 
        VALUES ( :name , :year , :summary , :image)';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->bindValue(':year', $this->year, PDO::PARAM_STR);
        $request->bindValue(':summary', $this->summary, PDO::PARAM_STR);
        $request->bindValue(':image', $this->image, PDO::PARAM_STR);
        return $request->execute();
    }

    public function checkIfExists()
    {
        $query = 'SELECT COUNT(*) FROM `a5cy8_books` WHERE id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function checkBooksAvaibility (){
        $query ='SELECT COUNT(*) FROM `a5cy8_books` WHERE name = :name';
        $request = $this->db->prepare($query);
        $request->bindValue (':name', $this->name, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN); 
    }

    public function getOneById() {
        $query = 'SELECT  `name`, `year`, `summary` , `image`
        FROM `a5cy8_books`  
        WHERE `a5cy8_books`.`id` = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ); 
    }

    public function getList()
    {
        $query = 'SELECT `b`.`id` , `name` , `year` , `summary`, `image`
        FROM `a5cy8_books` AS `b`';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() {
        $query = 'UPDATE `a5cy8_books` 
        SET `name`=:name ,`year`=:year , `summary`=:summary 
        WHERE `id`= :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->bindValue(':year', $this->year, PDO::PARAM_STR);
        $request->bindValue(':summary', $this->summary, PDO::PARAM_STR);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    public function updateImage(){
        $query = 'UPDATE `a5cy8_books` 
        SET `image`=:image 
        WHERE `id`= :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':image', $this->image, PDO::PARAM_STR);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    } 

    public function deleteBooks() {
        $query = 'DELETE FROM `a5cy8_Books` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $request->execute();    
    }

}