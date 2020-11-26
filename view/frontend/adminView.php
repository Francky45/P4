<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Administration</h1>

<h2>Nouvel Article :</h2>

<form method="post" action="index.php?action=newPost" class="">
        <p>
            <label for="titlePost"> Titre de l'article : </label>
            <input type="text" name="titlePost" id="titlePost" placeholder="Titre de l'article" required />
        </p>
        <p>
            <label for="contentPost"> Contenu de l'article : </label>
            <textarea id="contentPost" name="contentPost" required> </textarea>
        </p>
        <p> <input type="submit" value="Valider" /> </p>
    </form><br>

<h2>Signalement Commentaires :</h2>

<?php
while ($comments = $signals->fetch())
{
echo 'Numéro ID d\'article : ' . $comments['post_id'] . ' <br />Commentaire : ' . $comments['comment']?> . '<a href="index.php?action=acceptComment&id=<?= $comments['id']?>">Approuver le commentaire</a><a href="index.php?action=deleteComment&id=<?= $comments['id']?>"> Supprimer le commentaire</a><br />' ;

<?php } //Fin du while ...
$signals->closeCursor();

?> 



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
