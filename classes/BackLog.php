<?php 

class BackLog
{
	
	public function add($id_backlog, $fonctionnalite, $importance, $estimation, $demonstration, $notes, $couleur, $id_projet)
	{
		global $conn;
		$query = $conn->prepare("INSERT INTO backlog (id_backlog, fonctionnalite, importance, estimation, demonstration, notes, couleur, id_projet) 
			VALUES (:id_backlog, :fonctionnalite, :importance, :estimation, :demonstration, :notes, :couleur, :id_projet)");

		$query->bindValue(':id_backlog', $id_backlog);
		$query->bindValue(':fonctionnalite', $fonctionnalite);
		$query->bindValue(':importance', $importance);
   		$query->bindValue(':estimation', $estimation);
    	$query->bindValue(':demonstration', $demonstration);
    	$query->bindValue(':notes', $notes);
    	$query->bindValue(':couleur', $couleur);
    	$query->bindValue(':id_projet', $id_projet);

		if($query->execute())
			return true;
		else
			return false;
	}
	public function edit($id, $id_backlog, $fonctionnalite, $importance, $estimation, $demonstration, $notes, $couleur, $id_projet)
	{
		global $conn;
		$query = $conn->prepare("UPDATE backlog SET id_backlog=:id_backlog,fonctionnalite = :fonctionnalite, importance= :importance, estimation = :estimation,  demonstration = :demonstration, notes = :notes, couleur = :couleur WHERE id=:id");

		$query->bindValue(':id', $id);
		$query->bindValue(':id_backlog', $id_backlog);
		$query->bindValue(':fonctionnalite', $fonctionnalite);
		$query->bindValue(':importance', $importance);
   		$query->bindValue(':estimation', $estimation);
    	$query->bindValue(':demonstration', $demonstration);
    	$query->bindValue(':notes', $notes);
    	$query->bindValue(':couleur', $couleur);
		if($query->execute())
			return true;
		else
			return false;
	}
	public static function getBackLogByIdProjet($id_projet)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM backlog WHERE id_projet = :id_projet");
		$query->bindValue(':id_projet', $id_projet);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public function delete($id_backlog, $id_projet)
	{
		global $conn;
		if ($conn->exec("DELETE FROM backlog WHERE id_backlog=$id_backlog AND id_projet = $id_projet"))
			return true;
		else
			return false;
	}
}

?>