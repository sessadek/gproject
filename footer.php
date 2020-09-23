<!-- begin::Footer -->
<footer class="m-grid__item m-footer ">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					<?php echo date('Y'); ?> &copy;
				</span>
			</div>
			<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
				<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
					<li class="m-nav__item">
						<a href="<?=_SITE_URL_; ?>pages/about.php" class="m-nav__link">
							<span class="m-nav__link-text">
								À propos de nous
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="<?=_SITE_URL_; ?>pages/privacy.php"  class="m-nav__link">
							<span class="m-nav__link-text">
								Termes et conditions
							</span>
						</a>
					</li>
					<li class="m-nav__item m-nav__item">
						<a class="m-nav__link" data-toggle="modal" data-target="#support" title="Support" data-placement="left">
							<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<div class="modal fade show" id="support" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Besoin d'aide ?
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
			</div>
			<div class="modal-body">
				<center><b>Besoin d'aide ? <br> Contactez notre équipe de support technique: <br> par téléphone: <a href="tel:01 23 45 67 89">01 23 45 67 89</a> <br> Ou par email: <a href="mailto:support@gprojet.site">support@gprojet.site</a></b></center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Fermer
				</button>
			</div>
		</div>
	</div>
</div>
<!-- end::Footer -->