<?php
class comments {
    public int $id = 0;
    public string $date = '';
    public string $content = '';
    public int $id_users = 0;
    public int $id_scans = 0;
    private $db;

    public function __construct() {
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'a5cy8_admin', 'Pk9GkCX8sa84');
        } catch(PDOException $e) {
            //Renvoyer vers une page d'erreur
        }
    }

    /**
     * Ajoute un commentaire
     * @param string content Contenu du commentaire
     * @param int id_scans      Id de l'article commenté
     * @param int id_users Id de l'auteur du commentaire
     * @return bool Renvoie true si la requête est executée sinon renvoie false
     */
    public function add(){
        $query = 'INSERT INTO `a5cy8_comments` (DATE_FORMAT(`Date`, "%d/%m/%Y à %Hh%i") AS `date`, `content` , `id_users` , `id_scans`) 
        VALUES (NOW(), :content, :id_users, :id_scans);';
        $request = $this->db->prepare($query);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':id_scans', $this->id_scans, PDO::PARAM_INT);
        return $request->execute();
    }
}