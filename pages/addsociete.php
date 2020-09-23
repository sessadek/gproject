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
										Ajouter une société	
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
										<input type="hidden" name="action" value="societe">
										<?php if (isset($_GET['id_societe'])) {
											$societe = Societe::get($_GET['id_societe']);
											//Tools::d($societe);
											?>
												<input type="hidden" name="traitement" value="edit">
												<input type="hidden" name="id_societe" value="<?=$_GET['id_societe']; ?>">
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
													<h2>Information Société :</h2>
												</div>
												<div class="col-lg-6 controller">
													<label>
														Raison Social:
													</label>
													<input type="text" name="raison_social" class="form-control m-input" placeholder="Raison Social..." <?php if(isset($societe['raison_social'])){ echo "value='".$societe['raison_social']."'";} ?>>

												</div>
												<div class="col-lg-6 controller">
													<label class="">
														Secteur:
													</label>
													<select class="form-control m-select" name="secteur">
														<?php 
															$secteurs = Secteur::getSecteurList();
															foreach ($secteurs as $secteur) {
																$selected = "";
																if (isset($societe['id_secteur'])) {
																	if ($societe['id_secteur'] == $secteur['id_secteur']) {
																		$selected = "selected";
																	}
																}

																echo "<option value='".$secteur['id_secteur']."' $selected>".$secteur['libelle_secteur']."</option>";
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6 controller">
													<label class="">
														Adresse:
													</label>
													<textarea class="form-control m-input m-input--air" name="adresse" rows="3"><?php if(isset($societe['adresse'])){ echo $societe['adresse'];} ?></textarea>
												</div>
												<div class="col-lg-6 controller">
													<label>
														Note:
													</label>
													<div id="stars"></div>
													<input type="hidden" id="note" name="note" value="0">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6 controller">
													<label>
														Téléphone:
													</label>
													<input type="text" name="phone" class="form-control m-input" placeholder="Téléphone..." <?php if(isset($societe['tele'])){ echo "value='".$societe['tele']."'";} ?>>
												</div>
												<div class="col-lg-6 controller">
													<label class="">
														Email:
													</label>
													<input type="email" name="email" class="form-control m-input" placeholder="Email.." <?php if(isset($societe['email'])){ echo "value='".$societe['email']."'";} ?>>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-12">
													<h2>Contact principale :</h2>
												</div>
												<div class="col-lg-6 controller">
													<label>
														Nom:
													</label>
													<input type="text" name="contact_principale_nom" class="form-control m-input" placeholder="Nom..." <?php if(isset($societe['contact_principale_nom'])){ echo "value='".$societe['contact_principale_nom']."'";} ?>>
												</div>
												<div class="col-lg-6 controller">
													<label class="">
														Téléphone:
													</label>
													<input type="text" name="contact_principale_tele" class="form-control m-input" placeholder="Téléphone..." <?php if(isset($societe['contact_principale_tele'])){ echo "value='".$societe['contact_principale_tele']."'";} ?>>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6 controller">
													<label>
														Logo :
													</label>
													<input type="file" class="form-control m-input" name="logo">
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-12 m--align-right">
														<button type="button" id="submit_societe" class="btn btn-primary">
															Ajouter
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
			<link rel="stylesheet" href="<?=_SITE_URL_; ?>assets/vendors/custom/rating/rating.css">
			<script src="<?=_SITE_URL_; ?>assets/snippets/pages/user/rating.js"></script>
			<script type="text/javascript">
				$(function () {
 
				  $("#stars").rateYo({
				  	<?php if (isset($societe)){ echo "rating :".$societe['note'].","; } ?>
				  	onSet: function (rating, rateYoInstance) {
				      $("#note").val(rating);
				    }
				  });
				 
				});
			</script>


			<!--end::Base Scripts -->   
	        <!--begin::Page Vendors -->
			<script src="<?=_SITE_URL_; ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
			<!--end::Page Vendors -->  
	        <!--begin::Page Snippets -->
			<script src="<?=_SITE_URL_; ?>assets/snippets/pages/user/addsociete.js" type="text/javascript"></script>
			<!--end::Page Snippets -->
		</body>
		<!-- end::Body -->
	</html>
