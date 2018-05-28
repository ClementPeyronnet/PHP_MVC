<p>Ajoute une annonce</p>
<form method="POST" action="?controller=annonces&action=create">
    <p><label>Titre </label></p>
    <p><input type='text' name='titre' id='titre'</label></p>
    <p><label>Description </label></p>
    <p><textarea id='description' name='description'/></textarea></p>
    <p><label>Categories </label></p>
    <select id='categories' name='categories'>
       <?php $i= 0;
       foreach ($listcat as $cat){
           $i++; ?>
        <option value="<?php echo $i ?>"><?php echo $cat->name ?></option>
        <?php } ?>
       
    </select>  
        
   
    <p><label>images </label></p>
    <p><textarea id='images' name='images'/></textarea></p>
    <p><label>localisation </label></p>
    
    
    <select id='region' name='localisation'>
       <?php $j= 0;
       foreach ($listreg as $reg){
           
           $j++; ?>
        <option value="<?php echo $j ?>"><?php echo $reg->name ?></option>
        <?php } ?>
    </select>
    
    
    
    
    
    
    <p><label>tel </label></p>
    <p><input type="text" id='tel' name='tel'/></p>
    <p><label>auteur </label></p>
    <p><textarea id='auteur' name='auteur'/></textarea></p>
    <p><input type ='submit' id='submit'/></p>
</form>