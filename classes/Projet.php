<?php 

class Projet
{

	public static function get($id_projet)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM projets WHERE id_projet = :id_projet");
		$query->bindValue(':id_projet', $id_projet);
		$query->execute();
    	$resultats = $query->fetch();
    	return $resultats;
	}

	public function getall()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM projets");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}


	public function getprojetListe(){
		global $conn;
		$query = $conn->query("SELECT p.id_projet,p.nom_projet,p.description,s.raison_social, u.nom, u.prenom,(us.nom) as nom1, (us.prenom) as prenom1,t.libelle_type,i.libelle_paiment,p.date_debut,p.date_livraison from projets p join societes s on p.id_societe=s.id_societe join users u on p.id_responsable1=u.id_user join users us on p.id_responsable2=us.id_user join type_projet t on p.id_type=t.id_type join paiment i on p.etat_paiment=i.id_paiment ");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}


	public function add($nom_projet, $description, $id_societe, $id_resp1, $id_resp2, $id_type, $etat, $date1, $date2, $etat_projet, $montant)
	{
		global $conn;

		$query = $conn->prepare("INSERT INTO projets(nom_projet, description, id_societe, id_responsable1,id_responsable2, id_type, etat_paiment, date_debut, date_livraison, etat_projet, montant) VALUES (:nom, :description, :id_societe, :id_resp1, :id_resp2, :id_type, :etat,:date1,:date2, :etat_projet, :montant)");

		$query->bindValue(':nom', $nom_projet);
		$query->bindValue(':description', $description);
		$query->bindValue(':id_societe', $id_societe);
   		$query->bindValue(':id_resp1', $id_resp1);
    	$query->bindValue(':id_resp2', $id_resp2);
    	$query->bindValue(':id_type', $id_type);
    	$query->bindValue(':etat', $etat);
    	$query->bindValue(':date1', $date1);
    	$query->bindValue(':date2', $date2);
    	$query->bindValue(':etat_projet', $etat_projet);
    	$query->bindValue(':montant', $montant);

		if($query->execute())
			return true;
		else
			return false;
	}
	public function edit($id_projet, $nom_projet, $description, $id_societe, $id_resp1, $id_resp2, $id_type, $etat, $date1, $date2, $etat_projet, $montant)
	{
		global $conn;
		$query = $conn->prepare("UPDATE projets SET nom_projet =(:nom), description =(:description), id_societe =(:id_societe), id_responsable1 =(:id_resp1), id_responsable2 =(:id_resp2),id_type = (:id_type), etat_paiment = (:etat), date_debut=(:date1),date_livraison=(:date2), etat_projet = :etat_projet, montant = :montant  WHERE id_projet = :id_projet");
		$query->bindValue(':id_projet', $id_projet);
		$query->bindValue(':nom', $nom_projet);
		$query->bindValue(':description', $description);
		$query->bindValue(':id_societe', $id_societe);
		$query->bindValue(':id_resp1', $id_resp1);
		$query->bindValue(':id_resp2', $id_resp2);
		$query->bindValue(':id_type', $id_type);
		$query->bindValue(':etat', $etat);
		$query->bindValue(':date1', $date1);
		$query->bindValue(':date2', $date2);
		$query->bindValue(':etat_projet', $etat_projet);
		$query->bindValue(':montant', $montant);
		if ($query->execute())
			return true;
		else
			return false;
	}
	

	public function delete($id_projet)
	{
		global $conn;
		//check if the societe has no project 
		$query = $conn->prepare("DELETE FROM projets WHERE id_projet=:id_projet");
		$query->bindValue(':id_projet', $id_projet);
		$query->execute();
    		return true;
	}

		public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_projet) as max FROM projets");
    	$resultats = $query->fetch();
    	return $resultats['max'];
	}

	public function getCountProjetByEtat()
	{
		
    	global $conn;
		$query = $conn->query("SELECT COUNT(`id_projet`) as etat ,`etat_projet` FROM `projets` GROUP BY `etat_projet`");
    	$resultats = $query->fetchAll();
    	return $resultats;

	}

	public function getSomme()
	{
		global $conn;
		$query = $conn->query("SELECT SUM(`montant`) as sum FROM `projets` ");
    	$resultats = $query->fetch();

        return $resultats['sum'];
	}

	public function getSommeByEtat($id_etat) 
	{ 
		global $conn;
		$query = $conn->prepare("SELECT SUM(`montant`) as sum FROM `projets` WHERE `etat_projet`=:id_etat ");
	 	$query->bindValue(':id_etat', $id_etat );
		$query->execute();
    	$resultats = $query->fetch();
        return $resultats['sum']; 

    }

	public function getProjetByEtat($id_etat)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM `projets` WHERE `etat_projet`= :id_etat");
		$query->bindValue(':id_etat', $id_etat );
		$query->execute();
    	$resultats = $query->fetchall();
    	return $resultats;
	}

	public function getM($s)
	{
		$n = (0+str_replace(",", "", $s));
        if (!is_numeric($n)) return false;
        elseif ($n > 1000000) return round(($n/1000000), 2).'M';
        else return round($n, 2);
    }

    public function getPBYType($dat)
	{
		global $conn;
		$query = $conn->prepare("SELECT COUNT(`id_projet`) as type ,`id_type` FROM `projets` WHERE YEAR(`date_livraison`) = :dat GROUP BY `id_type`");
		$query->bindValue(':dat', $dat);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function getYear()
	{
		global $conn;
		$query = $conn->query("SELECT YEAR(`date_livraison`)  FROM projets WHERE `etat_projet`=3 GROUP BY  YEAR(`date_livraison`)");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function getMPBYYear($dat)
	{
		global $conn;
		$query = $conn->prepare("SELECT SUM(`montant`) FROM projets WHERE YEAR(`date_livraison`) = :dat AND `etat_projet`=3");
		$query->bindValue(':dat', $dat);
		$query->execute();
    	$resultats = $query->fetch();
    	return $resultats;
	}

	public function getMontantByYear($date, $id_etat) 
	{ 
		global $conn;
		$query = $conn->prepare("SELECT SUM(`montant`) FROM projets WHERE YEAR(`date_livraison`) = :date AND `etat_projet`=:id_etat");
 		$query->bindValue(':date', $date);
 		$query->bindValue(':id_etat', $id_etat);
 		$query->execute();
     	$resultats = $query->fetch();
      	return $resultats;
    } 


}
?>
