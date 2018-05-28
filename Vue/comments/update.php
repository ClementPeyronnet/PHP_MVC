<p>Mettez à jour votre commentaire</p>

<form  action="?controller=comments&action=updateComments&id=<?= $comment->id ?>" method="POST">
<!--    <input type="hidden" name="id_billet" >-->
    <p>
   Votre titre :
   <input type="text" name="auteur" value="<?php echo $comment->auteur; ?>"/>
</p>

    <p>
   Votre description :
   <input type="text" name="commentaire" value="<?php echo $comment->commentaire; ?>"/>
<!--   
   <input type="hidden" name="date_commentaire" >-->
   <input type="submit">
</form>

