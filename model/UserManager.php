<?php

namespace OpenClassrooms\Blog\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");
  
class UserManager extends Manager
{
    public function verifyUser()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
        $req->execute(array($_POST['pseudo']));
        // $resultat = $req->fetch();

        return $req;
    }

    public function addUser()
    {
        $db = $this->dbConnect();
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);   //On hache le mot de passe                     
        $req = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, CURDATE())');
        $req->execute(array($_POST['pseudo'], $pass_hache, $_POST['email']));

        return $req;
    }
    
    public function sessionStart()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pseudo, pass FROM membres WHERE pseudo = :pseudo');
        $req->execute(array( 'pseudo'=> $_POST['pseudo']));
        $resultat = $req->fetch();
        
        return $resultat;
    }

    public function verifyAdmin()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT admin FROM membres WHERE 1');
        $req->execute(array('admin'));
        $admin = $req->fetch();
        
        return $admin;

    }
}
