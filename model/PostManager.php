<?php

namespace OpenClassrooms\Blog\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC ');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['titlePost'], $_POST['contentPost']));

        return $req;
    }
    
    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $deletedPost = $req->execute(array($postId));
   
        return $deletedPost;
    }

    public function editPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ? ,  creation_date = NOW() WHERE id = ?');
        $editPost = $req->execute(array($_POST['title'], $_POST['content'], $postId));
   
        return $editPost;
    }
}