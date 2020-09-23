<?php 
require('../../require.php');

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
	if (count($_POST) > 0) {
		switch ($_POST['traitement']) {
			case 'add':
				if (Planning::add($_POST['titre'], $_POST['datedebut'], $_POST['datefin'], $_POST['description'], $_SESSION['id'])) {
					echo 'inserted';
				}else{
					echo 'error';
				}
				break;
			case 'edit':
				if (Planning::edit($_POST['id'], $_POST['titre'], $_POST['datedebut'], $_POST['datefin'], $_POST['description'])) {
					echo 'edited';
				}else{
					echo 'error';
				}
				break;
			case 'updatedrop':
				if (Planning::updateDrop($_POST['id'], $_POST['start'], $_POST['end'])) {
					echo 'edited';
				}else{
					echo 'error';
				}
				break;
			case 'delete':
				if (Planning::delete($_POST['id'])) {
					echo 'deleted';
				}else{
					echo 'error';
				}
				break;
		}
		
	}
}
?>