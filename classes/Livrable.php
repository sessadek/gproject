<?php 

class Livrable
{
	
	public function get()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM livrable");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public static function getByProject($id_projet)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM livrable WHERE id_projet = :id_projet");
		$query->bindValue(':id_projet', $id_projet);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function add($titre, $datedebut, $datefin, $description, $id_backlog, $id_projet, $prograssion, $montant, $etat)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO livrable(titre, datedebut, datefin, description, id_backlog, id_projet, prograssion, montant_livrable, id_etat) VALUES (:titre, :datedebut, :datefin, :description, :id_backlog, :id_projet, :prograssion, :montant, :etat)");

		$query->bindValue(':titre', $titre);
		$query->bindValue(':datedebut', $datedebut);
		$query->bindValue(':datefin', $datefin);
   		$query->bindValue(':description', $description);
    	$query->bindValue(':id_backlog', $id_backlog);
    	$query->bindValue(':id_projet', $id_projet);
    	$query->bindValue(':prograssion', $prograssion);
    	$query->bindValue(':montant', $montant);
    	$query->bindValue(':etat', $etat);

		if($query->execute())
			return true;
		else
			return false;
	}
	public function edit($id, $titre, $datedebut, $datefin, $description, $id_backlog, $prograssion, $montant, $etat)
	{
		global $conn;

		$query = $conn->prepare("UPDATE livrable SET titre = :titre, datedebut = :datedebut, datefin = :datefin, id_backlog = :id_backlog, description=:description, prograssion = :prograssion, montant_livrable = :montant, id_etat = :etat WHERE id_livrable = :id");

    	$query->bindValue(':id', $id);
		$query->bindValue(':titre', $titre);
		$query->bindValue(':datedebut', $datedebut);
		$query->bindValue(':datefin', $datefin);
    	$query->bindValue(':id_backlog', $id_backlog);
   		$query->bindValue(':description', $description);
   		$query->bindValue(':prograssion', $prograssion);
    	$query->bindValue(':montant', $montant);
    	$query->bindValue(':etat', $etat);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function updateDrop($id, $datedebut, $datefin)
	{
		global $conn;

		$query = $conn->prepare("UPDATE livrable SET datedebut = :datedebut, datefin = :datefin WHERE id_livrable = :id");

    	$query->bindValue(':id', $id);
		$query->bindValue(':datedebut', $datedebut);
		$query->bindValue(':datefin', $datefin);

		if($query->execute())
			return true;
		else
			return false;
	}
	public function delete($id_livrable)
	{
		global $conn;
		$query = $conn->prepare("DELETE FROM livrable WHERE id_livrable=:id_livrable");
		$query->bindValue(':id_livrable', $id_livrable);
		if ($query->execute())
    		return true;
    	else
    		return false;
	}

	public function getLastLivrable($date)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM `livrable` WHERE `datefin` > :date ORDER BY `datefin` LIMIT 5");
		$query->bindValue(':date', $date);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function getProgras($id)
	{
		global $conn;
		$query = $conn->prepare("SELECT AVG(`prograssion`) FROM `livrable` WHERE `id_projet`=:id");
		$query->bindValue(':id', $id);
		$query->execute();
    	$resultats = $query->fetch();
    	return $resultats;
	}

	public function getSum($id,$id_etat)
	{
		global $conn;
		$query = $conn->prepare("SELECT SUM(`montant_livrable`) FROM `livrable` WHERE `id_projet`=:id AND id_etat=:id_etat");
		$query->bindValue(':id', $id);
		$query->bindValue(':id_etat', $id_etat);
		$query->execute();
    	$resultats = $query->fetch();
    	return $resultats;
	}
}

?>