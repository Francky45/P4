<!DOCTYPE html>

<?php 
$_SESSION = array();
session_destroy();

$title = 'Mon blog'; ?>

<?php ob_start(); ?>


<h1><span>Déconnection</span></h1>

<p class="pdeco">Vous êtes déconnecté ! 

<br><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
