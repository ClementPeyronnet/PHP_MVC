<p> Voila le billet que vous avez demandez : </p>
<p><h5>Auteur du billet : </h5></p>
<p><?php echo $post->author; ?></p>
<p><h5>Contenu du billet : </h5></p>
<p><?php echo $post->content; ?></p>
<p><h5>Date du billet : </h5></p>
<p><?php echo $post->created_date; ?></p>
<br>
<?php
       while ($comment = $comments->fetch())
       {
       ?>
<p>Commentaires : </p>
<p><h5>Auteur : </h5> <?php echo $comment['auteur'] .'</p><p><h5>Commentaire :<br></h5> ' .$comment['commentaire'] .'</p>  <p><h5> Date du commentaire : </h5></p> '.$comment['date_commentaire']?> 
         
       <?php
       }
       ?>

<break><a href ='?controller=comments&action=viewComments&id=<?php echo  $post->id; ?>'>Ajouter un commentaires</a></break>
