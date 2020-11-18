<?php 
session_start();
$_SESSION = array();
session_destroy();

$title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Déconnection</h1>
<p>Vous êtes déconnecté ! </p>

<br><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
