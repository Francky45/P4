<!DOCTYPE html>

<?php 
$_SESSION = array();
session_destroy();

$title = 'Déconnection'; ?>

<?php ob_start(); ?>


<h1><span>Déconnection</span></h1>

<p class="pdeco">Vous êtes déconnecté !</p> 

<br><button class="button_home"><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></button>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
