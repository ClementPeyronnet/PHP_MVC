<?php

class Favoris{
    public $id_favoris;
    public $id_user;
    public $id_annonces;
    public $table;

    
    public function __construct($id_favoris, $id_user, $id_annonces) {
        $this->id_favoris  =$id_favoris;
        $this->id_user  =$id_user;
        $this->id_annonces  =$id_annonces;
       
    }
    
    
    
    public static function addFav($array){
        
        $id_user = $array['id_user'];
        $id_annonces = $array['id_annonces'];
        
        $db= db::getInstance();
        
        $req = $db->prepare('INSERT INTO favoris (id_user, id_annonces) VALUES (:id_user, :id_annonces)');
        
        $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $req->bindValue(':id_annonces', $id_annonces, PDO::PARAM_INT);
        
        $req->execute($array);
     

    }
    public static function deleteFav($array){
        $id = $array['id'];
        $db= db::getInstance();
        $req = $db->prepare('DELETE FROM `favoris` WHERE id_favoris =:id_favoris');
        $req->bindValue(':id_favoris', $id, PDO::PARAM_INT);

        $req->execute();
    }
    
    
    public static function allFav($id_user){
//        
//        $listfav =[];
//        
//        $db = Db::getInstance();
//        
//        $req = $db->query('SELECT * FROM `favoris` WHERE id_user = :id_user');
        $table = 'favoris';
        $listfavoris = MonDAO::getAll($table);
      
        foreach($listFavoris as $fav){
            $list[] = new Favoris($fav['id_favoris'], $fav['id_user'],$fav['id_annonces']);
    };
        return $list;
   
    }
    
    
    }
