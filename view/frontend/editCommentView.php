<!DOCTYPE html>

<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>
<h1><span>Modifier un commentaire</span></h1>

<div id="form_edit_commment">
      
    <form action="index.php?action=editComment&id=<?= htmlspecialchars($comment['id']) ?>&idpost=<?= htmlspecialchars($_GET['idpost'])?>" method="post">

        <p>Auteur : <?= htmlspecialchars($comment['pseudo']) ?></p>
        <label for="comment">Commentaire : </label><br>
        <br><textarea id="comment" name="comment"><?= htmlspecialchars($comment['comment']) ?></textarea><br>
        <br><input type="submit" value="Modifier" />
    </form><br>

    <?php 
    echo 'Commentaire Enregistré dans la Base de données : ' . htmlspecialchars($comment['comment']);
?>
     
</div> 


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>