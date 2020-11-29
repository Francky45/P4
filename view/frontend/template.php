<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/p7vc9jkczvsbc0irp11602786gg36fb1t737pot7j9m4g6zs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      });
    </script>
</head>

<header>
    <ul id="login">
    <?php
    if (isset( $_SESSION['pseudo'])){
        
        echo '<li>Vous êtes connecté en tant que : ' . $_SESSION['pseudo'] . '</li>';
        ?>
        <li>
            <a href="index.php">Accueil <i class="fas fa-home"></i></a>
        </li>

        <li>
            <a href="index.php?action=logout">Déconnection <i class="far fa-hand-pointer"></i></a>
        </li>

        <?php 
        if (isset($_SESSION['admin'])){
           echo '<li><a href="index.php?action=admin">Administration <i class="far fa-hand-pointer"></i></a></li>';
        }

    }
    else{
        ?>
                <li>
            <a href="index.php">Accueil <i class="fas fa-home"></i></a>
        </li>
        <li>
            <a href="index.php?action=register">Inscription <i class="far fa-hand-pointer"></i></a>
        </li>
        <li>
            <a href="index.php?action=login">Connection <i class="far fa-hand-pointer"></i></a>
        </li>
        <?php 
        }
    ?>
    </ul>
    <div id="title">Billet simple pour l'Alaska</div>

</header>

<body>
    <?= $content ?> 
</body>

<footer>
    Francky Vaugon - Étudiant OpenClassrooms - Développeur Web Junior - Projet 4
</footer>

</html>