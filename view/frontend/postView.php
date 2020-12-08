<!DOCTYPE html>

<?php $title = $post['title']; ?>

<?php ob_start(); ?>

<div class="news">
    <h3>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= $post['content'] ?>
    </p>
</div>

<div id="form_and_comments">
    <h1><span>Commentaires</span></h1>

    <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post" class="formlog">


        <?php if (isset( $_SESSION['pseudo']))
        {
            echo '
<div>
<label for="author">Auteur : ' . $_SESSION['pseudo'] . '</label>
</div><br />
<div>
<label for="comment">Commentaire :</label><br />
<textarea id="comment" name="comment"></textarea>
</div>
<div>
<input type="submit" />
</div>
</form>';}else{echo '
</form>';
    }
?>

    <?php
while ($comment = $comments->fetch())
{
?>

    <p><strong><?= $comment['id_user'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= $comment['comment'] ?></p>
    
            <?php   if (isset($_SESSION['admin'])) {
echo' <p><button class="button_admin"><a
href="index.php?action=viewComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Modifier le commentaire</a></button></p>';
echo' <p><button class="button_admin"><a
href="index.php?action=deleteComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Supprimer le commentaire</a></button></p>';} ?>

<?php   if (isset($_SESSION['user'])) {
echo' <p><button class="button_admin"><a
href="index.php?action=signalComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Signaler le commentaire</a></button></p>';} ?>
<!-- 
<p><button class="button_admin">
            <a href="index.php?action=signalComment&id=<?= $comment['id'] ?>&idpost=<?= $_GET['id'] ?>">Signaler le
            commentaire</a></button></p> -->

    <?php
} //Fin du while ...
?>

    <p><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
