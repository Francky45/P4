<!DOCTYPE html>

<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Inscription</h1>


<form method="post" action="index.php?action=addUser" class="">
        <p>
            <label for="pseudo"> Votre Pseudo : </label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required />
        </p>
        <p>
            <label for="pass"> Mot de passe : </label>
            <input type="password" name="pass" id="pass" placeholder="Mot de passe" required />
        </p>
        <p>
            <label for="pass2"> Retapez votre Mot de passe : </label>
            <input type="password" name="pass2" id="pass2" placeholder="Retapez votre Mot de passe"
                required />
        </p>
        <p>
            <label for="email"> E-mail : </label>
            <input type="email" name="email" id="email" placeholder="E-mail" required />
        </p>
        <p> <input type="submit" value="Valider" /> </p>
    </form><br>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
