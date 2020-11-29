<!DOCTYPE html>

<?php $title = 'Modifier un article' ?>

<?php ob_start(); ?>
  
<?php
$data = $posts->fetch()
?>
    
<div id="form_edit_post">
    <h1>Modifier un article</h1>
      
    <form action="index.php?action=editPost&id=<?= $data['id'] ?>" method="post">
        <div>
            <label for="title">Titre de l'article : </label>
            <input type="text" name="title" id="title" placeholder="Titre" required />

        </div><br>
        <div>
            <label for="content">Contenu : </label><br>
            <textarea id="content" name="content">Contenu de l'article</textarea>
        </div><br>
        <div>
            <input type="submit" value="Modifier" />
        </div>
    </form>

    <p><a href="index.php">Retour à l'accueil <i class="fas fa-home"></i></a></p>
     
</div> 
  

<?php $content = ob_get_clean(); ?>
  
<?php require('template.php'); ?>