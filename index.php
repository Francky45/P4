<?php
session_start();
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
                if (!empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['comment']);
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
        elseif($_GET['action'] == 'logout') {
            logOut();
        }
        elseif($_GET['action'] == 'admin') {
            if (isset($_SESSION['admin'])) {

            adminPanel();
        }else{
            throw new Exception('Vous n\'êtes pas autorisé !');
        }
    }

        elseif($_GET['action'] == 'newPost') {
            if (isset($_POST['titlePost'], $_POST['contentPost'], $_SESSION['admin'])) {
                addNewPost();
            } else {
                throw new Exception('Tout les champs ne sont pas remplis !');
            }
        }

        elseif($_GET['action'] == 'acceptComment') {
            if (isset($_SESSION['admin'])) {

            acceptComment($_GET['id']);
             }else{
                throw new Exception('Vous n\'êtes pas autorisé !');
            }
         }

         elseif($_GET['action'] == 'deleteComment') {
            if (isset($_SESSION['admin'])) {

            deleteComment($_GET['id']);
             }else{
                throw new Exception('Vous n\'êtes pas autorisé !');
            }
         }

         elseif($_GET['action'] == 'signalComment') {
            signalComment($_GET['id']);
             }

         elseif($_GET['action'] == 'deletePost') {
                if (isset($_SESSION['admin'])) {
    
                deletePost($_GET['id']);
                 }else{
                    throw new Exception('Vous n\'êtes pas autorisé !');
                }
             }
         
             elseif($_GET['action'] == 'editPostPanel') {
                if (isset($_SESSION['admin'])) {
    
                editPostPanel($_GET['id']);
                 }else{
                    throw new Exception('Vous n\'êtes pas autorisé !');
                }
             }
             elseif($_GET['action'] == 'editPost') {
                if (isset($_SESSION['admin'])) {
    
                editPost($_GET['id']);
                 }else{
                    throw new Exception('Vous n\'êtes pas autorisé !');
                }
             }


        } else {
            listPosts();
        }
    } catch (Exception $e) { // S'il y a eu une erreur, alors...
        $errorMessage = $e -> getMessage();
        require('view/frontend/errorView.php');
    }