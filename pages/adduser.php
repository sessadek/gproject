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
										Ajouter un utilisateur	
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
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="../router.php" method="post" id="user_form">
										<input type="hidden" name="action" value="user">
										<?php if (isset($_GET['id_user'])) {
											$user = User::get($_GET['id_user']);
											//Tools::d($user);
											?>
												<input type="hidden" name="traitement" value="edit">
												<input type="hidden" name="id_user" value="<?=$_GET['id_user']; ?>">
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
													<h2>Informations Personnelles :</h2>
												</div>
												<div class="col-lg-6 controller">
													<label>
														Nom:
													</label>
													<input type="text" name="nom" class="form-control m-input" placeholder="Nom..." <?php if(isset($user['nom'])){ echo "value='".$user['nom']."'";} ?>>

												</div>
												<div class="col-lg-6 controller">
													<label class="">
														Prènom:
													</label>
													<input type="text" name="prenom"  class="form-control m-input" placeholder="Prènom..." <?php if(isset($user['prenom'])){ echo "value='".$user['prenom']."'";} ?>>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6 controller">
													<label>
														E-mail:
													</label>
													<input type="email" name="email"  class="form-control m-input" placeholder="Email..." <?php if(isset($user['email'])){ echo "value='".$user['email']."'";} ?>>
												</div>
												<div class="col-lg-6 controller">
													<label class="">
														Téléphone:
													</label>
													<input type="text" name="phone" class="form-control m-input" placeholder="Téléphone..." <?php if(isset($user['phone'])){ echo "value='".$user['phone']."'";} ?>>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6 controller">
													<label>
														Mot de passe:
													</label>
													<input type="password" name="password" id="password" class="form-control m-input" placeholder="Mot de passe...">
												</div>
												<div class="col-lg-6 controller">
													<label class="">
														Confirmation mot de passe:
													</label>
													<input type="password" name="passwordconf" class="form-control m-input" placeholder="Confirmation..">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<!-- <div class="col-lg-6 controller">
													<label>
														Service:
													</label>
													<input type="text" name="service" class="form-control m-input" placeholder="Service..." <?php if(isset($user['service'])){ echo "value='".$user['service']."'";} ?>>
												</div> -->
												<div class="col-lg-6 controller">
													<label class="">
														Rôle:
													</label>
													<select class="form-control m-select" name="role">
														<?php 
															$roles = Role::getRoleList();
															foreach ($roles as $role) {
																$selected = "";
																if (isset($user['id_role'])) {
																	if ($user['id_role'] == $role['id_role']) {
																		$selected = "selected";
																	}
																}

																echo "<option value='".$role['id_role']."' $selected>".$role['libelle_rolle']."</option>";
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-12 m--align-right">
														
														<button type="reset" class="btn btn-secondary">
															Annuler
														</button>
														<button type="button" id="submit_user" class="btn btn-primary">
															Enregistrer
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
			<!--end::Base Scripts -->   
	        <!--begin::Page Vendors -->
			<script src="<?=_SITE_URL_; ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
			<!--end::Page Vendors -->  
	        <!--begin::Page Snippets -->
			<script src="<?=_SITE_URL_; ?>assets/snippets/pages/user/adduser.js" type="text/javascript"></script>
			<!--end::Page Snippets -->
		</body>
		<!-- end::Body -->
	</html>
