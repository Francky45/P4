<!DOCTYPE html>

<?php $title = 'ERREUR'; ?>

<?php ob_start(); ?>
<h1><span>Erreur !</span></h1>

<p class="pdeco">Il y a une erreur !</p>

<p class="pdeco">Voici l'erreur: <em><?= $errorMessage ?></em><br></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
