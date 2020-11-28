		<?php require("../header.php"); ?>		
				<!-- begin::Body -->
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
						<?php require("../sidebar.php"); ?>
						<div class="m-grid__item m-grid__item--fluid m-wrapper">
							<!-- BEGIN: Subheader -->
							<div class="m-subheader ">
								<?php if (isset($_GET['confirm']) && !empty($_GET['confirm'])) { ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
										<strong>
											<?php echo $_GET['confirm']; ?>
										</strong>
									</div>
								<?php } ?>
								<?php if (isset($_GET['error']) && !empty($_GET['error'])) { ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
										<strong>
											<?php echo $_GET['error']; ?>
										</strong>
									</div>
								<?php } ?>
								<div class="d-flex align-items-center">
									<div class="mr-auto">
										<h3 class="m-subheader__title ">
											Liste des Projets
										</h3>
									</div>
								</div>
							</div>
							<!-- END: Subheader -->
							<div class="m-content">
								<!--Begin::Section-->
								<div class="row">
									<div class="col-lg-12">
										<div class="m-portlet m-portlet--mobile">
											<div class="m-portlet__body">
												<!--begin: Search Form -->
												<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
													<div class="row align-items-center">
														<div class="col-xl-8 order-2 order-xl-1">
															<div class="form-group m-form__group row align-items-center">
																<div class="col-md-4">
																	<div class="m-input-icon m-input-icon--left">
																		<input type="text" class="form-control m-input m-input--solid" placeholder="Recherche..." id="generalSearch">
																		<span class="m-input-icon__icon m-input-icon__icon--left">
																			<span>
																				<i class="la la-search"></i>
																			</span>
																		</span>
																	</div>
																</div>

																<div class="col-md-4">
																	<div class="m-input-icon--left">

																		<?php 
																			$etats = Etat::getetatlist();
																		?>

																		<select class="form-control m-input m-input--solid" name="" id="search_by_etat">
																			<?php foreach($etats as $etat) : ?>
																				<option value="<?= $etat['id_etat']?>"><?= $etat['libelle_etat']?></option>
																			<?php endforeach ?>
																		</select>
																	</div>
																</div>


															</div>
														</div>
														<div class="col-xl-4 order-1 order-xl-2 m--align-right">
															<a href="addprojet.php" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
																<span>
																	<i class="la la-plus-circle"></i>
																	<span>
																		Ajouter un projet
																	</span>
																</span>
															</a>
															<div class="m-separator m-separator--dashed d-xl-none"></div>
														</div>
													</div>
												</div>
												<!--end: Search Form -->
												<!--begin: Datatable -->
												<div id="datatable-container">
												<table class="m-datatable" id="html_table" width="100%">
													<thead>
														<tr>
															<th title="ID">
																ID
															</th>
															<th title="Nom du projet">
																Nom du projet
															</th>
															<th title="Société">
																Société
															</th>
															<th title="Responsable">
																Responsable
															</th>
															<th title="Adjoint">
																Adjoint
															</th>
															<th title="Etat de paiement">
																Etat de paiement
															</th>
															<th title="Etat de projet">
																Etat de projet
															</th>
															<th title="Date du début du projet">
																Date du début du projet
															</th>
															<th title="Date de fin du projet">
																Date de fin du projet
															</th>
															<th>
															</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$espace=" " ;
															$resultats = Projet::getprojetListe();
															//Tools::d($resultats);
															// <td>".$resultat['libelle_type']."</td>
															foreach ($resultats as $resultat) {
													    		echo "<tr>
													    			<td>".$resultat['id_projet']."</td>
													    			<td>".$resultat['nom_projet']."</td>
													    			<td>".$resultat['raison_social']."</td>
													    			<td>".$resultat['nom']."".$espace."".$resultat['prenom']."</td>
													    			<td>".$resultat['nom1']."".$espace."".$resultat['prenom1']."</td>
																	<td>".$resultat['libelle_paiment']."</td>
																	<td>".$resultat['libelle_etat']."</td>
													    			<td>".$resultat['date_debut']."</td>
													    			<td>".$resultat['date_livraison']."</td>
													    				<td>
													    				<div class='row'>
														    				<div class='col-md-6'>
														    					<a class='reset_link' href='/pages/addprojet.php?id_projet=".$resultat['id_projet']."'><i class='flaticon-edit-1'></i></a>
														    				</div>
														    				<div class='col-md-6'>
														    					<a class='reset_link' href='../router.php?action=projet&traitement=delete&id=".$resultat['id_projet']."'><i class='flaticon-circle'></i></a>
														    				</div>
													    				</div>
													    				
													    				
													    			</td>
													    																    			
													    		</tr>";
													    	}
														?>
													</tbody>
												</table>
												</div>
												<!--end: Datatable -->
											</div>
										</div>
									</div>
								</div>
								<!--End::Section-->
							</div>
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
				<script src="<?=_SITE_URL_; ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
				<script src="<?=_SITE_URL_; ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
				<!--end::Base Scripts -->   
		        <!--begin::Page Vendors -->
				<script src="<?=_SITE_URL_; ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
				<script src="<?=_SITE_URL_; ?>assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
				<!--end::Page Vendors -->  
				<link rel="stylesheet" href="<?=_SITE_URL_; ?>assets/vendors/custom/rating/rating.css">
				<script src="<?=_SITE_URL_; ?>assets/snippets/pages/user/rating.js"></script>
				<script>
					$(document).ready(function() {

						$('#search_by_etat').on('change', function() {
							var etat_projet = $(this).val();
							var table = `<table class="m-datatable" id="html_table" width="100%">
										<thead>
											<tr>
												<th title="ID">
													ID
												</th>
												<th title="Nom du projet">
													Nom du projet
												</th>
												<th title="Société">
													Société
												</th>
												<th title="Responsable">
													Responsable
												</th>
												<th title="Adjoint">
													Adjoint
												</th>
												<th title="Etat de paiement">
													Etat de paiement
												</th>
												<th title="Etat de projet">
													Etat de projet
												</th>
												<th title="Date du début du projet">
													Date du début du projet
												</th>
												<th title="Date de fin du projet">
													Date de fin du projet
												</th>
												<th>
												</th>
											</tr>
										</thead><tbody>`;
							$.get( "../classes/ajax/projetByEtat_json.php?etat_projet=" + etat_projet, function( data ) {
								var results = JSON.parse(data);
								$.each(results, function( index, item ) {
									table += '<tr><td>' + item.id_projet + '</td>';
									table += '<td>' + item.nom_projet + '</td>';
									table += '<td>' + item.raison_social + '</td>';
									table += '<td>' + item.nom + ' ' + item.prenom + '</td>';
									table += '<td>' + item.nom1 + ' ' + item.prenom1 +'</td>';
									table += '<td>' + item.libelle_etat + '</td>';
									table += '<td>' + item.libelle_paiment + '</td>';
									table += '<td>' + item.date_debut + '</td>';
									table += '<td>' + item.date_livraison + '</td>';
									table += '<td><div class="row">';
									table += '<div class="col-md-6"><a class="reset_link" href="/pages/addprojet.php?id_projet=' + item.id_projet + '"><i class="flaticon-edit-1"></i></a></div>';
									table += '<div class="col-md-6"><a class="reset_link" href="../router.php?action=projet&traitement=delete&id=' + item.id_projet + '"><i class="flaticon-circle"></i></a></div>';
									table += '</div></td></tr>';
								});
								table += '</tbody></table>';
								$('#html_table').remove();
								$('#datatable-container').html(table);

								$(window).ajaxComplete(function() {
									$('.m-datatable').mDatatable({
										data: {
											saveState: {cookie: false},
										},
										search: {
											input: $('#generalSearch'),
										},
										columns: [
											{
											field: 'Deposit Paid',
											type: 'number',
											},
											{
											field: 'Order Date',
											type: 'date',
											format: 'YYYY-MM-DD',
											},
										],
										translate: {
											records: {
												processing: 'Traitement en cours...',
												noRecords: 'Aucun &eacute;l&eacute;ment &agrave; afficher'
											},
											toolbar: {
												pagination: {
													items: {
														default: {
															first: 'Premier',
															prev: 'Pr&eacute;c&eacute;dent',
															next: 'Suivant',
															last: 'Dernier',
															more: 'More pages',
															input: 'Page number',
															select: 'Select page size'
														},
														info: "Affichage de l'&eacute;l&eacute;ment {{start}} &agrave; {{end}} sur {{total}} &eacute;l&eacute;ments"
													}
												}
											}
										}
									});
								});
							});

							
							
						});
					});
				</script>
				
			</body>
			<!-- end::Body -->
		</html>
