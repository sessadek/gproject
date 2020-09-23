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
										Gestion des types de projets	
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
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="../router.php" method="post">
										<input type="hidden" name="action" value="type">
										<?php if (isset($_GET['id_type'])) {
											$secteur = Type::getByID($_GET['id_type']);
											?>
												<input type="hidden" name="traitement" value="edit">
												<input type="hidden" name="id_type" value="<?=$_GET['id_type']; ?>">
											<?php
											}else{
											?>
												<input type="hidden" name="traitement" value="add">
											<?php
											} 
										?>
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-12">
													<h2>Ajouter un type de projet :</h2>
												</div>
												<div class="col-lg-6 controller">
													<label>
														Type de projet :
													</label>
													<input type="text" name="libelle_type" class="form-control m-input" placeholder="Type de projet..." <?php if (isset($_GET['id_type'])) {
														echo 'value="'.$secteur['libelle_type'].'"';
													} ?>>

												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-12 m--align-right">
														<button type="submit" class="btn btn-primary">
															Enregistrer
														</button>
														<button type="reset" class="btn btn-secondary">
															Annuler
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
								</div>
							</div>
							<!--End::Section-->

							<div class="row">
								<div class="col-lg-12">
									<div class="m-portlet">
									<!--begin::Form-->
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-12">
													<h2>Liste des types de projet :</h2>

												<table class="m-datatable" id="html_table" width="100%">
													<thead>
														<tr>
															<th title="Field #1">
																ID
															</th>
															
															<th title="Field #7">
																Types de projet
															</th>
															<th title="Field #8">
															</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															$resultats = Type::getTypeList();
															foreach ($resultats as $resultat) {
													    		echo "<tr>
													    			<td>".$resultat['id_type']."</td>
													    			<td>".$resultat['libelle_type']."</td>
													    			
													    			<td>
													    				<div class='row'>
														    				<div class='col-md-6'>
														    					<a class='reset_link' href='/pages/addtype.php?id_type=".$resultat['id_type']."'><i class='flaticon-edit-1'></i></a>
														    				</div>
														    				<div class='col-md-6'>
														    					<a class='reset_link' href='../router.php?action=type&traitement=delete&id=".$resultat['id_type']."'><i class='flaticon-circle'></i></a>
														    				</div>
													    				</div>
													    				
													    				
													    			</td>
													    		</tr>";
													    	}
														?>
													</tbody>
												</table>




												
											</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												

											</div>
										</div>
									<!--end::Form-->
								</div>
								</div>
							</div>



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
			<script src="<?=_SITE_URL_; ?>assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
			<!--end::Base Scripts -->   
	        <!--begin::Page Vendors -->
			<!--end::Page Vendors -->  
	        <!--begin::Page Snippets -->
			<!--end::Page Snippets -->
		</body>
		<!-- end::Body -->
	</html>
