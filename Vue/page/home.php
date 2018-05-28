<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
    </head>
    <body>
        
        <h2>Bienvenue sur mon Blog PHP</h2>
        <?php 
            if(!isset($_SESSION['user'])){ ?>
        <form action="?controller=user&action=verif" method ="POST">
            <p><label><h2>Connexion : </label></p></h2>
            <label>Identifiant : </label>
                <input type="text" name="user">
            <label>Mot de passe : </label>
            <input type="password" name="mdp">
            <input type="submit">
        </form>
        <a href ='?controller=user&action=newUser'>Nouveau sur le site ? Inscrivez vous !</a>
           <?php } ?>
            
    
        
    
    </body>
</html>
