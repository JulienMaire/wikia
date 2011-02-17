<?php

$messages = array();

$messages['en'] = array(
	'phalanx-desc' => 'Phalanx is an Integrated Spam Defense Mechanism',
	'phalanx' => 'Phalanx',
	'phalanx-title' => 'Phalanx - Integrated Spam Defense Mechanism',
	'phalanx-type-content' => 'page content',
	'phalanx-type-summary' => 'page summary',
	'phalanx-type-title' => 'page title',
	'phalanx-type-user' => 'user',
	'phalanx-type-answers-question-title' => 'question title',
	'phalanx-type-answers-recent-questions' => 'recent questions',
	'phalanx-type-wiki-creation' => 'wiki creation',
	'phalanx-add-block' => 'Apply block',
	'phalanx-edit-block' => 'Save block',
	'phalanx-label-filter' => 'Filter:',
	'phalanx-label-reason' => 'Reason:',
	'phalanx-label-expiry' => 'Expiry:',
	'phalanx-label-type' => 'Type:',
	'phalanx-label-lang' => 'Language:',
	'phalanx-view-type' => 'Type of block...',
	'phalanx-view-blocker' => 'Search by filter text:',
	'phalanx-view-blocks' => 'Search filters',
	'phalanx-view-id' => 'Get filter by ID:',
	'phalanx-view-id-submit' => 'Get filter',
	'phalanx-expire-durations' => '1 hour,2 hours,4 hours,6 hours,1 day,3 days,1 week,2 weeks,1 month,3 months,6 months,1 year,infinite', // FIXME: no L10n possible; see core block/protect implementations for proper solution.
	'phalanx-format-text' => 'plain text',
	'phalanx-format-regex' => 'regex',
	'phalanx-format-case' => 'case sensitive',
	'phalanx-format-exact' => 'exact',
	'phalanx-tab-main' => 'Manage Filters',
	'phalanx-tab-secondary' => 'Test Filters',

	'phalanx-block-success' => 'The block was successfully added',
	'phalanx-block-failure' => 'There was an error during adding the block',
	'phalanx-modify-success' => 'The block was successfully modified',
	'phalanx-modify-failure' => 'There was an error modifying the block',
	'phalanx-modify-warning' => 'You are editing block ID #$1.
Clicking "{{int:phalanx-add-block}}" will save your changes!',
	'phalanx-test-description' => 'Test provided text against current blocks.',
	'phalanx-test-submit' => 'Test',
	'phalanx-test-results-legend' => 'Test results',
	'phalanx-display-row-blocks' => 'blocks: $1',
	'phalanx-display-row-created' => "created by '''$1''' on $2",

	'phalanx-link-unblock' => 'unblock',
	'phalanx-link-modify' => 'modify',
	'phalanx-link-stats' => 'stats',
	'phalanx-reset-form' => 'Reset form',

	'phalanx-legend-input' => 'Create or modify filter',
	'phalanx-legend-listing' => 'Currently applied filters',
	'phalanx-unblock-message' => 'Block ID #$1 was successfully removed',

	'phalanx-help-type-content' => 'This filter prevents an edit from being saved, if its content matches any of the blacklisted phrases.',
	'phalanx-help-type-summary' => 'This filter prevents an edit from being saved, if the summary given matches any of the blacklisted phrases.',
	'phalanx-help-type-title' => 'This filter prevents a page from being created, if its title matches any of the blacklisted phrases.

	 It does not prevent a pre-existing page from being edited.',
	'phalanx-help-type-user' => 'This filter blocks a user (exactly the same as a local MediaWiki block), if the name or IP address matches one of the blacklisted names or IP addresses.',
	'phalanx-help-type-wiki-creation' => 'This filter prevents a wiki from being created, if its name or URL matches any blacklisted phrase.',
	'phalanx-help-type-answers-question-title' => 'This filter blocks a question (page) from being created, if its title matches any of the blacklisted phrases.

Note: only works on Answers-type wikis.',
	'phalanx-help-type-answers-recent-questions' => 'This filter prevents questions (pages) from being displayed in a number of outputs (widgets, lists, tag-generated listings).
It does not prevent those pages from being created.

Note: works only on Answers-type wiks.',

	'phalanx-user-block-reason-ip' => 'This IP address is prevented from editing due to vandalism or other disruption by you or by someone who shares your IP address.
If you believe this is in error, please [[Special:Contact|contact Wikia]].',
	'phalanx-user-block-reason-exact' => 'This username or IP address is prevented from editing due to vandalism or other disruption.
If you believe this is in error, please [[Special:Contact|contact Wikia]].',
	'phalanx-user-block-reason-similar' => 'This username is prevented from editing due to vandalism or other disruption by a user with a similar name.
Please create an alternate user name or [[Special:Contact|contact Wikia]] about the problem.',

	'phalanx-title-move-summary' => 'The reason you entered contained a blocked phrase.',
	'phalanx-content-spam-summary' => "The text was found in the page's summary.",

	'phalanx-stats-title' => 'Phalanx Stats',
	'phalanx-stats-block-notfound' => 'block ID not found',
	'phalanx-stats-table-id' => 'Block ID',
	'phalanx-stats-table-user' => 'Added by',
	'phalanx-stats-table-type' => 'Type',
	'phalanx-stats-table-create' => 'Created',
	'phalanx-stats-table-expire' => 'Expires',
	'phalanx-stats-table-exact' => 'Exact',
	'phalanx-stats-table-regex' => 'Regex',
	'phalanx-stats-table-case' => 'Case',
	'phalanx-stats-table-language' => 'Language',
	'phalanx-stats-table-text' => 'Text',
	'phalanx-stats-table-reason' => 'Reason',
	'phalanx-stats-row' => "at $4, filter type '''$1''' blocked '''$2''' on $3",
	'phalanx-stats-row-per-wiki' => "user '''$2''' was blocked on '''$4''' by filter ID '''$3''' ($5) (type: '''$1''')",

	'phalanx-rule-log-name' => 'Phalanx rules log',
	'phalanx-rule-log-header' => 'This is a log of changes to phalanx rules.',
	'phalanx-rule-log-add' => 'Phalanx rule added: $1',
	'phalanx-rule-log-edit' => 'Phalanx rule edited: $1',
	'phalanx-rule-log-delete' => 'Phalanx rule deleted: $1',
	'phalanx-rule-log-details' => 'Filter: "$1", type: "$2", reason: "$3"',

	'phalanx-stats-table-wiki-id' => 'Wiki ID',
	'phalanx-stats-table-wiki-name' => 'Wiki Name',
	'phalanx-stats-table-wiki-url' => 'Wiki URL',
	'phalanx-stats-table-wiki-last-edited' => 'Last edited',
);

