<?php

class Comments{
    public $id;
    public $id_billet;
    public $auteur;
    public $commentaire;
    public $date_commentaire;
    public $table;
    
    public function __construct($id ,$id_billet,  $auteur,  $commentaire, $date_commentaire) {
        $this->id  =$id;
        $this->id_billet =$id_billet;
        $this->auteur =$auteur;
        $this->commentaire =$commentaire;  
        $this->date_commentaire =$date_commentaire;
    }
    
     public static function find($id){
        
         $db= db::getInstance();
         $id = intval($id);
         $req = $db ->prepare('SELECT * FROM commentaires WHERE id= :id_billet');
         $req->execute(array('id_billet' => $id));
         $comment = $req->fetch();
         return new Comments($comment['id'], $comment['id_billet'], $comment['auteur'], $comment['commentaire'], $comment['date_commentaire']);
    }
    
    public static function allComments(){
//        //j'initialise un tableau vide
//        $listComments =[];
//        //On recupere la connexion a la base de données
//        $db = Db::getInstance();
//        //on passe la requête a la base de données
//        $req = $db->query('SELECT * FROM commentaires');
//        //boucle qui permet de parcourir et de recuperer toutes les informations de la table Post
        $table = 'commentaires';
        $listcomments = MonDAO::getAll($table);
        foreach($listcomments as $comment){
            $list[] = new Comments($comment['id'], $comment['id_billet'], $comment['auteur'],$comment['commentaire'],$comment['date_commentaire']);
        }
        
        return $list;
    }
    
    public static function addComments($array){
        $id_billet = $array['id_billet'];
        $auteur = $array['auteur'];
        $commentaire = $array['commentaire'];
        
        $db= db::getInstance();
        $req = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES (:id_billet , :auteur, :commentaire, Now())');
       
        
        $req->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);
        $req->bindValue(':auteur', $auteur, PDO::PARAM_STR);
        $req->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
        
        $req->execute($array);
    }
    
   public static function deleteComments($array){
        $id = $array['id'];
        $db= db::getInstance();
        $req = $db->prepare('DELETE FROM `commentaires` WHERE id = :id ');
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }
    
   public static function updateComments($array){
        
      
        $db= Db::getInstance();
       
        $req = $db->prepare('UPDATE commentaires SET auteur = :auteur, commentaire = :commentaire WHERE id = :id');
   
        
        
        $req->execute($array);
   }
   
   
    public function findComments($id){
      
      $db= db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM commentaires WHERE id = :id');
        $req->execute (array('id' => $id)); 
        $comments = $req->fetch();

        return new Comments($comments['id'],$comments['id_billet'], $comments['auteur'],$comments['commentaire']);
    }
      
}
    