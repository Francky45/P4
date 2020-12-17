<!DOCTYPE html>

<?php $title = 'Panneau d\'Administration' ?>

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
    <div class="news_admin">
        <p> Titre de l'article : <?= htmlspecialchars($data['title']) ?><br /></p>
        <p><em>le <?= $data['creation_date_fr'] ?></em><br /></p>
        <p> <a class="linkbutton" href="index.php?action=editPostPanel&id=<?= $data['id'] ?>">Modifier l'article</a></p>
        <p> <a class="linkbutton" href="index.php?action=deletePost&id=<?= $data['id'] ?>">Supprimer l'article</a></p>
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
echo '<br>Contenu du commentaire signalé : ' . $comments['comment']?>
        <p><a class="linkbutton" href="index.php?action=acceptComment&id=<?= $comments['id']?>">Approuver</a>
            <p><a class="linkbutton" href="index.php?action=deleteComment&id=<?= $comments['id']?>">Supprimer</a><br />
            </p>

            <?php } //Fin du while ...
$signals->closeCursor();
?>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>