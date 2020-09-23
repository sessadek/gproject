<?php 

class Type
{

	public function getTypeList()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM type_projet");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public static function getByID($id_type)
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM type_projet where id_type = $id_type");
    	$resultats = $stmt->fetch();
    	return $resultats;
	}

	public function add($libelle_type)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO type_projet (libelle_type) VALUES (:type)");

		$query->bindValue(':type', $libelle_type);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function delete($id_type)
	{
		global $conn;
		//check if the societe has no project 
		$query = $conn->prepare("DELETE FROM type_projet WHERE id_type=:id_type");
		$query->bindValue(':id_type', $id_type);
		$query->execute();
    		return true;
	}

	public function edit($id_type,$libelle_type)
	{
		global $conn;
		$query = $conn->prepare("UPDATE type_projet SET libelle_type =(:type) WHERE id_type = :id_type");
		$query->bindValue(':id_type', $id_type);
		$query->bindValue(':type', $libelle_type);
		
		if ($query->execute())
			return true;
		else
			return false;
	}
	
	public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_type) as idmax FROM type_projet");
    	$resultats = $query->fetch();
    	return $resultats['idmax'];
	}
}
?>