<?php

/**
 * Polish (Poland) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('pl_PL', $lang) && is_array($lang['pl_PL'])) {
	$lang['pl_PL'] = array_merge($lang['en_US'], $lang['pl_PL']);
} else {
	$lang['pl_PL'] = $lang['en_US'];
}

$lang['pl_PL']['AssetAdmin']['CHOOSEFILE'] = 'Wybierz plik';
$lang['pl_PL']['AssetAdmin']['CONTENTMODBY'] = 'Zawartość modyfikowalna przez';
$lang['pl_PL']['AssetAdmin']['CONTENTUSABLEBY'] = 'Zawartość używalna przez ';
$lang['pl_PL']['AssetAdmin']['CREATED'] = 'Wgrany jako pierwszy';
$lang['pl_PL']['AssetAdmin']['DELETEDX'] = 'Usunięto %s plików. %s';
$lang['pl_PL']['AssetAdmin']['DELETEUNUSEDTHUMBNAILS'] = 'Usuń nieużywane miniatury';
$lang['pl_PL']['AssetAdmin']['DELSELECTED'] = 'Usuń zaznaczone pliki';
$lang['pl_PL']['AssetAdmin']['DETAILSTAB'] = 'Detale';
$lang['pl_PL']['AssetAdmin']['FILENAME'] = 'Nazwa pliku';
$lang['pl_PL']['AssetAdmin']['FILESREADY'] = 'Pliki gotowe do wgrania';
$lang['pl_PL']['AssetAdmin']['FILESTAB'] = 'Pliki';
$lang['pl_PL']['AssetAdmin']['LASTEDITED'] = 'Ostatni nadpisany ';
$lang['pl_PL']['AssetAdmin']['MOVEDX'] = 'Przeniesiono %s plików';
$lang['pl_PL']['AssetAdmin']['NEWFOLDER'] = 'Nowy Folder';
$lang['pl_PL']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Nie ma nic do wgrania';
$lang['pl_PL']['AssetAdmin']['NOWBROKEN'] = 'Te strony mają zepsute linki';
$lang['pl_PL']['AssetAdmin']['ONLYADMINS'] = 'Tylko administrator może wgrać %s pliki.';
$lang['pl_PL']['AssetAdmin']['OWNER'] = 'Właściciel';
$lang['pl_PL']['AssetAdmin']['SAVEDFILE'] = 'Zapisano plik %s';
$lang['pl_PL']['AssetAdmin']['SAVEFOLDERNAME'] = 'Zapisz nazwę folderu';
$lang['pl_PL']['AssetAdmin']['TITLE'] = 'Tytuł';
$lang['pl_PL']['AssetAdmin']['TOOLARGE'] = '5S jest za duży (%s). Pliki tego typu nie mogą być większe niż %s.';
$lang['pl_PL']['AssetAdmin']['TYPE'] = 'Rodzaj';
$lang['pl_PL']['AssetAdmin']['UNUSEDFILESTAB'] = 'Nieużywane pliki';
$lang['pl_PL']['AssetAdmin']['UNUSEDFILESTITLE'] = 'Nieużywane pliki';
$lang['pl_PL']['AssetAdmin']['UNUSEDTHUMBNAILSTITLE'] = 'Nieużywane miniatury';
$lang['pl_PL']['AssetAdmin']['UPLOAD'] = 'Wgraj pliki z listy poniżej';
$lang['pl_PL']['AssetAdmin']['UPLOADEDX'] = 'Wgrano pliki (%s)';
$lang['pl_PL']['AssetAdmin']['UPLOADTAB'] = 'Wgraj';
$lang['pl_PL']['AssetAdmin']['VIEWASSET'] = 'Zobacz zawartość';
$lang['pl_PL']['AssetAdmin']['VIEWEDITASSET'] = 'Zobacz/Edytuj zawartość';
$lang['pl_PL']['AssetAdmin_left.ss']['CREATE'] = 'Stwórz';
$lang['pl_PL']['AssetAdmin_left.ss']['DELETE'] = 'Usuń ...';
$lang['pl_PL']['AssetAdmin_left.ss']['DELFOLDERS'] = 'Usuń zaznaczone foldery';
$lang['pl_PL']['AssetAdmin_left.ss']['FOLDERS'] = 'Foldery';
$lang['pl_PL']['AssetAdmin_left.ss']['GO'] = 'Idź';
$lang['pl_PL']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Wybierz foldery, które chcesz usunąć i kliknij przycisk poniżej';
$lang['pl_PL']['AssetAdmin_left.ss']['TOREORG'] = 'Aby zreorganizować twoje foldery, przenieś je w wybrane miejsca';
$lang['pl_PL']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Proszę wybrać stronę po lewej';
$lang['pl_PL']['AssetAdmin_right.ss']['WELCOME'] = 'Witamy w ';
$lang['pl_PL']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'Nie masz uprawnień do wgrania plików do tego folderu ';
$lang['pl_PL']['AssetTableField']['CREATED'] = 'Pierwszy wgrany';
$lang['pl_PL']['AssetTableField']['DIM'] = 'Rozmiar';
$lang['pl_PL']['AssetTableField']['FILENAME'] = 'Nazwa pliku';
$lang['pl_PL']['AssetTableField']['LASTEDIT'] = 'Ostatnia zmiana';
$lang['pl_PL']['AssetTableField']['NOLINKS'] = 'Do tego pliku nie prowadzą żadne odnośniki.';
$lang['pl_PL']['AssetTableField']['OWNER'] = 'Właściciel';
$lang['pl_PL']['AssetTableField']['PAGESLINKING'] = 'Następujące strony zawierają linki do tej strony:';
$lang['pl_PL']['AssetTableField']['SIZE'] = 'Rozmiar';
$lang['pl_PL']['AssetTableField.ss']['DELFILE'] = 'Usuń ten plik';
$lang['pl_PL']['AssetTableField.ss']['DRAGTOFOLDER'] = 'Przenieś folder do pliku po lewej';
$lang['pl_PL']['AssetTableField']['TITLE'] = 'Tytuł';
$lang['pl_PL']['AssetTableField']['TYPE'] = 'Rodzaj';
$lang['pl_PL']['BulkLoaderAdmin']['CONFIRMBULK'] = 'Potwierdź dużą ilość załadowanych';
$lang['pl_PL']['BulkLoaderAdmin']['CSVFILE'] = 'Plik CSV';
$lang['pl_PL']['BulkLoaderAdmin']['DATALOADED'] = 'Te dane zostały załadowane w';
$lang['pl_PL']['BulkLoaderAdmin']['PRESSCNT'] = 'Naciśnij kontynuuj aby wgrać dane do';
$lang['pl_PL']['BulkLoaderAdmin']['PREVIEW'] = 'Podgląd';
$lang['pl_PL']['BulkLoaderAdmin_left.ss']['BATCHEF'] = 'Otwórz plik funkcji';
$lang['pl_PL']['BulkLoaderAdmin_left.ss']['FUNCTIONS'] = 'Funkcje';
$lang['pl_PL']['BulkLoaderAdmin_preview.ss']['RES'] = 'Wyniki';
$lang['pl_PL']['CMSLeft.ss']['DELPAGE'] = 'Usuń strony ...';
$lang['pl_PL']['CMSLeft.ss']['DELPAGES'] = 'Usuń zaznaczone strony';
$lang['pl_PL']['CMSLeft.ss']['GO'] = 'Idż';
$lang['pl_PL']['CMSLeft.ss']['NEWPAGE'] = 'Nowa strona ...';
$lang['pl_PL']['CMSLeft.ss']['SELECTPAGESDEL'] = 'Zaznacz strony które chcesz usunąć i kliknij przycisk poniżej';
$lang['pl_PL']['CMSLeft.ss']['SITECONT'] = 'Zawartość strony';
$lang['pl_PL']['CMSMain']['CANCEL'] = 'Anuluj';
$lang['pl_PL']['CMSMain']['CHOOSEREPORT'] = '(Wybierz raport)';
$lang['pl_PL']['CMSMain']['COMPARINGV'] = 'Porównaj wersję #%d i #%d';
$lang['pl_PL']['CMSMain']['COPYPUBTOSTAGE'] = 'Naprawdę chcesz skopiować publikowaną treść tej strony?';
$lang['pl_PL']['CMSMain']['DELETEFP'] = 'usuń z opublikowanej strony';
$lang['pl_PL']['CMSMain']['EMAIL'] = 'E-mail';
$lang['pl_PL']['CMSMain']['GO'] = 'Idź';
$lang['pl_PL']['CMSMain']['METADESCOPT'] = 'Opis';
$lang['pl_PL']['CMSMain']['METAKEYWORDSOPT'] = 'Słowa kluczowe';
$lang['pl_PL']['CMSMain']['NEW'] = 'Nowy';
$lang['pl_PL']['CMSMain']['NOCONTENT'] = 'brak zawartości';
$lang['pl_PL']['CMSMain']['NOTHINGASSIGNED'] = 'Nie masz nic przydzielonego';
$lang['pl_PL']['CMSMain']['NOWAITINGON'] = 'Obecnie nie oczekujesz na nikogo.';
$lang['pl_PL']['CMSMain']['NOWBROKEN'] = 'Poniższe strony mają nieprawidłowe linki:';
$lang['pl_PL']['CMSMain']['NOWBROKEN2'] = 'Właściciele zostaną powiadomieni mailem i naprawią strony';
$lang['pl_PL']['CMSMain']['OK'] = 'OK';
$lang['pl_PL']['CMSMain']['PAGEDEL'] = 'Usunięto stronę %d';
$lang['pl_PL']['CMSMain']['PAGENOTEXISTS'] = 'Ta strona nie istnieje';
$lang['pl_PL']['CMSMain']['PAGEPUB'] = '%d opublikowana strona';
$lang['pl_PL']['CMSMain']['PAGESDEL'] = 'Usunięto strony %d';
$lang['pl_PL']['CMSMain']['PAGESPUB'] = '%d opublikowane strony';
$lang['pl_PL']['CMSMain']['PAGETYPEOPT'] = 'Typ strony';
$lang['pl_PL']['CMSMain']['PRINT'] = 'Drukuj';
$lang['pl_PL']['CMSMain']['PUBALLCONFIRM'] = 'Opublikuj każdą stronę witryny, kopiując zawartość z brudnopisu';
$lang['pl_PL']['CMSMain']['PUBALLFUN'] = 'Funkcja "Opublikuj wszystkie"';
$lang['pl_PL']['CMSMain']['PUBALLFUN2'] = 'Naciśnięcie przycisku jest równoznaczne z naciśnięciem "publikuj" każdej strony. Używaj tego gdy zamierzasz edytować całą zawartość, np. kiedy strona jest tworzona po raz pierwszy';
$lang['pl_PL']['CMSMain']['PUBPAGES'] = 'Gotowe: Opublikowano %d strony';
$lang['pl_PL']['CMSMain']['REMOVEDFD'] = 'Usuń ze strony roboczej';
$lang['pl_PL']['CMSMain']['REMOVEDPAGE'] = 'Usunięto \'%s\' z opublikowanej strony';
$lang['pl_PL']['CMSMain']['RESTORE'] = 'Odzyskaj';
$lang['pl_PL']['CMSMain']['RESTORED'] = 'Odzyskiwanie\'%s\' udane';
$lang['pl_PL']['CMSMain']['ROLLBACK'] = 'Wróć do tej wersji.';
$lang['pl_PL']['CMSMain']['ROLLEDBACKPUB'] = 'Poprzednia opublikowana wersja. Nowy numer wersji to #%d';
$lang['pl_PL']['CMSMain']['ROLLEDBACKVERSION'] = 'Poprzednia wersja to #%d. Nowy numer wersji to #%d';
$lang['pl_PL']['CMSMain']['SAVE'] = 'Zapisz';
$lang['pl_PL']['CMSMain']['SENTTO'] = 'Wysłano do %s %s po akceptację';
$lang['pl_PL']['CMSMain']['STATUSOPT'] = 'Status';
$lang['pl_PL']['CMSMain']['TOTALPAGES'] = 'W sumie stron:';
$lang['pl_PL']['CMSMain']['VERSIONSNOPAGE'] = 'Nie można znaleźć strony #%d';
$lang['pl_PL']['CMSMain']['VIEWING'] = 'Oglądasz wersję #%d, stworzoną %s';
$lang['pl_PL']['CMSMain']['VISITRESTORE'] = 'zobacz restorepage/(ID)';
$lang['pl_PL']['CMSMain']['WAITINGON'] = 'Poczekaj na innych ludzi pracujących nad tymi <b>%</b> stronami';
$lang['pl_PL']['CMSMain']['WORKTODO'] = 'Pracujesz na tych <b>%</b> stronach';
$lang['pl_PL']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Dodałeś do oczekujących i jeszcze nie opublikowanych stron';
$lang['pl_PL']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Dodaj kryterium ...';
$lang['pl_PL']['CMSMain_left.ss']['BATCHACTIONS'] = 'Akcja pliku';
$lang['pl_PL']['CMSMain_left.ss']['CHANGED'] = 'zmienione';
$lang['pl_PL']['CMSMain_left.ss']['CLOSEBOX'] = 'kliknij aby zamknąć';
$lang['pl_PL']['CMSMain_left.ss']['COMMENTS'] = 'Komentarze';
$lang['pl_PL']['CMSMain_left.ss']['COMPAREMODE'] = 'Tryb porównania (wybierz 2 poniżej)';
$lang['pl_PL']['CMSMain_left.ss']['CREATE'] = 'Stwórz';
$lang['pl_PL']['CMSMain_left.ss']['DEL'] = 'usunięte';
$lang['pl_PL']['CMSMain_left.ss']['DELETECONFIRM'] = 'Usuń zaznaczone strony';
$lang['pl_PL']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Usunąłeś z oczekujących stron ale ciągle jest aktywna';
$lang['pl_PL']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Zmieniłeś oczekującą stronę ale jeszcze nie opublikowałeś ';
$lang['pl_PL']['CMSMain_left.ss']['EDITEDSINCE'] = 'Edytowane od';
$lang['pl_PL']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'Zezwól na zmianę przenieś i puść ';
$lang['pl_PL']['CMSMain_left.ss']['GO'] = 'idź';
$lang['pl_PL']['CMSMain_left.ss']['KEY'] = 'Klucz:';
$lang['pl_PL']['CMSMain_left.ss']['NEW'] = 'nowy';
$lang['pl_PL']['CMSMain_left.ss']['OPENBOX'] = 'kliknij aby otworzyć';
$lang['pl_PL']['CMSMain_left.ss']['PAGEVERSIONH'] = 'Wersja archiwalna strony';
$lang['pl_PL']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Publikuj zaznaczone strony';
$lang['pl_PL']['CMSMain_left.ss']['SEARCH'] = 'Szukaj';
$lang['pl_PL']['CMSMain_left.ss']['SEARCHTITLE'] = 'Szukaj przez URL, Tytuł, Tytuł Menu i Zawartość';
$lang['pl_PL']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Zaznacz strony które chcesz zmienić i kliknij polecenie: ';
$lang['pl_PL']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'Wybierz strony, które chcesz zduplikować, to, czy ich podstrony powinny zostać uwzględnione oraz gdzie chcesz umieścić duplikaty';
$lang['pl_PL']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Pokaż tylko zmienione strony';
$lang['pl_PL']['CMSMain_left.ss']['SHOWUNPUB'] = 'pokaż nieopublikowane wersje';
$lang['pl_PL']['CMSMain_left.ss']['SITECONTENT TITLE'] = 'Zawartość i struktura strony';
$lang['pl_PL']['CMSMain_left.ss']['SITEREPORTS'] = 'Raporty strony';
$lang['pl_PL']['CMSMain_left.ss']['TASKLIST'] = 'Lista zadań';
$lang['pl_PL']['CMSMain_left.ss']['WAITINGON'] = 'Czekam na';
$lang['pl_PL']['CMSMain_right.ss']['ANYMESSAGE'] = 'Czy masz jakieś wiadomości do edytowania? ';
$lang['pl_PL']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Proszę wybrać stronę po lewej';
$lang['pl_PL']['CMSMain_right.ss']['LOADING'] = 'wczytuję...';
$lang['pl_PL']['CMSMain_right.ss']['MESSAGE'] = 'wiadomość';
$lang['pl_PL']['CMSMain_right.ss']['SENDTO'] = 'Wyślij do ';
$lang['pl_PL']['CMSMain_right.ss']['STATUS'] = 'Status';
$lang['pl_PL']['CMSMain_right.ss']['SUBMIT'] = 'przedstaw do akceptacji';
$lang['pl_PL']['CMSMain_right.ss']['WELCOMETO'] = 'Witamy w ';
$lang['pl_PL']['CMSMain_versions.ss']['AUTHOR'] = 'Autor';
$lang['pl_PL']['CMSMain_versions.ss']['NOTPUB'] = 'Nie opublikowany';
$lang['pl_PL']['CMSMain_versions.ss']['PUBR'] = 'Publikujący';
$lang['pl_PL']['CMSMain_versions.ss']['UNKNOWN'] = 'Nieznany';
$lang['pl_PL']['CMSMain_versions.ss']['WHEN'] = 'Kiedy';
$lang['pl_PL']['CMSRight.ss']['CHOOSEPAGE'] = 'Proszę wybrać stronę po lewej';
$lang['pl_PL']['CMSRight.ss']['ECONTENT'] = 'Edytuj zawartość';
$lang['pl_PL']['CMSRight.ss']['WELCOMETO'] = 'Witamy w';
$lang['pl_PL']['CommentList.ss']['CREATEDW'] = 'Komentarze są tworzone za każdym razem, gdy jest wykonywane jedno z poleceń - Opublikuj, Odrzuć, Zatwierdź';
$lang['pl_PL']['CommentList.ss']['NOCOM'] = 'Nie ma komentarzy na tej stronie';
$lang['pl_PL']['GenericDataAdmin_left.ss']['ADDLISTING'] = 'Dodaj listę';
$lang['pl_PL']['GenericDataAdmin_left.ss']['SEARCHLISTINGS'] = 'Szukaj listy';
$lang['pl_PL']['GenericDataAdmin_left.ss']['SEARCHRESULTS'] = 'Rezultat wyszukiwania';
$lang['pl_PL']['ImageEditor.ss']['CANCEL'] = 'skasuj';
$lang['pl_PL']['ImageEditor.ss']['CROP'] = 'wytnij';
$lang['pl_PL']['ImageEditor.ss']['HEIGHT'] = 'wysokość';
$lang['pl_PL']['ImageEditor.ss']['REDO'] = 'powtórz';
$lang['pl_PL']['ImageEditor.ss']['ROT'] = 'odwróć';
$lang['pl_PL']['ImageEditor.ss']['SAVE'] = 'zapisz&nbsp;obraz';
$lang['pl_PL']['ImageEditor.ss']['UNDO'] = 'cofnij ';
$lang['pl_PL']['ImageEditor.ss']['UNTITLED'] = 'Nienazwany dokument';
$lang['pl_PL']['ImageEditor.ss']['WIDTH'] = 'szerokość';
$lang['pl_PL']['LeftAndMain']['CHANGEDURL'] = 'Zmieniony URL to \'%s\'';
$lang['pl_PL']['LeftAndMain']['COMMENTS'] = 'Komentarze';
$lang['pl_PL']['LeftAndMain']['FILESIMAGES'] = 'Pliki i Obrazy';
$lang['pl_PL']['LeftAndMain']['HELP'] = 'Pomoc';
$lang['pl_PL']['LeftAndMain']['NEWSLETTERS'] = 'Newslettery';
$lang['pl_PL']['LeftAndMain']['PAGETYPE'] = 'Rodzaj strony:';
$lang['pl_PL']['LeftAndMain']['PERMAGAIN'] = 'Zostałeś wylogowany z CMSa. Jeśli chcesz zalogować się ponownie, wpisz username i hasło poniżej';
$lang['pl_PL']['LeftAndMain']['PERMALREADY'] = 'Niestety nie masz dostępu do tej części CMS. Jeśli chcesz zaloguj się jako inny użytkownik poniżej.';
$lang['pl_PL']['LeftAndMain']['PERMDEFAULT'] = 'Proszę wybrać metodę identyfikacji i wpisać swoje dane, aby uruchomić CMSa.';
$lang['pl_PL']['LeftAndMain']['PLEASESAVE'] = 'Proszę zapisać stronę: Ta strona nie może być nadpisana ponieważ nie została jeszcze zapisana.';
$lang['pl_PL']['LeftAndMain']['REPORTS'] = 'Raporty';
$lang['pl_PL']['LeftAndMain']['REQUESTERROR'] = 'Błąd zapytania';
$lang['pl_PL']['LeftAndMain']['SAVED'] = 'zapisane';
$lang['pl_PL']['LeftAndMain']['SAVEDUP'] = 'Zapisane';
$lang['pl_PL']['LeftAndMain']['SECURITY'] = 'Bezpieczeństwo';
$lang['pl_PL']['LeftAndMain']['SITECONTENT'] = 'Zawartość strony';
$lang['pl_PL']['LeftAndMain']['SITECONTENTLEFT'] = 'Zawartość strony';
$lang['pl_PL']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'To jest';
$lang['pl_PL']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'wersja, której aktualnie używasz, jest gałęzią CVS';
$lang['pl_PL']['LeftAndMain.ss']['ARCHS'] = 'Archiwalne strony';
$lang['pl_PL']['LeftAndMain.ss']['DRAFTS'] = 'Wersje robocze';
$lang['pl_PL']['LeftAndMain.ss']['EDIT'] = 'Edytuj';
$lang['pl_PL']['LeftAndMain.ss']['EDITPROFILE'] = 'Profil';
$lang['pl_PL']['LeftAndMain.ss']['LOADING'] = 'Wczytywanie...';
$lang['pl_PL']['LeftAndMain.ss']['LOGGEDINAS'] = 'Zalogowany jako';
$lang['pl_PL']['LeftAndMain.ss']['LOGOUT'] = 'Wyloguj';
$lang['pl_PL']['LeftAndMain.ss']['PUBLIS'] = 'Opublikowane strony';
$lang['pl_PL']['LeftAndMain.ss']['SSWEB'] = 'Strona Silverstripe';
$lang['pl_PL']['LeftAndMain.ss']['SWITCHTO'] = 'Przełącz na:';
$lang['pl_PL']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Widok strony:';
$lang['pl_PL']['LeftAndMain']['STATISTICS'] = 'Statystyki';
$lang['pl_PL']['LeftAndMain']['STATUSTO'] = 'Status zmieniony na \'%s\'';
$lang['pl_PL']['LeftAndMain']['TREESITECONTENT'] = 'Zawartość strony';
$lang['pl_PL']['MemberList']['ADD'] = 'Dodaj';
$lang['pl_PL']['MemberList']['EMAIL'] = 'Email';
$lang['pl_PL']['MemberList']['FILTERBYG'] = 'Szukaj według grup';
$lang['pl_PL']['MemberList']['FN'] = 'Imię';
$lang['pl_PL']['MemberList']['PASSWD'] = 'Hasło';
$lang['pl_PL']['MemberList']['SEARCH'] = 'Szukaj';
$lang['pl_PL']['MemberList']['SN'] = 'Nazwisko';
$lang['pl_PL']['MemberList.ss']['FILTER'] = 'Filtr';
$lang['pl_PL']['MemberList_Table.ss']['EMAIL'] = 'Adres e-mail';
$lang['pl_PL']['MemberList_Table.ss']['FN'] = 'Imię';
$lang['pl_PL']['MemberList_Table.ss']['PASSWD'] = 'Hasło';
$lang['pl_PL']['MemberList_Table.ss']['SN'] = 'Nazwisko';
$lang['pl_PL']['MemberTableField']['ADD'] = 'Dodaj';
$lang['pl_PL']['MemberTableField']['ADDEDTOGROUP'] = 'Dodaj użytkownika do grupy';
$lang['pl_PL']['MemberTableField.ss']['ADDNEW'] = 'Dodaj nowość';
$lang['pl_PL']['MemberTableField.ss']['DELETEMEMBER'] = 'Usuń tego użytkownika';
$lang['pl_PL']['MemberTableField.ss']['EDITMEMBER'] = 'Edytuj tego użytkownika';
$lang['pl_PL']['MemberTableField.ss']['SHOWMEMBER'] = 'Pokaż tego użytkownika';
$lang['pl_PL']['NewsletterAdmin']['FROMEM'] = 'Adres nadawcy';
$lang['pl_PL']['NewsletterAdmin']['MEWDRAFTMEWSL'] = 'Nowe oczekujące newslettery';
$lang['pl_PL']['NewsletterAdmin']['NEWLIST'] = 'Nowa lista mailingowa';
$lang['pl_PL']['NewsletterAdmin']['NEWNEWSLTYPE'] = 'Nowy rodzaj newslettera';
$lang['pl_PL']['NewsletterAdmin']['NEWSLTYPE'] = 'Rodzaj newslettera';
$lang['pl_PL']['NewsletterAdmin']['PLEASEENTERMAIL'] = 'Proszę wprowadź adres e-mail';
$lang['pl_PL']['NewsletterAdmin']['RESEND'] = 'Prześlij ponownie';
$lang['pl_PL']['NewsletterAdmin']['SAVE'] = 'Zapisz';
$lang['pl_PL']['NewsletterAdmin']['SAVED'] = 'Zapisane';
$lang['pl_PL']['NewsletterAdmin']['SEND'] = 'Wyślij ...';
$lang['pl_PL']['NewsletterAdmin']['SENDING'] = 'Wysyłanie emaili ...';
$lang['pl_PL']['NewsletterAdmin']['SENTTESTTO'] = 'Wysłano test do';
$lang['pl_PL']['NewsletterAdmin']['SHOWCONTENTS'] = 'Pokaż zawartość';
$lang['pl_PL']['NewsletterAdmin_BouncedList.ss']['EMADD'] = 'Adres e-mail';
$lang['pl_PL']['NewsletterAdmin_BouncedList.ss']['HAVEBOUNCED'] = 'Email został odrzucony';
$lang['pl_PL']['NewsletterAdmin_BouncedList.ss']['NOBOUNCED'] = 'Brak odrzuconych maili';
$lang['pl_PL']['NewsletterAdmin_BouncedList.ss']['UNAME'] = 'Nazwa użytkownika';
$lang['pl_PL']['NewsletterAdmin_left.ss']['ADDDRAFT'] = 'Dodaj nową wersję roboczą';
$lang['pl_PL']['NewsletterAdmin_left.ss']['ADDTYPE'] = 'Dodaj nowy wzór';
$lang['pl_PL']['NewsletterAdmin_left.ss']['CREATE'] = 'Stwórz ...';
$lang['pl_PL']['NewsletterAdmin_left.ss']['DEL'] = 'Usuń ...';
$lang['pl_PL']['NewsletterAdmin_left.ss']['DELETEDRAFTS'] = 'Usuń zaznaczone wersje robocze';
$lang['pl_PL']['NewsletterAdmin_left.ss']['GO'] = 'Idź';
$lang['pl_PL']['NewsletterAdmin_left.ss']['NEWSLETTERS'] = 'Newslettery';
$lang['pl_PL']['NewsletterAdmin_left.ss']['SELECTDRAFTS'] = 'Wybierz wersje robocze które chcesz usunąć i kliknij przycisk poniżej';
$lang['pl_PL']['NewsletterAdmin_right.ss']['CANCEL'] = 'Anuluj';
$lang['pl_PL']['NewsletterAdmin_right.ss']['ENTIRE'] = 'Wyślij do całej listy mailingowej';
$lang['pl_PL']['NewsletterAdmin_right.ss']['ONLYNOT'] = 'Wyślij tylko do osób do których poprzednio nie wysłałeś';
$lang['pl_PL']['NewsletterAdmin_right.ss']['SEND'] = 'Wyślij newsletter';
$lang['pl_PL']['NewsletterAdmin_right.ss']['SENDTEST'] = 'Wyślij test do ';
$lang['pl_PL']['NewsletterAdmin_right.ss']['WELCOME1'] = 'Witamy w';
$lang['pl_PL']['NewsletterAdmin_right.ss']['WELCOME2'] = 'Administracja newsletterem. Proszę wybrać folder po lewej';
$lang['pl_PL']['NewsletterAdmin_SiteTree.ss']['DRAFTS'] = 'Oczekujące';
$lang['pl_PL']['NewsletterAdmin_SiteTree.ss']['MAILLIST'] = 'Lista mailingowa';
$lang['pl_PL']['NewsletterAdmin_SiteTree.ss']['SENT'] = 'Wyślij pozycję';
$lang['pl_PL']['NewsletterAdmin_UnsubscribedList.ss']['NOUNSUB'] = 'Nie ma użytkowników nie zapisanych do tego newslettera';
$lang['pl_PL']['NewsletterAdmin_UnsubscribedList.ss']['UNAME'] = 'Nazwa użytkownika';
$lang['pl_PL']['NewsletterAdmin_UnsubscribedList.ss']['UNSUBON'] = 'Nie zapisany';
$lang['pl_PL']['NewsletterList.ss']['CHOOSEDRAFT1'] = 'Proszę wybrać wersje robocze po lewej lub';
$lang['pl_PL']['NewsletterList.ss']['CHOOSEDRAFT2'] = 'dodaj jeden';
$lang['pl_PL']['NewsletterList.ss']['CHOOSESENT'] = 'Proszę wybrać pozycję wyślij po lewej';
$lang['pl_PL']['Newsletter_RecipientImportField.ss']['CHANGED'] = 'Ilość zmienionych detali:';
$lang['pl_PL']['Newsletter_RecipientImportField.ss']['IMPORTED'] = 'Nowi użytkownicy zaimportowani:';
$lang['pl_PL']['Newsletter_RecipientImportField.ss']['IMPORTNEW'] = 'zaimportowani nowi użytkownicy';
$lang['pl_PL']['Newsletter_RecipientImportField.ss']['SEC'] = 'sekundy';
$lang['pl_PL']['Newsletter_RecipientImportField.ss']['SKIPPED'] = 'Archiwalne dokumenty:';
$lang['pl_PL']['Newsletter_RecipientImportField.ss']['TIME'] = 'Czas zużyty:';
$lang['pl_PL']['Newsletter_RecipientImportField.ss']['UPDATED'] = 'Uaktualnieni użytkownicy:';
$lang['pl_PL']['Newsletter_RecipientImportField_Table.ss']['CONTENTSOF'] = 'Zawartość';
$lang['pl_PL']['Newsletter_RecipientImportField_Table.ss']['NO'] = 'Anuluj';
$lang['pl_PL']['Newsletter_RecipientImportField_Table.ss']['RECIMPORTED'] = 'Odbiorcy pobrani z ';
$lang['pl_PL']['Newsletter_RecipientImportField_Table.ss']['YES'] = 'Potwierdź';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['DATE'] = 'Data';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['EMAIL'] = 'Email';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['FN'] = 'Imię';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['NEWSNEVERSENT'] = 'Newsletter nigdy nie był wysłany do następujących użytkowników';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['RES'] = 'Rezultat';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['SENDBOUNCED'] = 'Wysłanie do następujących odbiorców zostało odrzucone';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['SENDFAIL'] = 'Wysyłanie do następujących odbiorców nie powiodło się';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['SENTOK'] = 'Wysyłanie do następujących odbiorców powiodło się';
$lang['pl_PL']['Newsletter_SentStatusReport.ss']['SN'] = 'Nazwisko';
$lang['pl_PL']['PageComment']['COMMENTBY'] = 'Komentarz \'%s\' do %s';
$lang['pl_PL']['PageCommentInterface.ss']['COMMENTS'] = 'Komentarze';
$lang['pl_PL']['PageCommentInterface.ss']['NEXT'] = 'następny';
$lang['pl_PL']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'Nikt nie skomentował jeszcze tej strony';
$lang['pl_PL']['PageCommentInterface.ss']['POSTCOM'] = 'Dodaj komentarz';
$lang['pl_PL']['PageCommentInterface.ss']['PREV'] = 'poprzedni';
$lang['pl_PL']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'ten komentarz nie jest spamem';
$lang['pl_PL']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'ten komentarz jest spamem';
$lang['pl_PL']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Dodane przez';
$lang['pl_PL']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'zmień ten komentarz';
$lang['pl_PL']['ReportAdmin_left.ss']['REPORTS'] = 'Raporty';
$lang['pl_PL']['ReportAdmin_right.ss']['WELCOME1'] = 'Witamy w';
$lang['pl_PL']['ReportAdmin_right.ss']['WELCOME2'] = 'Sekcja raportów. Proszę wybrać jeden z raportów po lewej';
$lang['pl_PL']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Raporty';
$lang['pl_PL']['SecurityAdmin']['ADDMEMBER'] = 'Dodaj użytkownika';
$lang['pl_PL']['SecurityAdmin']['ADVANCEDONLY'] = 'Ta sekcja przeznaczona jest tylko dla zaawansowanych użytkowników. Zobacz <a href="http://doc.silverstripe.com/doku.php?id=permissions:codes" target="_blank">tę stronę</a> aby uzyskać więcej informacji.';
$lang['pl_PL']['SecurityAdmin']['NEWGROUP'] = 'Nowa grupa';
$lang['pl_PL']['SecurityAdmin']['SAVE'] = 'Zapisz';
$lang['pl_PL']['SecurityAdmin']['SGROUPS'] = 'Grupa bezpieczeństwa';
$lang['pl_PL']['SecurityAdmin_left.ss']['CREATE'] = 'Stwórz';
$lang['pl_PL']['SecurityAdmin_left.ss']['DEL'] = 'Usuń ...';
$lang['pl_PL']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Usuń zaznaczone grupy';
$lang['pl_PL']['SecurityAdmin_left.ss']['GO'] = 'Idź';
$lang['pl_PL']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Grupa bezpieczeństwa';
$lang['pl_PL']['SecurityAdmin_left.ss']['SELECT'] = 'Zaznacz strony które chcesz usunąć i kliknij przycisk poniżej';
$lang['pl_PL']['SecurityAdmin_left.ss']['TOREORG'] = 'Aby zmienić układ witryny, przeciągnij strony w odpowiadające Ci miejsca.';
$lang['pl_PL']['SecurityAdmin_right.ss']['WELCOME1'] = 'Witamy w';
$lang['pl_PL']['SecurityAdmin_right.ss']['WELCOME2'] = 'Sekcja administracji bezpieczeństwem. Proszę wybrać jedną z grup po lewej';
$lang['pl_PL']['SideReport']['EMPTYPAGES'] = 'Puste strony';
$lang['pl_PL']['SideReport']['LAST2WEEKS'] = 'Strony zmienione w ostatnich 2 tygodniach';
$lang['pl_PL']['SideReport']['REPEMPTY'] = '%s raport jest pusty';
$lang['pl_PL']['StaticExporter']['BASEURL'] = 'Podstawowy URL';
$lang['pl_PL']['StaticExporter']['EXPORTTO'] = 'Eksportuj do tego folderu';
$lang['pl_PL']['StaticExporter']['FOLDEREXPORT'] = 'Folder przeniesiony do';
$lang['pl_PL']['StaticExporter']['NAME'] = 'Statyczny eksport';
$lang['pl_PL']['StaticExporter']['ONETHATEXISTS'] = 'Proszę wybierz dostępny folder';
$lang['pl_PL']['StatisticsAdmin_left.ss']['OVERV'] = 'Podgląd';
$lang['pl_PL']['StatisticsAdmin_left.ss']['REPTYPES'] = 'Typ raportu';
$lang['pl_PL']['StatisticsAdmin_left.ss']['USERS'] = 'Użytkownicy';
$lang['pl_PL']['SubmittedFormEmail.ss']['SUBMITTED'] = 'Następujące dane zostały przesłane do Twojej strony:';
$lang['pl_PL']['TaskList.ss']['BY'] = 'przez';
$lang['pl_PL']['ThumbnailStripField']['NOTAFOLDER'] = 'To nie jest folder';
$lang['pl_PL']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(Wybierz powyższy folder)
';
$lang['pl_PL']['ViewArchivedEmail.ss']['CANACCESS'] = 'Masz dostęp do archiwalnej strony pod adresem:';
$lang['pl_PL']['ViewArchivedEmail.ss']['HAVEASKED'] = 'Zobacz zawartość naszej strony na';
$lang['pl_PL']['WaitingOn.ss']['ATO'] = 'przypisane do';

?>