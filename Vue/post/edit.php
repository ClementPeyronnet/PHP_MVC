<p>Mettre à jour un billet</p>

<form method="POST" action="?controller=post&action=update&id=<?php echo $post->id; ?>">
    <p><label>Auteur </label></p>
    <p><input type='text' name='author' id='author' value="<?php echo $post->author; ?>"></p>
    <p><label>Commentaires </label></p>
    <p><textarea id='content' name='content'/> <?php echo $post->content; ?> </textarea></p>
    <p><input type ='submit' id='submit'/></p>
    
</form>