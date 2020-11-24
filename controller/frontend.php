<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function formRegister()
{
    require('view/frontend/registerView.php');
}

function formLog()
{
    require('view/frontend/logView.php');
}

function logOut()
{
    require('view/frontend/logoutView.php');
}

function adminPanel()
{
    require('view/frontend/adminView.php');
}

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function addNewPost()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $newPost = $postManager->addPost();
    header ('Location: index.php');

}

function viewComment()
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $comment = $commentManager->getComment($_GET['id']);
  
    require('view/frontend/editView.php');
}

function editComment($id, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
  
    $newComment = $commentManager->updateComment($id, $comment);
  
    if ($newComment === false) {
  
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header ('Location: index.php?action=post&id='.$_GET['idpost']);
    }
}

function newUser()
{

    $userManager = new \OpenClassrooms\Blog\Model\UserManager(); // Création d'un objet
    $verifyUser = $userManager->verifyUser();
    
    if ($verifyUser->rowCount() == 0)
    {
        $newUser = $userManager->addUser(); // Appel d'une fonction de cet objet
        header ('Location: index.php?action=login');
    } 
    else 
    {
        throw new Exception ('Pseudo déjà utilisé !');
    }

}

function logUser()
{
    $userManager = new \OpenClassrooms\Blog\Model\UserManager(); // Création d'un objet
    $resultat = $userManager->sessionStart();

    if (password_verify($_POST['pass'], $resultat['pass']))
    {
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $resultat['pseudo'];
        $_SESSION['admin'] = $resultat['admin'];
        header ('Location: index.php');
    }
    else 
    {
        throw new Exception ('Pseudo ou mot de passe incorrect !');
    }

}


