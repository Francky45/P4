<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Billet Simple pour l'Alaska !" />
    <meta property="og:title" content="Billet Simple pour l'Alaska !" />
    <meta property="og:type" content="website" />
    <meta
      property="og:url"
      content="Billet Simple pour l'Alaska ! Un blog par Jean Forteroche"
    />
    <meta property="og:image" content="public/pictures/alaska.jpg" />
    <meta
      property="og:description"
      content="Billet Simple pour l'Alaska ! Un blog par Jean Forteroche"
    />
    <link
      rel="icon"
      type="image/png"
      href="public/pictures/icon.png"
    />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/p7vc9jkczvsbc0irp11602786gg36fb1t737pot7j9m4g6zs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea',
        language : "fr_FR",
      });
    </script>
</head>



<body>
<header>
    <ul id="login">
    <?php
    if (isset( $_SESSION['pseudo'])){
        
        echo '<li>Bonjour ' . $_SESSION['pseudo'] . ' !</li>';
        ?>
        <li>
            <a href="index.php">Accueil <i class="fas fa-home"></i></a>
        </li>

        <li>
            <a href="index.php?action=logout">Déconnection <i class="fas fa-sign-out-alt"></i></a>
        </li>

        <?php 
        if (isset($_SESSION['admin'])){
           echo '<li><a href="index.php?action=admin">Administration <i class="fas fa-solar-panel"></i></a></li>';
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
            <a href="index.php?action=login">Connection <i class="fas fa-sign-in-alt"></i></a>
        </li>
        <?php 
        }
    ?>
    </ul>
    <div id="title">Billet simple pour l'Alaska</div>

</header>
    <?= $content ?> 
    <footer>
    Francky Vaugon - Étudiant OpenClassrooms - Développeur Web Junior - Projet 4
</footer>
</body>



</html>