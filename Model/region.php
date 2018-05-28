<?php

class Regions{
    public $id;
    public $name;
    
    
    public function __construct($id, $name) {
        $this->id  =$id;
        $this->name =$name;
        
    }
    
    
    
    
    public static function allReg(){
        //j'initialise un tableau vide
        $listreg =[];
        //On recupere la connexion a la base de données
        $db = Db::getInstance();
        //on passe la requête a la base de données
        $req = $db->query('SELECT * FROM region');
        //boucle qui permet de parcourir et de recuperer toutes les informations de la table Post
        foreach($req->fetchALL() as $region){
            $listreg[] = new Regions($region['id'], $region['name']);
        }
        return $listreg;
    }

    public static function findRegion($id){

        $db= db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM region WHERE id = :id');
        $req->execute (array('id' => $id)); 
        $region = $req->fetch();

        return new Regions($region['id'], $region['name']);
    }
}
