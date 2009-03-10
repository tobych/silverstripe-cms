<?php

/**
 * Dutch (Netherlands) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('nl_NL', $lang) && is_array($lang['nl_NL'])) {
	$lang['nl_NL'] = array_merge($lang['en_US'], $lang['nl_NL']);
} else {
	$lang['nl_NL'] = $lang['en_US'];
}

$lang['nl_NL']['AssetAdmin']['CHOOSEFILE'] = 'Kies een bestand ';
$lang['nl_NL']['AssetAdmin']['CONTENTMODBY'] = 'Inhoud bewerkbaar door';
$lang['nl_NL']['AssetAdmin']['CONTENTUSABLEBY'] = 'Inhoud bruikbaar door';
$lang['nl_NL']['AssetAdmin']['DELETEDX'] = '%s bestanden verwijderd.%s';
$lang['nl_NL']['AssetAdmin']['FILESREADY'] = 'Bestanden geselecteerd om te uploaden:';
$lang['nl_NL']['AssetAdmin']['FOLDERDELETED'] = 'map verwijderd.';
$lang['nl_NL']['AssetAdmin']['FOLDERSDELETED'] = 'mappen verwijderd.';
$lang['nl_NL']['AssetAdmin']['MENUTITLE'] = 'Bestanden & Afbeeldingen';
$lang['nl_NL']['AssetAdmin']['MENUTITLE'] = 'Bestanden en foto\'s';
$lang['nl_NL']['AssetAdmin']['MOVEDX'] = '%s bestanden verplaatst';
$lang['nl_NL']['AssetAdmin']['NEWFOLDER'] = 'Nieuwe Map';
$lang['nl_NL']['AssetAdmin']['NOTEMP'] = 'Er is geen tijdelijke map voor upoads. Pas upload_tmp_dir aan in php.ini.';
$lang['nl_NL']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Er was niets om te uploaden';
$lang['nl_NL']['AssetAdmin']['NOWBROKEN'] = 'De volgende pagina\'s hebben nu gebroken links:';
$lang['nl_NL']['AssetAdmin']['NOWBROKEN2'] = 'De beheerders hebben een email ontvangen en zullen de pagina\'s herstellen.';
$lang['nl_NL']['AssetAdmin']['OWNER'] = 'Eigenaar';
$lang['nl_NL']['AssetAdmin']['SAVEDFILE'] = 'Bestand "%s" bewaard';
$lang['nl_NL']['AssetAdmin']['SAVEFOLDERNAME'] = 'Bewaar map naam';
$lang['nl_NL']['AssetAdmin']['THUMBSDELETED'] = 'Alle niet-gebruikte miniatuur afbeeldingen zijn verwijderd';
$lang['nl_NL']['AssetAdmin']['UPLOAD'] = 'Upload onderstaande bestanden';
$lang['nl_NL']['AssetAdmin']['UPLOADEDX'] = '%s bestanden geupload';
$lang['nl_NL']['AssetAdmin_left.ss']['CREATE'] = 'Aanmaken';
$lang['nl_NL']['AssetAdmin_left.ss']['DELETE'] = 'Verwijder';
$lang['nl_NL']['AssetAdmin_left.ss']['DELFOLDERS'] = 'De geselecteerde mappen verwijderen';
$lang['nl_NL']['AssetAdmin_left.ss']['ENABLEDRAGGING'] = 'Rangschikken met drag &amp; drop toestaan';
$lang['nl_NL']['AssetAdmin_left.ss']['FOLDERS'] = 'Mappen';
$lang['nl_NL']['AssetAdmin_left.ss']['GO'] = 'Doen';
$lang['nl_NL']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Selecteer de mappen die U wilt verwijderen en klik op de onderstaande knop';
$lang['nl_NL']['AssetAdmin_left.ss']['TOREORG'] = 'Herschik de mappen door ze te slepen.';
$lang['nl_NL']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Kies een pagina aan de linker kant.';
$lang['nl_NL']['AssetAdmin_right.ss']['WELCOME'] = 'Welkom bij';
$lang['nl_NL']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'U heeft geen bevoegdheid om bestanden te uploaden naar deze map.';
$lang['nl_NL']['AssetTableField']['CAPTION'] = 'Onderschrift';
$lang['nl_NL']['AssetTableField']['CREATED'] = 'Eerste upload';
$lang['nl_NL']['AssetTableField']['DIM'] = 'Dimensies';
$lang['nl_NL']['AssetTableField']['DIMLIMT'] = 'Beperk de afmetingen van het Popup Window';
$lang['nl_NL']['AssetTableField']['EDITIMAGE'] = 'Wijzig deze afbeelding';
$lang['nl_NL']['AssetTableField']['FILENAME'] = 'Bestandsnaam';
$lang['nl_NL']['AssetTableField']['GALLERYOPTIONS'] = 'Gallerij opties';
$lang['nl_NL']['AssetTableField']['IMAGE'] = 'Afbeelding';
$lang['nl_NL']['AssetTableField']['ISFLASH'] = 'Is Een Flash Document';
$lang['nl_NL']['AssetTableField']['LASTEDIT'] = 'Laatste wijziging';
$lang['nl_NL']['AssetTableField']['MAIN'] = 'Hoofd';
$lang['nl_NL']['AssetTableField']['NOLINKS'] = 'Dit bestand is aan geen enkele pagina gekoppeld.';
$lang['nl_NL']['AssetTableField']['OWNER'] = 'Eigenaar';
$lang['nl_NL']['AssetTableField']['PAGESLINKING'] = 'De volgende pagina\'s verwijzen naar dit bestand:';
$lang['nl_NL']['AssetTableField']['POPUPHEIGHT'] = 'Hoogte Popup';
$lang['nl_NL']['AssetTableField']['POPUPWIDTH'] = 'Breedte Popup';
$lang['nl_NL']['AssetTableField']['SIZE'] = 'Grootte';
$lang['nl_NL']['AssetTableField.ss']['DELFILE'] = 'Bestand verwijderen';
$lang['nl_NL']['AssetTableField.ss']['DRAGTOFOLDER'] = 'Sleep naar map aan de linkerkant om bestand te verplaatsen';
$lang['nl_NL']['AssetTableField.ss']['EDIT'] = 'Bewerk asset';
$lang['nl_NL']['AssetTableField.ss']['SHOW'] = 'Toon asset';
$lang['nl_NL']['AssetTableField']['SWFFILEOPTIONS'] = 'Opties voor SWF-bestand';
$lang['nl_NL']['AssetTableField']['TITLE'] = 'Titel';
$lang['nl_NL']['AssetTableField']['TYPE'] = 'Type';
$lang['nl_NL']['AssetTableField']['URL'] = 'URL';
$lang['nl_NL']['CMSLeft.ss']['DELPAGE'] = 'Pagina verwijderen...';
$lang['nl_NL']['CMSLeft.ss']['DELPAGES'] = 'Geselecteerde pagina\'s verwijderen';
$lang['nl_NL']['CMSLeft.ss']['GO'] = 'Doen';
$lang['nl_NL']['CMSLeft.ss']['NEWPAGE'] = 'Nieuwe Pagina...';
$lang['nl_NL']['CMSLeft.ss']['SELECTPAGESDEL'] = 'Selecteer de pagina\'s welke U wilt verwijderen en klik op de onderstaande button';
$lang['nl_NL']['CMSLeft.ss']['SITECONT'] = 'Site Inhoud';
$lang['nl_NL']['CMSMain']['ACCESS'] = 'Toegang tot \'%s\' (%s)';
$lang['nl_NL']['CMSMain']['CANCEL'] = 'Annuleren';
$lang['nl_NL']['CMSMain']['CHOOSEREPORT'] = '(Kies een verslag)';
$lang['nl_NL']['CMSMain']['COMPARINGV'] = 'U vergelijkt versies %s en %s';
$lang['nl_NL']['CMSMain']['COPYPUBTOSTAGE'] = 'Wilt U echt de inhoud van de gepubliceerde site kopieren naar de concept site?';
$lang['nl_NL']['CMSMain']['DELETE'] = 'Weghalen uit de ontwerp-site';
$lang['nl_NL']['CMSMain']['DELETEFP'] = 'Uit de gepubliceerde site verwijderen';
$lang['nl_NL']['CMSMain']['DESCREMOVED'] = 'en %s nakomelingen';
$lang['nl_NL']['CMSMain']['EMAIL'] = 'Email';
$lang['nl_NL']['CMSMain']['GO'] = 'Doen';
$lang['nl_NL']['CMSMain']['MENUTITLE'] = 'Site Inhoud';
$lang['nl_NL']['CMSMain']['MENUTITLE'] = 'Pagina Inhoud';
$lang['nl_NL']['CMSMain']['METADESCOPT'] = 'Omschrijving';
$lang['nl_NL']['CMSMain']['METAKEYWORDSOPT'] = 'Sleutelwoorden';
$lang['nl_NL']['CMSMain']['NEW'] = 'Nieuw';
$lang['nl_NL']['CMSMain']['NOCONTENT'] = 'geen inhoud';
$lang['nl_NL']['CMSMain']['NOTHINGASSIGNED'] = 'Er is niets aan U toegewezen.';
$lang['nl_NL']['CMSMain']['NOWAITINGON'] = 'U wacht op niemand.';
$lang['nl_NL']['CMSMain']['NOWBROKEN'] = 'De volgende pagina\'s hebben nu gebroken links:';
$lang['nl_NL']['CMSMain']['NOWBROKEN2'] = 'We hebben de eigenaars per email verwittigd en zij zullen die pagina\'s herstellen.';
$lang['nl_NL']['CMSMain']['OK'] = 'OK';
$lang['nl_NL']['CMSMain']['PAGEDEL'] = '%d pagina\'s verwijderd ';
$lang['nl_NL']['CMSMain']['PAGENOTEXISTS'] = 'Deze pagina bestaat niet';
$lang['nl_NL']['CMSMain']['PAGEPUB'] = '%d pagina gepubliceerd ';
$lang['nl_NL']['CMSMain']['PAGESDEL'] = '%d pagina\'s verwijderd ';
$lang['nl_NL']['CMSMain']['PAGESPUB'] = '%d pagina\'s gepubliceerd ';
$lang['nl_NL']['CMSMain']['PAGETYPEOPT'] = 'Pagina Type';
$lang['nl_NL']['CMSMain']['PRINT'] = 'Print';
$lang['nl_NL']['CMSMain']['PUBALLCONFIRM'] = 'Publiceer elke pagina van de site waarbij de inhoud van de concept site gekopieerd wordt naar de live site.';
$lang['nl_NL']['CMSMain']['PUBALLFUN'] = '"Publiceer Alles" functionaliteit';
$lang['nl_NL']['CMSMain']['PUBALLFUN2'] = 'Op deze knop klikken heeft hetzelfde resultaat als alle pagina\'s apart publiceren. Hij is bedoeld om een groot aantal wijzigingen in een keer te publiceren.';
$lang['nl_NL']['CMSMain']['PUBPAGES'] = 'Klaar: %d pagina\'s gepubliceerd';
$lang['nl_NL']['CMSMain']['REMOVED'] = 'Verwijderde \'%s\'%s van live site';
$lang['nl_NL']['CMSMain']['REMOVEDFD'] = 'Verwijderd uit de concept site';
$lang['nl_NL']['CMSMain']['REMOVEDPAGE'] = '\'%s\' verwijderd uit de gepubliceerde site';
$lang['nl_NL']['CMSMain']['REMOVEDPAGEFROMDRAFT'] = 'Verwijderde \'%s\' van de ontwerp-site';
$lang['nl_NL']['CMSMain']['REPORT'] = 'Rapport';
$lang['nl_NL']['CMSMain']['RESTORE'] = 'Herstellen';
$lang['nl_NL']['CMSMain']['RESTORED'] = 'Herstellen van \'%s\' is succesvol verlopen.';
$lang['nl_NL']['CMSMain']['ROLLBACK'] = 'Terugzetten naar deze versie';
$lang['nl_NL']['CMSMain']['ROLLEDBACKPUB'] = 'Teruggezet naar de gepubliceerde versie. Het nieuwe versie nummer is #%d';
$lang['nl_NL']['CMSMain']['ROLLEDBACKVERSION'] = 'Teruggezet naar versie #%d. Het nieuwe versie nummer is #%d';
$lang['nl_NL']['CMSMain']['SAVE'] = 'Bewaar';
$lang['nl_NL']['CMSMain']['SENTTO'] = 'Verzend naar %s %s voor goedkeuring.';
$lang['nl_NL']['CMSMain']['STATUSOPT'] = 'Status';
$lang['nl_NL']['CMSMain']['TOTALPAGES'] = 'Totaal aantal pagina\'s: ';
$lang['nl_NL']['CMSMain']['VERSIONSNOPAGE'] = 'Pagina #%d kon niet worden gevonden.';
$lang['nl_NL']['CMSMain']['VIEWING'] = 'U bekijkt versie #%s, aangemaakt op %s door %s';
$lang['nl_NL']['CMSMain']['VISITRESTORE'] = 'bezoek herstelpagina/(ID)';
$lang['nl_NL']['CMSMain']['WAITINGON'] = 'U wacht nog op anderen tot ze klaar zijn met deze <b>%d</b> pagina\'s.';
$lang['nl_NL']['CMSMain']['WORKTODO'] = 'Aan deze <b>%d</b> paginas moet nog door U gewerkt worden';
$lang['nl_NL']['CMSMain_dialog.ss']['BUTTONNOTFOUND'] = 'Kan de naam van de knop niet vinden';
$lang['nl_NL']['CMSMain_dialog.ss']['NOLINKED'] = 'Kan window.linkedObject niet vinden, die de klik op de knop terug moet sturen naar het hoofd venster';
$lang['nl_NL']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Toegevoegd aan de concept site, maar nog niet gepubliceerd';
$lang['nl_NL']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Criteria toevoegen...';
$lang['nl_NL']['CMSMain_left.ss']['BATCHACTIONS'] = 'Batch acties';
$lang['nl_NL']['CMSMain_left.ss']['CHANGED'] = 'veranderd';
$lang['nl_NL']['CMSMain_left.ss']['CLOSEBOX'] = 'klik om dit venster te sluiten';
$lang['nl_NL']['CMSMain_left.ss']['COMMENTS'] = 'Reacties';
$lang['nl_NL']['CMSMain_left.ss']['COMPAREMODE'] = 'Vergelijk modus (beneden 2 aanklikken)';
$lang['nl_NL']['CMSMain_left.ss']['CREATE'] = 'Aanmaken';
$lang['nl_NL']['CMSMain_left.ss']['DEL'] = 'verwijderd';
$lang['nl_NL']['CMSMain_left.ss']['DELETECONFIRM'] = 'Geselecteerde pagina\'s verwijderen';
$lang['nl_NL']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Verwijderd uit de concept site, maar nog steeds aanwezig op de live site';
$lang['nl_NL']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Gewijzigd op de concept site, maar nog niet gepubliceerd';
$lang['nl_NL']['CMSMain_left.ss']['EDITEDSINCE'] = 'Gewijzigd Sinds';
$lang['nl_NL']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'Drag & drop herordenen toestaan';
$lang['nl_NL']['CMSMain_left.ss']['GO'] = 'Doen';
$lang['nl_NL']['CMSMain_left.ss']['KEY'] = 'Legenda:';
$lang['nl_NL']['CMSMain_left.ss']['NEW'] = 'nieuw';
$lang['nl_NL']['CMSMain_left.ss']['OPENBOX'] = 'klik om dit venster te openen';
$lang['nl_NL']['CMSMain_left.ss']['PAGEVERSIONH'] = 'Versies van deze pagina';
$lang['nl_NL']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Geselecteerde pagina\'s publiceren';
$lang['nl_NL']['CMSMain_left.ss']['SEARCH'] = 'Zoeken';
$lang['nl_NL']['CMSMain_left.ss']['SEARCHTITLE'] = 'Zoeken door URL, Titel, Menu Titel, &amp; Inhoud';
$lang['nl_NL']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Selecteer de pagina\'s welke U wilt veranderen en kies dan een actie:';
$lang['nl_NL']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'Selecteer de pagina\'s welke U wilt dupliceren, geef aan of onderliggende items ook meegenomen moeten worden en geef aan waar de duplicaten moeten geplaatst worden';
$lang['nl_NL']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Alleen gewijzigde pagina\'s tonen';
$lang['nl_NL']['CMSMain_left.ss']['SHOWUNPUB'] = 'Niet gepubliceerde versies laten zien';
$lang['nl_NL']['CMSMain_left.ss']['SITECONTENT TITLE'] = 'Site Inhoud en Structuur';
$lang['nl_NL']['CMSMain_left.ss']['SITEREPORTS'] = 'Site Verslagen';
$lang['nl_NL']['CMSMain_left.ss']['TASKLIST'] = 'Taaklijst';
$lang['nl_NL']['CMSMain_left.ss']['WAITINGON'] = 'Wachtend op';
$lang['nl_NL']['CMSMain_right.ss']['ANYMESSAGE'] = 'Heeft U een bericht voor uw editor?';
$lang['nl_NL']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Kies een pagina aan de linkerkant.';
$lang['nl_NL']['CMSMain_right.ss']['LOADING'] = 'aan het laden...';
$lang['nl_NL']['CMSMain_right.ss']['MESSAGE'] = 'Bericht';
$lang['nl_NL']['CMSMain_right.ss']['SENDTO'] = 'Verzenden naar';
$lang['nl_NL']['CMSMain_right.ss']['STATUS'] = 'Status';
$lang['nl_NL']['CMSMain_right.ss']['SUBMIT'] = 'Ter goedkeuring aanbieden';
$lang['nl_NL']['CMSMain_right.ss']['WELCOMETO'] = 'Welkom bij';
$lang['nl_NL']['CMSMain_versions.ss']['AUTHOR'] = 'Auteur';
$lang['nl_NL']['CMSMain_versions.ss']['NOTPUB'] = 'Niet Gepubliceerd';
$lang['nl_NL']['CMSMain_versions.ss']['PUBR'] = 'Uitgever';
$lang['nl_NL']['CMSMain_versions.ss']['UNKNOWN'] = 'Onbekend';
$lang['nl_NL']['CMSMain_versions.ss']['WHEN'] = 'Wanneer';
$lang['nl_NL']['CMSRight.ss']['CHOOSEPAGE'] = 'Kies een pagina aan de linkerkant.';
$lang['nl_NL']['CMSRight.ss']['ECONTENT'] = 'Inhoud Wijzigen';
$lang['nl_NL']['CMSRight.ss']['WELCOMETO'] = 'Welkom bij';
$lang['nl_NL']['CommentAdmin']['ACCEPT'] = 'Aanvaard';
$lang['nl_NL']['CommentAdmin']['APPROVED'] = '%s reacties aanvaard.';
$lang['nl_NL']['CommentAdmin']['APPROVEDCOMMENTS'] = 'Goedgekeurde Reacties';
$lang['nl_NL']['CommentAdmin']['AUTHOR'] = 'Auteur';
$lang['nl_NL']['CommentAdmin']['COMMENT'] = 'Reactie';
$lang['nl_NL']['CommentAdmin']['COMMENTS'] = 'Reacties';
$lang['nl_NL']['CommentAdmin']['COMMENTSAWAITINGMODERATION'] = 'Reacties Die Op Goedkeuring Wachten';
$lang['nl_NL']['CommentAdmin']['DATEPOSTED'] = 'Geplaatst op';
$lang['nl_NL']['CommentAdmin']['DELETE'] = 'Verwijder';
$lang['nl_NL']['CommentAdmin']['DELETEALL'] = 'Verwijder Alle';
$lang['nl_NL']['CommentAdmin']['DELETED'] = '%s reacties verwijderd';
$lang['nl_NL']['CommentAdmin']['MARKASNOTSPAM'] = 'Markeer als niet-spam';
$lang['nl_NL']['CommentAdmin']['MARKEDNOTSPAM'] = '%s reacties als niet-spam gemarkeerd.';
$lang['nl_NL']['CommentAdmin']['MARKEDSPAM'] = '%s reacties als spam gemarkeerd.';
$lang['nl_NL']['CommentAdmin']['MENUTITLE'] = 'Commentaren';
$lang['nl_NL']['CommentAdmin']['MENUTITLE'] = 'Commentaar ';
$lang['nl_NL']['CommentAdmin']['NAME'] = 'Naam';
$lang['nl_NL']['CommentAdmin']['PAGE'] = 'Pagina';
$lang['nl_NL']['CommentAdmin']['SPAM'] = 'Spam';
$lang['nl_NL']['CommentAdmin']['SPAMMARKED'] = 'Markeer als spam';
$lang['nl_NL']['CommentAdmin_left.ss']['COMMENTS'] = 'Reacties';
$lang['nl_NL']['CommentAdmin_right.ss']['WELCOME1'] = 'Welkom bij';
$lang['nl_NL']['CommentAdmin_right.ss']['WELCOME2'] = 'Reacties administratie. Kies een map in het linkerpaneel.';
$lang['nl_NL']['CommentAdmin_SiteTree.ss']['APPROVED'] = 'Goedgekeurd';
$lang['nl_NL']['CommentAdmin_SiteTree.ss']['AWAITMODERATION'] = 'Wachtend op goedkeuring';
$lang['nl_NL']['CommentAdmin_SiteTree.ss']['COMMENTS'] = 'Reacties';
$lang['nl_NL']['CommentAdmin_SiteTree.ss']['SPAM'] = 'Spam';
$lang['nl_NL']['CommentList.ss']['CREATEDW'] = 'Reacties worden aangemaakt als een van de \'workflow acties\' gedaan zijn- Publiceren, Weigeren, Plaatsen.';
$lang['nl_NL']['CommentList.ss']['NOCOM'] = 'Er zijn geen reacties op deze pagina.';
$lang['nl_NL']['CommentTableField']['FILTER'] = 'Filter';
$lang['nl_NL']['CommentTableField']['SEARCH'] = 'Zoeken';
$lang['nl_NL']['CommentTableField.ss']['APPROVE'] = 'goedkeuren';
$lang['nl_NL']['CommentTableField.ss']['APPROVECOMMENT'] = 'Reactie goedkeuren';
$lang['nl_NL']['CommentTableField.ss']['DELETE'] = 'verwijder';
$lang['nl_NL']['CommentTableField.ss']['DELETEROW'] = 'Verwijder deze rij';
$lang['nl_NL']['CommentTableField.ss']['EDIT'] = 'wijzig';
$lang['nl_NL']['CommentTableField.ss']['HAM'] = 'ham';
$lang['nl_NL']['CommentTableField.ss']['MARKASSPAM'] = 'Markeer deze reactie als spam';
$lang['nl_NL']['CommentTableField.ss']['MARKNOSPAM'] = 'Markeer deze reactie als niet-spam';
$lang['nl_NL']['CommentTableField.ss']['NOITEMSFOUND'] = 'Geen resultaten';
$lang['nl_NL']['CommentTableField.ss']['SPAM'] = 'spam';
$lang['nl_NL']['ComplexTableField']['CLOSEPOPUP'] = 'Sluit Popup';
$lang['nl_NL']['ComplexTableField']['SUCCESSADD'] = 'Toegevoegd %s %s %s';
$lang['nl_NL']['ImageEditor.ss']['ACTIONS'] = 'Acties';
$lang['nl_NL']['ImageEditor.ss']['APPLY'] = 'toepassen';
$lang['nl_NL']['ImageEditor.ss']['CANCEL'] = 'annuleer';
$lang['nl_NL']['ImageEditor.ss']['CROP'] = 'crop';
$lang['nl_NL']['ImageEditor.ss']['CURRENTACTION'] = 'huidige&nbsp;actie';
$lang['nl_NL']['ImageEditor.ss']['EDITFUNCTIONS'] = 'bewerk&nbsp;functies';
$lang['nl_NL']['ImageEditor.ss']['EFFECTS'] = 'effecten';
$lang['nl_NL']['ImageEditor.ss']['EXIT'] = 'verlaat';
$lang['nl_NL']['ImageEditor.ss']['HEIGHT'] = 'hoogte';
$lang['nl_NL']['ImageEditor.ss']['REDO'] = 'opnieuw';
$lang['nl_NL']['ImageEditor.ss']['ROT'] = 'roteren';
$lang['nl_NL']['ImageEditor.ss']['SAVE'] = 'afbeelding bewaren';
$lang['nl_NL']['ImageEditor.ss']['UNDO'] = 'ongedaan maken';
$lang['nl_NL']['ImageEditor.ss']['UNTITLED'] = 'Untitled Document';
$lang['nl_NL']['ImageEditor.ss']['WIDTH'] = 'breedte';
$lang['nl_NL']['LeftAndMain']['CHANGEDURL'] = '  URL veranderd in \'%s\'';
$lang['nl_NL']['LeftAndMain']['COMMENTS'] = 'Reacties';
$lang['nl_NL']['LeftAndMain']['FILESIMAGES'] = 'Bestanden & Afbeeldingen';
$lang['nl_NL']['LeftAndMain']['HELP'] = 'Help';
$lang['nl_NL']['LeftAndMain']['PAGETYPE'] = 'Pagina type: ';
$lang['nl_NL']['LeftAndMain']['PERMAGAIN'] = 'U bent uitgelogd uit het CMS.  Als U weer wilt inloggen vul dan uw gebruikersnaam en wachtwoord hier beneden in.';
$lang['nl_NL']['LeftAndMain']['PERMALREADY'] = 'Helaas, dat deel van het CMS is niet toegankelijk voor U. Hieronder kunt U als iemand anders inloggen.';
$lang['nl_NL']['LeftAndMain']['PERMDEFAULT'] = 'Geef uw e-mailadres en wachtwoord voor toegang tot het CMS.';
$lang['nl_NL']['LeftAndMain']['PLEASESAVE'] = 'Deze pagina kon niet bijgewerkt worden, omdat deze nog niet is bewaard.';
$lang['nl_NL']['LeftAndMain']['REPORTS'] = 'Rapporten';
$lang['nl_NL']['LeftAndMain']['REQUESTERROR'] = 'Fout in aanvraag';
$lang['nl_NL']['LeftAndMain']['SAVED'] = 'bewaard';
$lang['nl_NL']['LeftAndMain']['SAVEDUP'] = 'Bewaard';
$lang['nl_NL']['LeftAndMain']['SECURITY'] = 'Beveiliging';
$lang['nl_NL']['LeftAndMain']['SITECONTENT'] = 'Site Inhoud';
$lang['nl_NL']['LeftAndMain']['SITECONTENTLEFT'] = 'Site Inhoud';
$lang['nl_NL']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'Dit is de';
$lang['nl_NL']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'version that you are currently running, technically it\'s the CVS branch';
$lang['nl_NL']['LeftAndMain.ss']['ARCHS'] = 'Gearchiveerde Site';
$lang['nl_NL']['LeftAndMain.ss']['DRAFTS'] = 'Concept Site';
$lang['nl_NL']['LeftAndMain.ss']['EDIT'] = 'Wijzig';
$lang['nl_NL']['LeftAndMain.ss']['EDITINCMS'] = 'Wijzig deze pagina in het CMS';
$lang['nl_NL']['LeftAndMain.ss']['EDITPROFILE'] = 'Profiel';
$lang['nl_NL']['LeftAndMain.ss']['LOADING'] = 'Aan het laden...';
$lang['nl_NL']['LeftAndMain.ss']['LOGGEDINAS'] = 'Ingelogd als';
$lang['nl_NL']['LeftAndMain.ss']['LOGOUT'] = 'uitloggen';
$lang['nl_NL']['LeftAndMain.ss']['PUBLIS'] = 'Gepubliceerde Site';
$lang['nl_NL']['LeftAndMain.ss']['REQUIREJS'] = 'Het CMS vereist dat je JavaScript aan hebt staan.';
$lang['nl_NL']['LeftAndMain.ss']['SSWEB'] = 'Silverstripe Website';
$lang['nl_NL']['LeftAndMain.ss']['VIEWINDRAFT'] = 'Bekijk Pagina in Klad';
$lang['nl_NL']['LeftAndMain.ss']['VIEWINPUBLISHED'] = 'Bekijk Pagina op de Gepubliceerde Site';
$lang['nl_NL']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Pagina weergave:';
$lang['nl_NL']['LeftAndMain']['STATUSPUBLISHEDSUCCESS'] = '\'%s\' is succesvol gepubliceerd ';
$lang['nl_NL']['LeftAndMain']['STATUSTO'] = '  Status veranderd naar \'%s\'';
$lang['nl_NL']['LeftAndMain']['TREESITECONTENT'] = 'Site Inhoud';
$lang['nl_NL']['MemberList']['ADD'] = 'Toevoegen';
$lang['nl_NL']['MemberList']['ANYGROUP'] = 'Eender welke groep';
$lang['nl_NL']['MemberList']['ASC'] = 'Oplopend';
$lang['nl_NL']['MemberList']['DESC'] = 'Aflopend';
$lang['nl_NL']['MemberList']['EMAIL'] = 'Email';
$lang['nl_NL']['MemberList']['FILTERBYG'] = 'Filter op groep';
$lang['nl_NL']['MemberList']['FN'] = 'Voornaam';
$lang['nl_NL']['MemberList']['ORDERBY'] = 'Rangschik naar';
$lang['nl_NL']['MemberList']['PASSWD'] = 'Wachtwoord';
$lang['nl_NL']['MemberList']['SEARCH'] = 'Zoeken';
$lang['nl_NL']['MemberList']['SN'] = 'Achternaam';
$lang['nl_NL']['MemberList.ss']['FILTER'] = 'Filter';
$lang['nl_NL']['MemberList_PageControls.ss']['DISPLAYING'] = 'Tonen';
$lang['nl_NL']['MemberList_PageControls.ss']['FIRSTMEMBERS'] = 'leden';
$lang['nl_NL']['MemberList_PageControls.ss']['LASTMEMBERS'] = 'leden';
$lang['nl_NL']['MemberList_PageControls.ss']['NEXTMEMBERS'] = 'leden';
$lang['nl_NL']['MemberList_PageControls.ss']['OF'] = 'van';
$lang['nl_NL']['MemberList_PageControls.ss']['PREVIOUSMEMBERS'] = 'leden';
$lang['nl_NL']['MemberList_PageControls.ss']['TO'] = 'om';
$lang['nl_NL']['MemberList_PageControls.ss']['VIEWFIRST'] = 'Bekijk eerste';
$lang['nl_NL']['MemberList_PageControls.ss']['VIEWLAST'] = 'Bekijk laatste';
$lang['nl_NL']['MemberList_PageControls.ss']['VIEWNEXT'] = 'Bekijk volgende';
$lang['nl_NL']['MemberList_PageControls.ss']['VIEWPREVIOUS'] = 'Bekijk vorige';
$lang['nl_NL']['MemberList_Table.ss']['EMAIL'] = 'Email Address';
$lang['nl_NL']['MemberList_Table.ss']['FN'] = 'Voornaam';
$lang['nl_NL']['MemberList_Table.ss']['PASSWD'] = 'Wachtwoord';
$lang['nl_NL']['MemberList_Table.ss']['SN'] = 'Achternaam';
$lang['nl_NL']['MemberTableField']['ADD'] = 'Toevoegen';
$lang['nl_NL']['MemberTableField']['ADDEDTOGROUP'] = 'Lid toegevoegd aan groep';
$lang['nl_NL']['MemberTableField']['ADDINGFIELD'] = 'Toevoegen mislukt';
$lang['nl_NL']['MemberTableField']['ANYGROUP'] = 'Eender welke groep';
$lang['nl_NL']['MemberTableField']['ASC'] = 'Oplopend';
$lang['nl_NL']['MemberTableField']['DESC'] = 'Afdalend';
$lang['nl_NL']['MemberTableField']['EMAIL'] = 'Email';
$lang['nl_NL']['MemberTableField']['FILTER'] = 'Filter';
$lang['nl_NL']['MemberTableField']['FILTERBYGROUP'] = 'Filter per groep';
$lang['nl_NL']['MemberTableField']['FIRSTNAME'] = 'Voornaam';
$lang['nl_NL']['MemberTableField']['ORDERBY'] = 'Rangschik naar';
$lang['nl_NL']['MemberTableField']['SEARCH'] = 'Zoeken';
$lang['nl_NL']['MemberTableField.ss']['ADDNEW'] = 'Nieuwe';
$lang['nl_NL']['MemberTableField.ss']['DELETEMEMBER'] = 'Dit lid verwijderen';
$lang['nl_NL']['MemberTableField.ss']['EDITMEMBER'] = 'Dit lid wijzigen';
$lang['nl_NL']['MemberTableField.ss']['SHOWMEMBER'] = 'Dit lid tonen';
$lang['nl_NL']['MemberTableField']['SURNAME'] = 'Achternaam';
$lang['nl_NL']['ModelAdmin']['ADDBUTTON'] = 'Toevoegen';
$lang['nl_NL']['ModelAdmin']['ADDFORM'] = 'Vul dit formulier in voor het toevoegen van %s naar het database.';
$lang['nl_NL']['ModelAdmin']['CHOOSE_COLUMNS'] = 'Selecteer de kolommen resultaat ...';
$lang['nl_NL']['ModelAdmin']['CLASSTYPE'] = 'Type';
$lang['nl_NL']['ModelAdmin']['CLEAR_SEARCH'] = 'Zoek opschonen';
$lang['nl_NL']['ModelAdmin']['CREATEBUTTON'] = 'Creëer \'%s\'';
$lang['nl_NL']['ModelAdmin']['DELETE'] = 'Verwijder';
$lang['nl_NL']['ModelAdmin']['DELETEDRECORDS'] = '%s Verwijderde resultaten.';
$lang['nl_NL']['ModelAdmin']['FOUNDRESULTS'] = 'Uw zoekopdracht heeft %s overeenkomende objecten gevonden';
$lang['nl_NL']['ModelAdmin']['GOBACK'] = 'Terug';
$lang['nl_NL']['ModelAdmin']['IMPORT'] = 'Importeren vanuit CSV';
$lang['nl_NL']['ModelAdmin']['IMPORTEDRECORDS'] = '%s Geïmporteerde resultaten.';
$lang['nl_NL']['ModelAdmin']['ITEMNOTFOUND'] = 'Ik kan dat niet vinden';
$lang['nl_NL']['ModelAdmin']['LOADEDFOREDITING'] = '\'% s\' Geladen voor bewerking.';
$lang['nl_NL']['ModelAdmin']['NOIMPORT'] = 'Niks om te importeren';
$lang['nl_NL']['ModelAdmin']['NORESULTS'] = 'Uw zoekopdracht heeft geen resultaten opgeleverd';
$lang['nl_NL']['ModelAdmin']['SAVE'] = 'Opslaan';
$lang['nl_NL']['ModelAdmin']['SEARCHRESULTS'] = 'Zoekresultaten';
$lang['nl_NL']['ModelAdmin']['SELECTALL'] = 'selecteer alles';
$lang['nl_NL']['ModelAdmin']['SELECTNONE'] = 'selecteer niks';
$lang['nl_NL']['ModelAdmin']['UPDATEDRECORDS'] = '%s Geüpdatet resultaten.';
$lang['nl_NL']['ModelAdmin_ImportSpec.ss']['IMPORTSPECFIELDS'] = 'Database kolommen';
$lang['nl_NL']['ModelAdmin_ImportSpec.ss']['IMPORTSPECLINK'] = 'Toon Specificatie voor %s';
$lang['nl_NL']['ModelAdmin_ImportSpec.ss']['IMPORTSPECRELATIONS'] = 'Relaties';
$lang['nl_NL']['ModelAdmin_ImportSpec.ss']['IMPORTSPECTITLE'] = 'Specificatie voor %s';
$lang['nl_NL']['ModelAdmin_left.ss']['ADDLISTING'] = 'Toevoegen';
$lang['nl_NL']['ModelAdmin_left.ss']['ADD_TAB_HEADER'] = 'Toevoegen';
$lang['nl_NL']['ModelAdmin_left.ss']['IMPORT_TAB_HEADER'] = 'Importeer';
$lang['nl_NL']['ModelAdmin_left.ss']['SEARCHLISTINGS'] = 'Zoeken';
$lang['nl_NL']['ModelAdmin_right.ss']['WELCOME1'] = 'Welkom op %s. Kies één van de items in het linkerdeelvenster.';
$lang['nl_NL']['PageComment']['Comment'] = 'Comentaar';
$lang['nl_NL']['PageComment']['COMMENTBY'] = 'Reactie van \'%s\' op %s';
$lang['nl_NL']['PageComment']['IsSpam'] = 'Spam?';
$lang['nl_NL']['PageComment']['Name'] = 'Auteur Naam ';
$lang['nl_NL']['PageComment']['PLURALNAME'] = 'Pagina Commentaren ';
$lang['nl_NL']['PageComment']['SINGULARNAME'] = 'Pagina Comentaar';
$lang['nl_NL']['PageCommentInterface']['POST'] = 'Plaats reactie';
$lang['nl_NL']['PageCommentInterface']['SPAMQUESTION'] = 'Spam beveiligings vraag: %s';
$lang['nl_NL']['PageCommentInterface.ss']['COMMENTS'] = 'Reacties';
$lang['nl_NL']['PageCommentInterface.ss']['NEXT'] = 'volgende';
$lang['nl_NL']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'Er heeft nog niemand gereageerd op deze pagina.';
$lang['nl_NL']['PageCommentInterface.ss']['POSTCOM'] = 'Plaats Uw reactie';
$lang['nl_NL']['PageCommentInterface.ss']['PREV'] = 'vorige';
$lang['nl_NL']['PageCommentInterface.ss']['RSSFEEDCOMMENTS'] = 'RSS feed van de reacties op deze pagina';
$lang['nl_NL']['PageCommentInterface']['YOURCOMMENT'] = 'Reacties';
$lang['nl_NL']['PageCommentInterface']['YOURNAME'] = 'Jouw naam';
$lang['nl_NL']['PageCommentInterface_Controller']['SPAMQUESTION'] = 'Spam beveiligings vraag: %s';
$lang['nl_NL']['PageCommentInterface_Form']['AWAITINGMODERATION'] = 'Jouw reactie werd verzonden en wacht nu op goedkeuring.';
$lang['nl_NL']['PageCommentInterface_Form']['MSGYOUPOSTED'] = 'De boodschap die je verstuurde was:';
$lang['nl_NL']['PageCommentInterface_Form']['SPAMDETECTED'] = 'Spam gedetecteerd!!';
$lang['nl_NL']['PageCommentInterface_singlecomment.ss']['APPROVE'] = 'keur deze reactie goed';
$lang['nl_NL']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'Deze reactie is geen spam';
$lang['nl_NL']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'Deze reactie is spam';
$lang['nl_NL']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Geplaatst door';
$lang['nl_NL']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'Deze reactie verwijderen';
$lang['nl_NL']['ReportAdmin']['MENUTITLE'] = 'Verslagen';
$lang['nl_NL']['ReportAdmin_left.ss']['REPORTS'] = 'Verslagen';
$lang['nl_NL']['ReportAdmin_right.ss']['WELCOME1'] = 'Welkom bij de';
$lang['nl_NL']['ReportAdmin_right.ss']['WELCOME2'] = 'Verslagen module. Kies een verslag aan de linkerzijde.';
$lang['nl_NL']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Verslagen';
$lang['nl_NL']['SecurityAdmin']['ADDMEMBER'] = 'Lid toevoegen';
$lang['nl_NL']['SecurityAdmin']['EDITPERMISSIONS'] = 'Bewerk rechten en IP-adressen bij elke groep';
$lang['nl_NL']['SecurityAdmin']['MENUTITLE'] = 'Beveiliging';
$lang['nl_NL']['SecurityAdmin']['MENUTITLE'] = 'Beveiliging';
$lang['nl_NL']['SecurityAdmin']['NEWGROUP'] = 'Nieuwe Groep';
$lang['nl_NL']['SecurityAdmin']['SAVE'] = 'Bewaar';
$lang['nl_NL']['SecurityAdmin']['SGROUPS'] = 'Beveiligings groepen';
$lang['nl_NL']['SecurityAdmin_left.ss']['CREATE'] = 'Aanmaken';
$lang['nl_NL']['SecurityAdmin_left.ss']['DEL'] = 'Verwijderen';
$lang['nl_NL']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Geselecteerde groepen verwijderen';
$lang['nl_NL']['SecurityAdmin_left.ss']['ENABLEDRAGGING'] = 'Rangschikken met drag &amp; drop toestaan';
$lang['nl_NL']['SecurityAdmin_left.ss']['GO'] = 'Doen';
$lang['nl_NL']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Beveiligingsgroepen';
$lang['nl_NL']['SecurityAdmin_left.ss']['SELECT'] = 'Selecteer de pagina\'s welke U wilt verwijderen en klik op onderstaande knop';
$lang['nl_NL']['SecurityAdmin_left.ss']['TOREORG'] = 'Versleep pagina\'s om ze te herschikken.';
$lang['nl_NL']['SecurityAdmin_right.ss']['WELCOME1'] = 'Welkom tot';
$lang['nl_NL']['SecurityAdmin_right.ss']['WELCOME2'] = 'Beveiligingsbeheer. Kies een groep aan de linkerkant.';
$lang['nl_NL']['SideReport']['EMPTYPAGES'] = 'Lege pagina\'s';
$lang['nl_NL']['SideReport']['LAST2WEEKS'] = 'Pagina\'s gewijzigd in de laatste twee weken';
$lang['nl_NL']['SideReport']['REPEMPTY'] = 'Het %s verslag is leeg.';
$lang['nl_NL']['SideReport']['TODO'] = 'Te doen';
$lang['nl_NL']['StaticExporter']['BASEURL'] = 'Basis URL';
$lang['nl_NL']['StaticExporter']['EXPORTTO'] = 'Exporteren naar die map';
$lang['nl_NL']['StaticExporter']['FOLDEREXPORT'] = 'Map waarnaar geexporteerd dient te worden';
$lang['nl_NL']['StaticExporter']['NAME'] = 'Statische export';
$lang['nl_NL']['StaticExporter']['ONETHATEXISTS'] = 'Geef een map op die bestaat';
$lang['nl_NL']['TableListField_PageControls.ss']['OF'] = 'of';
$lang['nl_NL']['TableListField_PageControls.ss']['TO'] = 'naar';
$lang['nl_NL']['TableListField_PageControls.ss']['VIEWFIRST'] = 'Bekijk eerste';
$lang['nl_NL']['TableListField_PageControls.ss']['VIEWLAST'] = 'Bekijk laatste';
$lang['nl_NL']['TableListField_PageControls.ss']['VIEWNEXT'] = 'Bekijk volgende';
$lang['nl_NL']['TableListField_PageControls.ss']['VIEWPREVIOUS'] = 'Bekijk vorige';
$lang['nl_NL']['TaskList.ss']['BY'] = 'door';
$lang['nl_NL']['ThumbnailStripField']['NOFLASHFOUND'] = 'Geen flash bestanden gevonden';
$lang['nl_NL']['ThumbnailStripField']['NOFOLDERFLASHFOUND'] = 'Geen flash bestanden gevonden in';
$lang['nl_NL']['ThumbnailStripField']['NOFOLDERIMAGESFOUND'] = 'Geen foto bestanden gevonden in';
$lang['nl_NL']['ThumbnailStripField']['NOIMAGESFOUND'] = 'Geen afbeeldingen gevonden';
$lang['nl_NL']['ThumbnailStripField']['NOTAFOLDER'] = 'Dit is geen map';
$lang['nl_NL']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(Kies een map of zoek hierboven)';
$lang['nl_NL']['ViewArchivedEmail.ss']['CANACCESS'] = 'U kunt de gearchiveerde site bekijken via deze link:';
$lang['nl_NL']['ViewArchivedEmail.ss']['HAVEASKED'] = 'U heeft de inhoud van onze site opgevraagd op';
$lang['nl_NL']['WaitingOn.ss']['ATO'] = 'toegewezen aan';
$lang['nl_NL']['WidgetAreaEditor.ss']['AVAILABLE'] = 'Beschikbare widgets';
$lang['nl_NL']['WidgetAreaEditor.ss']['INUSE'] = 'Widgets momenteel in gebruik';
$lang['nl_NL']['WidgetAreaEditor.ss']['NOAVAIL'] = 'Er zijn momenteel geen widgets beschikbaar';
$lang['nl_NL']['WidgetAreaEditor.ss']['TOADD'] = 'Om widgets toe te voegen, sleep ze van de linkerkant naar hier.';
$lang['nl_NL']['WidgetEditor.ss']['DELETE'] = 'Verwijder';

?>