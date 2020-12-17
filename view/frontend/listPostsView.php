<!DOCTYPE html>

<?php $title = 'Un Billet Simple vers l\'Alaska !'; ?>

<?php ob_start(); ?>
<h1><span>Derniers billets du blog :</span></h1>


<?php
while ($data = $posts->fetch())
{
?>
<div class="news">
    <h3>
        <?= $data['title'] ?>
        <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>
<div class="post_list">
        <?= $data['content'] ?>
        <br /><div class="linkpost">
        <a class="linkbutton" href="index.php?action=post&id=<?= $data['id'] ?>"><em>Voir les commentaires</em></a>
        </div>
        </div>
</div>

<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
