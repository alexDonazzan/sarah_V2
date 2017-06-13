

// ------------------------------------------------------------------------------------------------------------------------------------
//                                 §§§      Les FONCTIONS SUPPRIMER      §§§
// ------------------------------------------------------------------------------------------------------------------------------------

//                      §§§      Supprimer un regex    §§§

$('.sup_regex').on('click', remove_field);

function remove_field (event) {
	$(this).parents('.regex_unitaire').remove();

	// Re-enumérer des champs regex
	var regex = $('.regex');
	regex.each(function (i, element) {
		$(element).find('.regex_name').each(function (i, element) {
			$(element).text('Phrase attendue : ' + (+i + 1) + '  ');
		});
	});
}
;

// --------------------------------------------------------------------------------------------

//                      §§§      Supprimer une fonction    §§§

$('.sup_fonction').on('click', remove_function);

function remove_function (event) {
	$(this).parents('.fonction').remove();
	// Fonction qui va re-enumérer les fonctions pour compter correctement
	var regex = $('.fonctions');
	var bouton_sup_fonction = $('.sup_fonction');
	regex.each(function (i, element) {

		$(element).find('h1').each(function (i, element) {
			$(element).text('Fonction : ' + (+i + 1) + '  ');
		});
	});
	regex.each(function (j, element) {
		$(element).find('.sup_fonction').each(function (j, element) {

			$(element).text('Supprimer la fonction ' + (+j + 1));
		});
	});
}
;
// ------------------------------------------------------------------------------------------------------------------------------------
//                                 §§§      Les FONCTIONS AJOUTER      §§§
// ------------------------------------------------------------------------------------------------------------------------------------

//                      §§§     Fonction qui va ajouter un formulaire de fonction     §§§

