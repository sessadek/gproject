<?php 

class Paiment
{

	public function getpaiementlist()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM paiment");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public static function getByID($id_paiment)
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM paiment where id_paiment = $id_paiment");
    	$resultats = $stmt->fetch();
    	return $resultats;
	}

	public function add($libelle_paiment)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO paiment (libelle_paiment) VALUES (:paiement)");

		$query->bindValue(':paiement', $libelle_paiment);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function delete($id_paiment)
	{
		global $conn;
		//check if the societe has no project 
		$query = $conn->prepare("DELETE FROM paiment WHERE id_paiment=:id_paiment");
		$query->bindValue(':id_paiment', $id_paiment);
		$query->execute();
    		return true;
	}

	public function edit($id_paiment,$libelle_paiment)
	{
		global $conn;
		$query = $conn->prepare("UPDATE paiment SET libelle_paiment =(:paiement) WHERE id_paiment = :id_paiment");
		$query->bindValue(':id_paiment', $id_paiment);
		$query->bindValue(':paiement', $libelle_paiment);
		
		if ($query->execute())
			return true;
		else
			return false;
	}
	public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_paiment) as idmax FROM paiment");
    	$resultats = $query->fetch();
    	return $resultats['idmax'];
	}
	
}
?>