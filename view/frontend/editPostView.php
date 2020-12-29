<!DOCTYPE html>

<?php $title = 'Un Billet Simple vers l\'Alaska !' ?>

<?php ob_start();?>


<h1><span>Modifier un article</span></h1>

<div id="form_edit_post">

      
    <form action="index.php?action=editPost&id=<?= htmlspecialchars($post['id'])?>" method="post">

        <label for="title">Nouveau Titre de l'article :</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title'])?>" required /><br>
        <br><label for="content">Nouveau Contenu de l'article : </label><br>
        <br><textarea id="content" name="content"><?= $post['content'] ?></textarea><br>
        <input type="submit" value="Modifier" />
    </form>  
</div> 

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
