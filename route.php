<?php

   //On définie les routes 
$routes = array(    'page'      => ['home', 'error'],
                    'post'      => ['index','show','insert','edit','supp',],
                    'comments'  => ['comment','viewComments','index', 'delComments', 'addComments','updateComments','vueUpdate'],
                    'user'      => ['index','viewUpdate','affichage','find','listUser','newUser','inscription','update_User','logOk','verif','deco','deleteUser'],
                    'annonces'  => ['index','delete','update','create','annonces','show','insert','all', 'viewUpdate','ajouterFav','vueFav','delFav','allFav']
    );

    

if (array_key_exists($controller, $routes)){
    if(in_array($action, $routes[$controller])){
        call($controller, $action);
  }else{
      call('page', 'error');
  }
}else{
    call('page', 'error');
}


function call($controller , $action){
    require_once ('Controller/' .$controller. '_Controller.php');
    
    switch($controller){
        case 'page':
            $controller = new PagesController();
            break;
        case 'post' :
            //chargement des models
            require('DAO.php');
            require_once('./Model/post.php');
            $controller = new PostController();
            break;
        case 'comments' :
            require('DAO.php');
            require_once('./Model/comments.php');
            $controller = new CommentsController();
            break;
        case 'user' :
            require('DAO.php');
            require_once('./Model/user.php');
            $controller = new UserController();
            break;
        case 'annonces' :
        require('DAO.php');
        require_once('./Model/annonces.php');
        require_once('./Model/categories.php');
        require_once ('./Model/region.php');
        require_once ('./Model/favoris.php');
        $controller = new AnnoncesController();
            
    }
    
    $controller -> { $action}();
}