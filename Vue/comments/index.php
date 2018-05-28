<?php foreach($comments as $commentaire) { ?>

<p>
    <p><h5> Titre : <?php echo $commentaire->auteur; ?></h5></p>
    <p><h5> Commentaire : <?php echo $commentaire->commentaire; ?></h5></p>
    <p><h5> Date :<?php echo $commentaire->date_commentaire; ?>
        <br>
<p> <?php if(isset ($_SESSION['role']) AND ($_SESSION['role']['role'] == 2 )){ ?>
            
    <a href ='?controller=comments&action=delComments&id=<?php echo $commentaire->id ?>'>Supprimer</a>
    <a href ='?controller=comments&action=vueUpdate&id=<?php echo $commentaire->id ?>'>Modifier</a>
    
        <?php } ?>
</p>

<?php } 

