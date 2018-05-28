<p>Mettez à jour votre annonce</p>

<form  action="?controller=annonces&action=update&id=<?= $listannonces->id ?>" method="POST">
        
    <p>
   Votre titre :
   <input type="text" name="titre" value="<?php echo $listannonces->titre; ?>"/>
</p>

    <p>
   Votre description :
   <input type="text" name="description" value="<?php echo $listannonces->description; ?>"/>
</p>
    <p>
   Categories :
<input type="text" name="categories" value="<?php echo $detailCat->name; ?>" disabled= "disabled"/>
</p>

<select id='categories' name='categories'>
       <?php $i= 0;
       foreach ($listCat as $cat){         
           $i++; ?>
        <option value="<?php echo $i ?>"><?php echo $cat->name ?></option>
        <?php } ?>
       
    </select>  
    <p>
        
   Images :
   <input type="text" name="images" value="<?php echo $listannonces->images; ?>"/>
</p>
    <p>
        
   Localisation :
  <input type="text" name="localisation" value="<?php echo $detailreg->name; ?>" disabled= "disabled"/>
       <p>
           <select id='region' name='localisation'>
       <?php $j= 0;
       foreach ($listreg as $reg){
           
           $j++; ?>
        <option value="<?php echo $j ?>"><?php echo $reg->name ?></option>
        <?php } ?>
    </select>
           
    Tel :
   <input type="text" name="tel" value="<?php echo $listannonces->tel; ?>"/>
       <p>
           
    Auteur :
   <input type="text" name="auteur" value="<?php echo $listannonces->auteur; ?>"/>
</p>
<p><input type ='submit'  id='submit'/></p>

</form>


