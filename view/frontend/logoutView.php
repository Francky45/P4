<!DOCTYPE html>

<?php 
$_SESSION = array();
session_destroy();

$title = 'Déconnection'; ?>

<?php ob_start(); ?>


<h1><span>Déconnection</span></h1>

<p class="pdeco">Vous êtes déconnecté !</p> 

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
