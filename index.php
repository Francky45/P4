<!DOCTYPE html>
<html>

<head>
    <title>TP1 BLOG</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
</head>

<body>
    <header>
        <h1>Mon 1er blog !</h1>
    </header>

    <div id="titre"> Derniers billets :</div>

    <?php
    // Connexion à la base de données

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // On récupère les 5 derniers billets

    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC');

    while ($donnees = $req->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['titre']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
                // On affiche le contenu du billet
                echo nl2br(htmlspecialchars($donnees['contenu']));
                ?>
            <br />
            <div id="com"><em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
            </div>

    </div>
    
    <?php
    } // Fin de la boucle des billets
    $req->closeCursor();
    ?>

    <footer>
        Francky Vaugon - Étudiant OpenClassrooms - Développeur Web Junior - Projet 4<br />
    </footer>

</body>

</html>