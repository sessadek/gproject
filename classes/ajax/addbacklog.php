<?php 
require('../../require.php');

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
	if (count($_POST) > 0) {
		switch ($_POST['ajax_action']) {
			case 'add':
				if (BackLog::add($_POST['id_backlog'], $_POST['fonctionnalite'], $_POST['importance'], $_POST['estimation'], $_POST['demonstration'],$_POST['notes'], $_POST['couleur'], $_POST['id_projet'], $_POST['id_user'])) {
					echo 'inserted';
				}else{
					echo 'error';
				}
				break;
			case 'update':
				if (BackLog::edit($_POST['id'], $_POST['id_backlog'], $_POST['fonctionnalite'], $_POST['importance'], $_POST['estimation'], $_POST['demonstration'],$_POST['notes'], $_POST['couleur'], $_POST['id_projet'], $_POST['id_user_e'])) {
					echo 'updated';
				}else{
					echo 'error';
				}
				break;
			case 'delete':
				$id = explode("-", $_POST['ids']);
				$id_backlog = $id[0];
				$id_projet = $id[1];
				if (BackLog::delete($id_backlog, $id_projet)) {
					echo 'deleted';
				}else{
					echo 'error';
				}
				break;
		}
	}else{
		echo 'error';
	}
}
?>