<!DOCTYPE html>

<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1><span>Panneau d'Administration</span></h1>

<div id="newpost">

    <h2>Rédiger un Nouvel Article :</h2>

    <form method="post" action="index.php?action=newPost" class="newPostForm">
        <p>
            <label for="titlePost"> Titre de l'article : </label>
            <input type="text" name="titlePost" id="titlePost" placeholder="Titre de l'article" required />
        </p>
        <p>
            <label for="contentPost"> Contenu de l'article : </label><br>
            <br><textarea id="contentPost" name="contentPost" required> </textarea>
        </p>
        <p> <input type="submit" value="Valider" /> </p>
    </form><br>

</div>

<div id="editpost">

    <h2>Modification d'un article :</h2>


    <?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <p>
            Titre de l'article : <?= htmlspecialchars($data['title']) ?><br />
            <em>le <?= $data['creation_date_fr'] ?></em><br />
            <button class="button_admin">
                <a href="index.php?action=editPostPanel&id=<?= $data['id'] ?>">Modifier l'article</a></button>
            <button class="button_admin">
                <a href="index.php?action=deletePost&id=<?= $data['id'] ?>">Supprimer l'article</a></button>
        </p>
    </div>

    <?php
}
$posts->closeCursor();
?>
</div>

<div id="signalcomment">

    <h2>Signalement Commentaires :</h2>
    <div id="comment_admin">
        <?php
while ($comments = $signals->fetch())
{
echo '<br>Voici le contenu du commentaire signalé : ' . $comments['comment']?>
        <button class="button_admin"><a href="index.php?action=acceptComment&id=<?= $comments['id']?>">Approuver le
                commentaire</a></button>
        <button class="button_admin"><a href="index.php?action=deleteComment&id=<?= $comments['id']?>"> Supprimer le
                commentaire</a><br /></button><br />

<?php } //Fin du while ...
$signals->closeCursor();
?>

</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
