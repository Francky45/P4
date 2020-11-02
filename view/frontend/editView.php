<?php $title = 'Modifier un commentaire' ?>
  
<?php ob_start(); ?>
<h1>Mon super blog !</h1>
  
<h2>Modifier un commentaire</h2>
  
<form action="index.php?action=editComment&id=<?= $comment['id'] ?>" method="post">
    <div>
        <label for="author">Auteur : <?= $comment['author'] ?></label>
    </div><br>
    <div>
        <label for="comment">Commentaire: </label><br>
        <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
    </div><br>
    <div>
        <input type="submit" value="Modifier" />
    </div>
</form>

<?php 

    echo 'Commentaire Enregistré dans la Base de données : ' . htmlspecialchars($comment['comment']);

?>

<p><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></p>
  
  
<?php $content = ob_get_clean(); ?>
  
<?php require('template.php'); ?>