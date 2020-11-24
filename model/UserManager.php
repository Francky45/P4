<?php

namespace OpenClassrooms\Blog\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");
  
class UserManager extends Manager
{
    public function verifyUser()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $req->execute(array($_POST['pseudo']));

        return $req;
    }

    public function addUser()
    {
        $db = $this->dbConnect();
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);   //On hache le mot de passe                     
        $req = $db->prepare('INSERT INTO users(pseudo, pass, email, record_date) VALUES(?, ?, ?, CURDATE())');
        $req->execute(array($_POST['pseudo'], $pass_hache, $_POST['email']));

        return $req;
    }
    
    public function sessionStart()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pseudo, pass, admin FROM users WHERE pseudo = :pseudo');
        $req->execute(array( 'pseudo'=> $_POST['pseudo']));
        $resultat = $req->fetch();
        
        return $resultat;
    }

}
