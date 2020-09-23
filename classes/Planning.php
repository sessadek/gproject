<?php 


class Planning
{
	public function get()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM planning");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public static function getByUser($id_user)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM planning WHERE id_user = :id_user");
		$query->bindValue(':id_user', $id_user);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function add($titre, $datedebut, $datefin, $description, $id_user)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO planning(titre, datedebut, datefin, description, id_user) VALUES (:titre, :datedebut, :datefin, :description, :id_user)");

		$query->bindValue(':titre', $titre);
		$query->bindValue(':datedebut', $datedebut);
		$query->bindValue(':datefin', $datefin);
   		$query->bindValue(':description', $description);
    	$query->bindValue(':id_user', $id_user);

		if($query->execute())
			return true;
		else
			return false;
	}
	public function delete($id_planning)
	{
		global $conn;
		$query = $conn->prepare("DELETE FROM planning WHERE id_planning=:id_planning");
		$query->bindValue(':id_planning', $id_planning);
		if ($query->execute())
    		return true;
    	else
    		return false;
	}
	public function edit($id, $titre, $datedebut, $datefin, $description)
	{
		global $conn;
		$query = $conn->prepare("UPDATE planning SET titre = :titre, datedebut = :datedebut, datefin = :datefin, description=:description WHERE id_planning = :id");

    	$query->bindValue(':id', $id);
		$query->bindValue(':titre', $titre);
		$query->bindValue(':datedebut', $datedebut);
		$query->bindValue(':datefin', $datefin);
   		$query->bindValue(':description', $description);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function updateDrop($id, $datedebut, $datefin)
	{
		global $conn;
		$query = $conn->prepare("UPDATE planning SET datedebut = :datedebut, datefin = :datefin WHERE id_planning = :id");
    	$query->bindValue(':id', $id);
		$query->bindValue(':datedebut', $datedebut);
		$query->bindValue(':datefin', $datefin);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function getfirst($dat)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM `planning` WHERE `datedebut` > :dat ORDER BY `datedebut` LIMIT 4");
		$query->bindValue(':dat', $dat);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
}
?>