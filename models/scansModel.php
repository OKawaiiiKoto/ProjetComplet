<?php
class scans
{
    public $id;
    public $chapter;
    public $id_books;
    public $id_users;
    public $images;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=la-manu-post;charset=utf8', 'a5cy8_admin', 'Pk9GkCX8sa84');
        } catch (PDOException $e) {
            //Renvoyer vers une page d'erreur
        }
    }

    /**
     * Ajoute un article dans la base de données
     * @param string content Le contenu
     * @param string image Le lien de l'image depuis le dossier medias
     * @param int id_users L'id de la personne ayant posté l'article
     * @param int id_postsCategories L'id de la catégorie de l'article
     * @return bool
     */
    public function add()
    {
        $query = 'INSERT INTO `a5cy8_scans`(`title`, `content`, `publicationDate`, `updateDate`, `image`, `id_users`, `id_postsCategories`) 
        VALUES (:chapter, :id_books , :id_users , :images)';
        $request = $this->db->prepare($query);
        $request->bindValue(':chapter', $this->chapter, PDO::PARAM_STR);
        $request->bindValue(':id_books', $this->id_books, PDO::PARAM_INT);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':images', $this->images, PDO::PARAM_STR);
        return $request->execute();
    }

    /**
     * Vérifie que l'article existe dans la base de données
     * @param int id id de l'article à vérifier
     * @return int nombre d'articles existant avec cet id
     */
    public function checkIfExists()
    {
        $query = 'SELECT COUNT(*) FROM `a5cy8_scans` WHERE id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
}