<?php
class Db {
    private static $instance = NULL;
    
    
    private function __construct() {}
    
    private function __clone() {}
        
    
    public static function getInstance() {
        // on vérifie si l'instance existe sinon on la créee
        if(!isset(self::$instance)){
            //self fait référence a la classe (Db)
            //retourne les erreurs
            $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            //On crée l'instance            
            self::$instance = new PDO('mysql:host=localhost;dbname=bdon', 'root' , 'root', $pdo_option);
        }
        return self::$instance;
    }
}
