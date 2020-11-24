<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Administration</h1>


<form method="post" action="index.php?action=newPost" class="">
        <p>
            <label for="titlePost"> Titre de l'article : </label>
            <input type="text" name="titlePost" id="titlePost" placeholder="Titre de l'article" required />
        </p>
        <p>
            <label for="contentPost"> Contenu de l'article : </label>
            <textarea id="contentPost" name="contentPost" required> </textarea>
        </p>
        <p> <input type="submit" value="Valider" /> </p>
    </form><br>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