$('.add_fonction').on('click', function (event) {
	var supprimer_une_fonction = $('<div></div>')
			.attr('class', 'sup_fonction glyphicon-minus')
			.text('Supprimer la fonction');
	var supprimer_un_champ_regex = $('<div></div>')
			.attr('class', 'sup_regex glyphicon-minus')
			.text('Supprimer un regex');
	var ajouter_un_formulaire_de_fonction = $('<div></div>')
			.attr('class', 'fonction clearfix col-md-7 panel panel-default');
	var ajouter_un_titre_de_fonction = $('<h1></h1>')
			.text('Fonction ajouté');
	var ajouter_un_nom_de_fonction = $('<p></p>')
			.text('Nom de la fonction : ');
	var ajouter_un_champ_de_nom_de_fonction = $('<input/>')
			.attr('class', 'fonction_nom')
			.attr('value', "")
			.attr('type', 'text');
	var ajouter_la_question = $('<p></p>')
			.attr('class', 'question')
			.text('Phrase initiale donnée par SARAH  ');
	var ajouter_un_input_question_sarah_1 = $('<input/>')
			.attr('class', 'question_sarah')
			.attr('type', 'text')
			.attr('name', 'question_sarah_1');
	var ajout_br = $('<br/>');

	// champ expreg
	var ajouter_class_regex = $('<div></div>')
			.attr('class', 'regex');
	var ajouter_class_regex_unitaire = $('<div></div>')
			.attr('class', 'regex_unitaire');
	var ajouter = $('<span></span>')
			.attr('class', 'regex_name')
			.html('Mot ou phrase attendu par la machine : ');
	var ajouter_input = $('<input/>')
			.attr('class', 'mot_cle')
			.attr('type', 'text')
			.attr('name', 'question_sarah_1_1');


	var ajout_select_action1 = $('<label></label>')
			.attr('for', 'cbox1');
	var ajout_input_rep_checked = $('<input/>')
			.attr('type', 'checkbox')
			.attr('class', 'reponse_sarah_checked')
			.attr('name', 'reponse_a_donner');
	var ajout_input_rep = $('<input/>')
			.attr('type', 'text')
			.attr('class', 'reponse_sarah')
			.attr('name', 'reponse_a_donner');

        



// Partie pour l'executable
	var ajout_select_action3 = $('<label></label>')
			.attr('for', 'cbox3');
	var ajout_input_exec_checked = $('<input/>')
			.attr('type', 'checkbox')
			.attr('class', 'executable_checked');
	var ajout_input_exec = $('<input/>')
			.attr('type', 'text')
			.attr('class', 'executable')
			.attr('name', 'executable');



	// Bouton pour ajouter un champ expreg
	var ajout_bouton_regex = $('<div></div>')
			.attr('class', 'add_regex glyphicon-plus')
			.text('Ajouter une phrase attendue');

	$(this).prev('.fonctions').append(ajouter_un_formulaire_de_fonction);
	ajouter_un_formulaire_de_fonction.append(supprimer_une_fonction);
	ajouter_un_formulaire_de_fonction.append(ajouter_un_titre_de_fonction);
	ajouter_un_formulaire_de_fonction.append(ajouter_un_nom_de_fonction);
	ajouter_un_nom_de_fonction.append(ajouter_un_champ_de_nom_de_fonction);
	ajouter_un_formulaire_de_fonction.append(ajouter_la_question);
	ajouter_la_question.append(ajouter_un_input_question_sarah_1);

	ajouter_un_formulaire_de_fonction.append(ajout_br);
	ajouter_un_formulaire_de_fonction.append(ajouter_class_regex);
	ajouter_class_regex.append(ajouter_class_regex_unitaire); 
	ajouter_class_regex_unitaire.append(ajouter);
	ajouter_class_regex_unitaire.append(ajouter_input);
	ajouter_class_regex_unitaire.append(ajout_br);

	ajouter_class_regex_unitaire.append(ajout_select_action1);
	ajout_select_action1.append(ajout_input_rep_checked);
	ajout_select_action1.append('Donnera une réponse');
	ajout_select_action1.append(ajout_input_rep);
	// liste des fonctions

	// endof liste des fonctions
	ajouter_class_regex_unitaire.append(ajout_br);
	ajouter_class_regex_unitaire.append(ajout_select_action3);
	ajout_select_action3.append(ajout_input_exec_checked);
	ajout_select_action3.append('Redirige vers une autre fonction');
	ajout_select_action3.append(ajout_input_exec);


	ajouter_class_regex_unitaire.append(supprimer_un_champ_regex); 
	ajouter_class_regex_unitaire.append(ajout_br); 
	ajouter_un_formulaire_de_fonction.append(ajouter_class_regex)
			.append(ajout_bouton_regex);

	$('.sup_fonction').off('click');
	$('.sup_fonction').on('click', remove_function);
	$('.sup_regex').off('click');
	$('.sup_regex').on('click', remove_field);
	$('.add_regex').off('click');
	$('.add_regex').on('click', add_regex);
	// ET mettre add_regex

	// Fonction qui va re-enumérer les fonctions pour compter correctement
	var regex = $('.fonctions');

	regex.each(function (i, element) {
		$(element).find('h1').each(function (i, element) {
			$(element).text('Fonction : ' + (+i + 1) + '  ');
		});
	});
	// --------------------------  crée les bons names pour gérer le submit ------------------------------

	update_names(); 
	// champ nom de la fonction
//	regex.each(function (i, element) {
//		$(element).find('.fonction_nom').each(function (i, element) {
//			$(element).attr('name', 'fonction[' + (+i) + '][nom]');
//		});
//
//		// champ question de la fonction
//		$(element).find('.question_sarah').each(function (i, element) {
//			$(element).attr('name', 'fonction[' + (+i) + '][question]');
//		});
//
//		// Les champs des mots clés (la partie imbriquée)
//		$(element).find('.regex_unitaire').each(function (j, element) {
//			$(element).find('.mot_cle').each(function (j, element) {
//				$(element).attr('name', 'fonction[' + i + '][' + j + '][mot_cle]');
//			});
//			$(element).find('.reponse_sarah').each(function (j, element) {
//				$(element).attr('name', 'fonction[' + i + '][' + j + '][reponse_sarah]');
//			});
//			$(element).find('.redirection_fonction').each(function (j, element) {
//				$(element).attr('name', 'fonction[' + i + '][' + j + '][redirection]');
//			});
//			$(element).find('.executable').each(function (j, element) {
//				$(element).attr('name', 'fonction[' + i + '][' + j + '][executable]');
//			});
//		});
//	});


	$('input.fonction_nom').on('keyup', function (event) {
		$(this).parent().prev('h1').text('Fonction : ' + $(this).val());
	});

	regex.each(function (j, element) {
		$(element).find('.sup_fonction').each(function (j, element) {

			$(element).text('Supprimer la fonction ' + (+j + 1));
		});
	});
});



// --------------------------------------------------------------------------------------------

$('.add_regex').on('click', add_regex);

