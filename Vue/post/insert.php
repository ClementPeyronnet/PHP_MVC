<p>Ajoute un billet</p>
<form method="POST" action="?controller=post&action=create">
    <p><label>Auteur </label></p>
    <p><input type='text' name='author' id='author'</label></p>
    <p><label>Contenu du billet </label></p>
    <p><textarea id='content' name='content'/></textarea></p>
    <p><input type='hidden' name='created_date' value =''<?php $created=date ('d,m,Y h:m');echo $created;?>/>
    <p><input type ='submit' id='submit'/></p>
</form>