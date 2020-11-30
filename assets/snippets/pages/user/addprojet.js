$(document).ready(function() {
    var tableOpts = {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'csv'
        ],
        "sPaginationType": "full_numbers",
        "sScrollY": "auto",
        "bFilter": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
        }
    }
    
    var table = null;
    
    $('#backlog').on('show.bs.modal', function () {
        if (!table) {
            setTimeout(function() {
                table = $('#html_table').DataTable(tableOpts);
            }, 180);
        }
    });
    
    $('#openformAdd').on('click', function (e) {
      $('#formAdd').modal("show");
    });

    $('#team').on('click', function (e) {
        $('#teammodal').modal("show");
    });
    
    $('#importdocs').on('click', function (e) {
      $('#importdocsmodal').modal("show");
    });
    $('#addpenalitebtn').on('click', function (e) {
      $('#addpenalite').modal("show");
    });

    $('#openimport').on('click', function (e) {
      $('#ImportBackLog').modal("show");
    });

    $('#ajouter').on('click', function (e) {
        e.preventDefault();
        var content = {};
        var id_projet = document.getElementById('id_projet').value;
        var id_backlog = document.getElementById('id_backlog').value;
        var fonctionnalite = document.getElementById('fonctionnalite').value;
        var importance = document.getElementById('importance').value;
        var estimation = document.getElementById('estimation').value;
        var demonstration = document.getElementById('demonstration').value;
        var notes = document.getElementById('notes').value;
        var id_user = document.getElementById('id_user').value;
        var couleur = document.getElementById('couleur').value;
        var btn = $(this);
        
        var form = $(this).closest('form');
        
        form.ajaxSubmit({
            url: '../../../../classes/ajax/addbacklog.php',
            type: 'post',
            success: function(response, status, xhr, $form) {
                    if (response == 'inserted') {
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
                            notify.update('message', '<strong>BackLog Ajouter</strong>');
                            notify.update('type', 'success');
                            notify.update('progress', 100);
                        }, 800);
                    }else{
                        // else ?
                    }
                
            }
        });

        var newL = table.row.add( [
            id_backlog,
            fonctionnalite,
            importance,
            estimation,
            demonstration,
            notes
        ]).node();

        var currentPage = table.page();
        table.page(currentPage).draw(false);

        $(newL).attr('bgcolor', couleur);
    });
    $('#html_table').on('click', 'tr', function () {
      var name = $('td', this).eq().text();
      var id_projet = document.getElementById('id_projet').value;
        if($(this).attr('data-user-id') != 0) {
            var id_user = $(this).attr('data-user-id');
            $("#id_user_e option[value=" + id_user + "]").attr('selected','selected');
        }
      $("#id_backlog_e").val(table.row(this).data()[0]);
      $("#fonctionnalite_e").val(table.row(this).data()[1]);
      $("#importance_e").val(table.row(this).data()[2]);
      $("#estimation_e").val(table.row(this).data()[3]);
      $("#demonstration_e").val(table.row(this).data()[4]);
      $("#notes_e").val(table.row(this).data()[5]);
      $("#couleur_e").val($(this).attr("bgcolor"));
      $("#deleteBacklog").attr('data-id', table.row(this).data()[0]+"-"+id_projet);
      $('#DescModal').modal("show");
    });
    $('#deleteBacklog').on('click', function (e) {
        e.preventDefault();
        var btn = $(this);
        var id = btn.data('id');
        var content = {};

        $.ajax({
           url: '../../../../classes/ajax/addbacklog.php',
           type: 'post',
           data : 'ids=' + id + '&ajax_action=delete',
           success : function(response){
               if (response == 'deleted') {
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
                            notify.update('message', '<strong>BackLog Supprimé</strong>');
                            notify.update('type', 'success');
                            notify.update('progress', 100);
                        }, 800);
                    }else{
                        // else ?
                    }
           }
        });

    });
    $('#editBacklog').on('click', function (e) {

        e.preventDefault();
        var content = {};
        var id_projet = document.getElementById('id_projet').value;
        var id_backlog = document.getElementById('id_backlog_e').value;
        var fonctionnalite = document.getElementById('fonctionnalite_e').value;
        var importance = document.getElementById('importance_e').value;
        var estimation = document.getElementById('estimation_e').value;
        var demonstration = document.getElementById('demonstration_e').value;
        var notes = document.getElementById('notes_e').value;
        var id_user_e = document.getElementById('id_user_e').value;
        
        var couleur = document.getElementById('couleur').value;
        var id = $("#"+id_backlog+"-"+id_projet).data('id');
        var btn = $(this);

        
        $.ajax({
            url: '../../../../classes/ajax/addbacklog.php',
            type: 'post',
            data : 'id=' + id + '&id_projet=' + id_projet + '&id_backlog=' + id_backlog + '&fonctionnalite=' + fonctionnalite + '&importance=' + importance + '&estimation=' + estimation + '&demonstration=' + demonstration + '&notes=' + notes + '&id_user_e=' + id_user_e + '&couleur=' + couleur + '&ajax_action=update',
            success: function(response, status, xhr, $form) {
                    if (response == 'inserted') {
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
                            notify.update('message', '<strong>BackLog Ajouter</strong>');
                            notify.update('type', 'success');
                            notify.update('progress', 100);
                        }, 800);
                    }else{
                        // else ?
                    }   
            }
        });
    });
//Calendar
$('#saveEvent').on('click', function (e) {
    var form = $(this).closest('form');
    var content = {};
    form.ajaxSubmit({
        url: '../../../../classes/ajax/addevent.php',
        type: 'post',
        success: function(response, status, xhr, $form) {
            if (response == 'inserted') {
                $('#m_calendar').fullCalendar( 'refetchEvents' );
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
$('#editEventbtn').on('click', function (e) {
    var form = $(this).closest('form');
    var content = {};
    form.ajaxSubmit({
        url: '../../../../classes/ajax/addevent.php',
        type: 'post',
        success: function(response, status, xhr, $form) {
            if (response == 'edited') {
                $('#m_calendar').fullCalendar( 'refetchEvents' );
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
$('#deleteEventbtn').on('click', function (e) {
    var btn = $(this);
    var content = {};
    $.ajax({
            url: '../../../../classes/ajax/addevent.php',
            type: 'post',
            data : 'id=' + btn.data('id') + '&traitement=delete',
            success: function(response, status, xhr, $form) {
                    if (response == 'deleted') {
                         $('#m_calendar').fullCalendar( 'refetchEvents' );
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