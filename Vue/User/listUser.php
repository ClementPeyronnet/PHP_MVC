<p> Voici les profils : </p>

<?php foreach ($users as $user){?>
    
<h3>Pseudo: </h3><?php echo $user->user;?>
<br>
<a href ='?controller=user&action=viewUpdate&id=<?php echo $user->id ?>'>Modifier le profil</a>
<a href ='?controller=user&action=deleteUser&id=<?php echo $user->id ?>'>Supprimer</a>
<?php } ?>

