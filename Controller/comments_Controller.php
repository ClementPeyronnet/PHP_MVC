<?php

Class CommentsController{
    
  public function index(){
        $comments = Comments::allComments();
        require_once('./vue/comments/index.php');
  }
  
  
  public function viewComments(){  
      
        require_once('./vue/comments/comment.php');
    }
    
 
  

  public function addComments(){ 
        $comments = Comments::addComments(array(
            'id_billet' => $_POST['id_billet'],
            'auteur' => $_POST['auteur'],
            'commentaire' => $_POST['commentaire'],
           
            ));
         $comments = Comments::allComments();
         self::index();
       //require_once('./vue/comments/comment.php');   

}
  public function delComments(){
      $tabComm = Comments::deleteComments(array(
              'id' => $_GET['id'],
              ));
      self::index();
  }

  public function updateComments(){
      $editCom = Comments::updateComments(array(
            'id' => $_GET['id'],
//            'id_billet' => $_POST['id_billet'],
            'auteur' => $_POST['auteur'],
            'commentaire' => $_POST['commentaire'],
//            'date_commentaire' => $_POST['date_commentaire']
            ));
      self::index();
            
  }
  
  
  public function vueUpdate(){
      
      $comment = Comments::find($_GET['id']);
     
      require_once('./vue/comments/update.php');
      
  }
}