$(document).ready(function() {
	$('#saveEvent').on('click', function (e) {
	    var form = $(this).closest('form');
	    var content = {};
	    form.ajaxSubmit({
	        url: '../../../../classes/ajax/addplanning.php',
	        type: 'post',
	        success: function(response, status, xhr, $form) {
	            if (response == 'inserted') {
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
	                            notify.update('message', '<strong>Event Ajoute</strong>');
	                            notify.update('type', 'success');
	                            notify.update('progress', 100);
	                        }, 800);
	            }
	        }
	    });
	});
	$('#deleteEventbtn').on('click', function (e) {
	    var btn = $(this);
	    var content = {};
	    $.ajax({
	            url: '../../../../classes/ajax/addplanning.php',
	            type: 'post',
	            data : 'id=' + btn.data('id') + '&traitement=delete',
	            success: function(response, status, xhr, $form) {
	                    if (response == 'deleted') {
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
	                            notify.update('message', '<strong>Event Supprimé</strong>');
	                            notify.update('type', 'success');
	                            notify.update('progress', 100);
	                        }, 800);
	                    }else{
	                        // else ?
	                    }   
	            }
	        });
	});
	$('#editEventbtn').on('click', function (e) {
    var form = $(this).closest('form');
    var content = {};
    form.ajaxSubmit({
        url: '../../../../classes/ajax/addplanning.php',
        type: 'post',
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
});
 	$('#m_datetimepicker_1_edit').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy-mm-dd hh:mm:ss'
    });
     $('#m_datetimepicker_2_edit').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy-mm-dd hh:mm:ss'
    });
});