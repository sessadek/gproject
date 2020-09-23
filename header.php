<?php
require("require.php"); ?>
<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Gestion Projets
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="<?=_SITE_URL_; ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?=_SITE_URL_; ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=_SITE_URL_; ?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?=_SITE_URL_; ?>assets/demo/default/media/img/logo/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?=_SITE_URL_; ?>assets/vendors/custom/datatables/datatables.min.css"/>



	</head>
	<!-- end::Head -->
	 <!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="<?=_SITE_URL_;?>" class="m-brand__logo-wrapper reset_link_logo">
										<h4>GestionProjets</h4>
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block ">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
								<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-dropdown m-dropdown--inline m-dropdown--arrow menu_left_custom" data-dropdown-toggle="click" aria-expanded="true">
									<a href="#" id="top_info" class="m-dropdown__toggle dropdown-toggle">
										Bienvenue, <b><?php $nom_prenom = explode(" ", $_SESSION['nom_prenom']); echo ucfirst($nom_prenom[0]); ?></b>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="m-nav">
														<li class="m-nav__section m-nav__section--first">
															<span class="m-nav__section-text">
																Paramètres
															</span>
														</li>
														<li class="m-nav__item">
															<a href="<?=_SITE_URL_.'pages/monprofile.php'; ?>" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-profile-1"></i>
																<span class="m-nav__link-text">
																	Mon Profil
																</span>
															</a>
														</li>
														<li class="m-nav__separator m-nav__separator--fit"></li>
														<li class="m-nav__item">
															<a href="<?=_SITE_URL_.'logout.php'; ?>" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
																Déconnexion
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->	