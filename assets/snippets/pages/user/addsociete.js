//== Class Definition
var SnippetUser = function() {
    var handleAddSocieteSubmit = function() {
        $('#submit_societe').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $("form#user_societe");

            form.validate({
                rules: {
                    raison_social: {
                        required: true
                    },
                    prenom: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength:10,
                        maxlength:10
                    },
                },
                highlight: function(element) {
                    $(element).closest('.controller').addClass('has-danger');
                },
                unhighlight: function(element) {
                    $(element).closest('.controller').removeClass('has-danger');
                },
                errorClass: 'form-control-feedback',
                errorPlacement: function(error, element) {
                    if(element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            if (!form.valid()) {
                return;
            }else{
              form.submit();
            }

        });
    }

    //== Public Functions
    return {
        // public functions
        init: function() {
            handleAddSocieteSubmit();
        }
    };
}();

//== Class Initialization
jQuery(document).ready(function() {
    SnippetUser.init();
});


jQuery.extend(jQuery.validator.messages, {
    required: "Ce champ est obligatoire.",
    remote: "Veuillez corriger ce champ.",
    email: "Veuillez fournir une adresse électronique valide.",
    url: "Veuillez fournir une adresse URL valide.",
    date: "Veuillez fournir une date valide.",
    dateISO: "Veuillez fournir une date valide (ISO).",
    number: "Veuillez fournir un numéro valide.",
    digits: "Veuillez fournir seulement des chiffres.",
    creditcard: "Veuillez fournir un numéro de carte de crédit valide.",
    equalTo: "Veuillez fournir encore la même valeur.",
    notEqualTo: "Veuillez fournir une valeur différente, les valeurs ne doivent pas être identiques.",
    extension: "Veuillez fournir une valeur avec une extension valide.",
    maxlength: $.validator.format( "Veuillez fournir au plus {0} caractères." ),
    minlength: $.validator.format( "Veuillez fournir au moins {0} caractères." ),
    rangelength: $.validator.format( "Veuillez fournir une valeur qui contient entre {0} et {1} caractères." ),
    range: $.validator.format( "Veuillez fournir une valeur entre {0} et {1}." ),
    max: $.validator.format( "Veuillez fournir une valeur inférieure ou égale à {0}." ),
    min: $.validator.format( "Veuillez fournir une valeur supérieure ou égale à {0}." ),
    step: $.validator.format( "Veuillez fournir une valeur multiple de {0}." ),
    maxWords: $.validator.format( "Veuillez fournir au plus {0} mots." ),
    minWords: $.validator.format( "Veuillez fournir au moins {0} mots." ),
    rangeWords: $.validator.format( "Veuillez fournir entre {0} et {1} mots." ),
    letterswithbasicpunc: "Veuillez fournir seulement des lettres et des signes de ponctuation.",
    alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages.",
    lettersonly: "Veuillez fournir seulement des lettres.",
    nowhitespace: "Veuillez ne pas inscrire d'espaces blancs.",
    ziprange: "Veuillez fournir un code postal entre 902xx-xxxx et 905-xx-xxxx.",
    integer: "Veuillez fournir un nombre non décimal qui est positif ou négatif.",
    vinUS: "Veuillez fournir un numéro d'identification du véhicule (VIN).",
    dateITA: "Veuillez fournir une date valide.",
    time: "Veuillez fournir une heure valide entre 00:00 et 23:59.",
    phoneUS: "Veuillez fournir un numéro de téléphone valide.",
    phoneUK: "Veuillez fournir un numéro de téléphone valide.",
    mobileUK: "Veuillez fournir un numéro de téléphone mobile valide.",
    strippedminlength: $.validator.format( "Veuillez fournir au moins {0} caractères." ),
    email2: "Veuillez fournir une adresse électronique valide.",
    url2: "Veuillez fournir une adresse URL valide.",
    creditcardtypes: "Veuillez fournir un numéro de carte de crédit valide.",
    ipv4: "Veuillez fournir une adresse IP v4 valide.",
    ipv6: "Veuillez fournir une adresse IP v6 valide.",
    require_from_group: $.validator.format( "Veuillez fournir au moins {0} de ces champs." ),
    nifES: "Veuillez fournir un numéro NIF valide.",
    nieES: "Veuillez fournir un numéro NIE valide.",
    cifES: "Veuillez fournir un numéro CIF valide.",
    postalCodeCA: "Veuillez fournir un code postal valide."
});