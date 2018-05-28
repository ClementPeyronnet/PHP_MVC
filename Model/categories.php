<?php

class Categories{
    public $id;
    public $name;
    
    
    public function __construct($id, $name) {
        $this->id  =$id;
        $this->name =$name;
        
    }
    
    
    
    
    public static function allCat(){
//        //j'initialise un tableau vide
//        $list =[];
//        //On recupere la connexion a la base de données
//        $db = Db::getInstance();
//        //on passe la requête a la base de données
//        $req = $db->query('SELECT * FROM categorie');
//        //boucle qui permet de parcourir et de recuperer toutes les informations de la table Post      
//        foreach($req->fetchALL() as $categorie){
        $table = 'categorie';
        $listCat = MonDAO::getAll($table);
        foreach($listCat as $categorie)
            $list[] = new Categories($categorie['id'], $categorie['name']);

        return $list;
    }

    public static function findCategorie($id){

        $db= db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM categorie WHERE id = :id');
        $req->execute (array('id' => $id)); 
        $categorie = $req->fetch();

        return new Categories($categorie['id'], $categorie['name']);
    }
}
