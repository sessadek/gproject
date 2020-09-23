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
											Mon Profile
										</h3>
									</div>
								</div>
							</div>
							<!-- END: Subheader -->
							<div class="m-content">
								<!--Begin::Section-->
								<?php $user = User::get($_SESSION['id']); ?>
								<div class="row">
							<div class="col-xl-3 col-lg-4">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body">
										<div class="m-card-profile">
											<div class="m-card-profile__title m--hide">
												Your Profile
											</div>
											<div class="m-card-profile__pic">
												<div class="m-card-profile__pic-wrapper">
													<img src="<?=_SITE_URL_; ?>uploads/avatars/<?php echo rand(1,6); ?>.png" alt="">
												</div>
											</div>
											<div class="m-card-profile__details">
												<span class="m-card-profile__name" style="text-transform: capitalize;">
													<?php echo $user['prenom']." ".$user['nom']; ?>
												</span>
												<a href="" class="m-card-profile__email m-link">
													<?php echo $user['email']; ?>
												</a>
											</div>
										</div>
										<div class="m-portlet__body-separator"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-8">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
														Mettre à jour le profil
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
											<form class="m-form m-form--fit m-form--label-align-right" action="../router.php" method="post">
												<div class="m-portlet__body">
													<div class="form-group m-form__group m--margin-top-10 m--hide">
														<div class="alert m-alert m-alert--default" role="alert">
															The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																1. Détails personnels
															</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Nom
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" name="nom" value="<?=$user['nom']; ?>">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Prénom
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" name="prenom" value="<?=$user['prenom']; ?>">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Role
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="CTO" disabled="disabled">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															E-mail
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="<?php echo $user['email']; ?>" disabled>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Téléphone
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="<?php echo $user['phone']; ?>">
														</div>
													</div>
													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																2. Mot de passe
															</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Ancien mot de passe
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="password">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Nouveau mot de passe
														</label>
														<div class="col-7">
															<input class="form-control m-input motdpass" type="password" id="password">
															<div class="form-control-feedback" id="result"></div>	
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-2"></div>
														<div class="col-7">
															<input type='button' class="btn btn-primary" value ='generate' id="gen">
															<button type="button" class="btn btn-metal id-copy" data-toggle="m-popover" data-trigger="focus" title="" data-html="true" data-content="lm qsdq qs dq " data-original-title="Mot de passe">Copier</button>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Confiration mot de passe
														</label>
														<div class="col-7">
															<input class="form-control m-input motdpass" type="password">
														</div>
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="button" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Enregistrer
																</button>
																&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
																	Annuler
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
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
				<script src="<?=_SITE_URL_; ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
				<script src="<?=_SITE_URL_; ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
				<script type="text/javascript">
					var Password = {
						_pattern : /[a-zA-Z0-9_\-\+\.]/,


						_getRandomByte : function()
						{
						// http://caniuse.com/#feat=getrandomvalues
						if(window.crypto && window.crypto.getRandomValues) 
						{
						  var result = new Uint8Array(1);
						  window.crypto.getRandomValues(result);
						  return result[0];
						}
						else if(window.msCrypto && window.msCrypto.getRandomValues) 
						{
						  var result = new Uint8Array(1);
						  window.msCrypto.getRandomValues(result);
						  return result[0];
						}
						else
						{
						  return Math.floor(Math.random() * 256);
						}
						},

						generate : function(length)
						{
						return Array.apply(null, {'length': length})
						  .map(function()
						  {
						    var result;
						    while(true) 
						    {
						      result = String.fromCharCode(this._getRandomByte());
						      if(this._pattern.test(result))
						      {
						        return result;
						      }
						    }        
						  }, this)
						  .join('');  
						}    

						};
						function Copy() {
							var copyText = document.getElementById("myInput");
							copyText.select();
							document.execCommand("Copy");
							alert("Copied the text: " + copyText.value);
						}
						$(function(){	
							$('#password').keyup(function(){
								$('#result').html(checkStrength($('#password').val()))
							})	
						    
						    function checkStrength(password){
						        //initial strength
								var strength = 0
								
								//if the password length is less than 6, return message.
								if (password.length < 5) { 
									$('#result').parent().removeClass('has-success')
									$('#result').parent().removeClass('has-warning')
									$('#result').parent().addClass('has-danger')
									return 'Mot de passe trop court' 
								}
								
								//length is ok, lets continue.
								
								//if length is 8 characters or more, increase strength value
								if (password.length > 5) strength += 1
								
								//if password contains both lower and uppercase characters, increase strength value
								if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
								
								//if it has numbers and characters, increase strength value
								if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
								
								//if it has one special character, increase strength value
								if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
								
								//if it has two special characters, increase strength value
								if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
								
								//now we have calculated strength value, we can return messages
								
								//if value is less than 2
								if (strength < 2 )
								{
									$('#result').parent().removeClass('has-success')
									$('#result').parent().removeClass('has-danger')
									$('#result').parent().addClass('has-warning')
									return 'Mot de passe faible'			
								}
								else if (strength == 2 )
								{
									$('#result').parent().removeClass('has-warning')
									$('#result').parent().removeClass('has-danger')
									$('#result').parent().addClass('has-success')
									return 'Good'		
								}
								else
								{
									$('#result').parent().removeClass('has-warning')
									$('#result').parent().removeClass('has-danger')
									$('#result').parent().addClass('has-success')
									return 'Strong'
								}
							}
						});
				</script>
				<!-- end::Scroll Top -->	
		    	<!--begin::Base Scripts -->
				<!--end::Base Scripts -->
				<script type="text/javascript">
					//$('.id-copy').prop('disabled', true);
					var password = Password.generate(10);
					$("#gen").on('click', function(){
						$('.motdpass').attr('type', 'text');
						$('.motdpass').val(password);
						//$('.id-copy').prop('disabled', false);
						$('.id-copy').removeClass('btn-metal');
						$('.id-copy').addClass('btn-info');

					});
					
					$(".id-copy").on('click', function(e){
						e.preventDefault();
						if ($('.id-copy').prop('disabled') == false) {
							var copyText = document.getElementById("password");
							copyText.select();
							document.execCommand("Copy");
							$(".id-copy").data('content',copyText.value);
						}
					});
				</script>
				<!--end::Page Snippets -->
			</body>
			<!-- end::Body -->
		</html>
