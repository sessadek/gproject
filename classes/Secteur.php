<?php 

class Secteur
{

	public function getSecteurList()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM secteurs");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	
	public static function getByID($id_secteur)
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM secteurs where id_secteur = $id_secteur");
    	$resultats = $stmt->fetch();
    	return $resultats;
	}

	public function add($libelle_secteur)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO secteurs (libelle_secteur) VALUES (:secteur)");

		$query->bindValue(':secteur', $libelle_secteur);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function delete($id_secteur)
	{
		global $conn;
		//check if the societe has no project 
		$query = $conn->prepare("DELETE FROM secteurs WHERE id_secteur=:id_secteur");
		$query->bindValue(':id_secteur', $id_secteur);
		if($query->execute())
			return true;
		else
			return false;
	}

	public function edit($id_secteur,$libelle_secteur)
	{
		global $conn;
		$query = $conn->prepare("UPDATE secteurs SET libelle_secteur =(:secteur) WHERE id_secteur = :id_secteur");
		$query->bindValue(':id_secteur', $id_secteur);
		$query->bindValue(':secteur', $libelle_secteur);
		
		if ($query->execute())
			return true;
		else
			return false;
	}
	
	public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_secteur) as idmax FROM secteurs");
    	$resultats = $query->fetch();
    	return $resultats['idmax'];
	}
}
?>