<?php require("../header.php"); ?>
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<?php require("../sidebar.php"); ?>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Ajouter un projet	
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<!--Begin::Section-->
						<div class="row">
							<div class="col-lg-12">
								<div class="m-portlet">
								<!--begin::Form-->
								<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="../router.php" method="post" id="user_societe" enctype="multipart/form-data">
									<input type="hidden" name="action" value="projet">
									<?php if (isset($_GET['id_projet'])) {
										$projet = Projet::get($_GET['id_projet']);
								
										?>
											<input type="hidden" name="traitement" value="edit">
											<input type="hidden" name="id_projet" value="<?=$_GET['id_projet']; ?>">
										<?php
										}else{
										?>
											<input type="hidden" name="traitement" value="add">
										<?php
										} 
									?>
									<div class="m-portlet__body">
										<div class="form-group m-form__group row">
											
											<div class="col-lg-6 controller">
												<label>
													Nom du projet :
												</label>
												<input type="text" name="nomprojet" class="form-control m-input" placeholder="Nom du projet..."<?php if(isset($projet['nom_projet'])){ echo "value='".$projet['nom_projet']."'";} ?>>


												<br>

												<label class="">
													Société :
												</label>
												<select class="form-control m-select" name="societe">
													<?php 
															$societes = Societe::getallListe();
															foreach ($societes as $societe) {
																if (isset($projet['id_societe'])) {
																if ($projet['id_societe'] == $societe['id_societe']) {
																	$selected = "selected";
																}
															}

															echo "<option value='".$societe['id_societe']."'>".$societe['raison_social']."</option>";
															}
														?>
												</select>
											
											</div>

											<div class="col-lg-6 controller">
												<label class="">
													Description :
												</label>
												<textarea class="form-control m-input m-input--air" name="description" placeholder="Description..." rows="6" ><?php if(isset($projet['description'])){ echo $projet['description'];} ?></textarea>
											</div>

										</div>
										<div class="form-group m-form__group row">
											<div class="col-lg-6 controller">
												<label class="">
													Responsable du projet :
												</label>
												<select class="form-control m-select" name="responsable1">
													<?php 
															$espace=" ";
															$users = User::getListe();
															foreach ($users as $user) {
																	if (isset($projet['id_user'])) {
																if ($projet['id_user'] == $user['id_societe']) {
																	$selected = "selected";
																}
															}
																echo "<option value='".$user['id_user']."'>".$user['nom']."".$espace."".$user['prenom']."</option>";
															}
														?>
												</select>
											</div>
											<div class="col-lg-6 controller">
												<label>
													Adjoint du responsable du projet:
												</label>
												<select class="form-control m-select" name="responsable2">
													<?php 
															$espace=" ";
															$users = User::getListe();
															foreach ($users as $user) {
																echo "<option value='".$user['id_user']."'>".$user['nom']."".$espace."".$user['prenom']."</option>";
															}
														?>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<!-- <div class="col-lg-6 controller">
												<label class="">
													Type du projet :
												</label>
												<select class="form-control m-select" name="type">
													<?php 
															$types = Type::getTypeList();
															foreach ($types as $type) {
																echo "<option value='".$type['id_type']."'>".$type['libelle_type']."</option>";
															}
														?>
												</select>
											</div> -->
											<div class="col-lg-6 controller">
												<label>
													Etat de paiement :
												</label>
												<select class="form-control m-select" name="etat">
													<?php 
															$paiements = Paiment::getpaiementlist();
															foreach ($paiements as $paiement) {
															echo "<option value='".$paiement['id_paiment']."'>".$paiement['libelle_paiment']."</option>";
															}
														?>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<div class="col-lg-6 controller">
												<label>Etat du projet :</label>
												<select class="form-control m-select" name="etat">
													<?php 
														$etats = Etat::getetatlist();
														foreach ($etats as $etat) {
															echo "<option value='".$etat['id_etat']."'>".$etat['libelle_etat']."</option>";
														}
													?>
												</select>
											</div>
											<div class="col-lg-6 controller">
												<label class="">
													Budget du projet :
												</label>
												<input type="text" name="montant" class="form-control m-input"<?php if(isset($projet['montant'])){ echo "value='".$projet['montant']."'";} ?>>
											</div>
										</div>
										<div class="form-group m-form__group row">
											
											<div class="col-lg-6 controller">
												<label>
													Date du début du projet :
												</label>
												<input type="date" name="date1" class="form-control m-input"<?php if(isset($projet['date_debut'])){ echo "value='".$projet['date_debut']."'";} ?>>
											</div>
											<div class="col-lg-6 controller">
												<label class="">
													Date de fin du projet :
												</label>
												<input type="date" name="date2" class="form-control m-input"<?php if(isset($projet['date_livraison'])){ echo "value='".$projet['date_livraison']."'";} ?>>
											</div>
											</div>
											<div class="form-group m-form__group row">
											<div class="col-lg-6 controller">
												<label>
													Cahier de charge :
												</label>
												<input type="file" class="form-control m-input">
											</div>
											<?php if (isset($_GET['id_projet']) && !empty($_GET['id_projet'])): ?>
												

											<div class="col-lg-3 controller">
												<label>Backlog:</label>
												<br>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#backlog">
													BackLog
												</button>
												
											<div class="modal fade" id="backlog" tabindex="-1" role="dialog" aria-labelledby="labelBacklog" aria-hidden="true" style="display: none;">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="labelBacklog">
																Backlog: 
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">
																	×
																</span>
															</button>
														</div>
														<div class="modal-body">
															<div id="divButton" class="pull-right">
 															<button type="button" class="btn btn-primary" id="openformAdd">Ajouter une ligne</button>
																<button class="toggle btn btn-primary" id="openimport" type="button">Importer</button>
															</div>
															</br>
															</br>
														<div class="table-responsive">
															<table id="html_table" width="100%">
															    <thead>
															        <tr class="headtr">
															            <th>ID</th>
															            <th>Fonctionnalité</th>
															            <th>Importance</th>
															            <th>Estimation</th>
															            <th>Demonstration</th>
															            <th>Notes</th>
															        </tr>
															    </thead>
															    <tbody>
															    	<?php 
															    		$backlogs = BackLog::getBackLogByIdProjet($_GET['id_projet']);
															    		foreach ($backlogs as $backlog) {
																			if(!$backlog['id_user']) {
																				$backlog['id_user'] = 0;
																			}

															    			echo "<tr bgcolor='".$backlog['couleur']."' data-user-id=" . $backlog['id_user'] . " data-id='".$backlog['id']."' id='".$backlog['id_backlog']."-".$backlog['id_projet']."'>
																		    		<td>".$backlog['id_backlog']."</td>
																		    		<td>".$backlog['fonctionnalite']."</td>
																		    		<td>".$backlog['importance']."</td>
																		    		<td>".$backlog['estimation']."</td>
																		    		<td>".$backlog['demonstration']."</td>
																					<td>".$backlog['notes']."</td>
																				</tr>";
															    		}
															    	?>
															    </tbody>
															     <tfoot>
															        <tr class="headtr">
															            <td>ID</td>
															            <td>Fonctionnalité</td>
															            <td>Importance</td>
															            <td>Estimation</td>
															            <td>Demonstration</td>
															    		<td>Notes</td>
															        </tr>
															    </tfoot>
															</table>
														</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">
																Annuler
															</button>
															<button type="button" class="btn btn-primary">
																Enregistrer
															</button>
														</div>
													</div>
												</div>
											</div>
											</div>
												<div class="col-lg-3 controller">
													<label>Planing des livrables:</label>
													<br>
													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#planning_livrable">
														Gestion de planing des livrables
													</button>
													<div class="modal fade" id="planning_livrable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">
																		Planing des livrables: 
																	</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">
																			×
																		</span>
																	</button>
																</div>
																<div class="modal-body">
																	<div id="m_calendar"></div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">
																		Annuler
																	</button>
																	<button type="button" class="btn btn-primary">
																		Enregistrer
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal fade" id="formAdd" role="dialog">
												    <div class="modal-dialog">
												        <div class="modal-content">
												            <div class="modal-header">
																		<h5 class="modal-title" id="labelAddligne">
																			Ajouter BackLog : 
																		</h5>
																		<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
																			<span aria-hidden="true">
																				×
																			</span>
																		</button>
																	</div>
												            <div class="modal-body">
												                <form>
												                    <input type="hidden" id="id_projet" name="id_projet" value="<?=$_GET['id_projet']; ?>">
												                    <input type="hidden" name="ajax_action" value="add">
												                    <div class="form-group">
												                        <label for="id_backlog" class="form-control-label">
												                            ID :
												                        </label>
												                        <input type="text" class="form-control" name="id_backlog" id="id_backlog">
												                    </div>
												                    <div class="form-group">
												                        <label for="fonctionnalite" class="form-control-label">
												                            Fonctionnalité :
												                        </label>
												                        <input type="text" class="form-control" name="fonctionnalite" id="fonctionnalite">
												                    </div>
												                    <div class="form-group">
												                        <label for="importance" class="form-control-label">
												                            Importance :
												                        </label>
												                        <input type="text" class="form-control" name="importance" id="importance">
												                    </div>
												                    <div class="form-group">
												                        <label for="estimation" class="form-control-label">
												                            Estimation :
												                        </label>
												                        <input type="text" class="form-control" name="estimation" id="estimation">
												                    </div>
												                    <div class="form-group">
												                        <label for="demonstration" class="form-control-label">
												                            Démonstration :
												                        </label>
												                        <textarea class="form-control" name="demonstration" id="demonstration"></textarea>
												                    </div>
												                    <div class="form-group">
												                        <label for="notes" class="form-control-label">
												                            Notes :
												                        </label>
												                        <textarea class="form-control" id="notes" name="notes"></textarea>
												                    </div>
																	<div class="form-group">
																		<label for="id_user" class="form-control-label">
																			assingé a :
																		</label>
																		<select name="id_user" id="id_user"  class="form-control">
																			<option value=""></option>
																			<?php
																				$users = Team::getTeamByProjet($_GET['id_projet']);
																				foreach($users as $user) : 
																			?>
																				<option value="<?= $user['id_user']; ?>"><?= $user['nom'] . ' ' . $user['prenom'] ;?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
												                    <div class="form-group">
												                        <label for="couler" class="form-control-label">
												                            Couleur :
												                        </label>
												                        <input type="color" class="form-control" name="couleur" id="couleur">
												                    </div>
												                </form>
												            </div>
												            <div class="modal-footer">
												                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
												                <button type="button" class="btn btn-primary"  data-dismiss="modal" id="ajouter">Ajouter</button>
												            </div>
												        </div>
												    </div>
												</div>
												<div class="modal fade" id="DescModal" role="dialog">
												    <div class="modal-dialog">
												        <div class="modal-content">
												            <div class="modal-header">
																		<h5 class="modal-title" id="labelAddligne">
																			Modifier BackLog : 
																		</h5>
																		<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
																			<span aria-hidden="true">
																				×
																			</span>
																		</button>
																	</div>
												            <div class="modal-body">
												                <form>
												                    <input type="hidden" id="id_projet" name="id_projet" value="<?=$_GET['id_projet']; ?>">
												                    <input type="hidden" name="ajax_action" value="update">
												                    <div class="form-group">
												                        <label for="id_backlog_e" class="form-control-label">
												                            ID :
												                        </label>
												                        <input type="text" class="form-control" name="id_backlog_e" id="id_backlog_e">
												                    </div>
												                    <div class="form-group">
												                        <label for="fonctionnalite_e" class="form-control-label">
												                            Fonctionnalité :
												                        </label>
												                        <input type="text" class="form-control" name="fonctionnalite_e" id="fonctionnalite_e">
												                    </div>
												                    <div class="form-group">
												                        <label for="importance_e" class="form-control-label">
												                            Importance :
												                        </label>
												                        <input type="text" class="form-control" name="importance_e" id="importance_e">
												                    </div>
												                    <div class="form-group">
												                        <label for="estimation_e" class="form-control-label">
												                            Estimation :
												                        </label>
												                        <input type="text" class="form-control" name="estimation_e" id="estimation_e">
												                    </div>
												                    <div class="form-group">
												                        <label for="demonstration_e" class="form-control-label">
												                            Démonstration :
												                        </label>
												                        <textarea class="form-control" name="demonstration_e" id="demonstration_e"></textarea>
												                    </div>
												                    <div class="form-group">
												                        <label for="notes_e" class="form-control-label">
												                            Notes :
												                        </label>
												                        <textarea class="form-control" id="notes_e" name="notes_e"></textarea>
												                    </div>
																	<div class="form-group">
																		<label for="id_user_e" class="form-control-label">
																			assingé a :
																		</label>
																		<select name="id_user_e" id="id_user_e"  class="form-control">
																			<option value=""></option>
																			<?php
																				$users = Team::getTeamByProjet($_GET['id_projet']);
																				foreach($users as $user) : 
																			?>
																				<option value="<?= $user['id_user']; ?>"><?= $user['nom'] . ' ' . $user['prenom'] ;?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
												                    <div class="form-group">
												                        <label for="couleur_e" class="form-control-label">
												                            Couleur :
												                        </label>
												                        <input type="color" class="form-control" name="couleur_e" id="couleur_e">
												                    </div>
												                </form>
												            </div>
												            <div class="modal-footer">
												                <button type="button" class="btn btn-danger" id="deleteBacklog" data-dismiss="modal">Supprimer</button>
												                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
												                <button type="button" class="btn btn-primary" id="editBacklog" data-dismiss="modal">Modifier</button>
												            </div>
												        </div>
												    </div>
												</div>
												<div class="modal fade" id="ImportBackLog" role="dialog">
												    <div class="modal-dialog">
												        <div class="modal-content">
												            <div class="modal-header">
																		<h5 class="modal-title" id="labelAddligne">
																			Importer BackLog: 
																		</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">
																				×
																			</span>
																		</button>
																	</div>
												            <form method="post" action="../router.php" enctype="multipart/form-data">
												            <div class="modal-body">
												                    <input type="hidden" name="action" value="documentation">
												                    <input type="hidden" name="traitement" value="import">
												                    <input type="hidden" id="id_projet" name="id_projet" value="<?=$_GET['id_projet']; ?>">
												                    <div class="form-group">
												                        <label for="id_backlog_e" class="form-control-label">
												                            BackLog (<a href="<?=_SITE_URL_; ?>pages/exemples/backlog_exemple.xlsx">Exemple</a>):
												                        </label>
												                        <input type="file" class="form-control" name="csvbacklog" id="csvbacklog">
												                    </div>
												            </div>
												            <div class="modal-footer">
												                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
												                <button type="submit" class="btn btn-primary">Importer</button>
												            </div>
												            </form>
												        </div>
												    </div>
												</div>
										<?php endif; ?>
											</div>
									<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
										<div class="m-form__actions m-form__actions--solid">
											<div class="row">
												<div class="col-lg-12 m--align-right">
													<button type="submit" id="submit_societe" class="btn btn-primary">
														Enregistrer
													</button>
													<button type="reset" class="btn btn-secondary">
														Annuler
													</button>
												</div>
											</div>
										</div>
									</div>
										</div>
									
								</form>
								</div>
								<!--end::Form-->
							</div>
							</div>

							<?php if (isset($_GET['id_projet']) && !empty($_GET['id_projet'])): ?>

							<?php require('statistiqueProjet.php') ?>
							<?php require('team.php') ?>

							<div class="m-portlet">
								<div class="m-portlet__head">
									<div class="row">
										<div class="col-md-6">
											<div class="m-portlet__head-caption" style="padding-top: 25px;">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Documentation
													</h3>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="pull-right" style="padding-top: 18px;">
												<button type="button" class="btn btn-primary" id="importdocs" data-dismiss="modal">Importer</button>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="importdocsmodal" role="dialog">
							    <div class="modal-dialog">
							        <div class="modal-content">
							            <div class="modal-header">
													<h5 class="modal-title" id="labelAddligne">
														Importer Document: 
													</h5>
													<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
														<span aria-hidden="true">
															×
														</span>
													</button>
												</div>
										<form action="../router.php" method="post" enctype="multipart/form-data" class="m-form">
							            <div class="modal-body">
							                    <input type="hidden" name="id_projet" value="<?=$_GET['id_projet']; ?>">
							                    <input type="hidden" name="action" value="documentation">
							                    <input type="hidden" name="traitement" value="add">
							                    <div class="form-group">
							                        <label for="id_backlog_e" class="form-control-label">
							                            Nom de fichier :
							                        </label>
							                        <input type="text" class="form-control" name="nom_docs" id="nom_docs">
							                    </div>
							                    <div class="form-group">
							                        <label for="id_backlog_e" class="form-control-label">
							                            Document :
							                        </label>
							                        <input type="file" class="form-control" name="docs" id="docs">
							                        <span class="m-form__help">
							                        * Extensions autorisées: PDF, DOCX, DOC, PNG, JPG, XLS, XLSX
							                    	</span>
							                    </div>
							            </div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
							                <button type="submit" class="btn btn-primary">Importer</button>
							            </div>
							            </form>
							        </div>
							    </div>
								</div>
								<div class="m-portlet__body">
									<table class="table m-table m-table--head-bg-brand">
									<thead>
										<tr>
											<th>#</th>
											<th>Fichier</th>
											<th>Ajouté par</th>
											<th>Type</th>
											<th>Date Ajout</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$docs = Documentation::getDocumentByProject($_GET['id_projet']);
											foreach ($docs as $doc) {
												echo '<tr>
														<th scope="row">'.$i.'</th>
														<td>'.$doc['filename'].'</td>
														<td>'.$doc['nom']." ".$doc['prenom'].'</td>
														<td>'.strtoupper(substr($doc['lien'],strrpos($doc['lien'],'.')+1)).'</td>
														<td>'.date('d-m-Y', strtotime($doc['date_add'])).'</td>
														<td><a href="../router.php?action=documentation&traitement=download&id='.$doc['id_docs'].'" class="btn btn-primary">Télécharger</a> <a href="../router.php?action=documentation&traitement=delete&id='.$doc['id_docs'].'" class="btn btn-danger">Supprimer</a></td>
													</tr>';
													$i++;
											}
										 ?>
									</tbody>
								</table>
								</div>
							</div>
							<div class="modal fade" id="ajouterEvent" role="dialog">
							    <div class="modal-dialog">
							        <div class="modal-content">
							            <div class="modal-header">
													<h5 class="modal-title" id="labelAddligne">
														Ajouter un événement: 
													</h5>
													<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
														<span aria-hidden="true">
															×
														</span>
													</button>
												</div>
										<form class="m-form">
							            <div class="modal-body">
							                    <input type="hidden" name="id_projet" value="<?=$_GET['id_projet']; ?>">
							                    <input type="hidden" name="traitement" value="add">
							                    <div class="form-group">
							                        <label for="titre" class="form-control-label">
							                            Titre :
							                        </label>
							                        <input type="text" class="form-control" name="titre">
							                    </div>
							                    <div class="form-group">
							                        <label for="datedebut" class="form-control-label">
							                            Date Début :
							                        </label>
							                        <input type="text" class="form-control" id="m_datetimepicker_1" readonly name="datedebut">
							                    </div>
							                    <div class="form-group">
							                        <label for="datefin" class="form-control-label">
							                            Date Livraison :
							                        </label>
							                        <input type="text" class="form-control" name="datefin" id="m_datetimepicker_2" readonly >
							                    </div>
												
							                    <div class="form-group">
							                        <label for="id_backlog_" class="form-control-label">
							                            Backlog :
							                        </label>
							                        <select name="id_backlog_ad" id="id_backlog_ad"  class="form-control">
							                        	<?php 
												    		$backlogs = BackLog::getBackLogByIdProjet($_GET['id_projet']);
												    		foreach ($backlogs as $backlog) {

												    			echo "<option value='".$backlog['id']."'>".$backlog['id_backlog'].' '.$backlog['fonctionnalite']."</option>";
												    		}
												    	?>
							                        </select>
							                    </div>
							                    <div class="form-group">
							                        <label for="montant" class="form-control-label">
							                            Montant :
							                        </label>
							                        <input type="text" class="form-control" name="montant" id="montant" >
							                    </div>
							                    <div class="form-group">
							                        <label>
														Etat de paiement :
													</label>
													<select class="form-control m-select" name="etat">
														<?php 
																$paiements = Paiment::getpaiementlist();
																foreach ($paiements as $paiement) {
																echo "<option value='".$paiement['id_paiment']."'>".$paiement['libelle_paiment']."</option>";
																}
															?>
													</select>
							                    </div>
							                    <div class="form-group">
							                        <label for="realiser" class="form-control-label">
							                            % réalisé :
							                        </label>
							                        <select class="form-control" name="realiser" id="realiser">
							                        	<?php 
							                        		for ($i=0; $i <= 100; $i=$i+10) { 
							                        			echo "<option value='".$i."'>".$i." %</option>";
							                        		}
							                        	 ?>
							                        </select>
							                    </div>
							                    <div class="form-group">
							                        <label class="form-control-label">
							                            Déscription :
							                        </label>
							                        <textarea name="description"  class="form-control"></textarea>
							                    </div>
							            </div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
							                <button type="button" class="btn btn-primary" id="saveEvent"  data-dismiss="modal">Ajouter</button>
							            </div>
							            </form>
							        </div>
							    </div>
							</div>
							<div class="modal fade" id="editEvent" role="dialog">
							    <div class="modal-dialog">
							        <div class="modal-content">
							            <div class="modal-header">
													<h5 class="modal-title" id="labelAddligne">
														Modifier un événement: 
													</h5>
													<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
														<span aria-hidden="true">
															×
														</span>
													</button>
												</div>
										<form class="m-form">
							            <div class="modal-body">
							                    <input type="hidden" name="id_projet" value="<?=$_GET['id_projet']; ?>">
							                    <input type="hidden" name="traitement" value="edit">
							                    <input type="hidden" name="id" id="idid">
							                    <div class="form-group">
							                        <label for="titre_e" class="form-control-label">
							                            Titre :
							                        </label>
							                        <input type="text" class="form-control" name="titre" id="titre_e">
							                    </div>
							                    <div class="form-group">
							                        <label for="id_backlog_e" class="form-control-label">
							                            Date Début :
							                        </label>
							                        <input type="text" class="form-control datedebut_e" id="m_datetimepicker_1_edit" readonly name="datedebut">
							                    </div>
							                    <div class="form-group">
							                        <label for="id_backlog_e" class="form-control-label">
							                            Date Livraison :
							                        </label>
							                        <input type="text" class="form-control datefin_e" name="datefin" id="m_datetimepicker_2_edit" readonly >
							                    </div>
							                     <div class="form-group">
							                        <label for="id_backlog_ed" class="form-control-label">
							                            Backlog :
							                        </label>
							                        <select name="id_backlog_ed" id="id_backlog_ed"  class="form-control">

							                        	<?php 
												    		$backlogs = BackLog::getBackLogByIdProjet($_GET['id_projet']);
												    		foreach ($backlogs as $backlog) {

												    			echo "<option value='".$backlog['id']."'>".$backlog['id_backlog'].' '.$backlog['fonctionnalite']."</option>";
												    		}
												    	?>
							                        </select>
							                    </div>
							                     <div class="form-group">
							                        <label for="montant_e" class="form-control-label">
							                            Montant :
							                        </label>
							                        <input type="text" class="form-control" name="montant_e" id="montant_e" >
							                    </div>
							                    <div class="form-group">
							                        <label>
														Etat de paiement :
													</label>
													<select class="form-control m-select" name="etat">
														<?php 
																$paiements = Paiment::getpaiementlist();
																foreach ($paiements as $paiement) {
																echo "<option value='".$paiement['id_paiment']."'>".$paiement['libelle_paiment']."</option>";
																}
															?>
													</select>
							                    </div>
							                    <div class="form-group">
							                        <label for="realiser" class="form-control-label">
							                            % réalisé :
							                        </label>
							                        <select class="form-control" name="realisere" id="realisere">
							                        	<?php
							                        		for ($i=0; $i <= 100; $i=$i+10) { 
							                        			echo "<option value='".$i."'>".$i." %</option>";
							                        		}
							                        	 ?>
							                        </select>
							                    </div>
							                    <div class="form-group">
							                        <label for="id_backlog_e" class="form-control-label">
							                            Description :
							                        </label>
							                        <textarea name="description"  class="form-control" id="description_event_e"></textarea>
							                    </div>
							            </div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-danger" id="deleteEventbtn" data-id=""  data-dismiss="modal">Supprimer</button>
							                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
							                <button type="button" class="btn btn-primary" id="editEventbtn"  data-dismiss="modal">Modifier</button>
							            </div>
							            </form>
							        </div>
							    </div>
							</div>
							<div class="m-portlet">
								<div class="m-portlet__head">
									<div class="row">
										<div class="col-md-6">
											<div class="m-portlet__head-caption" style="padding-top: 25px;">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Historique des pénalités
													</h3>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="pull-right" style="padding-top: 18px;">
												<button type="button" class="btn btn-primary" id="addpenalitebtn" data-dismiss="modal">Appliquer une pénalité</button>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="addpenalite" role="dialog">
							    <div class="modal-dialog">
							        <div class="modal-content">
							            <div class="modal-header">
											<h5 class="modal-title" id="labelAddligne">
												Appliquer une pénalité : 
											</h5>
											<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
												<span aria-hidden="true">
													×
												</span>
											</button>
										</div>
										<form action="../router.php" method="post" enctype="multipart/form-data" class="m-form">
								            <div class="modal-body">
								                    <input type="hidden" name="id_projet" value="<?=$_GET['id_projet']; ?>">
								                    <input type="hidden" name="action" value="penalite">
								                    <input type="hidden" name="traitement" value="add">
								                    <div class="form-group">
								                        <label for="id_backlog_e" class="form-control-label">
								                            Valeur de la pénalité :
								                        </label>
								                        <input type="text" class="form-control" name="valeur">
								                    </div>
								                    <div class="form-group">
								                        <label for="id_backlog_e" class="form-control-label">
								                            Description :
								                        </label>
								                        <textarea class="form-control m-input" name="description"></textarea>
								                    </div>
								            </div>
								            <div class="modal-footer">
								                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
								                <button type="submit" class="btn btn-primary">Appliquer</button>
								            </div>
							            </form>
							        </div>
							    </div>
								</div>
								<div class="m-portlet__body">
									<table class="table m-table m-table--head-bg-brand">
									<thead>
										<tr>
											<th>#</th>
											<th>Ajouté par</th>
											<th>Valeur de la pénalité</th>
											<th>Description</th>
											<th>Date Ajout</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$pens = Penalite::getByProject($_GET['id_projet']);
											//Tools::d($pens);
											foreach ($pens as $pen) {
												echo "<tr>
														<th scope='row'>".$i."</th>
														<td>".$pen['nom'].' '.$pen['prenom']."</td>
														<td>-".$pen['valeur']."</td>
														<td>".$pen['description']."</td>
														<td>".date('d-m-Y', strtotime($pen['date_add'])).'</td>
													</tr>';
													$i++;
											}
										 ?>
									</tbody>
								</table>
								</div>
							</div>
							<?php endif; ?>

						
						</div>
						<!--End::Section-->
					</div>
				</div>
			<!-- end:: Body -->
			<?php require("../footer.php"); ?>
		</div>
		<!-- end:: Page -->    
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->	
    	<!--begin::Base Scripts -->
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<script src="<?=_SITE_URL_; ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>

		<script src="<?=_SITE_URL_; ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

		<script type="text/javascript" src="<?=_SITE_URL_; ?>assets/vendors/custom/datatables/datatables.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.0/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
		<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
		<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="<?=_SITE_URL_; ?>assets/snippets/pages/user/addprojet.js"></script>

		<!-- calendar -->
		<script src="<?=_SITE_URL_; ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<script type="text/javascript">
			var CalendarBasic = function() {

return {
//main function to initiate the module
init: function() {
$('#planning_livrable').on('show.bs.modal', function () {
        setTimeout(function() {
            $('#m_calendar').fullCalendar({
                lang: 'fr',
                customButtons: {
			        addEvent: {
			            text: 'Ajouter',
			            click: function() {
			                $('#ajouterEvent').modal("show");
			            }
			        }
			    },
                header: {
                    left: 'prev,next today addEvent',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                closeText: "Fermer",
                  prevText: "Précédent",
                  nextText: "Suivant",
                  currentText: "Aujourd'hui",
                  monthNames: [ "janvier", "février", "mars", "avril", "mai", "juin",
                    "juillet", "août", "septembre", "octobre", "novembre", "décembre" ],
                  monthNamesShort: [ "janv.", "févr.", "mars", "avr.", "mai", "juin",
                    "juil.", "août", "sept.", "oct.", "nov.", "déc." ],
                  dayNames: [ "dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi" ],
                  dayNamesShort: [ "dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam." ],
                  dayNamesMin: [ "D","L","M","M","J","V","S" ],
                  weekHeader: "Sem.",
                  dateFormat: "dd/mm/yy",
                  firstDay: 1,
                  isRTL: false,
                  showMonthAfterYear: false,
                  yearSuffix: "" ,
                  buttonText: {
                    today:"Aujourd'hui",
                    year: "Année",
                    month: "Mois",
                    week: "Semaine",
                    day: "Jour",
                    list: "Mon planning"
                  },
                  allDayHtml: "Toute la<br/>journée",
                  eventLimitText: "en plus",
                  noEventsMessage: "Aucun événement à afficher",
                  events: <?php if (isset($_GET['id_projet'])) { echo "'../classes/ajax/event_json.php?id_projet=".$_GET['id_projet']."'"; } else{ echo '../classes/ajax/event_json.php'; } ?>,

                eventRender: function(event, element) {
                    if (element.hasClass('fc-day-grid-event')) {
                        element.data('content', event.description);
                        element.data('placement', 'top');
                        mApp.initPopover(element); 
                    } else if (element.hasClass('fc-time-grid-event')) {
                        element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>'); 
                    } else if (element.find('.fc-list-item-title').lenght !== 0) {
                        element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>'); 
                    }
                },
                eventClick:  function(event, jsEvent, view) {
			        //set the values and open the modal
			        $("#titre_e").val(event.title);
			        $("#idid").val(event.id);
			        $("#deleteEventbtn").attr('data-id', event.id);

			        $("#m_datetimepicker_1_edit").val(moment(event.start).format("YYYY-MM-DD HH:mm:ss"));
			        $("#m_datetimepicker_2_edit").val(moment(event.end).format("YYYY-MM-DD HH:mm:ss"));
			        $("#realisere option[value="+event.prograssion+"]").attr('selected','selected');
			        $("#description_event_e").html(event.description);
			        $("#montant_e").val(event.montant);
			        $("#description_event_e").html(event.description);
			        $('#editEvent').modal("show");
			    },
			    eventDrop: function(event, delta, revertFunc) {
			    	var content = {};
			    	$.ajax({
			         url: '../classes/ajax/addevent.php',
		            type: 'post',
		            data : 'id='+event.id+'&start='+event.start.format()+'&end='+event.end.format()+'&traitement=updatedrop',
		             success: function(response, status, xhr, $form) {
				            if (response == 'edited') {
				                $('#m_calendar').fullCalendar( 'refetchEvents' );
				                setTimeout(function() {
		                            var notify = $.notify(content, { 
		                                type: 'success',
		                                allow_dismiss: true,
		                                newest_on_top: true,
		                                mouse_over:  true,
		                                showProgressbar:  false,
		                                spacing: 10,                    
		                                timer: 2000,
		                                placement: {
		                                    from: 'top', 
		                                    align: 'right'
		                                },
		                                offset: {
		                                    x: 30, 
		                                    y: 30
		                                },
		                                delay: 2000,
		                                z_index: 10000,
		                                animate: {
		                                    enter: 'animated bounce',
		                                    exit: 'animated bounce'
		                                }
		                            });
		                            notify.update('message', '<strong>Event Modifie</strong>');
		                            notify.update('type', 'success');
		                            notify.update('progress', 100);
		                        }, 800);
				            }
				        }
			      });

			    }
            });
        }, 200);
	});
	}
	};
	}();

	jQuery(document).ready(function() {
	    CalendarBasic.init();
	});
	</script>
	<script src="<?=_SITE_URL_; ?>assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>

		<?php 
		if (isset($_GET['modal'])) {
			if ($_GET['modal'] == "backlog") {
				echo "<script type='text/javascript'>$(document).ready(function() { $('#backlog').modal('show'); });</script>";
			} elseif ($_GET['modal'] == "livrable") {
				echo "<script type='text/javascript'>$(document).ready(function() { $('#planning_livrable').modal('show'); });</script>";
			}
		}

		 ?>

	</body>
	<!-- end::Body -->
</html>
