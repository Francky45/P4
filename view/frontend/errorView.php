<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Erreur !</h1>
<p>Il y a une erreur !</p>

Voici l'erreur: <em><?= $errorMessage ?></em>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
