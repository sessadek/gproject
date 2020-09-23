<?php 


class Role
{
	
	public function getRoleList()
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM role ORDER BY libelle_rolle");
    	$resultats = $stmt->fetchAll();
    	return $resultats;
	}

	public function get()
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM role");
    	$resultats = $stmt->fetchAll();
    	return $resultats;
	}

	public static function getByID($id_role)
	{
		global $conn;
		$stmt = $conn->query("SELECT * FROM role where id_role = $id_role");
    	$resultats = $stmt->fetch();
    	return $resultats;
	}

	public function add($libelle_rolle)
	{
		global $conn;
		$query = $conn->prepare("INSERT INTO role (libelle_rolle) VALUES (:rolle)");
		$query->bindValue(':rolle', $libelle_rolle);
		if($query->execute())
			return true;
		else
			return false;
	}

	public function delete($id_role)
	{
		global $conn;
		//check if the societe has no project 
		$query = $conn->prepare("DELETE FROM role WHERE id_role=:id_role");
		$query->bindValue(':id_role', $id_role);
		if($query->execute())
    		return true;
    	else
    		return false;
	}

	public function edit($id_role,$libelle_rolle)
	{
		global $conn;
		$query = $conn->prepare("UPDATE role SET libelle_rolle =(:libele) WHERE id_role = :id_role");
		$query->bindValue(':id_role', $id_role);
		$query->bindValue(':libele', $libelle_rolle);
		if ($query->execute())
			return true;
		else
			return false;
	}

	public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_role) as idmax FROM role");
    	$resultats = $query->fetch();
    	return $resultats['idmax'];
	}
}

?>