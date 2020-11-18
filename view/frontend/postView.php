<?php $title = htmlspecialchars($post['title']); ?>
<?php
session_start();?>
<?php ob_start(); ?>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<div id="form_and_comments">
    <h2>Commentaires</h2>

    <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" <?php  if (isset( $_SESSION['pseudo'])){
               echo 'value="'. $_SESSION['pseudo'] . '"' ;} ?>/>
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

    <?php
while ($comment = $comments->fetch())
{
?>

    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> (<a
            href="index.php?action=viewComment&id=<?= $comment['id'] ?>&idpost=<?= $_GET['id'] ?>">Modifier le commentaire</a>)</p>

    <?php
} //Fin du while ...
?>

    <p><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
