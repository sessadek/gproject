<?php 
require("../../require.php");


$output_arrays  = array();



$results = ($_GET['etat_projet'] == 0) ? Projet::getprojetListe($_GET['etat_projet']) : Projet::getprojetByEtatJson($_GET['etat_projet']);

foreach ($results as $result) {
	$array = array(
				"id_projet" => $result['id_projet'],
		        "nom_projet" => $result['nom_projet'],
		        "raison_social" => $result['raison_social'],
		        "nom" => $result['nom'],
                "prenom" => $result['prenom'],
                "nom1" => $result['nom1'],
                "prenom1" => $result['prenom1'],
                "libelle_paiment" => $result['libelle_paiment'],
                "libelle_etat" => $result['libelle_etat'],
                "date_debut" => $result['date_debut'],
                "date_livraison" => $result['date_livraison']
			);
	$object = (object) $array;
	array_push($output_arrays, $object);
}


echo json_encode($output_arrays);
?>