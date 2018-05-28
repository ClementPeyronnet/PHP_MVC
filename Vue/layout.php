<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        
    </head>
    
    <body>
        <?php session_start(); ?>
        <header>
           
            <a href='?controller=page&action=home'>Accueil</a>
            
    <?php if(isset ($_SESSION['role']) AND ($_SESSION['role']['role'] == 2 )){ ?>
            
        <a href='?controller=user&action=affichage'>Voir les profils</a>
        
    <?php } ?>
            
        <?php    if(isset($_SESSION['user'])){ ?>
            
            
            <a href='?controller=post&action=index'>Voir les Billets</a>
            <a href ='?controller=annonces&action=vueFav'>Favoris</a>
            <a href='?controller=annonces&action=insert'>Ajouter une Annonce</a>
            <a href='?controller=annonces&action=index'>Voir les Annonces</a>
            <a href ='?controller=comments&action=index'>Commentaires</a>
            <a href ='?controller=user&action=deco'>Deconnexion</a>
        <?php } ?>
                
                
            
            
        </header>
        
        <?php require_once ('./route.php'); ?>
         <?php 
            if(isset($_SESSION['user'])){ ?>
        <p>Vous êtes connecté en tant que : <strong><?php echo $_SESSION['user'] ?></strong>
            <?php } ?>
    </body>
</html>