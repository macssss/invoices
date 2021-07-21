
jQuery( function($) {
	
	window.current_lang = $("html").attr("lang");
	
	window.labels_all = {
		
		'pl-PL' : {
			'months-data'                    : ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
			'weekdays-data'                  : ['Nie', 'Pn', 'Wt', 'Śr', 'Czw', 'Pt', 'Sob'],
			
			'section-with-more-link'         : 'Aby zwinąć kliknij tu...',
			'table-scroll'                   : 'Przewiń tabelę',
			'select-file'                    : 'Wybierz plik z dysku',
		},
		
		'en-US' : {
			'months-data'                    : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			'weekdays-data'                  : ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
			
			'section-with-more-link'         : 'To collapse click here...',
			'table-scroll'                   : 'Scroll the table',
			'select-file'                    : 'Select a file from disk',
		},
		
		'de-DE' : {
			'months-data'                    : ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
			'weekdays-data'                  : ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
			
			'section-with-more-link'         : 'Zum Zusammenbruch hier klicken...',
			'table-scroll'                   : 'Scrollen Sie durch die Tabelle',
			'select-file'                    : 'Wählen Sie eine Datei von der Festplatte',
		},
		
		'fr-FR' : {
			'months-data'                    : ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
			'weekdays-data'                  : ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di'],
			
			'section-with-more-link'         : 'Pour réduire, cliquez ici...',
			'table-scroll'                   : 'Faites défiler le tableau',
			'select-file'                    : 'Sélectionnez un fichier sur le disque',
		}
	};
	
	
	window.labels = labels_all[current_lang] ? labels_all[current_lang] : labels_all['en-US'];
	
});