/** Breton (Brezhoneg)
 * @author Y-M D
 */
$messages['br'] = array(
	'phalanx-type-user' => 'implijer',
	'phalanx-label-filter' => 'Sil :',
	'phalanx-label-reason' => 'Abeg :',
	'phalanx-label-expiry' => 'Termen :',
	'phalanx-label-type' => 'Seurt',
	'phalanx-label-lang' => 'Yezh :',
	'phalanx-test-submit' => 'Amprouiñ',
	'phalanx-link-unblock' => 'distankañ',
	'phalanx-link-modify' => 'kemmañ',
	'phalanx-link-stats' => 'stadegoù',
	'phalanx-stats-table-type' => 'Seurt',
	'phalanx-stats-table-create' => 'Krouet',
	'phalanx-stats-table-language' => 'Yezh',
	'phalanx-stats-table-text' => 'Testenn',
	'phalanx-stats-table-reason' => 'Abeg',
	'phalanx-stats-table-wiki-last-edited' => 'Kemmet da ziwezhañ',
);

/** German (Deutsch)
 * @author George Animal
 */
$messages['de'] = array(
	'phalanx-type-user' => 'Benutzer',
	'phalanx-label-reason' => 'Grund:',
	'phalanx-label-lang' => 'Sprache:',
	'phalanx-stats-table-language' => 'Sprache',
	'phalanx-stats-table-reason' => 'Grund',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'phalanx-type-user' => 'Benotzer',
	'phalanx-test-submit' => 'Test',
	'phalanx-stats-table-language' => 'Sprooch',
	'phalanx-stats-table-text' => 'Text:',
	'phalanx-stats-table-reason' => 'Grond',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'phalanx-desc' => 'Phalanx е вграден систем за одбрана од спам',
	'phalanx' => 'Phalanx',
	'phalanx-title' => 'Phalanx - вграден систем за одбрана од спам',
	'phalanx-type-content' => 'содржина на страницата',
	'phalanx-type-summary' => 'опис на страницата',
	'phalanx-type-title' => 'наслов на страницата',
	'phalanx-type-user' => 'корисник',
	'phalanx-type-answers-question-title' => 'наслов на прашањето',
	'phalanx-type-answers-recent-questions' => 'скорешни прашања',
	'phalanx-type-wiki-creation' => 'создавање на вики',
	'phalanx-add-block' => 'Примени блок',
	'phalanx-edit-block' => 'Зачувај блок',
	'phalanx-label-filter' => 'Филтер:',
	'phalanx-label-reason' => 'Причина:',
	'phalanx-label-expiry' => 'Истекува:',
	'phalanx-label-type' => 'Тип:',
	'phalanx-label-lang' => 'Јазик:',
	'phalanx-view-type' => 'Тип на блок...',
	'phalanx-view-blocker' => 'Пребарај по филтриран текст:',
	'phalanx-view-blocks' => 'Пребарај филтри',
	'phalanx-view-id' => 'Дај филтер по назнака:',
	'phalanx-view-id-submit' => 'Дај филтер',
	'phalanx-format-text' => 'прост текст',
	'phalanx-format-regex' => 'рег. израз',
	'phalanx-format-case' => 'разликувај гол/мал букв.',
	'phalanx-format-exact' => 'точно',
	'phalanx-tab-main' => 'Раководење со филтри',
	'phalanx-tab-secondary' => 'Испробај филтри',
	'phalanx-block-success' => 'Блокот е успешо додаден',
	'phalanx-block-failure' => 'Се појави грешка при додавањето на блокот',
	'phalanx-modify-success' => 'Блокот е успешно изменет',
	'phalanx-modify-failure' => 'Се појави грешка при менувањето на блокот',
	'phalanx-modify-warning' => 'Го уредувате блокот со назнака бр. $1.
Ако стиснете на „{{int:phalanx-add-block}}“ ќе ги зачувате промените!',
	'phalanx-test-description' => 'Испробајте дали тековните блокови реагираат на даден текст',
	'phalanx-test-submit' => 'Испробај',
	'phalanx-test-results-legend' => 'Исход од испробувањето',
	'phalanx-display-row-blocks' => 'блокови: $1',
	'phalanx-display-row-created' => "создадено од '''$1''' на $2",
	'phalanx-link-unblock' => 'одблокирај',
	'phalanx-link-modify' => 'измени',
	'phalanx-link-stats' => 'статистики',
	'phalanx-reset-form' => 'Исчисти го образецот',
	'phalanx-legend-input' => 'Создај или измени филтер',
	'phalanx-legend-listing' => 'Филтри во тековна примена',
	'phalanx-unblock-message' => 'Блокот со назнака бр. $1 е успешно отстранет',
	'phalanx-help-type-content' => 'Овој филтер спречува зачувување на уредување ако неговата содржина одговара на некој израз наведен на црниот список.',
	'phalanx-help-type-summary' => 'Овој филтер спречува зачувување на уредување ако неговиот опис одговара на некој израз наведен на црниот список.',
	'phalanx-help-type-title' => 'Овој филтер спречува создавање на страница ако нејзиниот наслов одговара на некој израз наведен на црниот список.

Филтерот не спречува уредување на веќе постоечка страница.',
	'phalanx-help-type-user' => 'Овој филтер блокира корисник (сосем исто како локален блок на МедијаВики) ако неговото име или IP-адреса одговара на некое име или IP-адреса наведена на црниот список.',
	'phalanx-help-type-wiki-creation' => 'Овој филтер спречува создавање на вики ако неговото име или URL-адреса одговара на нешто од наведеното на црниот список.',
	'phalanx-help-type-answers-question-title' => 'Овој филтер блокира создавање на прашање (страница) ако насловот одговара на некој од изразите наведени на црниот список.

Напомена: работи само на викија за одговорање на прашања',
	'phalanx-help-type-answers-recent-questions' => 'Овој филтер спречува приказ на прашања (страници) во низа изводи (посреднички елементи, списоци, пописи направени со ознаки). 
Филтерот не спречува создавање на таквите страници.

Напомена: работи само на викија за одговорање на прашања',
	'phalanx-user-block-reason-ip' => 'Оваа IP-адреса е спречена да уредува поради вандализам или друго нарушување од страна на вас или некој што ја користи вашата IP-адреса.
Доколку сметате дека со ова правиме грешка, [[Special:Contact|контактирајте ја Викија]].',
	'phalanx-user-block-reason-exact' => 'Ова корисничко име или IP-адреса е спречена да уредува поради вандализам или друго нарушување.
Доколку сметате дека со ова правиме грешка, [[Special:Contact|контактирајте ја Викија]].',
	'phalanx-user-block-reason-similar' => 'Ова корисничко име е спречено да уредува поради вандализам или друго нарушување од страна на корисник со слично име.
Направете друго корисничко име, или пак [[Special:Contact|известете ја Викија]] за проблемот.',
	'phalanx-title-move-summary' => 'Причината е тоа што внесовте блокиран израз.',
	'phalanx-content-spam-summary' => 'Текстот е пронајден во описот на страницата.',
	'phalanx-stats-title' => 'Статистики за Phalanx',
	'phalanx-stats-block-notfound' => 'не е пронајдена таква назнака на блок',
	'phalanx-stats-table-id' => 'Назнака на блокот',
	'phalanx-stats-table-user' => 'Додадено од',
	'phalanx-stats-table-type' => 'Тип',
	'phalanx-stats-table-create' => 'Создадено',
	'phalanx-stats-table-expire' => 'Истекува',
	'phalanx-stats-table-exact' => 'Точно',
	'phalanx-stats-table-regex' => 'Рег. израз',
	'phalanx-stats-table-case' => 'Регистар',
	'phalanx-stats-table-language' => 'Јазик',
	'phalanx-stats-table-text' => 'Текст',
	'phalanx-stats-table-reason' => 'Причина',
	'phalanx-stats-row' => "во $4, филтерот од типот '''$1''' го блокирал корисникот '''$2''' на $3",
	'phalanx-stats-row-per-wiki' => "корисникот '''$2''' е блокиран на '''$4''' од филтерот со назнака '''$3''' ($5) (тип: '''$1''')",
	'phalanx-rule-log-name' => 'Дневник на правила за Phalanx',
	'phalanx-rule-log-header' => 'Ова е дневник на измените во правилата на Phalanx.',
	'phalanx-rule-log-add' => 'Додадено правилото: $1',
	'phalanx-rule-log-edit' => 'Изменето правилото: $1',
	'phalanx-rule-log-delete' => 'Избришано правилото: $1',
	'phalanx-rule-log-details' => 'Филтер: „$1“, тип: „$2“, причина: „$3“',
	'phalanx-stats-table-wiki-id' => 'Назнака на викито',
	'phalanx-stats-table-wiki-name' => 'Име на викито',
	'phalanx-stats-table-wiki-url' => 'URL на викито',
	'phalanx-stats-table-wiki-last-edited' => 'Последно уредување',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'phalanx-desc' => 'Phalanx  is een Geïntegreerd Spamafweersysteem',
	'phalanx' => 'Phalanx',
	'phalanx-title' => 'Phalanx - Geïntegreerd Spamafweersysteem',
	'phalanx-type-content' => 'paginainhoud',
	'phalanx-type-summary' => 'paginasamenvatting',
	'phalanx-type-title' => 'paginanaam',
	'phalanx-type-user' => 'gebruiker',
	'phalanx-type-answers-question-title' => 'vraag',
	'phalanx-type-answers-recent-questions' => 'recente vragen',
	'phalanx-type-wiki-creation' => 'wikiaanmaak',
	'phalanx-add-block' => 'Blokkade toepassen',
	'phalanx-edit-block' => 'Blokkade opslaan',
	'phalanx-label-filter' => 'Filter:',
	'phalanx-label-reason' => 'Reden:',
	'phalanx-label-expiry' => 'Vervalt:',
	'phalanx-label-type' => 'Type:',
	'phalanx-label-lang' => 'Taal:',
	'phalanx-view-type' => 'Type blokkade...',
	'phalanx-view-blocker' => 'Zoeken op filtertekst:',
	'phalanx-view-blocks' => 'Filters doorzoeken',
	'phalanx-view-id' => 'Filter op nummer zoeken:',
	'phalanx-view-id-submit' => 'Filter zoeken',
	'phalanx-format-text' => 'platte tekst',
	'phalanx-format-regex' => 'reguliere expressie',
	'phalanx-format-case' => 'hoofdlettergevoelig',
	'phalanx-format-exact' => 'precies',
	'phalanx-tab-main' => 'Filters beheren',
	'phalanx-tab-secondary' => 'Filters testen',
	'phalanx-block-success' => 'De blokkade is toegevoegd',
	'phalanx-block-failure' => 'Er is een fout opgetreden tijdens het toevoegen van de blokkade',
	'phalanx-modify-success' => 'De blokkade is aangepast',
	'phalanx-modify-failure' => 'Er is een fout opgetreden tijdens het aanpassen van de blokkade',
	'phalanx-modify-warning' => 'U bent blokkadenummer #$1 aan het bewerken.
Als u op "{{int:phalanx-add-block}}" klikt, worden uw wijzigingen opgeslagen.',
	'phalanx-test-description' => 'Opgegeven tekst tegen huidige blokkades testen.',
	'phalanx-test-submit' => 'Testen',
	'phalanx-test-results-legend' => 'Testresulaten',
	'phalanx-display-row-blocks' => 'blokkades: $1',
	'phalanx-display-row-created' => "aangemaakt door '''$1''' op $2",
	'phalanx-link-unblock' => 'blokkade opheffen',
	'phalanx-link-modify' => 'aanpassen',
	'phalanx-link-stats' => 'statistieken',
	'phalanx-reset-form' => 'Formulier opnieuw instellen',
	'phalanx-legend-input' => 'Filter aanmaken of aanpassen',
	'phalanx-legend-listing' => 'Huidige actieve filters',
	'phalanx-unblock-message' => 'Blokkadenummer #$1 is verwijderd',
	'phalanx-help-type-content' => 'Dit filter voorkomt dat een bewerking wordt opgeslagen als in de inhoud tekst voorkomt die op de zwarte lijst staat.',
	'phalanx-help-type-summary' => 'Dit filter voorkomt dat een bewerking wordt opgeslagen als in de samenvatting tekst voorkomt die op de zwarte lijst staat.',
	'phalanx-help-type-title' => 'Dit filter voorkomt dat een pagina wordt aangemaakt als in de paginanaam tekst voorkomt die op de zwarte lijst staat.

Dit filter voorkomt niet dat een bestaande pagina bewerkt kan worden.',
	'phalanx-help-type-user' => 'Dit filter blokkeert een gebruiker (net zoals lokale blokkades in MediaWiki) als de gebruikersnaam of het IP-adres voorkomt in de zwarte lijst met namen en IP-adressen.',
	'phalanx-help-type-wiki-creation' => 'Dit filter voorkomt dat een wiki wordt aangemaakt als tekst uit de naam of de URL op de zwarte lijst staat.',
	'phalanx-help-type-answers-question-title' => "Dit filter voorkomt dat een pagina wordt aangemaakt als tekst uit de paginanaam op de zwarte lijst staat.

Dit werkt alleen voor Antwoordwiki's.",
	'phalanx-help-type-answers-recent-questions' => "Dit filter voorkomt dat vragen (pagina's) worden weergegeven in een aantal lijsten (widgets, lijsten, labelgebaseerde lijsten).
Het voorkomt niet dat pagina's worden aangemaakt.

Dit werkt alleen voor Antwoordwiki's.",
	'phalanx-user-block-reason-ip' => 'Gebruikers vanaf dit IP-adres mogen niet bewerken wegens vandalisme of verstoring door u of door iemand met hetzelfde IP-adres.
Als u denk dat dit ten onrechte is, [[Special:Contact|neem dan contact op met Wikia]].',
	'phalanx-user-block-reason-exact' => 'Deze (anonieme) gebruiker mag niet bewerken wegens vandalisme of verstoring.
Als u denkt dat dit ten onrechte is, [[Special:Contact|neem dan contact op met Wikia]]',
	'phalanx-user-block-reason-similar' => 'Deze gebruiker mag niet bewerken wegens vandalisme of verstoring door een gebruiker met een gelijkluidende naam.
Kies een andere gebruikersnaam of [[Special:Contact|neem contact op met Wikia]] over het probleem.',
	'phalanx-title-move-summary' => 'De samenvatting die u hebt opgegeven bevat niet toegelaten tekst.',
	'phalanx-content-spam-summary' => 'De tekst is aangetroffen in de bewerkingssamenvatting.',
	'phalanx-stats-title' => 'Phalanx-statistieken',
	'phalanx-stats-block-notfound' => 'blokkadenummer niet gevonden',
	'phalanx-stats-table-id' => 'Blokkadenummer',
	'phalanx-stats-table-user' => 'Toegevoegd door',
	'phalanx-stats-table-type' => 'Type',
	'phalanx-stats-table-create' => 'Aangemaakt',
	'phalanx-stats-table-expire' => 'Vervalt',
	'phalanx-stats-table-exact' => 'Precies',
	'phalanx-stats-table-regex' => 'Reguliere expressie',
	'phalanx-stats-table-case' => 'Hoofd- of kleine letters',
	'phalanx-stats-table-language' => 'Taal',
	'phalanx-stats-table-text' => 'Tekst',
	'phalanx-stats-table-reason' => 'Reden',
	'phalanx-stats-row' => "om $4 heeft filtertype '''$1''' '''$2''' geblokkeerd op $3",
	'phalanx-stats-row-per-wiki' => "gebruiker '''$2''' is geblokkeerd op '''$4''' door filternummer '''$3''' ($5) (type '''$1''')",
	'phalanx-rule-log-name' => 'Logboek Phalanx-regels',
	'phalanx-rule-log-header' => 'Dit is een logboek met wijzigingen aan Phalanx-regels',
	'phalanx-rule-log-add' => 'Phalanx-regel toegevoegd: $1',
	'phalanx-rule-log-edit' => 'Phalanx-regel gewijzigd: $1',
	'phalanx-rule-log-delete' => 'Phalanx-regel verwijderd: $1',
	'phalanx-rule-log-details' => 'Filter: "$1", type: "$2", reden: "$3"',
	'phalanx-stats-table-wiki-id' => 'Wiki-ID',
	'phalanx-stats-table-wiki-name' => 'Wikinaam',
	'phalanx-stats-table-wiki-url' => 'Wiki-URL',
	'phalanx-stats-table-wiki-last-edited' => 'Laatste bewerking',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Rancher
 */
$messages['sr-ec'] = array(
	'phalanx-type-content' => 'садржај странице',
	'phalanx-type-summary' => 'сажетак странице',
	'phalanx-type-title' => 'наслов странице',
	'phalanx-type-user' => 'корисник',
	'phalanx-type-answers-recent-questions' => 'скорашња питања',
	'phalanx-add-block' => 'Примени забрану',
	'phalanx-edit-block' => 'Сачувај забрану',
	'phalanx-label-filter' => 'Филтер:',
	'phalanx-label-expiry' => 'Истек:',
	'phalanx-label-type' => 'Врста:',
	'phalanx-label-lang' => 'Језик:',
	'phalanx-view-type' => 'Врста забране...',
	'phalanx-view-blocks' => 'Претражи филтере',
	'phalanx-format-text' => 'чист текст',
	'phalanx-link-modify' => 'измени',
	'phalanx-stats-table-user' => 'Додао/-ла',
	'phalanx-stats-table-type' => 'Врста',
	'phalanx-stats-table-language' => 'Језик',
	'phalanx-stats-table-text' => 'Текст',
	'phalanx-stats-table-reason' => 'Разлог',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'phalanx-type-content' => 'పుట విషయం',
	'phalanx-type-summary' => 'పుట సారాంశం',
	'phalanx-type-title' => 'పుట శీర్షిక',
	'phalanx-type-user' => 'వాడుకరి',
	'phalanx-type-answers-recent-questions' => 'ఇటీవలి ప్రశ్నలు',
	'phalanx-label-reason' => 'కారణం:',
	'phalanx-label-type' => 'రకం:',
	'phalanx-label-lang' => 'భాష:',
	'phalanx-test-results-legend' => 'పరీక్షా ఫలితాలు',
	'phalanx-stats-table-language' => 'భాష',
	'phalanx-stats-table-text' => 'పాఠ్యం',
	'phalanx-stats-table-reason' => 'కారణం',
);

