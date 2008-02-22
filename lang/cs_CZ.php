<?php

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('cs_CZ', $lang) && is_array($lang['cs_CZ'])) {
	$lang['cs_CZ'] = array_merge($lang['en_US'], $lang['cs_CZ']);
} else {
	$lang['cs_CZ'] = $lang['en_US'];
}

$lang['cs_CZ']['AssetAdmin']['CHOOSEFILE'] = 'Vybrat soubor';
$lang['cs_CZ']['AssetAdmin']['CONTENTMODBY'] = 'Obsah upravitelný';
$lang['cs_CZ']['AssetAdmin']['CONTENTUSABLEBY'] = 'Obsah použitelný';
$lang['cs_CZ']['AssetAdmin']['CREATED'] = 'Poprvé nahráno';
$lang['cs_CZ']['AssetAdmin']['DELETEDX'] = 'Smazáno %s souborů.%s';
$lang['cs_CZ']['AssetAdmin']['DELETEUNUSEDTHUMBNAILS'] = 'Smazat nepoužité miniatury';
$lang['cs_CZ']['AssetAdmin']['DELSELECTED'] = 'Smazat vybrané soubory';
$lang['cs_CZ']['AssetAdmin']['DETAILSTAB'] = 'Podrobnosti';
$lang['cs_CZ']['AssetAdmin']['FILENAME'] = 'Název souboru';
$lang['cs_CZ']['AssetAdmin']['FILESREADY'] = 'Soubory připravené k nahrání:';
$lang['cs_CZ']['AssetAdmin']['FILESTAB'] = 'Soubory';
$lang['cs_CZ']['AssetAdmin']['LASTEDITED'] = 'Naposledy aktualizováno';
$lang['cs_CZ']['AssetAdmin']['MOVEDX'] = 'Přesunuto %s souborů';
$lang['cs_CZ']['AssetAdmin']['NEWFOLDER'] = 'Nová složka';
$lang['cs_CZ']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Nic k nahrání';
$lang['cs_CZ']['AssetAdmin']['NOWBROKEN'] = 'Tyto stránky mají nyní nefunkční odkazy:';
$lang['cs_CZ']['AssetAdmin']['ONLYADMINS'] = 'Jen administrátor může nahrát soubory %s.';
$lang['cs_CZ']['AssetAdmin']['OWNER'] = 'Vlastník';
$lang['cs_CZ']['AssetAdmin']['SAVEDFILE'] = 'Soubor %s uložen';
$lang['cs_CZ']['AssetAdmin']['SAVEFOLDERNAME'] = 'Uložit název složky';
$lang['cs_CZ']['AssetAdmin']['TITLE'] = 'Titulek';
$lang['cs_CZ']['AssetAdmin']['TOOLARGE'] = '%s je příliš velký (%s). Soubory tohoto typu nemohou být větší než %s';
$lang['cs_CZ']['AssetAdmin']['TYPE'] = 'Typ';
$lang['cs_CZ']['AssetAdmin']['UNUSEDFILESTAB'] = 'Nepoužité soubory';
$lang['cs_CZ']['AssetAdmin']['UNUSEDFILESTITLE'] = 'Nepoužité soubory';
$lang['cs_CZ']['AssetAdmin']['UNUSEDTHUMBNAILSTITLE'] = 'Nepoužité miniatury';
$lang['cs_CZ']['AssetAdmin']['UPLOAD'] = 'Nahrát soubory sepsané níže';
$lang['cs_CZ']['AssetAdmin']['UPLOADEDX'] = 'Nahráno %s souborů';
$lang['cs_CZ']['AssetAdmin']['UPLOADTAB'] = 'Nahrát';
$lang['cs_CZ']['AssetAdmin']['VIEWASSET'] = 'Prohlížení';
$lang['cs_CZ']['AssetAdmin']['VIEWEDITASSET'] = 'Prohlížení/Úpravy';
$lang['cs_CZ']['AssetAdmin_left.ss']['CREATE'] = 'Vytvořit';
$lang['cs_CZ']['AssetAdmin_left.ss']['DELETE'] = 'Smazat';
$lang['cs_CZ']['AssetAdmin_left.ss']['DELFOLDERS'] = 'Smazat vybrané složky';
$lang['cs_CZ']['AssetAdmin_left.ss']['FOLDERS'] = 'Složky';
$lang['cs_CZ']['AssetAdmin_left.ss']['GO'] = 'Proveď';
$lang['cs_CZ']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Vyberte složky, které chcete smazat. Pak klikněte na tlačítko níže';
$lang['cs_CZ']['AssetAdmin_left.ss']['TOREORG'] = 'Pro organizaci Vašich složek je přetáhněte, kam potřebujete.';
$lang['cs_CZ']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Prosím vyberte stránku vlevo.';
$lang['cs_CZ']['AssetAdmin_right.ss']['WELCOME'] = 'Vítejte v';
$lang['cs_CZ']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'Nemáte oprávnění pro nahrávání souborů do této složky.';
$lang['cs_CZ']['AssetTableField']['CREATED'] = 'Poprvé nahráno';
$lang['cs_CZ']['AssetTableField']['DIM'] = 'Rozměry';
$lang['cs_CZ']['AssetTableField']['FILENAME'] = 'Název souboru';
$lang['cs_CZ']['AssetTableField']['LASTEDIT'] = 'Naposledy změněno';
$lang['cs_CZ']['AssetTableField']['NOLINKS'] = 'Na tento soubor neodkazují žádné jiné stránky.';
$lang['cs_CZ']['AssetTableField']['OWNER'] = 'Vlastník';
$lang['cs_CZ']['AssetTableField']['PAGESLINKING'] = 'Následující stránky odkazují na tento soubor:';
$lang['cs_CZ']['AssetTableField']['SIZE'] = 'Velikost';
$lang['cs_CZ']['AssetTableField.ss']['DELFILE'] = 'Smazat tento soubor';
$lang['cs_CZ']['AssetTableField.ss']['DRAGTOFOLDER'] = 'Pro přesun souboru ho přetáhněte do složky vlevo';
$lang['cs_CZ']['AssetTableField']['TITLE'] = 'Titulek';
$lang['cs_CZ']['AssetTableField']['TYPE'] = 'Typ';
$lang['cs_CZ']['BulkLoaderAdmin']['CONFIRMBULK'] = 'Potvrdit velikost nahrávaných dat';
$lang['cs_CZ']['BulkLoaderAdmin']['CSVFILE'] = 'CSV soubor';
$lang['cs_CZ']['BulkLoaderAdmin']['DATALOADED'] = 'Tato data byla nahrána';
$lang['cs_CZ']['BulkLoaderAdmin']['PRESSCNT'] = 'Stiskněte pokračovat pro nahrání dat';
$lang['cs_CZ']['BulkLoaderAdmin']['PREVIEW'] = 'Náhled';
$lang['cs_CZ']['BulkLoaderAdmin_left.ss']['BATCHEF'] = 'Funkce skupinového vstupu';
$lang['cs_CZ']['BulkLoaderAdmin_left.ss']['FUNCTIONS'] = 'Funkce';
$lang['cs_CZ']['BulkLoaderAdmin_preview.ss']['RES'] = 'Výsledky';
$lang['cs_CZ']['CMSLeft.ss']['DELPAGE'] = 'Smazat stránky...';
$lang['cs_CZ']['CMSLeft.ss']['DELPAGES'] = 'Smazat vybrané stránky';
$lang['cs_CZ']['CMSLeft.ss']['GO'] = 'Proveď';
$lang['cs_CZ']['CMSLeft.ss']['NEWPAGE'] = 'Nová stránka...';
$lang['cs_CZ']['CMSLeft.ss']['SELECTPAGESDEL'] = 'Vyberte stránky, které chcete smazat. Pak klikněte na tlačítko níže';
$lang['cs_CZ']['CMSLeft.ss']['SITECONT'] = 'Obsah webu';
$lang['cs_CZ']['CMSMain']['CANCEL'] = 'Zrušit';
$lang['cs_CZ']['CMSMain']['CHOOSEREPORT'] = '(Vyberte výkaz)';
$lang['cs_CZ']['CMSMain']['COMPARINGV'] = 'Porovnáváte verze #%d a #%d';
$lang['cs_CZ']['CMSMain']['COPYPUBTOSTAGE'] = 'Opravdu chcete zkopírovat zveřejněný obsah do úschovny?';
$lang['cs_CZ']['CMSMain']['DELETEFP'] = 'Smazat ze zveřejněných';
$lang['cs_CZ']['CMSMain']['EMAIL'] = 'Email';
$lang['cs_CZ']['CMSMain']['GO'] = 'Proveď';
$lang['cs_CZ']['CMSMain']['METADESCOPT'] = 'Popis';
$lang['cs_CZ']['CMSMain']['METAKEYWORDSOPT'] = 'Klíčová slova';
$lang['cs_CZ']['CMSMain']['NEW'] = 'Nový';
$lang['cs_CZ']['CMSMain']['NOCONTENT'] = 'bez obsahu';
$lang['cs_CZ']['CMSMain']['NOTHINGASSIGNED'] = 'Nemáte nic přiřazeného.';
$lang['cs_CZ']['CMSMain']['NOWAITINGON'] = 'Nečekáte na nikoho.';
$lang['cs_CZ']['CMSMain']['NOWBROKEN'] = 'Následující stránky mají nyní neplatné odkazy:';
$lang['cs_CZ']['CMSMain']['NOWBROKEN2'] = 'Jejich vlastníci byli informováni emailem a tyto stránky opraví.';
$lang['cs_CZ']['CMSMain']['OK'] = 'OK';
$lang['cs_CZ']['CMSMain']['PAGEDEL'] = '%d stránka smazána';
$lang['cs_CZ']['CMSMain']['PAGENOTEXISTS'] = 'Tato stránka neexistuje';
$lang['cs_CZ']['CMSMain']['PAGEPUB'] = '%d stránek zveřejněno';
$lang['cs_CZ']['CMSMain']['PAGESDEL'] = '%d stránky (stránek) smazáno';
$lang['cs_CZ']['CMSMain']['PAGESPUB'] = '%d stránek zveřejněno';
$lang['cs_CZ']['CMSMain']['PAGETYPEOPT'] = 'Typ stránky';
$lang['cs_CZ']['CMSMain']['PRINT'] = 'Tisk';
$lang['cs_CZ']['CMSMain']['PUBALLCONFIRM'] = 'Prosím zveřejněte veškeré stránky z úschovny';
$lang['cs_CZ']['CMSMain']['PUBALLFUN'] = 'Funkce "Publikovat vše"';
$lang['cs_CZ']['CMSMain']['PUBALLFUN2'] = 'Stisknutí tohoto tlačítka se rovná zveřejnění každé jednotlivé stránky. Toto tlačítko má být použito, pokud se vyskytly rozsáhlé úpravy obsahu, jako např. když poprvé sestavujete stránky.';
$lang['cs_CZ']['CMSMain']['PUBPAGES'] = 'Hotovo: Zveřejněno %d stránek';
$lang['cs_CZ']['CMSMain']['REMOVEDFD'] = 'Smazáno z konceptů';
$lang['cs_CZ']['CMSMain']['REMOVEDPAGE'] = '\'%s\' odstraněno ze zveřejněných';
$lang['cs_CZ']['CMSMain']['RESTORE'] = 'Obnovit';
$lang['cs_CZ']['CMSMain']['RESTORED'] = '\'%s\' úspěšně obnoven';
$lang['cs_CZ']['CMSMain']['ROLLBACK'] = 'Vrátit se zpět na tuto verzi';
$lang['cs_CZ']['CMSMain']['ROLLEDBACKPUB'] = 'Vracím se zpět na zveřejněnou verzi. Číslo nové verze je #%d';
$lang['cs_CZ']['CMSMain']['ROLLEDBACKVERSION'] = 'Vracím se zpět na verzi #%d. Číslo nové verze je #%d';
$lang['cs_CZ']['CMSMain']['SAVE'] = 'Uložit';
$lang['cs_CZ']['CMSMain']['SENTTO'] = 'Posláno %s %s ke schválení.';
$lang['cs_CZ']['CMSMain']['STATUSOPT'] = 'Stav';
$lang['cs_CZ']['CMSMain']['TOTALPAGES'] = 'Celkem stránek:';
$lang['cs_CZ']['CMSMain']['VERSIONSNOPAGE'] = 'Nemohu najít stránku #%d';
$lang['cs_CZ']['CMSMain']['VIEWING'] = 'Prohlížíte verzi #%d, vytvořenou %s';
$lang['cs_CZ']['CMSMain']['VISITRESTORE'] = 'navštívit restorepage/(ID)';
$lang['cs_CZ']['CMSMain']['WAITINGON'] = 'Čekáte na jiné lidi, než dokončí práci na těchto <b>%d</b> stránkách.';
$lang['cs_CZ']['CMSMain']['WORKTODO'] = 'Máte na těchto <b>%d</b> stránkách práci k udělání.';
$lang['cs_CZ']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Přidáno do konceptů, ale ještě nezveřejněno';
$lang['cs_CZ']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Přidat kritérium...';
$lang['cs_CZ']['CMSMain_left.ss']['BATCHACTIONS'] = 'Skupinové akce';
$lang['cs_CZ']['CMSMain_left.ss']['CHANGED'] = 'změněno';
$lang['cs_CZ']['CMSMain_left.ss']['CLOSEBOX'] = 'klikněte pro zavření pole';
$lang['cs_CZ']['CMSMain_left.ss']['COMMENTS'] = 'Komentáře';
$lang['cs_CZ']['CMSMain_left.ss']['COMPAREMODE'] = 'Mód porovnávání (klikněte níže)';
$lang['cs_CZ']['CMSMain_left.ss']['CREATE'] = 'Vytvořit';
$lang['cs_CZ']['CMSMain_left.ss']['DEL'] = 'smazáno';
$lang['cs_CZ']['CMSMain_left.ss']['DELETECONFIRM'] = 'Smazat vybrané stránky';
$lang['cs_CZ']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Smazáno z konceptů, ale stále na stránkách';
$lang['cs_CZ']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Upraveno v konceptech, ale ještě nezveřejněno';
$lang['cs_CZ']['CMSMain_left.ss']['EDITEDSINCE'] = 'Naposledy upraveno';
$lang['cs_CZ']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'Povolit přesuny drag &amp; drop';
$lang['cs_CZ']['CMSMain_left.ss']['GO'] = 'Proveď';
$lang['cs_CZ']['CMSMain_left.ss']['KEY'] = 'Klíč:';
$lang['cs_CZ']['CMSMain_left.ss']['NEW'] = 'nový';
$lang['cs_CZ']['CMSMain_left.ss']['OPENBOX'] = 'klikněte pro otevření tohoto pole';
$lang['cs_CZ']['CMSMain_left.ss']['PAGEVERSIONH'] = 'Historie verzí stránky';
$lang['cs_CZ']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Zveřejnit vybrané stránky';
$lang['cs_CZ']['CMSMain_left.ss']['SEARCH'] = 'Hledat';
$lang['cs_CZ']['CMSMain_left.ss']['SEARCHTITLE'] = 'Prohledávat URL, Titulky, Titulky Menu, &amp; Obsah';
$lang['cs_CZ']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Vyberte stránky, které chcete změnit &amp; pak klikněte na akci:';
$lang['cs_CZ']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'Vyberte stránky, které chcete duplikovat, zda chcete duplikovat i jejich podstránky, a kam chcete nové kopie umístit';
$lang['cs_CZ']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Zobrazovat jen změněné stránky';
$lang['cs_CZ']['CMSMain_left.ss']['SHOWUNPUB'] = 'Ukázat nezveřejněné verze';
$lang['cs_CZ']['CMSMain_left.ss']['SITECONTENT TITLE'] = 'Obsah a struktura webu';
$lang['cs_CZ']['CMSMain_left.ss']['SITEREPORTS'] = 'Výkazy stránek';
$lang['cs_CZ']['CMSMain_left.ss']['TASKLIST'] = 'Seznam úkolů';
$lang['cs_CZ']['CMSMain_left.ss']['WAITINGON'] = 'Čeká se na';
$lang['cs_CZ']['CMSMain_right.ss']['ANYMESSAGE'] = 'Máte nějakou zprávu pro Vašeho redaktora?';
$lang['cs_CZ']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Prosím vyberte stránku vlevo.';
$lang['cs_CZ']['CMSMain_right.ss']['LOADING'] = 'nahrávání...';
$lang['cs_CZ']['CMSMain_right.ss']['MESSAGE'] = 'Zpráva';
$lang['cs_CZ']['CMSMain_right.ss']['SENDTO'] = 'Poslat';
$lang['cs_CZ']['CMSMain_right.ss']['STATUS'] = 'Stav';
$lang['cs_CZ']['CMSMain_right.ss']['SUBMIT'] = 'Odevzdat na schválení';
$lang['cs_CZ']['CMSMain_right.ss']['WELCOMETO'] = 'Vítejte v';
$lang['cs_CZ']['CMSMain_versions.ss']['AUTHOR'] = 'Autor';
$lang['cs_CZ']['CMSMain_versions.ss']['NOTPUB'] = 'Nezveřejněno';
$lang['cs_CZ']['CMSMain_versions.ss']['PUBR'] = 'Vydavatel';
$lang['cs_CZ']['CMSMain_versions.ss']['UNKNOWN'] = 'Neznámý';
$lang['cs_CZ']['CMSMain_versions.ss']['WHEN'] = 'Kdy';
$lang['cs_CZ']['CMSRight.ss']['CHOOSEPAGE'] = 'Prosím vyberte stránku vlevo.';
$lang['cs_CZ']['CMSRight.ss']['ECONTENT'] = 'Upravit obsah';
$lang['cs_CZ']['CMSRight.ss']['WELCOMETO'] = 'Vítejte v';
$lang['cs_CZ']['CommentList.ss']['CREATEDW'] = 'Komentáře se vytvářejí, kdykoliv provedete nějakou pracovní akci - Zveřejnění, Zamítnutí, Odevzdání.';
$lang['cs_CZ']['CommentList.ss']['NOCOM'] = 'Na tuto stránku ještě nikdo neposlal komentář.';
$lang['cs_CZ']['GenericDataAdmin_left.ss']['ADDLISTING'] = 'Přidat seznam';
$lang['cs_CZ']['GenericDataAdmin_left.ss']['SEARCHLISTINGS'] = 'Hledat v seznamech';
$lang['cs_CZ']['GenericDataAdmin_left.ss']['SEARCHRESULTS'] = 'Výsledky hledání';
$lang['cs_CZ']['ImageEditor.ss']['CANCEL'] = 'zrušit';
$lang['cs_CZ']['ImageEditor.ss']['CROP'] = 'oříznout';
$lang['cs_CZ']['ImageEditor.ss']['HEIGHT'] = 'výška';
$lang['cs_CZ']['ImageEditor.ss']['REDO'] = 'znovu';
$lang['cs_CZ']['ImageEditor.ss']['ROT'] = 'otočit';
$lang['cs_CZ']['ImageEditor.ss']['SAVE'] = 'uložit&nbsp;obrázek';
$lang['cs_CZ']['ImageEditor.ss']['UNDO'] = 'zpět';
$lang['cs_CZ']['ImageEditor.ss']['UNTITLED'] = 'Nepojmenovaný dokument';
$lang['cs_CZ']['ImageEditor.ss']['WIDTH'] = 'šířka';
$lang['cs_CZ']['LeftAndMain']['CHANGEDURL'] = 'URL změněno na \'%s\'';
$lang['cs_CZ']['LeftAndMain']['COMMENTS'] = 'Komentáře';
$lang['cs_CZ']['LeftAndMain']['FILESIMAGES'] = 'Soubory & Obrázky';
$lang['cs_CZ']['LeftAndMain']['HELP'] = 'Nápověda';
$lang['cs_CZ']['LeftAndMain']['NEWSLETTERS'] = 'Newsletter';
$lang['cs_CZ']['LeftAndMain']['PAGETYPE'] = 'Typ stránky:';
$lang['cs_CZ']['LeftAndMain']['PERMAGAIN'] = 'Byli jste odhlášeni z CMS. Pokud se chcete znovu přihlásit, zadejte níže své uživatelské jméno a heslo.';
$lang['cs_CZ']['LeftAndMain']['PERMALREADY'] = 'Je nám líto, ale nemůžete vstoupit do této části CMS. Pokud se chcete přihlásit jako někdo jiný, udělejte tak níže';
$lang['cs_CZ']['LeftAndMain']['PERMDEFAULT'] = 'Prosím vyberte metodu ověření a pro přístup do CMS zadejte své přihlašovací údaje.';
$lang['cs_CZ']['LeftAndMain']['PLEASESAVE'] = 'Prosím uložte stránku: Tato stránka nemohla být aktualizována, protože ještě nebyla uložena.';
$lang['cs_CZ']['LeftAndMain']['REPORTS'] = 'Výkazy';
$lang['cs_CZ']['LeftAndMain']['REQUESTERROR'] = 'Chyba v požadavku';
$lang['cs_CZ']['LeftAndMain']['SAVED'] = 'uloženo';
$lang['cs_CZ']['LeftAndMain']['SAVEDUP'] = 'Uloženo';
$lang['cs_CZ']['LeftAndMain']['SECURITY'] = 'Bezpečnost';
$lang['cs_CZ']['LeftAndMain']['SITECONTENT'] = 'Obsah webu';
$lang['cs_CZ']['LeftAndMain']['SITECONTENTLEFT'] = 'Obsah webu';
$lang['cs_CZ']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'Toto je';
$lang['cs_CZ']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'verze, kterou nyní používáte, je technicky CVS větev';
$lang['cs_CZ']['LeftAndMain.ss']['ARCHS'] = 'Archiv';
$lang['cs_CZ']['LeftAndMain.ss']['DRAFTS'] = 'Koncepty';
$lang['cs_CZ']['LeftAndMain.ss']['EDIT'] = 'Upravit';
$lang['cs_CZ']['LeftAndMain.ss']['EDITPROFILE'] = 'Profil';
$lang['cs_CZ']['LeftAndMain.ss']['LOADING'] = 'Nahrávání...';
$lang['cs_CZ']['LeftAndMain.ss']['LOGGEDINAS'] = 'Přihlášen jako';
$lang['cs_CZ']['LeftAndMain.ss']['LOGOUT'] = 'odhlásit';
$lang['cs_CZ']['LeftAndMain.ss']['PUBLIS'] = 'Zveřejněné';
$lang['cs_CZ']['LeftAndMain.ss']['SSWEB'] = 'Webová stránka SilverStripe';
$lang['cs_CZ']['LeftAndMain.ss']['SWITCHTO'] = 'Přepnout na:';
$lang['cs_CZ']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Zobrazení stránky:';
$lang['cs_CZ']['LeftAndMain']['STATISTICS'] = 'Statistiky';
$lang['cs_CZ']['LeftAndMain']['STATUSTO'] = 'Stav změněn na \'%s\'';
$lang['cs_CZ']['LeftAndMain']['TREESITECONTENT'] = 'Obsah webu';
$lang['cs_CZ']['MemberList']['ADD'] = 'Přidat';
$lang['cs_CZ']['MemberList']['EMAIL'] = 'Email';
$lang['cs_CZ']['MemberList']['FILTERBYG'] = 'Filtrovat podle skupin';
$lang['cs_CZ']['MemberList']['FN'] = 'Křestní jméno';
$lang['cs_CZ']['MemberList']['PASSWD'] = 'Heslo';
$lang['cs_CZ']['MemberList']['SEARCH'] = 'Hledat';
$lang['cs_CZ']['MemberList']['SN'] = 'Příjmení';
$lang['cs_CZ']['MemberList.ss']['FILTER'] = 'Filtr';
$lang['cs_CZ']['MemberList_Table.ss']['EMAIL'] = 'Emailová adresa';
$lang['cs_CZ']['MemberList_Table.ss']['FN'] = 'Křestní jméno';
$lang['cs_CZ']['MemberList_Table.ss']['PASSWD'] = 'Heslo';
$lang['cs_CZ']['MemberList_Table.ss']['SN'] = 'Příjmení';
$lang['cs_CZ']['MemberTableField']['ADD'] = 'Přidat';
$lang['cs_CZ']['MemberTableField']['ADDEDTOGROUP'] = 'Přidat člena do skupiny';
$lang['cs_CZ']['MemberTableField.ss']['ADDNEW'] = 'Přidat nový';
$lang['cs_CZ']['MemberTableField.ss']['DELETEMEMBER'] = 'Smazat tohoto člena';
$lang['cs_CZ']['MemberTableField.ss']['EDITMEMBER'] = 'Upravit tohoto člena';
$lang['cs_CZ']['MemberTableField.ss']['SHOWMEMBER'] = 'Zobrazit tohoto člena';
$lang['cs_CZ']['NewsletterAdmin']['FROMEM'] = 'Z emailové adresy';
$lang['cs_CZ']['NewsletterAdmin']['MEWDRAFTMEWSL'] = 'Nový koncept newsletteru';
$lang['cs_CZ']['NewsletterAdmin']['NEWLIST'] = 'Nový mailing list';
$lang['cs_CZ']['NewsletterAdmin']['NEWNEWSLTYPE'] = 'Nový typ newsletteru';
$lang['cs_CZ']['NewsletterAdmin']['NEWSLTYPE'] = 'Typ newsletteru';
$lang['cs_CZ']['NewsletterAdmin']['PLEASEENTERMAIL'] = 'Prosím zadejte emailovou adresu';
$lang['cs_CZ']['NewsletterAdmin']['RESEND'] = 'Znovu poslat';
$lang['cs_CZ']['NewsletterAdmin']['SAVE'] = 'Uložit';
$lang['cs_CZ']['NewsletterAdmin']['SAVED'] = 'Uloženo';
$lang['cs_CZ']['NewsletterAdmin']['SEND'] = 'Poslat...';
$lang['cs_CZ']['NewsletterAdmin']['SENDING'] = 'Posílám emaily...';
$lang['cs_CZ']['NewsletterAdmin']['SENTTESTTO'] = 'Test poslán';
$lang['cs_CZ']['NewsletterAdmin']['SHOWCONTENTS'] = 'Zobrazit obsah';
$lang['cs_CZ']['NewsletterAdmin_BouncedList.ss']['EMADD'] = 'Emailová adresa';
$lang['cs_CZ']['NewsletterAdmin_BouncedList.ss']['HAVEBOUNCED'] = 'Emaily, které nebylo možné odeslat';
$lang['cs_CZ']['NewsletterAdmin_BouncedList.ss']['NOBOUNCED'] = 'Všechny emaily byly úspěšně odeslány.';
$lang['cs_CZ']['NewsletterAdmin_BouncedList.ss']['UNAME'] = 'Uživatelské jméno';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['ADDDRAFT'] = 'Přidat nový koncept';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['ADDTYPE'] = 'Přidat nový typ';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['CREATE'] = 'Vytvořit';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['DEL'] = 'Smazat';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['DELETEDRAFTS'] = 'Smazat vybrané koncepty';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['GO'] = 'Proveď';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['NEWSLETTERS'] = 'Newslettery';
$lang['cs_CZ']['NewsletterAdmin_left.ss']['SELECTDRAFTS'] = 'Vyberte koncepty, které chcete smazat. Pak klikněte na tlačítko níže';
$lang['cs_CZ']['NewsletterAdmin_right.ss']['CANCEL'] = 'Zrušit';
$lang['cs_CZ']['NewsletterAdmin_right.ss']['ENTIRE'] = 'Zaslat celému mailing listu';
$lang['cs_CZ']['NewsletterAdmin_right.ss']['ONLYNOT'] = 'Zaslat jen lidem, kteří zprávu předtím nedostali';
$lang['cs_CZ']['NewsletterAdmin_right.ss']['SEND'] = 'Zaslat newsletter';
$lang['cs_CZ']['NewsletterAdmin_right.ss']['SENDTEST'] = 'Test poslán';
$lang['cs_CZ']['NewsletterAdmin_right.ss']['WELCOME1'] = 'Vítejte v';
$lang['cs_CZ']['NewsletterAdmin_right.ss']['WELCOME2'] = 'sekci administrace novinek. Prosím vyberte složku vlevo.';
$lang['cs_CZ']['NewsletterAdmin_SiteTree.ss']['DRAFTS'] = 'Koncepty';
$lang['cs_CZ']['NewsletterAdmin_SiteTree.ss']['MAILLIST'] = 'Mailing list';
$lang['cs_CZ']['NewsletterAdmin_SiteTree.ss']['SENT'] = 'Poslané položky';
$lang['cs_CZ']['NewsletterAdmin_UnsubscribedList.ss']['NOUNSUB'] = 'Žádní uživatelé se neodhlásili z příjmu tohoto newsletteru.';
$lang['cs_CZ']['NewsletterAdmin_UnsubscribedList.ss']['UNAME'] = 'Uživateské jméno';
$lang['cs_CZ']['NewsletterAdmin_UnsubscribedList.ss']['UNSUBON'] = 'Odhlášen z';
$lang['cs_CZ']['NewsletterList.ss']['CHOOSEDRAFT1'] = 'Prosím vyberte koncept vlevo nebo';
$lang['cs_CZ']['NewsletterList.ss']['CHOOSEDRAFT2'] = 'přidejte nový';
$lang['cs_CZ']['NewsletterList.ss']['CHOOSESENT'] = 'Prosím vyberte zaslanou položku vlevo.';
$lang['cs_CZ']['Newsletter_RecipientImportField.ss']['CHANGED'] = 'Počet změněných detailů:';
$lang['cs_CZ']['Newsletter_RecipientImportField.ss']['IMPORTED'] = 'Noví importovaní členové:';
$lang['cs_CZ']['Newsletter_RecipientImportField.ss']['IMPORTNEW'] = 'Importováni noví členové';
$lang['cs_CZ']['Newsletter_RecipientImportField.ss']['SEC'] = 'vteřin';
$lang['cs_CZ']['Newsletter_RecipientImportField.ss']['SKIPPED'] = 'Záznamů přeskočeno:';
$lang['cs_CZ']['Newsletter_RecipientImportField.ss']['TIME'] = 'Čas:';
$lang['cs_CZ']['Newsletter_RecipientImportField.ss']['UPDATED'] = 'Aktualizovaní členové:';
$lang['cs_CZ']['Newsletter_RecipientImportField_Table.ss']['CONTENTSOF'] = 'Obsah';
$lang['cs_CZ']['Newsletter_RecipientImportField_Table.ss']['NO'] = 'Zrušit';
$lang['cs_CZ']['Newsletter_RecipientImportField_Table.ss']['RECIMPORTED'] = 'Příjemci importováni z';
$lang['cs_CZ']['Newsletter_RecipientImportField_Table.ss']['YES'] = 'Potvrdit';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['DATE'] = 'Datum';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['EMAIL'] = 'Email';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['FN'] = 'Křestní jméno';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['NEWSNEVERSENT'] = 'Následujícím odebíratelům nebyly nikdy zaslán newsletter';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['RES'] = 'Výsledek';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['SENDBOUNCED'] = 'Zaslání následujícím příjemcům selhalo';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['SENDFAIL'] = 'Zaslání následujícím příjemců selhalo';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['SENTOK'] = 'Zaslání následujícím příjemcům bylo úspěšné';
$lang['cs_CZ']['Newsletter_SentStatusReport.ss']['SN'] = 'Příjmení';
$lang['cs_CZ']['PageComment']['COMMENTBY'] = 'Komentář od \'%s\' na %s';
$lang['cs_CZ']['PageCommentInterface.ss']['COMMENTS'] = 'Komentáře';
$lang['cs_CZ']['PageCommentInterface.ss']['NEXT'] = 'další';
$lang['cs_CZ']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'Nikdo na této stránce ještě nepřidal komentář.';
$lang['cs_CZ']['PageCommentInterface.ss']['POSTCOM'] = 'Zaslat komentář';
$lang['cs_CZ']['PageCommentInterface.ss']['PREV'] = 'předchozí';
$lang['cs_CZ']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'tento komentář není spam';
$lang['cs_CZ']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'tento komentář je spam';
$lang['cs_CZ']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Zaslal(a)';
$lang['cs_CZ']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'odstranit tento komentář';
$lang['cs_CZ']['ReportAdmin_left.ss']['REPORTS'] = 'Výkazy';
$lang['cs_CZ']['ReportAdmin_right.ss']['WELCOME1'] = 'Vítejte v';
$lang['cs_CZ']['ReportAdmin_right.ss']['WELCOME2'] = 'sekci výkazů. Prosím vyberte výkaz vlevo.';
$lang['cs_CZ']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Výkazy';
$lang['cs_CZ']['SecurityAdmin']['ADDMEMBER'] = 'Přidat člena';
$lang['cs_CZ']['SecurityAdmin']['ADVANCEDONLY'] = 'Tato sekce je pouze pro pokročilé uživatele. Pro více informací se podívejte na <a href="http://doc.silverstripe.com/doku.php?id=permissions:codes" target="_blank">tuto stránku</a>.';
$lang['cs_CZ']['SecurityAdmin']['NEWGROUP'] = 'Nová skupina';
$lang['cs_CZ']['SecurityAdmin']['SAVE'] = 'Uložit';
$lang['cs_CZ']['SecurityAdmin']['SGROUPS'] = 'Bezpečnostní skupiny';
$lang['cs_CZ']['SecurityAdmin_left.ss']['CREATE'] = 'Vytvořit';
$lang['cs_CZ']['SecurityAdmin_left.ss']['DEL'] = 'Smazat';
$lang['cs_CZ']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Smazat vybrané skupiny';
$lang['cs_CZ']['SecurityAdmin_left.ss']['GO'] = 'Proveď';
$lang['cs_CZ']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Bezpečnostní skupiny';
$lang['cs_CZ']['SecurityAdmin_left.ss']['SELECT'] = 'Vyberte stárnky, které chcete smazat. Pak klikněte na tlačítko níže';
$lang['cs_CZ']['SecurityAdmin_left.ss']['TOREORG'] = 'Pro reorganizaci Vašich stránek, přetáhněte stránky, kam potřebujete.';
$lang['cs_CZ']['SecurityAdmin_right.ss']['WELCOME1'] = 'Vítejte v';
$lang['cs_CZ']['SecurityAdmin_right.ss']['WELCOME2'] = 'sekci administrace bezpečnosti. Prosím vyberte skupinu vlevo.';
$lang['cs_CZ']['SideReport']['EMPTYPAGES'] = 'Prázdné stránky';
$lang['cs_CZ']['SideReport']['LAST2WEEKS'] = 'Stránky upravené během posledních 2 týdnů';
$lang['cs_CZ']['SideReport']['REPEMPTY'] = 'Výkaz %s je prázdný.';
$lang['cs_CZ']['StaticExporter']['BASEURL'] = 'Základní URL';
$lang['cs_CZ']['StaticExporter']['EXPORTTO'] = 'Exportovat do této složky';
$lang['cs_CZ']['StaticExporter']['FOLDEREXPORT'] = 'Složka, kam se má exportovat';
$lang['cs_CZ']['StaticExporter']['NAME'] = 'Statický exportér';
$lang['cs_CZ']['StaticExporter']['ONETHATEXISTS'] = 'Prosím určete existující složku';
$lang['cs_CZ']['StatisticsAdmin_left.ss']['OVERV'] = 'Přehled';
$lang['cs_CZ']['StatisticsAdmin_left.ss']['REPTYPES'] = 'Typy výkazů';
$lang['cs_CZ']['StatisticsAdmin_left.ss']['USERS'] = 'Uživatelé';
$lang['cs_CZ']['SubmittedFormEmail.ss']['SUBMITTED'] = 'Následující data byla odevzdána na Váš web:';
$lang['cs_CZ']['TaskList.ss']['BY'] = '-';
$lang['cs_CZ']['ThumbnailStripField']['NOTAFOLDER'] = 'Toto není složka';
$lang['cs_CZ']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(Vyberte složku výše)';
$lang['cs_CZ']['ViewArchivedEmail.ss']['CANACCESS'] = 'Můžete přistupovat k archivu pomocí tohoto odkazu:';
$lang['cs_CZ']['ViewArchivedEmail.ss']['HAVEASKED'] = 'Požadovali jste prohlížet obsah našich stránek během';
$lang['cs_CZ']['WaitingOn.ss']['ATO'] = 'přiřazeno k';

?>