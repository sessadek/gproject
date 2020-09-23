<?php 
require('../../require.php');

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
	if (count($_POST) > 0) {
		switch ($_POST['traitement']) {
			case 'add':
				if (Livrable::add($_POST['titre'], $_POST['datedebut'], $_POST['datefin'], $_POST['description'], $_POST['id_backlog_ad'], $_POST['id_projet'], $_POST['realiser'], $_POST['montant'], $_POST['etat'])) {
					echo 'inserted';
				}else{
					echo 'error';
				}
				break;
			case 'edit':
				if (Livrable::edit($_POST['id'], $_POST['titre'], $_POST['datedebut'], $_POST['datefin'], $_POST['description'], $_POST['id_backlog_ed'], $_POST['realisere'], $_POST['montant_e'], $_POST['etat'])) {
					echo 'edited';
				}else{
					echo 'error';
				}
				break;
			case 'updatedrop':
				if (Livrable::updateDrop($_POST['id'], $_POST['start'], $_POST['end'])) {
					echo 'edited';
				}else{
					echo 'error';
				}
				break;
			case 'delete':
				if (Livrable::delete($_POST['id'])) {
					echo 'deleted';
				}else{
					echo 'error';
				}
				break;
		}
		
	}
}
?>