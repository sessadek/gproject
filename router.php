<?php 
require('require.php');
//INSERT AND EDIT
if (isset($_POST)) {
	switch ($_POST['action']) {
		case 'team':
			switch ($_POST['traitement']) {
				case 'add':
					// var_dump(count($_POST['users']));
					if($_POST['users']) {
						foreach($_POST['users'] as $user) {
							Team::add($_POST['id_projet'], $user);
						}
						$confirm = "Equipe Ajouter";
						header('Location: pages/addprojet.php?id_projet=' . $_POST['id_projet'] . '&confirm='.$confirm);
						
					} else {
						$error = "Equipe non Ajouter";
			    		header('Location: addprojet.php?error='.$error);
					}
					break;
			}
			break;
		case 'user':
			switch ($_POST['traitement']) {
				case 'add':
					if(User::add($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['role'], $_POST['service'])){
			    		$confirm = "Utilisateur ajouté";
			    		header('Location: pages/listeusers.php?confirm='.$confirm);
			    	}else{
			    		$error = "Utilisateur non ajouté";
			    		header('Location: listeuser.php?error='.$error);
			    	}
					break;

				case 'edit':
					if(User::edit($_POST['id_user'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['role'], $_POST['service'])){
			    		$confirm = "Utilisateur modifié";
			    		header('Location: pages/listeusers.php?confirm='.$confirm);
			    	}else{
			    		$error = "Utilisateur non modifié";
			    	}
					break;
			}
			break;
		
		case 'societe':
			switch ($_POST['traitement']) {
				case 'add':
					if (count($_FILES) > 0) {
						$filename=$_FILES['logo']['name'];
						$ext=substr($filename,strrpos($filename,'.')+1);
						$ext=strtolower($ext);
						$fname=Tools::str2url($_POST['raison_social']).".".$ext;
						$extension_autoriser = array('jpg', 'jpeg', 'png');
						if (!in_array($ext, $extension_autoriser)){
							$error = "Extension non autorisée";
				    		header('Location: pages/listesocietes.php?error='.$error);
						}
						$upload_folder = __DIR__."/uploads/logo/";
						if (move_uploaded_file($_FILES['logo']['tmp_name'], $upload_folder. $fname)) {
							if(Societe::add($_POST['raison_social'], /*$_POST['secteur'],*/ $_POST['adresse'], $_POST['note'], $_POST['phone'], $_POST['email'], $_POST['contact_principale_nom'], $_POST['contact_principale_tele'])){
					    		$confirm = "Soiété ajouté";
					    		header('Location: pages/listesocietes.php?confirm='.$confirm);
					    	}else{
					    		$error = "Soiété non ajouté";
					    		header('Location: pages/listesocietes.php?error='.$error);
					    	}
						}else{
							$error = "Soiété non ajouté";
				    		header('Location: pages/listesocietes.php?error='.$error);
						}

					}else{
						if(Societe::add($_POST['raison_social'], /*$_POST['secteur'],*/ $_POST['adresse'], $_POST['note'], $_POST['phone'], $_POST['email'], $_POST['contact_principale_nom'], $_POST['contact_principale_tele'])){
				    		$confirm = "Soiété ajouté";
				    		header('Location: pages/listesocietes.php?confirm='.$confirm);
				    	}else{
				    		$error = "Soiété non ajouté";
				    		header('Location: pages/listesocietes.php?error='.$error);
				    	}
					}
					break;
					
				case 'edit':
					if(Societe::edit($_POST['id_societe'],$_POST['raison_social'], /*$_POST['secteur'],*/ $_POST['adresse'], $_POST['note'], $_POST['phone'], $_POST['email'], $_POST['contact_principale_nom'], $_POST['contact_principale_tele'])){
			    		$confirm = "Soiété modifié";
			    		header('Location: pages/listesocietes.php?confirm='.$confirm);
			    	}else{
			    		$error = "Soiété non modifié";
			    		header('Location: pages/listesocietes.php?error='.$error);
			    	}
					break;
			}
			break;
		case 'projet':
			switch ($_POST['traitement']) {
				case 'add':
					if(Projet::add($_POST['nomprojet'], $_POST['description'], $_POST['societe'], $_POST['responsable1'], $_POST['responsable2'],  $_POST['etat'], $_POST['date1'], $_POST['date2'], $_POST['etat'], $_POST['montant'])){ // $_POST['type'],
			    		$confirm = "Projet ajouté";
			    		header('Location: pages/listeprojet.php?confirm='.$confirm);
			    	}else{
			    		$error = "Projet non ajouté";
			    		header('Location: pages/listeprojet.php?error='.$error);
			    	}
					break;
					
				case 'edit':
					if(Projet::edit($_POST['id_projet'],$_POST['nomprojet'], $_POST['description'], $_POST['societe'], $_POST['responsable1'], $_POST['responsable2'], $_POST['etat'], $_POST['date1'], $_POST['date2'], $_POST['etat'], $_POST['montant'])){ //$_POST['type'],
			    		$confirm = "Projet modifié";
			    		header('Location: pages/listeprojet.php?confirm='.$confirm);
			    	}else{
			    		$error = "Projet non modifié";
			    		header('Location: pages/listeprojet.php?error='.$error);
			    	}
					break;
			}

			break;
		case 'documentation':
			switch ($_POST['traitement']) {
				case 'add':
					$filename=$_FILES['docs']['name'];
					$ext=substr($filename,strrpos($filename,'.')+1);
					$fname=date("YmdHis");
					$fname.=uniqid().".".$ext;
					$ext=strtolower($ext);
					$extension_autoriser = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt', 'jpg', 'jpeg', 'png');
					if (!in_array($ext, $extension_autoriser)){
						$error = "Extension non autorisée";
			    		header('Location: pages/listeprojet.php?error='.$error);
					}

					$upload_folder = __DIR__."/uploads/docs/";
					if (move_uploaded_file($_FILES['docs']['tmp_name'], $upload_folder. $fname)) {
					    if(Documentation::add($_POST['id_projet'], $fname , $_POST['nom_docs'], $_SESSION['id'], 0)){
				    		$confirm = "document ajouté";
				    		header('Location: pages/listeprojet.php?confirm='.$confirm);
				    	}else{
				    		$error = "Projet non ajouté";
				    		header('Location: pages/listeprojet.php?error='.$error);
				    	}
					} else {
					   $error = "Projet non ajouté";
			    		header('Location: pages/listeprojet.php?error='.$error);
					}
					break;
				case 'import':
					$filename=$_FILES['csvbacklog']['name'];
					$ext=substr($filename,strrpos($filename,'.')+1);
					$fname=date("YmdHis");
					$fname.=uniqid().".".$ext;
					$ext=strtolower($ext);
					$extension_autoriser = array('xls', 'xlsx');
					if (!in_array($ext, $extension_autoriser)){
						$error = "Extension non autorisée";
			    		header('Location: pages/listeprojet.php?error='.$error);
					}

					$upload_folder = __DIR__."/uploads/tmp/";
					if (move_uploaded_file($_FILES['csvbacklog']['tmp_name'], $upload_folder. $fname)) {
				    		//here
							$file = $upload_folder. $fname;
							
							if ( $xlsx = SimpleXLSX::parse($file) ) {
								$lines = $xlsx->rows();
							}
							if (count($lines) > 1) {
								$index = array_shift($lines);
								foreach ($lines as $line) {
									BackLog::add($line[0], $line[1], $line[2], $line[3], $line[4], $line[5], "#fff", $_POST['id_projet']);
								}
							}
						unlink($upload_folder. $fname);
						header('Location: pages/addprojet.php?id_projet=' . $_POST['id_projet']);
					} else {
					   //error
					}
					break;
			}
			break;
		case 'role':
			switch ($_POST['traitement']) {
				case 'add':
					if(Role::add($_POST['libelle_rolle'])){
			    		$confirm = "Rôle ajouté";
			    		header('Location: pages/addrole.php?confirm='.$confirm);
			    	}else{
			    		$error = "Rôle non ajouté";
			    		header('Location: pages/addrole.php?error='.$error);
			    	}
					break;
					
				case 'edit':
					if(Role::edit($_POST['id_role'],$_POST['libelle_rolle'])){
			    		$confirm = "Rôle modifié";
			    		header('Location: pages/addrole.php?confirm='.$confirm);
			    	}else{
			    		$error = "Rôle non modifié";
			    		header('Location: pages/addrole.php?error='.$error);
			    	}
					break;
			}
			break;
		case 'secteur':
			switch ($_POST['traitement']) {
				case 'add':
					if(Secteur::add($_POST['libelle_secteur'])){
			    		$confirm = "Secteur ajouté";
			    		header('Location: pages/addsecteur.php?confirm='.$confirm);
			    	}else{
			    		$error = "Secteur non ajouté";
			    		header('Location: pages/addsecteur.php?error='.$error);
			    	}
					break;
					
				case 'edit':
					if(Secteur::edit($_POST['id_secteur'],$_POST['libelle_secteur'])){
			    		$confirm = "Secteur modifié";
			    		header('Location: pages/addsecteur.php?confirm='.$confirm);
			    	}else{
			    		$error = "Secteur non modifié";
			    		header('Location: pages/addsecteur.php?error='.$error);
			    	}
					break;
				}
			break;

		case 'type':
			switch ($_POST['traitement']) {
				case 'add':
					if(Type::add($_POST['libelle_type'])){
			    		$confirm = "Type de projet ajouté";
			    		header('Location: pages/addtype.php?confirm='.$confirm);
			    	}else{
			    		$error = "Type de projet non ajouté";
			    		header('Location: pages/addtype.php?error='.$error);
			    	}
					break;
					
				case 'edit':
					if(Type::edit($_POST['id_type'],$_POST['libelle_type'])){
			    		$confirm = "Type de projet modifié";
			    		header('Location: pages/addtype.php?confirm='.$confirm);
			    	}else{
			    		$error = "Type de projet non modifié";
			    		header('Location: pages/addtype.php?error='.$error);
			    	}
					break;
				}
			break;
		case 'paiement':
			switch ($_POST['traitement']) {
				case 'add':
					if(Paiment::add($_POST['libelle_paiment'])){
			    		$confirm = "Etat de paiement ajouté";
			    		header('Location: pages/addpaiement.php?confirm='.$confirm);
			    	}else{
			    		$error = "Etat de paiement non ajouté";
			    		header('Location: pages/addpaiement.php?error='.$error);
			    	}
					break;
					
				case 'edit':
					if(Paiment::edit($_POST['id_paiment'],$_POST['libelle_paiment'])){
			    		$confirm = "Etat de paiement modifié";
			    		header('Location: pages/addpaiement.php?confirm='.$confirm);
			    	}else{
			    		$error = "Etat de paiement non modifié";
			    		header('Location: pages/addpaiement.php?error='.$error);
			    	}
					break;
				}
				break;
		case 'etat':
			switch ($_POST['traitement']) {
				case 'add':
					if(Etat::add($_POST['libelle_etat'])){
			    		$confirm = "Type de projet ajouté";
			    		header('Location: pages/addetat.php?confirm='.$confirm);
			    	}else{
			    		$error = "Type de projet non ajouté";
			    		header('Location: pages/addetat.php?error='.$error);
			    	}
					break;
					
				case 'edit':
					if(Etat::edit($_POST['id_etat'],$_POST['libelle_etat'])){
			    		$confirm = "Type de projet modifié";
			    		
			    		header('Location: pages/addetat.php?confirm='.$confirm);
			    	}else{
			    		$error = "Type de projet non modifié";
			    		header('Location: pages/addetat.php?error='.$error);
			    	}
					break;
			}

			break;
		case 'penalite':
			switch ($_POST['traitement']) {
				case 'add':
				//echo "<pre>"; print_r($_POST); die();
				if (Penalite::add($_SESSION['id'], $_POST['valeur'], $_POST['description'], $_POST['id_projet'])) {
					$confirm = "Pénalité Ajouté";
			    	header('Location: pages/listeprojet.php?confirm='.$confirm);
				}else{
					$error = "Pénalité non Ajouté";
			    	header('Location: pages/listeprojet.php?error='.$error);
				}
				break;
			}
			break;
	}
}
//DELETE
if (isset($_GET)) {
	switch ($_GET['action']) {
		case 'team':
			if($_GET['traitement'] == "delete") {
		    	if(Team::delete($_GET['id'])) {
		    		$confirm = "supprimé";
		    		header('Location: pages/addprojet.php?id_projet=' . $_GET['id_projet'] . '&confirm='.$confirm);
		    	} else {
		    		$error = "non supprimé";
		    		header('Location: pages/addprojet.php?id_projet=' . $_GET['id_projet'] . '?&error='.$error);
		    	}
			}
			break;
		case 'user':
			if($_GET['traitement'] == "delete"){
		    	if(User::delete($_GET['id'])){
		    		$confirm = "Utilisateur supprimé";
		    		header('Location: pages/listeusers.php?confirm='.$confirm);
		    	}else{
		    		$error = "Utilisateur non supprimé";
		    		header('Location: pages/listeusers.php?error='.$error);
		    	}
			}
			break;
		case 'societe':
			if($_GET['traitement'] == "delete"){
		    	if(Societe::delete($_GET['id'])){
		    		$confirm = "Société supprimé";
		    		header('Location: pages/listesocietes.php?confirm='.$confirm);
		    	}else{
		    		$error = "Société non supprimé";
		    		header('Location: pages/listesocietes.php?error='.$error);
		    	}
			}
			break;
		case 'projet':
			if($_GET['traitement'] == "delete"){
				if(Projet::delete($_GET['id'])){
					$confirm = "Projet supprimé";
					header('Location: pages/listeprojet.php?confirm='.$confirm);
				}else{
					$error = "Projet non supprimé";
					header('Location: pages/listeprojet.php?error='.$error);
				}
			}
			break;
		case 'documentation':
			if($_GET['traitement'] == "delete"){
				if(Documentation::delete($_GET['id'])){
					$confirm = "Document Supprimé";
					header('Location: pages/listeprojet.php?confirm='.$confirm);
				}else{
					$error = "Document non supprimé";
					header('Location: pages/listeprojet.php?error='.$error);
				}
			} elseif ($_GET['traitement'] == "download") {
				Documentation::download($_GET['id']);
			}
			break;
		case 'role':
			if($_GET['traitement'] == "delete"){
		    	if(Role::delete($_GET['id'])){
		    		$confirm = "Rôle supprimé";
		    		header('Location: pages/addrole.php?confirm='.$confirm);
		    	}else{
		    		$error = "Rôle non supprimé";
		    		header('Location: pages/addrole.php?error='.$error);
		    	}
			}
			break;

		case 'secteur':
			if($_GET['traitement'] == "delete"){
		    	if(Secteur::delete($_GET['id'])){
		    		$confirm = "Secteur supprimé";
		    		header('Location: pages/addsecteur.php?confirm='.$confirm);
		    	}else{
		    		$error = "Secteur non supprimé";
		    		header('Location: pages/addsecteur.php?error='.$error);
		    	}
			}
			break;

		case 'type':
			if($_GET['traitement'] == "delete"){
		    	if(Type::delete($_GET['id'])){
		    		$confirm = "Type de projet supprimé";
		    		header('Location: pages/addtype.php?confirm='.$confirm);
		    	}else{
		    		$error = "Type de projet non supprimé";
		    		header('Location: pages/addtype.php?error='.$error);
		    	}
			}
			break;

		case 'paiement':
			if($_GET['traitement'] == "delete"){
		    	if(Paiment::delete($_GET['id'])){
		    		$confirm = "Etat de paiement supprimé";
		    		header('Location: pages/addpaiement.php?confirm='.$confirm);
		    	}else{
		    		$error = "Etat de paiement non supprimé";
		    		header('Location: pages/addpaiement.php?error='.$error);
		    	}
			}
			break;

		case 'etat':
			if($_GET['traitement'] == "delete"){
		    	if(Etat::delete($_GET['id'])){
		    		$confirm = "Etat du projet supprimé";
		    		header('Location: pages/addetat.php?confirm='.$confirm);
		    	}else{
		    		$error = "Etat du projet non supprimé";
		    		header('Location: pages/addetat.php?error='.$error);
		    	}
			}
			break;
	}
}

?>