<?php $title = 'Mon blog'; ?>

<?php
session_start();?>

<?php ob_start(); ?>
<h1>Derniers billets du blog :</h1>


<?php
while ($data = $posts->fetch())
{
?>
<div class="news">
    <h3>
        <?= htmlspecialchars($data['title']) ?>
        <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($data['content'])) ?>
        <br />
        <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
    </p>
</div>

<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>