<?php 

/**
* Penalite
*/
class Penalite
{
	public function add($id_user, $valeur, $description, $id_projet)
	{
		global $conn;
		$query = $conn->prepare("INSERT INTO penalite (id_user, valeur, description, id_projet) 
			VALUES (:id_user, :valeur, :description , :id_projet)");

		$query->bindValue(':id_user', $id_user);
		$query->bindValue(':valeur', $valeur);
    	$query->bindValue(':description', $description);
    	$query->bindValue(':id_projet', $id_projet);

		if($query->execute())
			return true;
		else
			return false;
	}
	public function delete($id_penalite)
	{
		global $conn;
		if ($conn->exec("DELETE FROM penalite WHERE id_penalite=$id_penalite"))
			return true;
		else
			return false;
	}
	public static function getByProject($id_projet){
		global $conn;
		$query = $conn->prepare("SELECT * FROM penalite pen JOIN users u ON u.id_user =pen.id_user WHERE pen.id_projet = :id_projet");
		$query->bindValue(':id_projet', $id_projet);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
}


?>