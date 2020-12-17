<!DOCTYPE html>

<?php $title = $post['title']; ?>

<?php ob_start(); ?>

<div class="news">
    <h3>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <div class="post_list">
        <?= $post['content'] ?>
    </div>

    <div id="form_and_comments">
        <h1><span>Commentaires</span></h1>

        <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post" class="formlog">


            <?php if (isset( $_SESSION['pseudo']))
        {
            echo '

<label for="author">Auteur : ' . $_SESSION['pseudo'] . '</label>
<br />

<br><label for="comment">Commentaire :</label><br />
<br><textarea id="comment" name="comment"></textarea>
<br><input type="submit" />

</form></div>';}else{echo '
</form></div>';
    }
?>

            <?php
while ($comment = $comments->fetch())
{
?>
            <br>
            <div id="comment_post">
                <p><strong><?= $comment['pseudo'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <?= $comment['comment'] ?>

                <?php   if (isset($_SESSION['admin'])) {
echo' <p><button class="button_admin"><a
href="index.php?action=viewComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Modifier le commentaire</a></button></p>';
echo' <button class="button_admin"><a
href="index.php?action=deleteComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Supprimer le commentaire</a></button>';} ?>

                <?php   if (isset($_SESSION['user'])) {
echo' <p><button class="button_admin"><a
href="index.php?action=signalComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Signaler le commentaire</a></button></p>';} ?>
            </div>
            <?php
} //Fin du while ...
?>
    </div>

    <button class="button_home"><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></button>


    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
