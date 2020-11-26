<?php

class Team
{
	public function add($projet_id, $user_id) {

        global $conn;

        $query = $conn->prepare("INSERT INTO projet_user (projet_id, user_id) 
								VALUES (:projet_id, :user_id)");

		$query->bindValue(':projet_id', $projet_id);
		$query->bindValue(':user_id', $user_id);

		if($query->execute()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getListe() {
		global $conn;
		$query = $conn->query("SELECT * FROM projet_user");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function getTeamByProjet($projet_id) {
		global $conn;
		$query = $conn->prepare("SELECT users.nom, users.prenom, users.id_user
								FROM users INNER  JOIN projet_user 
								ON projet_user.user_id = users.id_user 
								AND projet_user.projet_id = :projet_id");
		$query->bindValue(':projet_id', $projet_id);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function delete($user_id) {
		global $conn;
		//check if user can be deleted
		$query = $conn->prepare("DELETE FROM projet_user WHERE user_id = :user_id");
		$query->bindValue(':user_id', $user_id);
		$query->execute();
    	if ($query)
			return true;
    	else
    		return false;
	}


}
?>