<?php

namespace OpenClassrooms\Blog\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");
  
class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comments.id, comments.id_user, comments.comment, users.pseudo, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN users ON users.id = comments.id_user WHERE comments.post_id = ? ORDER BY comments.comment_date DESC');
        $comments->execute(array($postId));
  
        return $comments;
    }

    public function getCommentsSignals()
    {
        $db = $this->dbConnect();
        $signals = $db->query('SELECT * FROM comments WHERE comment_report = 1');
  
        return $signals;
    }
  
    public function postComment($postId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, id_user, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $_SESSION['id'], $comment));
  
        return $affectedLines;
    }
  
    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT comments.id, comments.id_user, comments.comment, users.pseudo, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN users ON users.id = comments.id_user WHERE comments.id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();
  
        return $comment;
    }

    public function updateComment($id, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = ?, comment_date = NOW() WHERE id = ?');
        $newComment = $req->execute(array($comment, $id));
   
        return $newComment;
    }
    
    public function acceptComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment_report = 0, comment_date = NOW() WHERE id = ?');
        $acceptedComment = $req->execute(array($id));
   
        return $acceptedComment;
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $req->execute(array($id));
   
        return $deletedComment;
    }

    public function signalComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment_report = 1 WHERE id = ?');
        $signalComment = $req->execute(array($id));
   
        return $signalComment;
    }
}