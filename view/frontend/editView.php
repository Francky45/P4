<!DOCTYPE html>

<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>
<h1><span>Modifier un commentaire</span></h1>

<div id="form_edit_commment">
      
    <form action="index.php?action=editComment&id=<?= $comment['id'] ?>&idpost=<?= $_GET['idpost'] ?>" method="post">

        <p>Auteur : <?= $comment['pseudo'] ?></p><br>
        <br><label for="comment">Commentaire : </label><br>
        <br><textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea><br>
        <input type="submit" value="Modifier" />
    </form><br>

    <?php 
    echo 'Commentaire Enregistré dans la Base de données : ' . $comment['comment'];
?>
     
</div> 


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>