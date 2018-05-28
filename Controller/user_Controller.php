<?php

Class UserController{
    
    public function newUser(){

        require_once('./Vue/User/index.php');
     
 }
 
    public function affichage(){
        $users = User::all();
       
        require_once('./Vue/User/listUser.php');
    }
    
    
    public function inscription(){
       
        $user = User::addUser(array(
            'user' => $_POST['user'],
            'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
           
           
            )); 
         require_once ('./Vue/User/index.php');
    }
    
    public function verif(){
        

            if(isset($_POST['user'])&& isset($_POST['mdp'])){
                $userVrai = User::logOk(array(
                    'user'=> $_POST['user'],
                    
                ));
//                var_dump($userVrai);
                if(password_verify($_POST['mdp'], $userVrai['mdp'])){
                    session_start();
                    $_SESSION['role'] = User::getRole($_POST['user']);
//                    var_dump($_SESSION['role']);
                    $_SESSION['user'] = $_POST['user'];
                    $_SESSION['id'] = $userVrai['id'];
                    header('Location: index.php?controller=post&action=index');
                    exit();
                }else{
                 
                    echo 'Pseudo ou Mot de passe incorrect !';
                }
            }
      
}

    public function deco(){
            session_destroy();
            header('Location: index.php?controller=page&action=home'); 
        }
        
        
    public function deleteUser(){

        $user = User::deletecouille(array(
            'id' => $_GET['id'],
          
        ));
         $users = User::all();
           require_once('./Vue/user/listUser.php');
       }          
    public static function viewUpdate(){
 
        $users = User::find($_GET['id']);

//            'id' => $_GET['id'],
//           
//            ));
////            var_dump($users);
        require_once('./Vue/user/updateUser.php');
    }
    
   

       public static function update_User() {
     
        $users = User::updateUser(array(
            'id' => $_GET['id'],
            'user' => $_POST['user'],
            'mdp' => $_POST['mdp'],
        ));
            $users = User::all();
        require_once('./Vue/user/listUser.php');
              
    }

}