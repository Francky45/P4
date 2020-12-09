<!DOCTYPE html>

<?php $title = 'Modifier un commentaire' ?>

<?php ob_start(); ?>
  
<div id="form_edit_commment">
    <h1>Modifier un commentaire</h1>
      
    <form action="index.php?action=editComment&id=<?= $comment['id'] ?>&idpost=<?= $_GET['idpost'] ?>" method="post">
        <div>
            <label for="author">Auteur : <?= $comment['pseudo'] ?></label>
        </div><br>
        <div>
            <label for="comment">Commentaire : </label><br>
            <br><textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
        </div><br>
        <div>
            <input type="submit" value="Modifier" />
        </div>
    </form><br>

    <?php 

    echo 'Commentaire Enregistré dans la Base de données : ' . $comment['comment'];

?>
     
</div> 

<button class="button_home"><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></button>
  
<?php $content = ob_get_clean(); ?>
  
<?php require('template.php'); ?>