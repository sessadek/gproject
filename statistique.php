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
										LES STATISTIQUE
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
								<div class="col-lg-6">
									<!--begin::Portlet-->
									<div class="m-portlet m-portlet--tab">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Statistique des projets réalisé en  <?php echo date("Y")-1 ?>
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div id="chart1" style="height:500px;"></div>
										</div>
									</div>
									<!--end::Portlet-->
								</div>
								<div class="col-lg-6">
									<!--begin::Portlet-->
									<div class="m-portlet m-portlet--tab">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Statistique des projets réalisé en <?php echo date("Y") ?>
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div id="chart2" style="height:500px;"></div>
										</div>
									</div>
									<!--end::Portlet-->
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<!--begin::Portlet-->
									<div class="m-portlet m-portlet--tab">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Statistiques des chiffres d'affaire
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div id="chart3" style="height:500px;"></div>
										</div>
									</div>
									<!--end::Portlet-->
								</div>
								<div class="col-lg-6">
									<!--begin::Portlet-->
									<div class="m-portlet m-portlet--tab">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Progression des projets par Etat
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div id="chart4" style="height:500px;"></div>
										</div>
									</div>
									<!--end::Portlet-->
								</div>
							</div>

							<div class="row">
								
								<div class="col-xl-6">
									<!--begin:: Widgets/Authors Profit-->
									<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Classement des société par chiffres d'affaire total
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="m-widget4">
											<?php $societes = Societe::gettop();
											 foreach ($societes as $key => $societe)
												{   
													$soc=Societe::get($societe["id_societe"]);
													$sec=Secteur::getByID($soc["id_secteur"]);
													?>
											
												<div class="m-widget4__item">
													<div class="m-widget4__img m-widget4__img--logo">
														<img src="<?= Tools::getlogo(Tools::str2url($soc["raison_social"])); ?>" alt="">
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__title">
															<?php echo $soc["raison_social"] ?>
														</span>
														<br>
														<span class="m-widget4__sub">
															<?php echo $sec["libelle_secteur"] ?>
														</span>
													</div>
													<span class="m-widget4__ext">
														<span class="m-widget4__number m--font-brand">
															<?php $k = Projet::getM($societe[1]);
																	echo $k;?>MAD 
														</span>
													</span>
												</div>
											<?php } ?>
											</div>
										</div>
									</div>
									<!--end:: Widgets/Authors Profit-->
								</div>

								<div class="col-xl-6">
										<!--begin:: Widgets/Product Sales-->
										<div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Chiffres d'affaire des projets
														</h3>
													</div>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="m-widget25">
													<span class="m-widget25__price m--font-brand">
															<?php 
																$sum = Projet::getSomme();
																$k = Projet::getM($sum);
															  	echo $k;
													         ?> MAD
													</span>
													<div class="m-widget25--progress">
														<div class="m-widget25__progress">
															<span class="m-widget25__progress-number">
																<?php echo round($p1,2); ?>%
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-danger" role="progressbar" style="width: <?php echo round($p1,2); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget25__progress-sub">
																En instance
															</span>
														</div>
														<div class="m-widget25__progress">
															<span class="m-widget25__progress-number">
																<?php echo round($p2,2); ?>%
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-accent" role="progressbar" style="width: <?php echo round($p2,2); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget25__progress-sub">
																En cours
															</span>
														</div>
														<div class="m-widget25__progress">
															<span class="m-widget25__progress-number">
																<?php echo round($p3,2); ?>%
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-warning" role="progressbar" style="width: <?php echo round($p3,2); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget25__progress-sub">
																Livré
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Product Sales-->
								</div>
							</div>

							<div class="row">

								<div class="col-xl-6">
									<!--begin:: Widgets/New Users-->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Nouveau utilisateurs
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<div class="tab-content">
												<div class="tab-pane active" id="m_widget4_tab1_content">
													<!--begin::Widget 14-->
													<div class="m-widget4">
														<!--begin::Widget 14 Item-->
													  <?php $users = User::getlast();
															foreach ($users as $user) {  ?>
														<div class="m-widget4__item">
															<div class="m-widget4__img m-widget4__img--pic">
																<img src="<?=_SITE_URL_; ?>uploads/avatars/<?php echo rand(1, 6); ?>.png" alt="">
															</div>
															<div class="m-widget4__info">
																<span class="m-widget4__title">
																	<?php echo $user['nom'].' '.$user['prenom'] ?>
																</span>
																<br>
																<span class="m-widget4__sub">
																	<?php echo $user['service'] ?>
																</span>
															</div>
															<div class="m-widget4__ext">
																<?php echo"<a class='reset_link' href='/pages/adduser.php?id_user=".$user['id_user']."'><i class='flaticon-edit-1'></i></a>"?>
															</div>
														</div>
														<?php } ?>
														<!--end::Widget 14 Item--> 
													</div>
													<!--end::Widget 14-->
												</div>
											</div>
										</div>
									</div>
									<!--end:: Widgets/New Users-->
								</div>

								<div class="col-xl-6">
									<!--begin:: Widgets/Last Updates-->
									<div class="m-portlet m-portlet--full-height ">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<h3 class="m-portlet__head-text">
														Options générales
													</h3>
												</div>
											</div>
										</div>
										<div class="m-portlet__body">
											<!--begin::widget 12-->
											<div class="m-widget4">
												<div class="m-widget4__item">
													<div class="m-widget4__ext">
														<span class="m-widget4__icon m--font-brand">
															<i class="flaticon-interface-3"></i>
														</span>
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__text">
															Rôles
														</span>
													</div>
													<div class="m-widget4__ext">
														<span class="m-widget4__number m--font-info">
															<?php echo $max= Role::getmax(); ?>
														</span>
													</div>
												</div>
												<div class="m-widget4__item">
													<div class="m-widget4__ext">
														<span class="m-widget4__icon m--font-brand">
															<i class="flaticon-tool"></i>
														</span>
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__text">
															Secteurs
														</span>
													</div>
													<div class="m-widget4__ext">
														<span class="m-widget4__number m--font-info">
															<?php echo $max= Secteur::getmax(); ?>
														</span>
													</div>
												</div>
												<div class="m-widget4__item">
													<div class="m-widget4__ext">
														<span class="m-widget4__icon m--font-brand">
															<i class="flaticon-line-graph"></i>
														</span>
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__text">
															Type des projets
														</span>
													</div>
													<div class="m-widget4__ext">
														<span class="m-widget4__number m--font-info">
															<?php echo $max= Type::getmax(); ?>
														</span>
													</div>
												</div>
												<div class="m-widget4__item">
													<div class="m-widget4__ext">
														<span class="m-widget4__icon m--font-brand">
															<i class="flaticon-diagram"></i>
														</span>
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__text">
															Etat de paiement
														</span>
													</div>
													<div class="m-widget4__ext">
														<span class="m-widget4__number m--font-info">
															<?php echo $max= Paiment::getmax(); ?>
														</span>
													</div>
												</div>
												<div class="m-widget4__item m-widget4__item-border">
													<div class="m-widget4__ext">
														<span class="m-widget4__icon m--font-brand">
															<i class="flaticon-list-3"></i>
														</span>
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__text">
															Etat des projets
														</span>
													</div>
													<div class="m-widget4__ext">
														<span class="m-widget4__number m--font-info">
															<?php echo $max= Etat::getmax(); ?>
														</span>
													</div>
												</div>
												<div class="m-widget4__item m-widget4__item-border">
													<div class="m-widget4__ext">
														<span class="m-widget4__icon m--font-brand">
															<i class="flaticon-users"></i>
														</span>
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__text">
															Utilisateurs
														</span>
													</div>
													<div class="m-widget4__ext">
														<span class="m-widget4__number m--font-info">
															<?php echo $max= User::getmax(); ?>
														</span>
													</div>
												</div>
												<div class="m-widget4__item m-widget4__item-border">
													<div class="m-widget4__ext">
														<span class="m-widget4__icon m--font-brand">
															<i class="flaticon-network"></i>
														</span>
													</div>
													<div class="m-widget4__info">
														<span class="m-widget4__text">
															Projets
														</span>
													</div>
													<div class="m-widget4__ext">
														<span class="m-widget4__number m--font-info">
															<?php echo $max= Projet::getmax(); ?>
														</span>
													</div>
												</div>
											</div>
											<!--end::Widget 12-->
										</div>
									</div>
									<!--end:: Widgets/Last Updates-->
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
				<script src="<?=_SITE_URL_; ?>assets/app/js/dashboard.js" type="text/javascript"></script>
				<!--end::Page Snippets -->
				<!--CHART -->
				
				<script src="//www.gstatic.com/charts/loader.js" type="text/javascript"></script>
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
