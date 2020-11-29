<!DOCTYPE html>

<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1><span>Erreur !</span></h1>

<p class="pdeco">Il y a une erreur !</p>

<p class="pdeco">Voici l'erreur: <em><?= $errorMessage ?></em><br>

<br><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
