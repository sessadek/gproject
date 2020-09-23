<?php

require('connexion.php');
session_start();
if (!empty($_POST['email']) && !empty($_POST['password']) )
{
    $query=$conn->prepare('SELECT id_user, nom, prenom, id_role, password
    FROM users WHERE email = :login');
    $query->bindValue(':login',$_POST['email'], PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetch();
	if (1 == 1) // Acces OK
	{
	    $_SESSION['nom_prenom'] = $data['nom']." ".$data['prenom'];
	    $_SESSION['email'] = $_POST['email'];
	    $_SESSION['level'] = $data['id_role'];
	    $_SESSION['id'] = $data['id_user'];
	    $_SESSION['loggedin'] = true;
	    echo 'connect';
	}
	else // Acces pas OK
	{
	    echo 'error';
	    die();
	}
	$query->CloseCursor();
}

?>