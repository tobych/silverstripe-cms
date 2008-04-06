<?php

/**
 * Hungarian (Hungary) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('hu_HU', $lang) && is_array($lang['hu_HU'])) {
	$lang['hu_HU'] = array_merge($lang['en_US'], $lang['hu_HU']);
} else {
	$lang['hu_HU'] = $lang['en_US'];
}

$lang['hu_HU']['AssetAdmin']['CHOOSEFILE'] = 'Válassz fájlt';
$lang['hu_HU']['AssetAdmin']['CONTENTMODBY'] = 'A tartalmat módosíthatja';
$lang['hu_HU']['AssetAdmin']['CONTENTUSABLEBY'] = 'A tartalom használatára jogosult ';
$lang['hu_HU']['AssetAdmin']['CREATED'] = 'Először feltöltve';
$lang['hu_HU']['AssetAdmin']['DELETEDX'] = '%s fájl törölve. %s';
$lang['hu_HU']['AssetAdmin']['DELETEUNUSEDTHUMBNAILS'] = 'Nem használt kisképek törlése';
$lang['hu_HU']['AssetAdmin']['DELSELECTED'] = 'Kiválasztott fájlok törlése';
$lang['hu_HU']['AssetAdmin']['DETAILSTAB'] = 'Részletek';
$lang['hu_HU']['AssetAdmin']['FILENAME'] = 'Fájlnév';
$lang['hu_HU']['AssetAdmin']['FILESREADY'] = 'Feltöltésre készen álló fájlok:';
$lang['hu_HU']['AssetAdmin']['FILESTAB'] = 'Fájlok';
$lang['hu_HU']['AssetAdmin']['LASTEDITED'] = 'Utoljára frissítve';
$lang['hu_HU']['AssetAdmin']['MOVEDX'] = '%s fájl áthelyezve.';
$lang['hu_HU']['AssetAdmin']['NEWFOLDER'] = 'Új mappa';
$lang['hu_HU']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Nem volt semmi, amit fel lehetett volna tölteni.';
$lang['hu_HU']['AssetAdmin']['NOWBROKEN'] = 'Ezen oldalak linkjei hibásak lettek: ';
$lang['hu_HU']['AssetAdmin']['ONLYADMINS'] = 'Csak adminisztrátorok tölthetnek fel %s fájlokat.';
$lang['hu_HU']['AssetAdmin']['OWNER'] = 'Tulajdonos';
$lang['hu_HU']['AssetAdmin']['SAVEDFILE'] = '%s fájl elmentésre került.';
$lang['hu_HU']['AssetAdmin']['SAVEFOLDERNAME'] = 'Mappanév mentése';
$lang['hu_HU']['AssetAdmin']['TITLE'] = 'Cím';
$lang['hu_HU']['AssetAdmin']['TOOLARGE'] = 'A %s fájl túl nagy méretű (%s). Az ilyen típusú fájlok mérete nem lehet nagyobb mint %s.';
$lang['hu_HU']['AssetAdmin']['TYPE'] = 'Típus';
$lang['hu_HU']['AssetAdmin']['UNUSEDFILESTAB'] = 'Nem használt fájlok';
$lang['hu_HU']['AssetAdmin']['UNUSEDFILESTITLE'] = 'Nem használt fájlok';
$lang['hu_HU']['AssetAdmin']['UNUSEDTHUMBNAILSTITLE'] = 'Nem használt kisképek';
$lang['hu_HU']['AssetAdmin']['UPLOAD'] = 'Alább felsorolt fájlok feltöltése';
$lang['hu_HU']['AssetAdmin']['UPLOADEDX'] = '%s fájl feltöltve.';
$lang['hu_HU']['AssetAdmin']['UPLOADTAB'] = 'Feltöltés';
$lang['hu_HU']['AssetAdmin']['VIEWASSET'] = 'Fájl megtekintése';
$lang['hu_HU']['AssetAdmin']['VIEWEDITASSET'] = 'Fájl megtekintése/szerkesztése';
$lang['hu_HU']['AssetAdmin_left.ss']['CREATE'] = 'Létrehozás';
$lang['hu_HU']['AssetAdmin_left.ss']['DELETE'] = 'Törlés';
$lang['hu_HU']['AssetAdmin_left.ss']['DELFOLDERS'] = 'Kiválasztott mappák törlése.';
$lang['hu_HU']['AssetAdmin_left.ss']['FOLDERS'] = 'Mappák';
$lang['hu_HU']['AssetAdmin_left.ss']['GO'] = 'Mehet';
$lang['hu_HU']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Válaszd ki a mappákat, amiket töröni szeretnél, majd kattints a lentebbi gombra.';
$lang['hu_HU']['AssetAdmin_left.ss']['TOREORG'] = 'A mappák újraszervezéséhez helyezd őket a kívánt helyre az egérrel.';
$lang['hu_HU']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Kérünk, válassz egy oldalt a bal oldali listából.';
$lang['hu_HU']['AssetAdmin_right.ss']['WELCOME'] = 'Üdvözöllek itt:';
$lang['hu_HU']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'Nincs jogosultságod fájlokat feltölteni ebbe a mappába.';
$lang['hu_HU']['AssetTableField']['CREATED'] = 'Először feltöltve';
$lang['hu_HU']['AssetTableField']['DIM'] = 'Képméret';
$lang['hu_HU']['AssetTableField']['FILENAME'] = 'Fájlnév';
$lang['hu_HU']['AssetTableField']['LASTEDIT'] = 'Utoljára változott';
$lang['hu_HU']['AssetTableField']['NOLINKS'] = 'Ezen fájlra nem mutat link egy oldalról sem.';
$lang['hu_HU']['AssetTableField']['OWNER'] = 'Tulajdonos';
$lang['hu_HU']['AssetTableField']['PAGESLINKING'] = 'A következő oldalak mutatanak erre a fájlra: ';
$lang['hu_HU']['AssetTableField']['SIZE'] = 'Méret';
$lang['hu_HU']['AssetTableField.ss']['DELFILE'] = 'Fájl törlése';
$lang['hu_HU']['AssetTableField.ss']['DRAGTOFOLDER'] = 'A fájlt az áthelyezéshez, húzd a bal oldalon lévő mappába.';
$lang['hu_HU']['AssetTableField']['TITLE'] = 'Cím';
$lang['hu_HU']['AssetTableField']['TYPE'] = 'Típus';
$lang['hu_HU']['BulkLoaderAdmin']['CONFIRMBULK'] = 'Tömeges töltés megerősítése';
$lang['hu_HU']['BulkLoaderAdmin']['CSVFILE'] = 'CSV fájl';
$lang['hu_HU']['BulkLoaderAdmin']['DATALOADED'] = 'Ez az adat betöltődött';
$lang['hu_HU']['BulkLoaderAdmin']['PRESSCNT'] = 'Kattints a folytatásra az adat betöltéséhez';
$lang['hu_HU']['BulkLoaderAdmin']['PREVIEW'] = 'Előnézet';
$lang['hu_HU']['BulkLoaderAdmin_left.ss']['BATCHEF'] = 'Kötegelt adatbeviteli funkciók';
$lang['hu_HU']['BulkLoaderAdmin_left.ss']['FUNCTIONS'] = 'Funkciók';
$lang['hu_HU']['BulkLoaderAdmin_preview.ss']['RES'] = 'Eredmények';
$lang['hu_HU']['CMSLeft.ss']['DELPAGE'] = 'Oldalak törlése…';
$lang['hu_HU']['CMSLeft.ss']['DELPAGES'] = 'Kiválasztott oldalak törlése';
$lang['hu_HU']['CMSLeft.ss']['GO'] = 'Mehet';
$lang['hu_HU']['CMSLeft.ss']['NEWPAGE'] = 'Új oldal...';
$lang['hu_HU']['CMSLeft.ss']['SELECTPAGESDEL'] = 'Válszd ki a törlendő oldalakat, majd kattints a lentebbi gombra.';
$lang['hu_HU']['CMSLeft.ss']['SITECONT'] = 'Oldaltartalom';
$lang['hu_HU']['CMSMain']['CANCEL'] = 'Mégse';
$lang['hu_HU']['CMSMain']['CHOOSEREPORT'] = '(Válassz egy jelentést.)';
$lang['hu_HU']['CMSMain']['COMPARINGV'] = 'A #%d és a #%d verziót hasonlítod össze.';
$lang['hu_HU']['CMSMain']['COPYPUBTOSTAGE'] = 'Biztosan át akarod másolni a publikált tartalmat az fázisoldalra?';
$lang['hu_HU']['CMSMain']['DELETEFP'] = 'Törlés a publikált weblapról';
$lang['hu_HU']['CMSMain']['EMAIL'] = 'E-mail';
$lang['hu_HU']['CMSMain']['GO'] = 'Mehet';
$lang['hu_HU']['CMSMain']['METADESCOPT'] = 'Leírás';
$lang['hu_HU']['CMSMain']['METAKEYWORDSOPT'] = 'Kulcsaszavak';
$lang['hu_HU']['CMSMain']['NEW'] = 'Új';
$lang['hu_HU']['CMSMain']['NOCONTENT'] = 'nincs tartalom';
$lang['hu_HU']['CMSMain']['NOTHINGASSIGNED'] = 'Nincs semmi se hozzádrendelve.';
$lang['hu_HU']['CMSMain']['NOWAITINGON'] = 'Nem vársz senkire.';
$lang['hu_HU']['CMSMain']['NOWBROKEN'] = 'A következő oldalak linkjei hibásak lettek:';
$lang['hu_HU']['CMSMain']['NOWBROKEN2'] = 'A tulajdonosoknak kiküldésre került egy e-mail, és majd javítani fogják ezeket az oldalakat.';
$lang['hu_HU']['CMSMain']['OK'] = 'Rendben';
$lang['hu_HU']['CMSMain']['PAGEDEL'] = '%d oldal törlésre került.';
$lang['hu_HU']['CMSMain']['PAGENOTEXISTS'] = 'Ez az oldal nem létezik.';
$lang['hu_HU']['CMSMain']['PAGEPUB'] = '%d oldal publikálva.';
$lang['hu_HU']['CMSMain']['PAGESDEL'] = '%d oldal törlésre került.';
$lang['hu_HU']['CMSMain']['PAGESPUB'] = '%d oldal publikálva.';
$lang['hu_HU']['CMSMain']['PAGETYPEOPT'] = 'Oldal típusa';
$lang['hu_HU']['CMSMain']['PRINT'] = 'Nyomtatás';
$lang['hu_HU']['CMSMain']['PUBALLCONFIRM'] = 'Minden oldal publikálása, fázistartalmak kitevése';
$lang['hu_HU']['CMSMain']['PUBALLFUN'] = '"Összes publikálása" funkció';
$lang['hu_HU']['CMSMain']['PUBALLFUN2'] = 'Ennek a gombnak a megnyomásával ugyanazt érheted el, mintha az összes oldalon megnyomnád a publikálás gombot. Akkor célszerű használni, ha a tartalom nagy változáson ment keresztül, mint például az oldal kezdeti felépítésénél.';
$lang['hu_HU']['CMSMain']['PUBPAGES'] = 'Befejezve: %d oldal publikálva.';
$lang['hu_HU']['CMSMain']['REMOVEDFD'] = 'Eltávolítva a piszkozatoldalról.';
$lang['hu_HU']['CMSMain']['REMOVEDPAGE'] = '„%s” törlésre került a publikált oldalról.';
$lang['hu_HU']['CMSMain']['RESTORE'] = 'Visszaállítás';
$lang['hu_HU']['CMSMain']['RESTORED'] = '„%s” sikeresen visszaállításra került.';
$lang['hu_HU']['CMSMain']['ROLLBACK'] = 'Visszaállítás ehhez a verzióhoz';
$lang['hu_HU']['CMSMain']['ROLLEDBACKPUB'] = 'Visszaállítva a publikált verzióhoz. Az új verziószám #%d.';
$lang['hu_HU']['CMSMain']['ROLLEDBACKVERSION'] = 'Visszaálítva a #%d verzióra. Az új verziószám #%d.';
$lang['hu_HU']['CMSMain']['SAVE'] = 'Mentés';
$lang['hu_HU']['CMSMain']['SENTTO'] = 'Elküldve jóváhagyásra %2$s %$1s számára.';
$lang['hu_HU']['CMSMain']['STATUSOPT'] = 'Állapot';
$lang['hu_HU']['CMSMain']['TOTALPAGES'] = 'Oldalak száma:';
$lang['hu_HU']['CMSMain']['VERSIONSNOPAGE'] = 'A #%d oldal nem található.';
$lang['hu_HU']['CMSMain']['VIEWING'] = 'Jelenleg a #%d verziót nézed. Létrehozva: %s';
$lang['hu_HU']['CMSMain']['VISITRESTORE'] = 'Látogasd meg: restorepage/(ID)';
$lang['hu_HU']['CMSMain']['WAITINGON'] = 'Ezen az <b>%d</b> oldalon más emberekre vársz, hogy dolgozzanak rajta.';
$lang['hu_HU']['CMSMain']['WORKTODO'] = 'Ezen a <b>%d</b> oldalon még el kell végezned néhány dolgot.';
$lang['hu_HU']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Hozzáadva a piszkozatoldalhoz, még nem publikálva';
$lang['hu_HU']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Kritérium hozzáadása…';
$lang['hu_HU']['CMSMain_left.ss']['BATCHACTIONS'] = 'Kötegelt műveletek';
$lang['hu_HU']['CMSMain_left.ss']['CHANGED'] = 'megváltozatva';
$lang['hu_HU']['CMSMain_left.ss']['CLOSEBOX'] = 'Kattints ide a doboz bezáráshoz.';
$lang['hu_HU']['CMSMain_left.ss']['COMMENTS'] = 'Megjegyzések';
$lang['hu_HU']['CMSMain_left.ss']['COMPAREMODE'] = 'Összehasonlító mód (kattints a két összehasonlítandó oldalra lejjebb)';
$lang['hu_HU']['CMSMain_left.ss']['CREATE'] = 'Létrehozás';
$lang['hu_HU']['CMSMain_left.ss']['DEL'] = 'törölve';
$lang['hu_HU']['CMSMain_left.ss']['DELETECONFIRM'] = 'Kiválasztott oldalak törlése';
$lang['hu_HU']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Piszkozatoldalról törölve, de az igazi oldalon még fent van';
$lang['hu_HU']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Piszkozatoldalon szerkesztve, még nem publikálva';
$lang['hu_HU']['CMSMain_left.ss']['EDITEDSINCE'] = 'Szerkesztve ezóta';
$lang['hu_HU']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'A fogd &amp; vidd típusú újrarendezés engedélyezése';
$lang['hu_HU']['CMSMain_left.ss']['GO'] = 'Mehet';
$lang['hu_HU']['CMSMain_left.ss']['KEY'] = 'Kulcs:';
$lang['hu_HU']['CMSMain_left.ss']['NEW'] = 'Új';
$lang['hu_HU']['CMSMain_left.ss']['OPENBOX'] = 'Kattints ide a doboz kinyitásához.';
$lang['hu_HU']['CMSMain_left.ss']['PAGEVERSIONH'] = 'Oldal-verzióelőzmények';
$lang['hu_HU']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Kiválasztott oldalak publikálása';
$lang['hu_HU']['CMSMain_left.ss']['SEARCH'] = 'Keresés';
$lang['hu_HU']['CMSMain_left.ss']['SEARCHTITLE'] = 'Keresés az URL-ekben, a címekben, a menü címekben és a tartalmakban';
$lang['hu_HU']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Válaszd ki a megváltozatatandó oldalakat, majd kattints egy műveletre:';
$lang['hu_HU']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'Válaszd ki az oldalakat, melyeket duplikálni szeretnél, azt hogy az aloldalait is át szeretnéd-e másolni, illetve hogy hova szeretnéd helyezni a duplikátumot.';
$lang['hu_HU']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Csak megváltozott oldalak mutatása';
$lang['hu_HU']['CMSMain_left.ss']['SHOWUNPUB'] = 'Nem publikált verziók megjelenítése';
$lang['hu_HU']['CMSMain_left.ss']['SITECONTENT TITLE'] = 'Oldaltartalom és szerkezet';
$lang['hu_HU']['CMSMain_left.ss']['SITEREPORTS'] = 'Oldal jelentések';
$lang['hu_HU']['CMSMain_left.ss']['TASKLIST'] = 'Feladatlista';
$lang['hu_HU']['CMSMain_left.ss']['WAITINGON'] = 'Várakozunk';
$lang['hu_HU']['CMSMain_right.ss']['ANYMESSAGE'] = 'Van valami üzeneted a szerkesztőnek?';
$lang['hu_HU']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Kérünk, válassz egy oldalt a bal oldali listából.';
$lang['hu_HU']['CMSMain_right.ss']['LOADING'] = 'Töltés...';
$lang['hu_HU']['CMSMain_right.ss']['MESSAGE'] = 'Üzenet';
$lang['hu_HU']['CMSMain_right.ss']['SENDTO'] = 'Küldés';
$lang['hu_HU']['CMSMain_right.ss']['STATUS'] = 'Állapot';
$lang['hu_HU']['CMSMain_right.ss']['SUBMIT'] = 'Elküldés jóváhagyásra';
$lang['hu_HU']['CMSMain_right.ss']['WELCOMETO'] = 'Üdvözlünk itt:';
$lang['hu_HU']['CMSMain_versions.ss']['AUTHOR'] = 'Szerző';
$lang['hu_HU']['CMSMain_versions.ss']['NOTPUB'] = 'Nem publikált';
$lang['hu_HU']['CMSMain_versions.ss']['PUBR'] = 'Publikáló';
$lang['hu_HU']['CMSMain_versions.ss']['UNKNOWN'] = 'Ismeretlen';
$lang['hu_HU']['CMSMain_versions.ss']['WHEN'] = 'Mikor';
$lang['hu_HU']['CMSRight.ss']['CHOOSEPAGE'] = 'Kérünk, válassz egy oldalt a bal oldali listából.';
$lang['hu_HU']['CMSRight.ss']['ECONTENT'] = 'Tartalom szerkesztése';
$lang['hu_HU']['CMSRight.ss']['WELCOMETO'] = 'Üdvözlünk itt:';
$lang['hu_HU']['CommentList.ss']['CREATEDW'] = 'A jegyzetek akkor kerülnek létrehozásra amikor a „munkafolyamat műveletek” egyike elvégzésre kerül: publikálás, visszavonás vagy elküldés.';
$lang['hu_HU']['CommentList.ss']['NOCOM'] = 'Nincsenek megjegyzések ezen az oldalon.';
$lang['hu_HU']['GenericDataAdmin_left.ss']['ADDLISTING'] = 'Listázás hozzáadása';
$lang['hu_HU']['GenericDataAdmin_left.ss']['SEARCHLISTINGS'] = 'Listázások keresése';
$lang['hu_HU']['GenericDataAdmin_left.ss']['SEARCHRESULTS'] = 'Kereséseredmények';
$lang['hu_HU']['ImageEditor.ss']['CANCEL'] = 'mégse';
$lang['hu_HU']['ImageEditor.ss']['CROP'] = 'kivágás';
$lang['hu_HU']['ImageEditor.ss']['HEIGHT'] = 'magasság';
$lang['hu_HU']['ImageEditor.ss']['REDO'] = 'visszaállítás';
$lang['hu_HU']['ImageEditor.ss']['ROT'] = 'elforgatás';
$lang['hu_HU']['ImageEditor.ss']['SAVE'] = 'kép&nbsp;elmentése';
$lang['hu_HU']['ImageEditor.ss']['UNDO'] = 'visszavonás';
$lang['hu_HU']['ImageEditor.ss']['UNTITLED'] = 'Cím nélküli dokumentum';
$lang['hu_HU']['ImageEditor.ss']['WIDTH'] = 'szélesség';
$lang['hu_HU']['LeftAndMain']['CHANGEDURL'] = 'Az URL megváltoztaásra került „%s”-re.';
$lang['hu_HU']['LeftAndMain']['COMMENTS'] = 'Megyjegyzések';
$lang['hu_HU']['LeftAndMain']['FILESIMAGES'] = 'Fájlok és képek';
$lang['hu_HU']['LeftAndMain']['HELP'] = 'Segítség';
$lang['hu_HU']['LeftAndMain']['NEWSLETTERS'] = 'Hírlevelek';
$lang['hu_HU']['LeftAndMain']['PAGETYPE'] = 'Oldal típusa:';
$lang['hu_HU']['LeftAndMain']['PERMAGAIN'] = 'Kiléptetésre kerültél a CMS-ből. Ha újra be szeretnél lépni, add meg alább a felhasználóneved és jelszavad.';
$lang['hu_HU']['LeftAndMain']['PERMALREADY'] = 'Nincs jogosultságod a CMS ezen részének megtekintéséhez. Ha be szeretnél jelentkezni más felhasználóként, lejjebb megteheted.';
$lang['hu_HU']['LeftAndMain']['PERMDEFAULT'] = 'A CMS- be való belépéshez, kérünk válassz egy azonosítási módot, és írd be az azonosítási infomációkat.';
$lang['hu_HU']['LeftAndMain']['PLEASESAVE'] = 'Kérjük, mentsd el az oldalt: az oldalt nem lehetett frissíteni, mivel még nem került elmentésre.';
$lang['hu_HU']['LeftAndMain']['REPORTS'] = 'Jelentések';
$lang['hu_HU']['LeftAndMain']['REQUESTERROR'] = 'Hiba a lekérésben.';
$lang['hu_HU']['LeftAndMain']['SAVED'] = 'Elmentve.';
$lang['hu_HU']['LeftAndMain']['SAVEDUP'] = 'Elmentve.';
$lang['hu_HU']['LeftAndMain']['SECURITY'] = 'Biztonság';
$lang['hu_HU']['LeftAndMain']['SITECONTENT'] = 'Oldaltartalom';
$lang['hu_HU']['LeftAndMain']['SITECONTENTLEFT'] = 'Oldal tartalma';
$lang['hu_HU']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'Ez a ';
$lang['hu_HU']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'verzió ami éppen fut, gyakorlatilag ez a CVS ág.';
$lang['hu_HU']['LeftAndMain.ss']['ARCHS'] = 'Archivált oldal';
$lang['hu_HU']['LeftAndMain.ss']['DRAFTS'] = 'Piszkozatoldal';
$lang['hu_HU']['LeftAndMain.ss']['EDIT'] = 'Szerkesztés';
$lang['hu_HU']['LeftAndMain.ss']['EDITPROFILE'] = 'Profil';
$lang['hu_HU']['LeftAndMain.ss']['LOADING'] = 'Töltés...';
$lang['hu_HU']['LeftAndMain.ss']['LOGGEDINAS'] = 'Bejelentkezve:';
$lang['hu_HU']['LeftAndMain.ss']['LOGOUT'] = 'Kijelentkezés';
$lang['hu_HU']['LeftAndMain.ss']['PUBLIS'] = 'Publikált oldal';
$lang['hu_HU']['LeftAndMain.ss']['SSWEB'] = 'Silverstripe weboldal';
$lang['hu_HU']['LeftAndMain.ss']['SWITCHTO'] = 'Váltás: ';
$lang['hu_HU']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Oldal nézet: ';
$lang['hu_HU']['LeftAndMain']['STATUSTO'] = 'Az állapot megváltoztatásra került „%s”-re.';
$lang['hu_HU']['LeftAndMain']['TREESITECONTENT'] = 'Oldal tartalma';
$lang['hu_HU']['MemberList']['ADD'] = 'Hozzáadás';
$lang['hu_HU']['MemberList']['EMAIL'] = 'E-mail';
$lang['hu_HU']['MemberList']['FILTERBYG'] = 'Szűrés csoport szerint';
$lang['hu_HU']['MemberList']['FN'] = 'Keresztnév';
$lang['hu_HU']['MemberList']['PASSWD'] = 'Jelszó';
$lang['hu_HU']['MemberList']['SEARCH'] = 'Keresés';
$lang['hu_HU']['MemberList']['SN'] = 'Családi név';
$lang['hu_HU']['MemberList.ss']['FILTER'] = 'Szűrés';
$lang['hu_HU']['MemberList_Table.ss']['EMAIL'] = 'E-mail cím';
$lang['hu_HU']['MemberList_Table.ss']['FN'] = 'Keresztnév';
$lang['hu_HU']['MemberList_Table.ss']['PASSWD'] = 'Jelszó';
$lang['hu_HU']['MemberList_Table.ss']['SN'] = 'Családi név';
$lang['hu_HU']['MemberTableField']['ADD'] = 'Hozzáadás';
$lang['hu_HU']['MemberTableField']['ADDEDTOGROUP'] = 'Tag hozzáadásra került a csoporthoz.';
$lang['hu_HU']['MemberTableField.ss']['ADDNEW'] = 'Új hozzáadása';
$lang['hu_HU']['MemberTableField.ss']['DELETEMEMBER'] = 'Tag törlése';
$lang['hu_HU']['MemberTableField.ss']['EDITMEMBER'] = 'Tag szerkesztése';
$lang['hu_HU']['MemberTableField.ss']['SHOWMEMBER'] = 'Ezen tag mutatása';
$lang['hu_HU']['NewsletterAdmin']['FROMEM'] = 'E-mail címekből';
$lang['hu_HU']['NewsletterAdmin']['MEWDRAFTMEWSL'] = 'Új hírlevélpiszkozat';
$lang['hu_HU']['NewsletterAdmin']['NEWLIST'] = 'Új levelezőlista';
$lang['hu_HU']['NewsletterAdmin']['NEWNEWSLTYPE'] = 'Új levelezési lista típusa';
$lang['hu_HU']['NewsletterAdmin']['NEWSLTYPE'] = 'Hírlevél típusa';
$lang['hu_HU']['NewsletterAdmin']['PLEASEENTERMAIL'] = 'Írj be egy e-mail címet.';
$lang['hu_HU']['NewsletterAdmin']['RESEND'] = 'Újraküldés';
$lang['hu_HU']['NewsletterAdmin']['SAVE'] = 'Mentés';
$lang['hu_HU']['NewsletterAdmin']['SAVED'] = 'Elmentve.';
$lang['hu_HU']['NewsletterAdmin']['SEND'] = 'Küldés…';
$lang['hu_HU']['NewsletterAdmin']['SENDING'] = 'E-mailek küldése…';
$lang['hu_HU']['NewsletterAdmin']['SENTTESTTO'] = 'Teszt elküldve ide: ';
$lang['hu_HU']['NewsletterAdmin']['SHOWCONTENTS'] = 'Tartalom mutatása';
$lang['hu_HU']['NewsletterAdmin_BouncedList.ss']['EMADD'] = 'E-mail cím';
$lang['hu_HU']['NewsletterAdmin_BouncedList.ss']['HAVEBOUNCED'] = 'Visszaküldött e-mailek';
$lang['hu_HU']['NewsletterAdmin_BouncedList.ss']['NOBOUNCED'] = 'Egyetlen elküldött levél sem jött vissza.';
$lang['hu_HU']['NewsletterAdmin_BouncedList.ss']['UNAME'] = 'Felhasználónév';
$lang['hu_HU']['NewsletterAdmin_left.ss']['ADDDRAFT'] = 'Új piszkozat hozzáadása';
$lang['hu_HU']['NewsletterAdmin_left.ss']['ADDTYPE'] = 'Új típus hozzáadása';
$lang['hu_HU']['NewsletterAdmin_left.ss']['CREATE'] = 'Létrehozás';
$lang['hu_HU']['NewsletterAdmin_left.ss']['DEL'] = 'Törlés';
$lang['hu_HU']['NewsletterAdmin_left.ss']['DELETEDRAFTS'] = 'Kiválasztott piszkozatok törlése';
$lang['hu_HU']['NewsletterAdmin_left.ss']['GO'] = 'Mehet';
$lang['hu_HU']['NewsletterAdmin_left.ss']['NEWSLETTERS'] = 'Hírlevelek';
$lang['hu_HU']['NewsletterAdmin_left.ss']['SELECTDRAFTS'] = 'Válaszd ki a törlendő piszkozatokat, majd kattints a lentebbi gombra.';
$lang['hu_HU']['NewsletterAdmin_right.ss']['CANCEL'] = 'Mégsem';
$lang['hu_HU']['NewsletterAdmin_right.ss']['ENTIRE'] = 'Küldés az egész levelezési listának';
$lang['hu_HU']['NewsletterAdmin_right.ss']['ONLYNOT'] = 'Küldés csak olyan embereknek, akiknek korábban nem került elküldésre';
$lang['hu_HU']['NewsletterAdmin_right.ss']['SEND'] = 'Hírlevél küldése';
$lang['hu_HU']['NewsletterAdmin_right.ss']['SENDTEST'] = 'Teszt küldése ide:';
$lang['hu_HU']['NewsletterAdmin_right.ss']['WELCOME1'] = 'Üdvözlünk';
$lang['hu_HU']['NewsletterAdmin_right.ss']['WELCOME2'] = 'hírlevél adminisztrátori részében. Kérünk, válassz egy mappát a bal oldalról.';
$lang['hu_HU']['NewsletterAdmin_SiteTree.ss']['DRAFTS'] = 'Piszkozatok';
$lang['hu_HU']['NewsletterAdmin_SiteTree.ss']['MAILLIST'] = 'Levelezési lista';
$lang['hu_HU']['NewsletterAdmin_SiteTree.ss']['SENT'] = 'Elküldött elmek';
$lang['hu_HU']['NewsletterAdmin_UnsubscribedList.ss']['NOUNSUB'] = 'Egy felhasználó sem iratkozott le a hírlvélről.';
$lang['hu_HU']['NewsletterAdmin_UnsubscribedList.ss']['UNAME'] = 'Felhasználónév';
$lang['hu_HU']['NewsletterAdmin_UnsubscribedList.ss']['UNSUBON'] = 'Leiratkozott ekkor';
$lang['hu_HU']['NewsletterList.ss']['CHOOSEDRAFT1'] = 'Válassz egy piszkozatot a bal oldalon, vagy ';
$lang['hu_HU']['NewsletterList.ss']['CHOOSEDRAFT2'] = 'hozz létre egyet';
$lang['hu_HU']['NewsletterList.ss']['CHOOSESENT'] = 'Kérünk, válassz ki egy elküldött elemet a bal oldali listából. ';
$lang['hu_HU']['Newsletter_RecipientImportField.ss']['CHANGED'] = 'Megváltoztatott részletek száma: ';
$lang['hu_HU']['Newsletter_RecipientImportField.ss']['IMPORTED'] = 'Új importált tagok:';
$lang['hu_HU']['Newsletter_RecipientImportField.ss']['IMPORTNEW'] = 'Importált új tagok';
$lang['hu_HU']['Newsletter_RecipientImportField.ss']['SEC'] = 'másodperc';
$lang['hu_HU']['Newsletter_RecipientImportField.ss']['SKIPPED'] = 'A kihagyott elemek:';
$lang['hu_HU']['Newsletter_RecipientImportField.ss']['TIME'] = 'Eltelt idő:';
$lang['hu_HU']['Newsletter_RecipientImportField.ss']['UPDATED'] = 'Frissített tagok:';
$lang['hu_HU']['Newsletter_RecipientImportField_Table.ss']['CONTENTSOF'] = 'Tartalom:';
$lang['hu_HU']['Newsletter_RecipientImportField_Table.ss']['NO'] = 'Mégse';
$lang['hu_HU']['Newsletter_RecipientImportField_Table.ss']['RECIMPORTED'] = 'Címzettek importálási helye: ';
$lang['hu_HU']['Newsletter_RecipientImportField_Table.ss']['YES'] = 'Megerősítés';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['DATE'] = 'Dátum';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['EMAIL'] = 'E-mail';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['FN'] = 'Keresztnév';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['NEWSNEVERSENT'] = 'Még soha nem került elküldésre a következő feliratkozottaknak';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['RES'] = 'Eredmény';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['SENDBOUNCED'] = 'A következő címzetteknek való elküldés sikeretelen volt, az e-mail visszaküldésre került';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['SENDFAIL'] = 'A következő címzetteknek való elküldés sikeretelen volt';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['SENTOK'] = 'Az üzenetküldés a következő címzetteknek sikeres volt';
$lang['hu_HU']['Newsletter_SentStatusReport.ss']['SN'] = 'Családi név';
$lang['hu_HU']['PageComment']['COMMENTBY'] = 'Küldte %s a %s oldalhoz';
$lang['hu_HU']['PageCommentInterface.ss']['COMMENTS'] = 'Megjegyzések';
$lang['hu_HU']['PageCommentInterface.ss']['NEXT'] = 'következő';
$lang['hu_HU']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'Még senki sem fűzött megjegyzést az oldalhoz. ';
$lang['hu_HU']['PageCommentInterface.ss']['POSTCOM'] = 'Megjegyzés küldése';
$lang['hu_HU']['PageCommentInterface.ss']['PREV'] = 'előző';
$lang['hu_HU']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'Ez a megjegyzés nem levélszemét';
$lang['hu_HU']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'Ez a megjegyzés spam';
$lang['hu_HU']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Küldte: ';
$lang['hu_HU']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'A megjegyzés eltávolítása';
$lang['hu_HU']['ReportAdmin_left.ss']['REPORTS'] = 'Jelentések';
$lang['hu_HU']['ReportAdmin_right.ss']['WELCOME1'] = 'Üdvözlünk';
$lang['hu_HU']['ReportAdmin_right.ss']['WELCOME2'] = 'jelentések részében. Kérünk, válassz egy jelentést a bal oldalról.';
$lang['hu_HU']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Jelentések';
$lang['hu_HU']['SecurityAdmin']['ADDMEMBER'] = 'Tag hozzáadása';
$lang['hu_HU']['SecurityAdmin']['ADVANCEDONLY'] = 'Ez a rész csak haladó felhasználóknak javasolt. További információért látogass el <a href="http://doc.silverstripe.com/doku.php?id=permissions:codes" target="_blank">erre az oldalra</a>.';
$lang['hu_HU']['SecurityAdmin']['NEWGROUP'] = 'Új csoport';
$lang['hu_HU']['SecurityAdmin']['SAVE'] = 'Mentés';
$lang['hu_HU']['SecurityAdmin']['SGROUPS'] = 'Biztonsági csoportok';
$lang['hu_HU']['SecurityAdmin_left.ss']['CREATE'] = 'Létrehozás';
$lang['hu_HU']['SecurityAdmin_left.ss']['DEL'] = 'Törlés';
$lang['hu_HU']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Kiválasztott csoportok törlése';
$lang['hu_HU']['SecurityAdmin_left.ss']['GO'] = 'Mehet';
$lang['hu_HU']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Biztonsági csoportok';
$lang['hu_HU']['SecurityAdmin_left.ss']['SELECT'] = 'Válaszd ki a törlendő oldalakat, majd kattints a lenti gombra';
$lang['hu_HU']['SecurityAdmin_left.ss']['TOREORG'] = 'Az oldal újraszervezéséhez, rendezd az oldalakat az egérrel a kívánt helyre. ';
$lang['hu_HU']['SecurityAdmin_right.ss']['WELCOME1'] = 'Üdvözlünk';
$lang['hu_HU']['SecurityAdmin_right.ss']['WELCOME2'] = 'biztonság adminisztrátori részében. Kérünk, válassz egy csoportot a bal oldalról.';
$lang['hu_HU']['SideReport']['EMPTYPAGES'] = 'Üres oldalak';
$lang['hu_HU']['SideReport']['LAST2WEEKS'] = 'Elmúlt 2 héten belül szerkesztett oldalak';
$lang['hu_HU']['SideReport']['REPEMPTY'] = 'A %s jelentés üres.';
$lang['hu_HU']['StaticExporter']['BASEURL'] = 'Alap URL';
$lang['hu_HU']['StaticExporter']['EXPORTTO'] = 'Exportálás abba a mappába';
$lang['hu_HU']['StaticExporter']['FOLDEREXPORT'] = 'Exportálás célmappája';
$lang['hu_HU']['StaticExporter']['NAME'] = 'Statikus exportáló';
$lang['hu_HU']['StaticExporter']['ONETHATEXISTS'] = 'Kérünk, adj meg egy létező mappát.';
$lang['hu_HU']['SubmittedFormEmail.ss']['SUBMITTED'] = 'A következő adat lett elküldve a weboldaladra: ';
$lang['hu_HU']['TaskList.ss']['BY'] = 'által';
$lang['hu_HU']['ThumbnailStripField']['NOTAFOLDER'] = 'Ez nem egy mappa.';
$lang['hu_HU']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(Válassz egy mappát felülről)';
$lang['hu_HU']['ViewArchivedEmail.ss']['CANACCESS'] = 'Az archivált oldalt elérheted ezen a linken:';
$lang['hu_HU']['ViewArchivedEmail.ss']['HAVEASKED'] = 'Azt kérted, hogy megnézhesd az oldalunk tartalmát ekkor:';
$lang['hu_HU']['WaitingOn.ss']['ATO'] = 'címezve neki:';

?>