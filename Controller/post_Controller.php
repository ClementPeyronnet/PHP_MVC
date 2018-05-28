<?php
class postController{
    public static function index(){
        $posts = Post::all();
        require_once('./vue/post/index.php');     
    }
    
    public static function show(){
        if(!isset($_GET['id'])){
                return call ('page', 'error');
       }else{
          $post = Post::find($_GET['id']);
          $comments = Post::viewCommentaire($_GET['id']);
          require_once('./vue/post/show.php'); 
       }
    }
    public static function insert(){
        require_once ('Vue/post/insert.php');
        
    }
    
    public static function create(){
        
        $post = Post::create(array(
            'author' => $_POST['author'],
            'content' => $_POST['content']
            
            
            ));
         $posts = Post::all();
        require_once('./Vue/post/index.php');
           
       }

    public static function edit(){
        if(!isset($_GET['id'])){
                return call ('page', 'error');
       }else{
          $post = Post::find($_GET['id']);
          require_once('./vue/post/edit.php'); 
       }
    }
    
    public static function update() {
        $post = Post::update(array(
            'id' => $_GET['id'],
            'author' => $_POST['author'],
            'content' => $_POST['content']
            ));
                self::index();
    }
    
    public static function supp(){
        if (!isset($_GET['id'])){
            return call ('pages' , 'error');
        }else{
            $post = Post::find($_GET['id']);
            require_once('./Vue/post/delete.php');
        }
    }
    
    
    public static function delete(){
        $post = Post::delete(array(
            'id' => $_GET['id'],
        ));
            self::index();
    }
    
    
     public  function commentaire(){
        $comments = Post::viewCommentaire($_GET['id']);
        
        require_once('./Vue/post/show.php');
    }
   
}