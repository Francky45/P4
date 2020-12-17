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
        <br />
        <button id="linkpost" ><em><a href="index.php?action=post&id=<?= $data['id'] ?>">Voir l'article et ses commentaires</a></em></button>
        </div>
</div>

<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
