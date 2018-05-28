<?php

class User {
    
    public $id;
    public $user;
    public $mdp;
    public $confirmMdp;
    public $role;
    public $table;
    
    
    public function __construct($id, $user, $mdp, $role) {
        $this->id  =$id;
        $this->user =$user;
        $this->mdp =$mdp;  
        $this->role =$role;
        
        
    }
    
    public static function all(){
//        //j'initialise un tableau vide
//        $listUser =[];
//        //On recupere la connexion a la base de données
//        $db = Db::getInstance();
//        //on passe la requête a la base de données
//        $req = $db->query('SELECT * FROM connexion');
//        //boucle qui permet de parcourir et de recuperer toutes les informations de la table Post
        $table = 'connexion';
        $listusers = MonDAO::getAll($table);
        foreach($listusers as $user){
            $list[] = new user($user['id'], $user['user'],$user['mdp'],$user['role']);
        }
        return $list;
    }

    
    
    
    public static function find($id){
        $db= db::getInstance();
        $req = $db->prepare('SELECT * FROM connexion WHERE id= :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $user = $req->fetch();
        return new User($user['id'],$user['user'],$user['mdp'],$user['role']);
        
}
    
    public static function addUser($array){
        $user = $array['user'];
        $mdp = $array['mdp'];
        
        $db= db::getInstance();
        $req = $db->prepare('INSERT INTO connexion (user, mdp, role) VALUES (:user, :mdp, :role)');
        $role = 0;
        $req->bindValue(':user', $user, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $req->bindValue(':role', $role, PDO::PARAM_INT);

        $req->execute();
       
    }
    
    public static function logOk($array){
        
        $db= db::getInstance();
        $req = $db->prepare('SELECT * FROM connexion WHERE user = :user');
        $req->execute($array);

        $resultat = $req->fetch();
        
        return $resultat;
        
}

    public static function deletecouille($array){
        $id = $array['id'];
        $db= db::getInstance();
        $req = $db->prepare('DELETE FROM connexion WHERE id= :id');
        $req->bindValue(':id', $id ,PDO::PARAM_INT);
        $req->execute();
        
    }
    public static function updateUser($array){
    
        $db= db::getInstance();
        $req = $db->prepare('UPDATE connexion SET user = :user, mdp = :mdp WHERE id = :id');
        $req->bindValue(':user', $array['user'], PDO::PARAM_STR);
        $req->bindValue(':mdp', $array['mdp'], PDO::PARAM_STR);
        
        $req->execute($array);

    }
    
    public static function getRole($user){
        $db= db::getInstance();
        $user = $_POST['user'];
        $req = $db->prepare("SELECT role FROM connexion WHERE user = '$user'");
       
        $req->execute();
        $role = $req->fetch();
        return $role;
    }
}