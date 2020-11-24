		<?php require("header.php"); ?>
				<!-- begin::Body -->
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
					<?php require("sidebar.php"); ?>
					<div class="m-grid__item m-grid__item--fluid m-wrapper">
						<!-- BEGIN: Subheader -->
						<div class="m-subheader ">
							<div class="d-flex align-items-center">
								<div class="mr-auto">
									<h3 class="m-subheader__title ">
										Tableau de bord
									</h3>
								</div>
							</div>
						</div>
					<!-- END: Subheader -->
					<div class="m-content">
							<div class="m-portlet ">
										<div class="m-portlet__body  m-portlet__body--no-padding">
											<div class="row m-row--no-padding m-row--col-separator-xl">
												<div class="col-md-12 col-lg-6 col-xl-4">
													<!--begin::Total Profit-->
													<div class="m-widget24">
														<div class="m-widget24__item">
															<h4 class="m-widget24__title">
																En instance
															</h4>
															<br>
															<br>
															<span class="m-widget24__stats m--font-brand">
															<?php 
																$sum = Projet::getSomme();
																$sum1 = Projet::getSommeByEtat(1);
																$k = Projet::getM($sum1);
															  	echo $k;
														  		$p1 = ($sum1*100)/($sum);
													         ?> MAD
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-brand" role="progressbar" style="width: <?php echo round($p1,2); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget24__change">
																Progression
															</span>
															<span class="m-widget24__number">
														         <?php echo round($p1,2);  ?> %
															</span>
														</div>
													</div>
													<!--end::Total Profit-->
												</div>
												<div class="col-md-12 col-lg-6 col-xl-4">
													<!--begin::New Feedbacks-->
													<div class="m-widget24">
														<div class="m-widget24__item">
															<h4 class="m-widget24__title">
																En cours
															</h4>
															<br>
															<br>
															<span class="m-widget24__stats m--font-info">
																<?php 
																$sum = Projet::getSomme();
																$sum1 = Projet::getSommeByEtat(2);
																$k = Projet::getM($sum1);
															  	echo $k;
														  		$p2 = ($sum1*100)/($sum);
													         ?> MAD
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-info" role="progressbar" style="width: <?php echo round($p2,2); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget24__change">
																Progression
															</span>
															<span class="m-widget24__number">
																<?php echo round($p2,2);  ?> %
															</span>
														</div>
													</div>
													<!--end::New Feedbacks-->
												</div>
												<div class="col-md-12 col-lg-6 col-xl-4">
													<!--begin::New Orders-->
													<div class="m-widget24">
														<div class="m-widget24__item">
															<h4 class="m-widget24__title">
																Livré
															</h4>
															<br>
															<br>
															<span class="m-widget24__stats m--font-success">
																<?php 
																$sum = Projet::getSomme();
																$sum1 = Projet::getSommeByEtat(3);
																$k = Projet::getM($sum1);
															  	echo $k;
														  		$p3 = ($sum1*100)/($sum);
													         ?> MAD
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-success" role="progressbar" style="width: <?php echo round($p3,2); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget24__change">
																Progression
															</span>
															<span class="m-widget24__number">
																<?php echo round($p3,2);  ?> %
															</span>
														</div>
													</div>
													<!--end::New Orders-->
												</div>
											</div>
										</div>
							</div>

							<div class="row">
								<div class="col-xl-6">
									<!--begin:: Widgets/Sale Reports-->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Statistique des projets réalise en 2019
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="m-widget2">
												<div id="chart1"></div>
											</div>
										</div>
									</div>	
								</div>

								<div class="col-xl-6">
									<!--begin:: Widgets/Sale Reports-->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Statistique des projets réalise en 2020
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="m-widget2">
												<div id="chart2"></div>
											</div>
										</div>
									</div>	
								</div>

								<div class="col-xl-6">
									<!--begin:: Widgets/Sale Reports-->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Statistiques des chiffres d'affaire
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="m-widget2">
												<div id="chart3"></div>
											</div>
										</div>
									</div>	
								</div>

								<div class="col-xl-6">
									<!--begin:: Widgets/Sale Reports-->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Progression des projets
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="m-widget2">
												<div id="chart4"></div>
											</div>
										</div>
									</div>	
								</div>
								<div class="col-xl-6">
									<!--begin:: Widgets/Sale Reports-->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Mon planing de réunions
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="m-widget2">
												<?php $plans = Planning::getfirst(date("Y-m-d H:i:s"),$_SESSION['id']); 
													foreach ($plans as $key => $plan) {
												?>
													<div class="m-widget2__item m-widget2__item--primary">
														<div class="m-widget2__checkbox">
															<!-- <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																<input type="checkbox">
																<span></span>
															</label> -->
														</div>
														<div class="m-widget2__desc">
															<span class="m-widget2__text">
																<?php echo $plan['titre']; ?>
															</span>
															<br>
															<span class="m-widget2__user-name">
																<a href="#" class="m-widget2__link">
																<?php echo "Le ".date("d-m-Y", strtotime($plan['datedebut']))." à ".date("H:m", strtotime($plan['datedebut'])); ?>
																</a>
															</span>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>	
									<!--end:: Widgets/Sale Reports-->
								</div>


								

								

								<div class="col-xl-6">
									<!--begin:: Widgets/Tasks -->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Les prochains livrables
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
										<?php 
												$dates = Livrable::getLastLivrable(date("Y-m-d H:i:s"));
												foreach ($dates as $key => $date) {
										?>
											<div class="tab-content">
												<div class="tab-pane active" id="m_widget2_tab1_content">
													<div class="m-widget2">
														<div class="m-widget2__item m-widget2__item--primary">
															<div class="m-widget2__checkbox">
															</div>
															<div class="m-widget2__desc">
																<span class="m-widget2__text">
																	<h3><?php echo $date['titre']; ?></h3>
																</span>
																<span class="m-widget2__user-name">
																	<?php echo substr ($date['description'], 0, 80); ?> . . .
																</span>
															</div>
														</div>
													</div>
												</div>	
											</div>
										<?php } ?>
										</div>
									</div>
									<!--end:: Widgets/Tasks -->
								</div>

								<div class="col-xl-6">
									<!--begin:: Widgets/Tasks -->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Classement des societes par chiffre affaire
													</h3>
												</div>
											</div>
										</div>

										<div class="m-portlet__body">
											<div class="m-widget4">
											
											<?php 
												$societes = Societe::gettop();

												foreach ($societes as $societe) :
													$raisonSocial = Societe::get($societe["id_societe"]);
											?>
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
																<img src="<?= Tools::getlogo(Tools::str2url($societe["raison_social"])); ?>" alt="">
															</div>
															<div class="m-widget4__info">
																<span class="m-widget4__title">
																	<?= $raisonSocial['raison_social']; ?>
																</span>
																<br>
																<span class="m-widget4__sub">
																	<?= $societe["sum"]; ?>MAD
																</span>
															</div>
													</div>
												<?php endforeach ?>
											</div>
										</div>
									</div>
									<!--end:: Widgets/Tasks -->
								</div>

								

								<div class="col-xl-6">
									<!--begin:: Widgets/Tasks -->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Nouveau Utilisateurs
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="m-widget4">
											
												<?php
													$users = User::getlast();
													foreach ($users as $user) :

												?>
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="https://i.pravatar.cc/150?u=<?php echo $user['email']?>" alt="">

														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																<?php echo $user['nom'] .' ' . $user['prenom']; ?>
															</span>
															<br>
															<span class="m-widget4__sub">
																<?= $user['libelle_rolle']; ?>
															</span>
															
														</div>
														<a class="reset_link" href="/pages/adduser.php?id_user=<?= $user['id_user']; ?>"><i class="flaticon-edit-1"></i></a>
													</div>
												<?php endforeach ?>
											</div>
										</div>
									</div>
									<!--end:: Widgets/Tasks -->
								</div>


							</div>

						

							<div class="row">
								<div class="col-xl-12">
									<!--begin:: Widgets/User Progress -->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Progression des projets en cours
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="tab-content">
												<div class="tab-pane active" id="m_widget4_tab1_content">
													<div class="m-widget4 m-widget4--progress">
														<?php 
															$projets = Projet::getProjetByEtat(2);
															foreach ($projets as $key => $projet) {
																$soc=Societe::get($projet["id_societe"]);
																$sec=Secteur::getByID($soc["id_secteur"]);
																$pro=Livrable::getProgras($projet["id_projet"]);
																$sum=Livrable::getSum($projet["id_projet"],2);
														 ?>
														<div class="m-widget4__item">
															<div class="m-widget4__img m-widget4__img--pic">
																<img src="<?= Tools::getlogo(Tools::str2url($soc["raison_social"])); ?>" alt="">
															</div>
															<div class="m-widget4__info">
																<span class="m-widget4__title">
																	<?php echo $projet['nom_projet']; ?>
																</span>
																<br>
																<span class="m-widget4__sub">
																	<?php echo $sec["libelle_secteur"] ?>
																</span>
															</div>
															<div class="m-widget4__progress">
																<div class="m-widget4__progress-wrapper">
																	<span class="m-widget17__progress-number">
																		<?php echo round($pro[0],0); ?> %
																	</span>
																	<div class="progress m-progress--sm">
																		<div class="progress-bar m--bg-accent" role="progressbar" style="width: <?php echo round($pro[0],0); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</div>
																<div class="m-widget24__item">
																	<div class="row">
																		<div class="col-md-4">
																			<span class="m-widget24__stats m--font-info">
																				Total: <br><?php echo $k = Projet::getM($projet['montant']); ?> MAD
																			</span>
																		</div>
																		<div class="col-md-4">
																			<span class="m-widget24__stats m--font-accent">
																				Payée: <br><?php echo $k = Projet::getM($projet['montant']-$sum[0]); ?> MAD
																			</span>
																		</div>
																		<div class="col-md-4">
																			<span class="m-widget24__stats m--font-danger">
																				Le reste: <br><?php echo $k = Projet::getM($sum[0]); ?> MAD
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<div>
															</div>
														</div>
														<?php } ?>
													</div>
												</div>
												<div class="tab-pane" id="m_widget4_tab2_content"></div>
												<div class="tab-pane" id="m_widget4_tab3_content"></div>
											</div>
										</div>
									</div>
									<!--end:: Widgets/User Progress -->
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- end:: Body -->
				<?php require("footer.php"); ?>
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
				<script src="<?=_SITE_URL_; ?>assets/app/js/dashboard.js" type="text/javascript"></script>
				<!--end::Page Snippets -->
				<!--CHART -->
				
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<!--end::Page Vendors -->
				<script type="text/javascript">
					  google.charts.load('current', {'packages':['corechart', 'bar', 'line']});
				      google.charts.setOnLoadCallback(drawChart);

				      function drawChart() {

				      	<?php 
        					  $typeps= Projet::getPBYType(date("Y")-1);?>

				        var data = google.visualization.arrayToDataTable([
				          ['Task', 'Hours per Day'],
				          <?php 
              				  foreach ($typeps as $key => $type) {
              				  	$idtype = Type::getByID($type['id_type']);
              				  	if($key!=0){
						       		 echo ",['".$idtype['libelle_type']."',".$type['type']."]";
							        }else{
						         	 echo "['".$idtype['libelle_type']."',".$type['type']."]";
							        }
						        }
      						 ?>
				        ]);
				        var options = {
				          title: ''
				        };
				        var chart = new google.visualization.PieChart(document.getElementById('chart1'));
				        chart.draw(data, options);
				        
				        /*chart 2*/

				        <?php 
        					  $typeps= Projet::getPBYType(date("Y"));?>

				        var data = google.visualization.arrayToDataTable([
				          ['Task', 'Hours per Day'],
				          <?php 
              				  foreach ($typeps as $key => $type) {
              				  	$idtype = Type::getByID($type['id_type']);
              				  	if($key!=0){
						       		 echo ",['".$idtype['libelle_type']."',".$type['type']."]";
							        }else{
						         	 echo "['".$idtype['libelle_type']."',".$type['type']."]";
							        }
						        }
      						 ?>
				        ]);
				        var options = {
				          title: ''
				        };
				        var chart = new google.visualization.PieChart(document.getElementById('chart2'));
				        chart.draw(data, options);

				        /* Chart 3*/
				        		 <?php $years = Projet::getYear(); ?>

						      var data = google.visualization.arrayToDataTable([
						          ['ANNEE', "CHIFFRE D'AFFAIRE"],

						          <?php 
              				  foreach ($years as $key => $year) {
              				  	 $my = Projet::getMontantByYear($year['0'],3);
	              				  	if($key!=0){
							       		 echo ",['".$year['0']."',".$my['0']."]";
								        }else{
							         	 echo "['".$year['0']."',".$my['0']."]";
								        }
							        }
      							 ?>
						        ]);

						        
						        var chart3 = new google.charts.Bar(document.getElementById('chart3'));

						        chart3.draw(data, google.charts.Bar.convertOptions(options));


						      
				        
				        /* chart 4*/

				    	<?php 
        					$etatps = Projet::getCountProjetByEtat();
        				?>

				        var data = google.visualization.arrayToDataTable([
				          ['libelle_etat', 'etat'],
				          <?php 
              				  foreach ($etatps as $key => $etat) {
              				  	$idetat = Etat::getByID2($etat['etat_projet']);
              				  	if($key!=0){
						       		 echo ",['".$idetat['libelle_etat']."',".$etat['etat']."]";
							        }else{
						         	 echo "['".$idetat['libelle_etat']."',".$etat['etat']."]";
							        }
						        }
      						 ?>
				        ]);
				        var options = {
				          title: '',
				          
				        };
				        var chart = new google.visualization.PieChart(document.getElementById('chart4'));
				        chart.draw(data, options);

				      }
				</script>

				<!--end CHART -->
			</body>
			<!-- end::Body -->
		</html>
