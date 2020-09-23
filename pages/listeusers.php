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
											Liste des utilisateurs
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
															<a href="adduser.php" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
																<span>
																	<i class="la la-plus-circle"></i>
																	<span>
																		Ajouter un utilisateur
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
															<th title="Field #1">
																ID
															</th>
															<th title="Field #2">
																Nom
															</th>
															<th title="Field #3">
																Prènom
															</th>
															<th title="Field #4">
																E-mail
															</th>
															<th title="Field #5">
																Téléphone
															</th>
															<th title="Field #6">
																Rôle
															</th>
															<th title="Field #7">
																Service
															</th>
															<th title="Field #7">
																Date d'ajout
															</th>
															<th title="Field #8">
															</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															$resultats = User::getUsersListe();
															foreach ($resultats as $resultat) {
													    		echo "<tr>
													    			<td>".$resultat['id_user']."</td>
													    			<td>".$resultat['nom']."</td>
													    			<td>".$resultat['prenom']."</td>
													    			<td>".$resultat['email']."</td>
													    			<td>".$resultat['phone']."</td>
													    			<td>".$resultat['libelle_rolle']."</td>
													    			<td>".$resultat['service']."</td>
													    			<td>".$resultat['date_add']."</td>
													    			<td>
													    				<div class='row'>
														    				<div class='col-md-6'>
														    					<a class='reset_link' href='/pages/adduser.php?id_user=".$resultat['id_user']."'><i class='flaticon-edit-1'></i></a>
														    				</div>
														    				<div class='col-md-6'>
														    					<a class='reset_link' href='../router.php?action=user&traitement=delete&id=".$resultat['id_user']."'><i class='flaticon-circle'></i></a>
														    				</div>
													    				</div>
													    				
													    				
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
		        <!--begin::Page Snippets -->
				<script src="<?=_SITE_URL_; ?>assets/app/js/dashboard.js" type="text/javascript"></script>
				<!--end::Page Snippets -->
			</body>
			<!-- end::Body -->
		</html>
