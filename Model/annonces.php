<?php


class Annonces  {
    public $id;
    public $titre;
    public $description;
    public $categories;
    public $images;
    public $localisation;
    public $tel;
    public $auteur;
    public $id_user;
    public $table;
    
   
    
    
    public function __construct($id, $titre, $description, $categories , $images, $localisation, $tel, $auteur, $id_user) {
        $this->id  =$id;
        $this->titre =$titre;
        $this->description =$description;  
        $this->categories =$categories;
        $this->images =$images;  
        $this->localisation =$localisation;
        $this->tel =$tel;  
        $this->auteur =$auteur;
        $this->id_user =$id_user;
        
    }
    
    
    
    
    public static function all(){
//        //j'initialise un tableau vide
//        $list =[];
//        //On recupere la connexion a la base de données
//        $db = Db::getInstance();
//        //on passe la requête a la base de données
//        $req = $db->query('SELECT * FROM annonces');
//        //boucle qui permet de parcourir et de recuperer toutes les informations de la table Post
//        foreach($req->fetchALL() as $annonce){
        
        $table = 'annonces';
        $listannonces = MonDAO::getAll($table);
        foreach ($listannonces as $annonce)
            $list[] = new Annonces($annonce['id'], $annonce['titre'],$annonce['description'],$annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['auteur'],$annonce['id_user']);
        //}
        return $list;
    }

    public static function find($id){

        $db= db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM annonces WHERE id = :id');
        $req->execute (array('id' => $id)); 
        $annonce = $req->fetch();

        return new Annonces($annonce['id'], $annonce['titre'],$annonce['description'],$annonce['categories'],$annonce['images'],$annonce['localisation'],$annonce['tel'],$annonce['auteur'],$annonce['id_user']);
    }

    public static function create($array){
        

        $titre = $array['titre'];
        $description = $array['description'];
        $categories = $array['categories'];
        $images = $array['images'];
        $localisation = $array['localisation'];
        $tel = $array['tel'];
        $auteur = $array['auteur'];
        $id_user = $array['id_user'];
        $db= db::getInstance();
        $req = $db->prepare('INSERT INTO annonces (titre, description, categories, images, localisation, tel, auteur, id_user) VALUES (:titre, :description, :categories, :images, :localisation, :tel, :auteur, :id_user)');
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':categories', $categories, PDO::PARAM_INT);
        $req->bindValue(':images', $images);
        $req->bindValue(':localisation', $localisation, PDO::PARAM_INT);
        $req->bindValue(':tel', $tel);
        $req->bindValue(':auteur', $auteur);
        $req->bindValue(':id_user', $id_user);
        
        $req->execute($array);
     

    }
    
    public static function update($array){
        $table = 'annonces';
        $value = "titre = :titre, description = :description, categories = :categories, images = :images, localisation = :localisation, tel = :tel, auteur = :auteur";
        
        $updateAll = MonDAO::updateTable($table, $value, $array);
//
//        $db= db::getInstance();
//        $req = $db->prepare('UPDATE annonces SET titre = :titre, description = :description, categories = :categories, images = :images, localisation = :localisation, tel = :tel, auteur = :auteur  WHERE id = :id');
//        $req->bindValue(':titre', $array['titre'], PDO::PARAM_STR);
//        $req->bindValue(':description', $array['description'], PDO::PARAM_STR);
//        $req->bindValue(':categories', $array['categories'], PDO::PARAM_INT);
//        $req->bindValue(':images', $array['images'], PDO::PARAM_STR);
//        $req->bindValue(':localisation', $array['localisation'], PDO::PARAM_INT);
//        $req->bindValue(':tel', $array['tel'], PDO::PARAM_INT);
//        $req->bindValue(':auteur', $array['auteur']);
//        $req->execute($array);

    }
    
    public static function delete($array){
        
        $table = 'annonces';
        
        $deletetfromtab = MonDAO::deleteFromTable($table,$array);
//        $id = $array['id'];
//        $db= db::getInstance();
//        $req = $db->prepare('DELETE FROM `annonces` WHERE id = :id ');
////        $req->bindValue(':id', $id, PDO::PARAM_INT);
//
//        $req->execute();
    }
    
     public static function allFav($id_user){
        $list =[];
        
        $db = Db::getInstance();
        
        $req = $db->prepare('SELECT * FROM `annonces` INNER JOIN favoris ON annonces.id = favoris.id_annonces WHERE favoris.id_user = :id_user');
        $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
       foreach($req->fetchALL() as $annonce){
            $list[] = new Annonces($annonce['id_favoris'], $annonce['titre'],$annonce['description'],$annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['auteur'],$annonce['id_user']);
        }
        return $list; 
    }

}