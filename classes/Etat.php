<?php 

class Etat
{

	public function getetatlist()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM etat_projet");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public static function getByID($id_etat)
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM etat_projet where id_etat = $id_etat");
    	$resultats = $stmt->fetch();
    	return $resultats;
	}

	public function add($libelle_etat)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO etat_projet (libelle_etat) VALUES (:etat)");

		$query->bindValue(':etat', $libelle_etat);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function delete($id_etat)
	{
		global $conn;
		//check if the societe has no project 
		$query = $conn->prepare("DELETE FROM etat_projet WHERE id_etat=:id_etat");
		$query->bindValue(':id_etat', $id_etat);
		$query->execute();
    		return true;
	}

	public function edit($id_etat,$libelle_etat)
	{
		global $conn;
		$query = $conn->prepare("UPDATE etat_projet SET libelle_etat =(:etat) WHERE id_etat = :id_etat");
		$query->bindValue(':id_etat', $id_etat);
		$query->bindValue(':etat', $libelle_etat);
		
		if ($query->execute())
			return true;
		else
			return false;
	}

	public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_etat) as idmax FROM etat_projet");
    	$resultats = $query->fetch();
    	return $resultats['idmax'];
	}
	
	public static function getByID2($id_etat)
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM etat_projet where id_etat = $id_etat");
    	$resultats = $stmt->fetch();
    	return $resultats;
	}
}
?>