<h1>Favoris</h1>


<div>
  
<?php 

    foreach($favannonces as  $testi){  ?>
    
<h5>Auteur de l'annonce : </h5>
<p><?php echo $testi->auteur; ?></p>

<h5>Titre de l'annonce : </h5>
<p><?php echo $testi->titre; ?></p>

<p><h5>Description : </h5></p>
<p><?php echo $testi->description; ?></p>

<h5><p>Telephone : </p></h5>
<p><?php echo $testi->tel; ?></p>




<br> <a href ='?controller=annonces&action=delFav&id=<?php echo $testi->id; ?>'>Supprimer des favoris</a> 
    
<?php }?>
</div>