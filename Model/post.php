<?php

class Post{
    public $id;
    public $author;
    public $content;
    public $created_date;
    public $table;
    
    public function __construct($id, $author, $content, $created_date) {
        $this->id  =$id;
        $this->author =$author;
        $this->content =$content;  
        $this->created_date =$created_date;
    }
    
    
    
    
    public static function all(){
        //j'initialise un tableau vide
        $list =[];
        //On recupere la connexion a la base de données
        $db = Db::getInstance();
        //on passe la requête a la base de données
        $req = $db->query('SELECT * FROM post');
        //boucle qui permet de parcourir et de recuperer toutes les informations de la table Post
        foreach($req->fetchALL() as $post){
            $list[] = new post($post['id'], $post['author'],$post['content'],$post['created_date']);
        }
        return $list;
    }

    public static function find($id){

        $db= db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM post WHERE id = :id');
        $req->execute (array('id' => $id)); 
        $post = $req->fetch();

        return new Post($post['id'], $post['author'],$post['content'],$post['created_date']);
    }

    public static function create($array){
        $author = $array['author'];
        $content = $array['content'];
        $created = date ('Y,m,d h:i:s');
        $db= db::getInstance();
        $req = $db->prepare('INSERT INTO post(author, content, created_date) VALUES (:author, :content, :created_date)');
        $req->bindValue(':author', $author, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':created_date', $created);
        $req->execute();
     

    }
    
    public static function update($array){

        $db= db::getInstance();
        $req = $db->prepare('UPDATE post SET author = :author, content = :content WHERE id = :id');
        $req->bindValue(':author', $array['author'], PDO::PARAM_STR);
        $req->bindValue(':id', $array['id'], PDO::PARAM_INT);
        $req->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $req->execute();

    }
    
    public static function delete($array){
//        $id = $array['id'];
//        $db= db::getInstance();
//        $req = $db->prepare('DELETE FROM `post` WHERE id = :id ');
//        $req->bindValue(':id', $id, PDO::PARAM_INT);
//
//        $req->execute();
         $table = 'post';
        
        $deletetfromtab = MonDAO::deleteFromTable($table,$array);
    }
    
    public static function viewCommentaire($id){
        $db = db::getInstance();
       
        $comments = $db->prepare('SELECT * FROM commentaires WHERE id_billet = ? ');
        
        $comments->execute(array($id));
        return $comments;
    }
    


}