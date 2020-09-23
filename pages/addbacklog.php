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
												<table class="m-datatable" id="html_table" width="100%">
													<thead>
														<tr>
															<th title="ID">
																ID
															</th>
															<th title="Nom du projet">
																Nom du projet
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
															foreach ($resultats as $resultat) {
													    		echo "<tr>
													    			<td>".$resultat['id_projet']."</td>
													    			<td>".$resultat['nom_projet']."</td>
													    			<td>".$resultat['date_debut']."</td>
													    			<td>".$resultat['date_livraison']."</td>
													    			<td>
													    				<a href='/pages/addprojet.php?id_projet=".$resultat['id_projet']."&modal=backlog' class='btn btn-warning'>Backlog</a>
													    			</td>
													    																    			
													    		</tr>";
													    	}
														?>
													</tbody>
												</table>
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
				
			</body>
			<!-- end::Body -->
		</html>