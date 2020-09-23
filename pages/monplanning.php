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
										Planning des réunions
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
										<div class="m-portlet__body">
											<div id="monplaning"></div>
											<div class="modal fade" id="ajouterEvent" role="dialog">
											    <div class="modal-dialog">
											        <div class="modal-content">
										            <div class="modal-header">
																<h5 class="modal-title" id="labelAddligne">
																	Ajouter a mon planning: 
																</h5>
																<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
																	<span aria-hidden="true">
																		×
																	</span>
																</button>
															</div>
													<form class="m-form">
										           		<div class="modal-body">
										                    <input type="hidden" name="traitement" value="add">
										                    <div class="form-group">
										                        <label for="titre" class="form-control-label">
										                            Titre :
										                        </label>
										                        <input type="text" class="form-control" name="titre">
										                    </div>
										                    <div class="form-group">
										                        <label for="datedebut" class="form-control-label">
										                            Date Debut :
										                        </label>
										                        <input type="text" class="form-control" id="m_datetimepicker_1" readonly name="datedebut">
										                    </div>
										                    <div class="form-group">
										                        <label for="datefin" class="form-control-label">
										                            Date Fin :
										                        </label>
										                        <input type="text" class="form-control" name="datefin" id="m_datetimepicker_2" readonly >
										                    </div>
										                    <div class="form-group">
										                        <label class="form-control-label">
										                            Description :
										                        </label>
										                        <textarea name="description"  class="form-control"></textarea>
										                    </div>
										            </div>
										            <div class="modal-footer">
										                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
										                <button type="button" class="btn btn-primary" id="saveEvent"  data-dismiss="modal">Ajouter</button>
										            </div>
										            </form>
										        	</div>
									    		</div>
											</div>
										    <div class="modal fade" id="editEvent" role="dialog">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
															<h5 class="modal-title" id="labelAddligne">
																Modifier mon planning: 
															</h5>
															<button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
																<span aria-hidden="true">
																	×
																</span>
															</button>
														</div>
														<form class="m-form">
											            <div class="modal-body">
											                    <input type="hidden" name="id_projet" value="<?=$_GET['id_projet']; ?>">
											                    <input type="hidden" name="traitement" value="edit">
											                    <input type="hidden" name="id" id="idid">
											                    <div class="form-group">
											                        <label for="titre_e" class="form-control-label">
											                            Titre :
											                        </label>
											                        <input type="text" class="form-control" name="titre" id="titre_e">
											                    </div>
											                    <div class="form-group">
											                        <label for="id_backlog_e" class="form-control-label">
											                            Date Debut :
											                        </label>
											                        <input type="text" class="form-control datedebut_e" id="m_datetimepicker_1_edit" readonly name="datedebut">
											                    </div>
											                    <div class="form-group">
											                        <label for="id_backlog_e" class="form-control-label">
											                            Date Livraison :
											                        </label>
											                        <input type="text" class="form-control datefin_e" name="datefin" id="m_datetimepicker_2_edit" readonly >
											                    </div>
											                    <div class="form-group">
											                        <label for="id_backlog_e" class="form-control-label">
											                            Description :
											                        </label>
											                        <textarea name="description"  class="form-control" id="description_event_e"></textarea>
											                    </div>
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-danger" id="deleteEventbtn" data-id=""  data-dismiss="modal">Supprimer</button>
											                <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
											                <button type="button" class="btn btn-primary" id="editEventbtn"  data-dismiss="modal">Modifier</button>
											            </div>
											            </form>
											        </div>
											    </div>
											</div>
										</div>
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
			<script src="<?=_SITE_URL_; ?>assets/snippets/pages/user/monplanning.js" type="text/javascript"></script>
			<script type="text/javascript">
				var CalendarBasic = function() {

				return {
				//main function to initiate the module
				init: function() {
				  setTimeout(function() {
				        $('#monplaning').fullCalendar({
				            lang: 'fr',
				            customButtons: {
						        addEvent: {
						            text: 'Ajouter',
						            click: function() {
						                $('#ajouterEvent').modal("show");
						            }
						        }
						    },
				            header: {
				                left: 'prev,next today addEvent',
				                center: 'title',
				                right: 'month,agendaWeek,agendaDay,listWeek'
				            },
				            editable: true,
				            eventLimit: true, // allow "more" link when too many events
				            navLinks: true,
				            closeText: "Fermer",
				              prevText: "Précédent",
				              nextText: "Suivant",
				              currentText: "Aujourd'hui",
				              monthNames: [ "janvier", "février", "mars", "avril", "mai", "juin",
				                "juillet", "août", "septembre", "octobre", "novembre", "décembre" ],
				              monthNamesShort: [ "janv.", "févr.", "mars", "avr.", "mai", "juin",
				                "juil.", "août", "sept.", "oct.", "nov.", "déc." ],
				              dayNames: [ "dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi" ],
				              dayNamesShort: [ "dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam." ],
				              dayNamesMin: [ "D","L","M","M","J","V","S" ],
				              weekHeader: "Sem.",
				              dateFormat: "dd/mm/yy",
				              firstDay: 1,
				              isRTL: false,
				              showMonthAfterYear: false,
				              yearSuffix: "" ,
				              buttonText: {
				                today:"Aujourd'hui",
				                year: "Année",
				                month: "Mois",
				                week: "Semaine",
				                day: "Jour",
				                list: "Mon planning"
				              },
				              allDayHtml: "Toute la<br/>journée",
				              eventLimitText: "en plus",
				              noEventsMessage: "Aucun événement à afficher",
				              events: <?php echo "'../classes/ajax/planning_json.php?id_user=".$_SESSION['id']."'"; ?>,

				            eventRender: function(event, element) {
				                if (element.hasClass('fc-day-grid-event')) {
				                    element.data('content', event.description);
				                    element.data('placement', 'top');
				                    mApp.initPopover(element); 
				                } else if (element.hasClass('fc-time-grid-event')) {
				                    element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>'); 
				                } else if (element.find('.fc-list-item-title').lenght !== 0) {
				                    element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>'); 
				                }
				            },
				            eventClick:  function(event, jsEvent, view) {
						        //set the values and open the modal
						        $("#titre_e").val(event.title);
						        $("#idid").val(event.id);
						        $("#deleteEventbtn").attr('data-id', event.id);

						        $("#m_datetimepicker_1_edit").val(moment(event.start).format("YYYY-MM-DD HH:mm:ss"));
						        $("#m_datetimepicker_2_edit").val(moment(event.end).format("YYYY-MM-DD HH:mm:ss"));
						        $("#description_event_e").html(event.description);
						        $('#editEvent').modal("show");
						    },
						    eventDrop: function(event, delta, revertFunc) {
						    	var content = {};
						    	$.ajax({
						         url: '../classes/ajax/addplanning.php',
					            type: 'post',
					            data : 'id='+event.id+'&start='+event.start.format()+'&end='+event.end.format()+'&traitement=updatedrop',
					             success: function(response, status, xhr, $form) {
							            if (response == 'edited') {
							                $('#monplaning').fullCalendar( 'refetchEvents' );
							                setTimeout(function() {
							                            var notify = $.notify(content, { 
							                                type: 'success',
							                                allow_dismiss: true,
							                                newest_on_top: true,
							                                mouse_over:  true,
							                                showProgressbar:  false,
							                                spacing: 10,                    
							                                timer: 2000,
							                                placement: {
							                                    from: 'top', 
							                                    align: 'right'
							                                },
							                                offset: {
							                                    x: 30, 
							                                    y: 30
							                                },
							                                delay: 2000,
							                                z_index: 10000,
							                                animate: {
							                                    enter: 'animated bounce',
							                                    exit: 'animated bounce'
							                                }
							                            });
							                            notify.update('message', '<strong>Event Modifie</strong>');
							                            notify.update('type', 'success');
							                            notify.update('progress', 100);
							                        }, 800);
							            }
							        }
						      });

						    }
				        });
				    }, 200);
				        }
				    };
				}();

				jQuery(document).ready(function() {
				    CalendarBasic.init();
				});
			</script>
			<script src="<?=_SITE_URL_; ?>assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>

			<!--end::Page Snippets -->
		</body>
		<!-- end::Body -->
	</html>
