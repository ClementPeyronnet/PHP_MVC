<?php
class pagesController{
    public function home() {
     
        require_once('./Vue/page/home.php');
    } 
    
    public function error(){
        require_once('./Vue/page/error.php');
    }
    
    public function insert(){
        $post = Post::create($_POST);
    }
    
}






