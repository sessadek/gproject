	<!-- BEGIN: Left Aside -->
	<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
	</button>
	<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
	<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
		<li class="m-menu__item " aria-haspopup="true">
			<a href="../index.php" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-line-graph"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Tableau de bord
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				COMPOSANTS
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="#" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-users"></i>
				<span class="m-menu__link-text">
					Gestion des utilisateurs
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="/pages/adduser.php" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Ajouter un utilisateur
							</span>
						</a>
					</li>
					<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="/pages/listeusers.php" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Liste des utilisateurs
							</span>
						</a>
					</li> 
				</ul>
			</div>
		</li>
		<?php endif ?>
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="#" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-suitcase"></i>
				<span class="m-menu__link-text">
					Gestion des sociétés
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="/pages/addsociete.php" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Ajouter une société
							</span>
						</a>
					</li>
					<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="/pages/listesocietes.php" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Liste des sociétés
							</span>
						</a>
					</li> 
				</ul>
			</div>
		</li>
		<?php endif ?>
		<?php if ($_SESSION['level'] == 1  || $_SESSION['level'] == 2 || $_SESSION['level'] == 3): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="#" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-tabs"></i>
				<span class="m-menu__link-text">
					Projets
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="/pages/addprojet.php" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Ajouter un projet
							</span>
						</a>
					</li>
					<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="/pages/listeprojet.php" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Liste des projets
							</span>
						</a>
					</li> 
				</ul>
			</div>
		</li>
		<?php endif ?>
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/addbacklog.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-list-1"></i>
				<span class="m-menu__link-text">
					BackLog
				</span>
			</a>
		</li>
		<?php endif ?>
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/addlivrable.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-event-calendar-symbol"></i>
				<span class="m-menu__link-text">
					Planning des Livrables
				</span>
			</a>
		</li>
		<?php endif ?>
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/addrole.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-profile-1"></i>
				<span class="m-menu__link-text">
					Rôle
				</span>
			</a>
		</li>
		<?php endif ?>
		<!-- <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/addsecteur.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-network"></i>
				<span class="m-menu__link-text">
					Secteur
				</span>
			</a>
		</li> 
		<?php endif ?> -->
		<!-- <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/addtype.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-tabs"></i>
				<span class="m-menu__link-text">
					Types de projets
				</span>
			</a>
		</li> 
		<?php endif ?> -->
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/addpaiement.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-coins"></i>
				<span class="m-menu__link-text">
					Paiement
				</span>
			</a>
		</li> 
		<?php endif ?>
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/addetat.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-interface-5"></i>
				<span class="m-menu__link-text">
					Etat de projet
				</span>
			</a>
		</li>
		<?php endif ?>
		<?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/monplanning.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-calendar"></i>
				<span class="m-menu__link-text">
					Planning des réunions
				</span>
			</a>
		</li>
		<?php endif ?>
		<!-- <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2): ?>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/statistique.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-pie-chart"></i>
				<span class="m-menu__link-text">
					Les Statistique
				</span>
			</a>
		</li>
		<?php endif ?> -->

		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				Profile
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="/pages/monprofile.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-profile-1"></i>
				<span class="m-menu__link-text">
					Mon Profile
				</span>
			</a>
		</li>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="../logout.php" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-logout"></i>
				<span class="m-menu__link-text">
					Déconnexion
				</span>
			</a>
		</li>
	</ul>
	</div>
	<!-- END: Aside Menu -->
	</div>
	<!-- END: Left Aside -->