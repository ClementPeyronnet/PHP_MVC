<p>Ajouter un commentaire</p>


<form method="POST" action="?controller=comments&action=addComments">
    <p><label>Auteur du commentaire : </label></p>
    <input type="hidden" name="id_billet" value="<?php echo $_GET['id']; ?>"/>
    <p><input type='text' name='auteur' id='auteur'/></p>
    <p><label>Commentaires </label></p>
    <p><input id='content' name='commentaire'/></p>
    <p><input type ='submit' id='submit'/></p>
    
</form>