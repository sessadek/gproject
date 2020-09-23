<?php 

class Societe
{

	public static function get($id_societe)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM societes WHERE id_societe = :id_societe");
		$query->bindValue(':id_societe', $id_societe);
		$query->execute();
    	$resultats = $query->fetch();
    	return $resultats;
	}

	public function getallListe()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM societes");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function getSocieteList()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM societes st join secteurs sc on sc.id_secteur=st.id_secteur");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public function add($raison_social, $id_secteur, $adresse, $note, $tele, $email, $contact, $tele_primaire)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO societes (raison_social, id_secteur, note, adresse, tele, contact_principale_nom, contact_principale_tele, email) VALUES (:raison_social, :id_secteur, :note, :adresse, :tele, :contact, :tele_primaire,:email)");

		$query->bindValue(':raison_social', $raison_social);
		$query->bindValue(':id_secteur', $id_secteur);
		$query->bindValue(':note', $note);
   		$query->bindValue(':adresse', $adresse);
    	$query->bindValue(':tele', $tele);
    	$query->bindValue(':contact', $contact);
    	$query->bindValue(':tele_primaire', $tele_primaire);
    	$query->bindValue(':email', $email);

		if($query->execute())
			return true;
		else
			return false;
	}

	public function edit($id_societe, $raison_social, $id_secteur, $adresse, $note, $tele, $email, $contact, $tele_primaire)
	{
		global $conn;
		$query = $conn->prepare("UPDATE societes SET raison_social =(:raison_social), id_secteur =(:id_secteur), adresse =(:adresse), note =(:note), tele =(:tele), email =(:email), contact_principale_nom = (:contact), contact_principale_tele = (:tele_primaire) WHERE id_societe = :id_societe");
		$query->bindValue(':id_societe', $id_societe);
		$query->bindValue(':raison_social', $raison_social);
		$query->bindValue(':id_secteur', $id_secteur);
		$query->bindValue(':adresse', $adresse);
		$query->bindValue(':note', $note);
		$query->bindValue(':tele', $tele);
		$query->bindValue(':email', $email);
		$query->bindValue(':contact', $contact);
		$query->bindValue(':tele_primaire', $tele_primaire);
		if ($query->execute())
			return true;
		else
			return false;
	}

	public function delete($id_societe)
	{
		global $conn;
		//check if the societe has no project 
		$query = $conn->prepare("SELECT id_societe FROM projets WHERE id_societe = :id_societe");
		$query->bindValue(':id_societe', $id_societe);
		$query->execute();
    	$resultats = $query->fetchAll();
    	if (count($resultats) == 0) {
    		//if not existe delete societe
    		if ($conn->exec("DELETE FROM societes WHERE id_societe=$id_societe"))
				return true;
			else
				return false;
    	}
    	else
    		return false;
	}

	public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_societe) as max FROM societes");
    	$resultats = $query->fetch();
    	return $resultats['max'];
	}

	public function gettop()
	{
		global $conn;
		$query = $conn->query("SELECT `id_societe`, sum(`montant`) as sum FROM `projets` GROUP BY `id_societe` ORDER BY sum DESC LIMIT 6");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
}
?>