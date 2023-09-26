<?php

class users {
    public $id;
    public $email;
    public $username;
    public $password;
    public $checkPassword;
    public $birthdate;
    public $id_usersRoles;
    private $db;

    public function __construct() {
         try { 
            $this->db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'a5cy8_admin', 'Pk9GkCX8sa84');
    } catch (PDOException $e){
    //Renvoyer vers une page d'erreur 
    }
}
 /**
     * Ajoute un utilisateur (inscription)
     * @param string username Nom d'utilisateur
     * @param string email Adresse mail
     * @param string password Mot de passe (hashé)
     * @param string birthdate Date de naissance (au format mysql - yyyy-mm-dd)
     * @return bool Retourne true si la requête s'est exécutée ou false si la requête a rencontré un problème
     */
    public function add(){
        $query = 'INSERT INTO a5cy8_users (username, email, password, birthdate, id_usersRoles) 
        VALUES (:username, :email, :password, :birthdate, 1)';

        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        return $request->execute();
    }

    public function checkEmailAvaibility (){
        $query ='SELECT COUNT(*) FROM `a5cy8_users` WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue (':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN); 
    }

    public function checkUsernameAvaibility (){
        $query ='SELECT COUNT(*) FROM `a5cy8_users` WHERE username = :username';
        $request = $this->db->prepare($query);
        $request->bindValue (':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN); 
    }

    public function checkIfExistsByEmail() {
       $query = 'SELECT COUNT(*) FROM `a5cy8_users` WHERE email = :email';
       $request = $this->db->prepare($query);
       $request->bindValue(':email', $this->email, PDO::PARAM_STR);
       $request->execute();
       return $request->fetch(PDO::FETCH_COLUMN);
}

    public function getHash(){
        $query ='SELECT `password` FROM `a5cy8_users` WHERE username = :username';
        $request = $this->db->prepare($query);
        $request->bindValue (':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN); 
    }

    public function getInfos(){
        $query ='SELECT `id`,`username`,`id_usersroles` FROM `a5cy8_users` WHERE username = :username';
        $request = $this->db->prepare($query);
        $request->bindValue (':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC); 
    }   

    public function getOneById() {
        $query = 'SELECT username, email, birthdate
        FROM a5cy8_users 
        INNER JOIN a5cy8_usersroles ON id_usersroles = a5cy8_usersroles.id 
        WHERE a5cy8_users.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    public function update() {
        $query = 'UPDATE `a5cy8_users` 
        SET `username`=:username,`email`=:email 
        WHERE `id`= :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    public function updatePassword(){
        $query = 'UPDATE `a5cy8_users` 
        SET `password`=:password 
        WHERE `id`= :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    } 

    public function deleteAccount() {
        $query = 'DELETE FROM `a5cy8_users` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id',$this->id,PDO::PARAM_INT);
        return $request->execute();    
    }
}
?>