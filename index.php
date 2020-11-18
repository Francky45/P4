<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'viewComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                viewComment();
            } else {
                throw new Exception('Aucun commentaire trouvé !');
            }
        }
        elseif($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    editComment($_GET['id'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'register') {
            formRegister();
        }
        elseif($_GET['action'] == 'addUser') {
            if (isset($_POST['pseudo'], $_POST['pass'], $_POST['pass2'], $_POST['email'])) {
                if (($_POST['pass'] == $_POST['pass2'])) // Test si les deux mdp sont identiques & mail valide
                {
                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
                        newUser();
                    } else {
                        throw new Exception('Adresse Mail invalide');
                    }
                } else {
                    throw new Exception('Les mots de passe sont différents');
                }
            }

        }


        elseif($_GET['action'] == 'login') {
            formLog();
        }
        elseif($_GET['action'] == 'logForm') {
            logUser();
        }
        else if ($_GET['action'] == 'logout') {
            logOut();
        }


    } else {
        listPosts();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e -> getMessage();
    require('view/frontend/errorView.php');
}