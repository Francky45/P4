<!DOCTYPE html>

<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1><span>Connection</span></h1>


<form method="post" action="index.php?action=logForm" class="formlog">
    <p>
        <label for="pseudo"> Votre Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required />
    </p>
    <p>
        <label for="pass"> Mot de passe : </label>
        <input type="password" name="pass" id="pass" placeholder="Mot de passe" required />
    </p>
    <p> <input type="submit" value="Valider" /> </p>
</form><br>

<button class="button_home"><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></button>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
