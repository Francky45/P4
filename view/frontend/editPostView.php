<!DOCTYPE html>

<?php $title = 'Modifier un article' ?>

<?php ob_start();?>


<h1><span>Modifier un article</span></h1>

<div id="form_edit_post">

      
    <form action="index.php?action=editPost&id=<?= $_GET['id'] ?>" method="post">

        <label for="title">Titre de l'article : </label>
        <input type="text" name="title" id="title" placeholder="Titre" required /><br>
        <br><label for="content">Contenu de l'article : </label><br>
        <br><textarea id="content" name="content"></textarea><br>
        <input type="submit" value="Modifier" />
    </form>  
</div> 

<button class="button_home"><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></button> 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
