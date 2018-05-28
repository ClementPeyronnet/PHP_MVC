<h1>Annonces du site</h1>

<?php 
foreach($listAnnonce as $detailAnnonce){ ?>

<h5>Titre de l'annonce : </h5>
<p><?php echo $detailAnnonce->titre; ?></p>
<p><h5>Description : </h5></p>
<p><?php echo $detailAnnonce->description; ?></p>
<p><h5>Categories </h5></p>

<p><?php echo $catArray[$detailAnnonce->categories]; ?></p>
<p><h5>Images : </h5></p>
<p><?php echo $detailAnnonce->images; ?></p>
<p><h5>Localisation : </h5></p>

<p><?php echo $regArray[$detailAnnonce->localisation];?></p>
<p><h5>Telephone : </h5></p>
<p><?php echo $detailAnnonce->tel; ?></p>
<p><h5>Auteur : </h5></p>
<p><?php echo $detailAnnonce->auteur; ?></p>
<br>
<a href ='?controller=annonces&action=ajouterFav&id_annonces=<?php echo $detailAnnonce->id ?>'>Ajouter aux favoris</a>
<p> <?php if(isset ($_SESSION['role']) AND ($_SESSION['role']['role'] == 2 )){ ?>
<a href ='?controller=annonces&action=ajouterFav&id_annonces=<?php echo $detailAnnonce->id ?>'>Ajouter aux favoris</a>
<a href ='?controller=annonces&action=viewUpdate&id=<?php echo $detailAnnonce->id ?>&categories=<?php echo $detailAnnonce->categories ?>&localisation=<?php echo $detailAnnonce->localisation ?>'>Modifier l'annonce</a>
<a href ='?controller=annonces&action=delete&id=<?php echo $detailAnnonce->id ?>&localisation=<?php echo $detailAnnonce->localisation ?>'>Supprimer l'annonce</a>
<?php } ?>
<?php } 
 