<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
</head>

<header>
    <div id="title">Projet 4: Blog pour écrivain</div>
    <ul id="login">
        <li>
            <a href="index.php">Accueil <i class="fas fa-home"></i></a>
        </li>
        <?php
    if (isset( $_SESSION['pseudo'])){
        echo 'Vous êtes connecté en tant que : ' . $_SESSION['pseudo'];

       echo '<li>
        <a href="index.php?action=logout">Déconnection <i class="far fa-hand-pointer"></i></a>
    </li>';}
    else{
        echo ' <li>
        <a href="index.php?action=register">Inscription <i class="far fa-hand-pointer"></i></a>
    </li>
    <li>
        <a href="index.php?action=login">Connection <i class="far fa-hand-pointer"></i></a>
    </li>';
        }
    ?>


    </ul>
</header>

<body>
    <?= $content ?>
</body>

<footer>
    Francky Vaugon - Étudiant OpenClassrooms - Développeur Web Junior - Projet 4
</footer>

</html>