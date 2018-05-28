<p><a href='?controller=post&action=insert'>Ajouter un billet</a></p>
<?php foreach($posts as $post) { ?>

<p>
<?php  echo $post -> author; ?>
    <a href ='?controller=post&action=show&id=<?php echo $post ->id; ?>'>Voir le contenu</a>
    
    <?php if(isset ($_SESSION['role']) AND ($_SESSION['role']['role'] == 2 )){ ?>
        
    <a href ='?controller=post&action=edit&id=<?php echo $post->id ?>'>Modifier</a>
    <a href ='?controller=post&action=supp&id=<?php echo $post->id ?>'>Supprimer</a><?php } ?>
</p>
<?php } 



