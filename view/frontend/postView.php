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
            echo 'Auteur : ' . $_SESSION['pseudo'] . '<br />
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
            <div class="comment_post">
                <p><strong><?= $comment['pseudo'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= $comment['comment'] ?></p>

                <?php   if (isset($_SESSION['admin'])) {
echo' <p><a class="linkbutton"
href="index.php?action=viewComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Modifier</a></p>';
echo' <p><a class="linkbutton"
href="index.php?action=deleteComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Supprimer</a></p>';} ?>

                <?php   if (isset($_SESSION['user'])) {
echo' <p><a class="linkbutton"
href="index.php?action=signalComment&id=' .  $comment['id'] . '&idpost=' . $_GET['id'] . '">Signaler</a></p>';} ?>
            </div>
            <?php
} //Fin du while ...
?>
    </div>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
