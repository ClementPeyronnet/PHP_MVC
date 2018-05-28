<?php 

 Class  MonDAO{
    
    public $table;
    

    public static function getAll($table){
        
    $resultat = [];
    $db = Db::getInstance();  //on se connecte a la base de données
    
    $req = $db->query("SELECT * FROM $table ");
    //    $req->execute();
  
    foreach($resultat = $req->fetchALL(PDO::FETCH_ASSOC) as $key=>$value){  //boucle qui permet de parcourir et de recuperer toutes les informations de la table Post
       
    }
        return $resultat;
        
    }

    public static function updateTable($table, $value, $array){
        
        $db= db::getInstance();
        
        $req = $db->prepare("UPDATE $table SET $value WHERE id = :id");
        $req->execute($array);
        
    }


    public static function deleteFromTable($table,$array){
       
        $db= db::getInstance();
        
        $req = $db->prepare("DELETE FROM $table WHERE id = :id");
        
        $req->execute($array);
        
    }

}