function add_regex (event) {
	var ajouter_div_unitaire = $('<div></div>')
			.attr('class', 'regex_unitaire');
	var ajouter = $('<span></span>')
			.attr('class', 'regex_name');
	var ajouter_input = $('<input/>')
			.attr('class', 'mot_cle')
			.attr('type', 'text')
			.attr('name', 'motcle_fonction');

	var ajout_select_action = $('<select></select>')
			.attr('name', 'action_a_effectuer_1_2');
	var ajout_option_func = $('<option></option>')
			.attr('value', 'func')
			.text('Envoyer vers une fonction');
	var ajout_option_question = $('<option></option>')
			.attr('value', 'question')
			.text('Répondre à la question');
	var ajout_br = $('<br/>');
	// Bouton pour supprimer le champ
	var bouton_supprimer_regex = $('<div></div>')
			.attr('class', 'sup_regex glyphicon-minus')
			.text('Supprimer le regex');

// les checkbox :

	var ajout_select_action1 = $('<label></label>')
			.attr('for', 'cbox1');
	var ajout_input_rep_checked = $('<input/>')
			.attr('type', 'checkbox')
			.attr('class', 'reponse_sarah_checked')
			.attr('name', 'reponse_a_donner');
	var ajout_input_rep = $('<input/>')
			.attr('type', 'text')
			.attr('class', 'reponse_sarah')
			.attr('name', 'reponse_a_donner');


// Partie pour l'executable
	var ajout_select_action3 = $('<label></label>')
			.attr('for', 'cbox3');
	var ajout_input_exec_checked = $('<input/>')
			.attr('type', 'checkbox')
			.attr('class', 'executable_checked');
	var ajout_input_exec = $('<input/>')
			.attr('type', 'text')
			.attr('class', 'executable')
			.attr('name', 'executable');



	$(this).prev('.regex').append(ajouter_div_unitaire);
	ajouter_div_unitaire.append(ajouter);
	ajouter_div_unitaire.append(ajouter_input);
	ajouter_div_unitaire.append(ajout_br);
	ajouter_div_unitaire.append(ajout_select_action1);
	ajout_select_action1.append(ajout_input_rep_checked);
	ajout_select_action1.append('Donnera une réponse');
	ajout_select_action1.append(ajout_input_rep);

	ajouter_div_unitaire.append(ajout_select_action3);
	ajout_select_action3.append(ajout_input_exec_checked);
	ajout_select_action3.append('Redirige vers une autre fonction');
	ajout_select_action3.append(ajout_input_exec);
        
	ajouter_div_unitaire.append(bouton_supprimer_regex);
	ajouter_div_unitaire.append(ajout_br);

	var regex = $('.fonction');
	regex.each(function (i, element) {
		$(element).find('.regex_name').each(function (i, element) {
			$(element).text('Réponse attendue : ' + (+i + 1) + '  ');
		});
	});
	$('.sup_regex').off('click');
	$('.sup_regex').on('click', remove_field);


	// --------------------------  crée les bons names pour gérer le submit ------------------------------
	update_names();
}
;

// --------------------------  crée les bons names pour gérer le submit ------------------------------

function update_names () {
	$('.fonction').each(function (i, element) {
		$(element).find('.fonction_nom').attr('name', 'fonction[' + (+i) + '][nom]');

		// champ question de la fonction
		$(element).find('.question_sarah').attr('name', 'fonction[' + (+i)
				+ '][question]');

		// Les champs des mots clés (la partie imbriquée)
		$(element).find('.regex_unitaire').each(function (j, element) {
			$(element).find('.mot_cle').attr('name', 'fonction[' + (+i) + '][regex][' + (+j)
					+ '][mot_cle]');

			$(element).find('.reponse_sarah').attr('name', 'fonction[' + (+i) + '][regex]['
					+ (+j) + '][reponse_sarah]');

			$(element).find('.redirection_fonction').attr('name', 'fonction[' + (+i)
					+ '][regex][' + (+j) + '][redirection]');

			$(element).find('.executable').attr('name', 'fonction[' + (+i)
					+ '][regex][' + (+j)
					+ '][executable]'); 
		});
	});
}

// --------------------------------------------------------------------------------------------

// Fonction qui va énumérer les expressions régulières
var regex = $('.regex');
regex.each(function (i, element) {
	$(element).find('.regex_name').each(function (i, element) {
		$(element).text('Réponse attendue ' + (+i + 1));
	});
});

// Fonction qui va énumérer les fonctions
var fonction = $('h1');
fonction.each(function (i, element) {
	$(element).text('Fonction numéro ' + (+i + 1));
});
