<p>Mettez à jour votre profil</p>

<form name="formulaire" action="?controller=user&action=update_User&id=<?= $users->id ?>" method="POST">
        
    <p>
   Votre pseudo :<br />
   <input type="text" name="user" value="<?php echo $users->user; ?>"/>
</p>

<p>
   Votre mot de passe :<br />
   <input type="text" name="mdp" value="<?php echo $users->mdp; ?>" />
</p>

<p>
   <input type="submit" value="Envoyer" />
</p>
   
</form>