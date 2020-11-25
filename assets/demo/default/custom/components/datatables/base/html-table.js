//== Class definition

var DatatableHtmlTableDemo = function() {
  //== Private functions

  // demo initializer
  var demo = function() {
    

    var datatable = $('.m-datatable').mDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#generalSearch'),
      },
      columns: [
        {
          field: 'Deposit Paid',
          type: 'number',
        },
        {
          field: 'Order Date',
          type: 'date',
          format: 'YYYY-MM-DD',
        },
      ],
      translate: {
        records: {
            processing: 'Traitement en cours...',
            noRecords: 'Aucun &eacute;l&eacute;ment &agrave; afficher'
        },
        toolbar: {
            pagination: {
                items: {
                    default: {
                        first: 'Premier',
                        prev: 'Pr&eacute;c&eacute;dent',
                        next: 'Suivant',
                        last: 'Dernier',
                        more: 'More pages',
                        input: 'Page number',
                        select: 'Select page size'
                    },
                    info: "Affichage de l'&eacute;l&eacute;ment {{start}} &agrave; {{end}} sur {{total}} &eacute;l&eacute;ments"
                }
            }
        }
      }
    });
  };

  return {
    //== Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableHtmlTableDemo.init();
});