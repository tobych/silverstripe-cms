<?php

/**
 * Nepali (Nepal) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('ne_NP', $lang) && is_array($lang['ne_NP'])) {
	$lang['ne_NP'] = array_merge($lang['en_US'], $lang['ne_NP']);
} else {
	$lang['ne_NP'] = $lang['en_US'];
}

$lang['ne_NP']['AssetAdmin']['CHOOSEFILE'] = 'फाइल छान्नुहोस्';
$lang['ne_NP']['AssetAdmin']['CONTENTMODBY'] = 'सामाग्री परिवर्तनिय';
$lang['ne_NP']['AssetAdmin']['CONTENTUSABLEBY'] = 'सामाग्री प्रयोगयोग्य';
$lang['ne_NP']['AssetAdmin']['CREATED'] = 'पहिला उप्लोओद भएको';
$lang['ne_NP']['AssetAdmin']['DELETEDX'] = '%s फाइलहरु फालियो । %s';
$lang['ne_NP']['AssetAdmin']['DELETEUNUSEDTHUMBNAILS'] = 'प्रोयोग नगरिएका thumbnails हटाउनुहोस्';
$lang['ne_NP']['AssetAdmin']['DELSELECTED'] = 'छानेका फाइलहरु फाल्नुस्';
$lang['ne_NP']['AssetAdmin']['DETAILSTAB'] = 'विवरण';
$lang['ne_NP']['AssetAdmin']['FILENAME'] = 'फाइलको नाम';
$lang['ne_NP']['AssetAdmin']['FILESREADY'] = 'उप्लोओद हुन तयार फाइलहरु:';
$lang['ne_NP']['AssetAdmin']['FILESTAB'] = 'फाइलहरु';
$lang['ne_NP']['AssetAdmin']['LASTEDITED'] = 'अन्तिममा उप्लोओद भएको';
$lang['ne_NP']['AssetAdmin']['MOVEDX'] = '%s फाइलहरु सारीयो';
$lang['ne_NP']['AssetAdmin']['NEWFOLDER'] = 'नयाँ फोल्डर';
$lang['ne_NP']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'उप्लोओद गर्न केही पनी छैन';
$lang['ne_NP']['AssetAdmin']['NOWBROKEN'] = 'पजेहरुमा टुटेका लिन्कहरु छन् :';
$lang['ne_NP']['AssetAdmin']['ONLYADMINS'] = 'मुख्य प्रयोगकर्त ले मात्र %s फाइलहरु उप्लोओद गर्न सक्छ';
$lang['ne_NP']['AssetAdmin']['OWNER'] = 'मालिक';
$lang['ne_NP']['AssetAdmin']['SAVEDFILE'] = '%s फाइल सेभ गरियो';
$lang['ne_NP']['AssetAdmin']['SAVEFOLDERNAME'] = 'फोल्डरको नाम सेभ गर्नुस्';
$lang['ne_NP']['AssetAdmin']['TITLE'] = 'शिषक';
$lang['ne_NP']['AssetAdmin']['TOOLARGE'] = '%s उप्लोओद गर्न ठुलो भयो (%s) । यस्तो फाइलहरु %s भन्दा ठुलो हुनुहुदैन ।';
$lang['ne_NP']['AssetAdmin']['TYPE'] = 'किसिम';
$lang['ne_NP']['AssetAdmin']['UNUSEDFILESTAB'] = 'प्रोयोग नगरिएका फाइलहरु';
$lang['ne_NP']['AssetAdmin']['UNUSEDFILESTITLE'] = 'प्रोयोग नगरिएका फाइलहरु';
$lang['ne_NP']['AssetAdmin']['UNUSEDTHUMBNAILSTITLE'] = 'प्रोयोग नगरिएका thumbnails';
$lang['ne_NP']['AssetAdmin']['UPLOAD'] = 'तल भएका फाइलहरु उप्लोओद गर्नुस्';
$lang['ne_NP']['AssetAdmin']['UPLOADEDX'] = '%s फाइलहरु उप्लोओद गरियो';
$lang['ne_NP']['AssetAdmin']['UPLOADTAB'] = 'उप्लोओद';
$lang['ne_NP']['AssetAdmin']['VIEWASSET'] = 'सम्पत्ति (असेट) हेर';
$lang['ne_NP']['AssetAdmin']['VIEWEDITASSET'] = 'सम्पत्ति (असेट) हेर/मिलाउ';
$lang['ne_NP']['AssetAdmin_left.ss']['CREATE'] = 'बनाउ ';
$lang['ne_NP']['AssetAdmin_left.ss']['DELETE'] = 'हटाउ';
$lang['ne_NP']['AssetAdmin_left.ss']['DELFOLDERS'] = 'छानिएका पेजहरु हटाउनुहोस्';
$lang['ne_NP']['AssetAdmin_left.ss']['FOLDERS'] = 'फोल्डरहरु';
$lang['ne_NP']['AssetAdmin_left.ss']['GO'] = 'जाउ';
$lang['ne_NP']['AssetAdmin_left.ss']['SELECTTODEL'] = 'तपाईंले हटाउन खोज्न्नु भएको फोल्डरहरु छन्नुहोस् र तलको बटन थिचुनुहोस्';
$lang['ne_NP']['AssetAdmin_left.ss']['TOREORG'] = 'तपाईंको फोल्डर फेरि मिलाउन,तिनिहरुलाई लतारेर मिलाउनुहोस् । ';
$lang['ne_NP']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'कृपया बाँयाबाट एउटा पेज छन्नुहोस् ।';
$lang['ne_NP']['AssetAdmin_right.ss']['WELCOME'] = 'स्वागत छ ';
$lang['ne_NP']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'तपाईंसँग यो फोल्डरमा फाइलहरु हल्ने अधिकार छैन ';
$lang['ne_NP']['AssetTableField']['CREATED'] = 'पहिला यतिमा उप्लोओद गरियो';
$lang['ne_NP']['AssetTableField']['DIM'] = 'आयाम ';
$lang['ne_NP']['AssetTableField']['FILENAME'] = 'फाइलको नाम';
$lang['ne_NP']['AssetTableField']['LASTEDIT'] = 'अन्तिम पटक परिवर्तन यतिमा गरियो';
$lang['ne_NP']['AssetTableField']['NOLINKS'] = 'फाइल कुनैपनी पेजसँग लिन्क गरिएको छैन ';
$lang['ne_NP']['AssetTableField']['OWNER'] = 'मालिक';
$lang['ne_NP']['AssetTableField']['PAGESLINKING'] = 'तलको पेजले यो फाइलसँग लिन्क गर्छ:';
$lang['ne_NP']['AssetTableField']['SIZE'] = 'मात्रा';
$lang['ne_NP']['AssetTableField.ss']['DELFILE'] = 'यो फाइल हटाउनुहोस्';
$lang['ne_NP']['AssetTableField.ss']['DRAGTOFOLDER'] = 'फाइललाई लैजान बाँयाको फोल्डरमा लतारेर लैजानुस्';
$lang['ne_NP']['AssetTableField']['TITLE'] = 'शिषक';
$lang['ne_NP']['AssetTableField']['TYPE'] = 'किसिम';
$lang['ne_NP']['BulkLoaderAdmin']['CONFIRMBULK'] = 'बल्क लोड स्विकार्नुहोस्';
$lang['ne_NP']['BulkLoaderAdmin']['CSVFILE'] = 'CSV फाइल';
$lang['ne_NP']['BulkLoaderAdmin']['DATALOADED'] = 'यो डाटा लोड भयो येसमा';
$lang['ne_NP']['BulkLoaderAdmin']['PRESSCNT'] = 'यो डाटा लोड गर्न continue थिच्नुहोस्';
$lang['ne_NP']['BulkLoaderAdmin']['PREVIEW'] = 'हेर्ने';
$lang['ne_NP']['BulkLoaderAdmin_left.ss']['BATCHEF'] = 'ब्याच हल्ने कार्यहरु';
$lang['ne_NP']['BulkLoaderAdmin_left.ss']['FUNCTIONS'] = 'कार्यहरु';
$lang['ne_NP']['BulkLoaderAdmin_preview.ss']['RES'] = 'परीणाम';
$lang['ne_NP']['CMSLeft.ss']['DELPAGE'] = 'पेजहरु फल्नुहोस्...';
$lang['ne_NP']['CMSLeft.ss']['DELPAGES'] = 'छन्निएक पेजहरु फल्नुहोस्';
$lang['ne_NP']['CMSLeft.ss']['GO'] = 'जानु';
$lang['ne_NP']['CMSLeft.ss']['NEWPAGE'] = 'नयाँ पेज...';
$lang['ne_NP']['CMSLeft.ss']['SELECTPAGESDEL'] = 'तपाईंले फल्न चाहनु भएको पेजहरु छन्नुस् र तलको बटन थिचनुहोस् ';
$lang['ne_NP']['CMSLeft.ss']['SITECONT'] = 'साईट सामाग्री  ';
$lang['ne_NP']['CMSMain']['CANCEL'] = 'क्यान्सिल गर्नुस्';
$lang['ne_NP']['CMSMain']['CHOOSEREPORT'] = '(एउटा रिपोर्ट छानुस्)';
$lang['ne_NP']['CMSMain']['COMPARINGV'] = 'तपाईं #%d र #%d बिच तुलना गर्दै हुनुहुन्छ ।';
$lang['ne_NP']['CMSMain']['COPYPUBTOSTAGE'] = 'तपाईं साचिकै प्रकाशित सामाग्रीलाई स्टेज साईटमा कपि गर्न चाहानुहुन्छ ?';
$lang['ne_NP']['CMSMain']['DELETEFP'] = 'प्रकाशित साईट बाट हटाइएको छ';
$lang['ne_NP']['CMSMain']['EMAIL'] = 'ईमेल';
$lang['ne_NP']['CMSMain']['GO'] = 'जाउ';
$lang['ne_NP']['CMSMain']['METADESCOPT'] = 'विवरण';
$lang['ne_NP']['CMSMain']['METAKEYWORDSOPT'] = 'किवर्डहरु ';
$lang['ne_NP']['CMSMain']['NEW'] = 'नयाँ';
$lang['ne_NP']['CMSMain']['NOCONTENT'] = 'सामाग्री छैन';
$lang['ne_NP']['CMSMain']['NOTHINGASSIGNED'] = 'तपाईंले तपाईंलाई कुनै पनि काम अराउनुभएको छैन ।';
$lang['ne_NP']['CMSMain']['NOWAITINGON'] = 'तपाईंले अरु कसैलाई कुर्नु भएको छैन ।';
$lang['ne_NP']['CMSMain']['NOWBROKEN'] = 'तलका पेजहरुसँग टुटेका लिन्कहरु छन्:';
$lang['ne_NP']['CMSMain']['NOWBROKEN2'] = 'तिनिहरुका मालिकहरुलाई ईमेल गरियो र तिनिहरुले ति पेजहरु मिलाउने छन् ।';
$lang['ne_NP']['CMSMain']['OK'] = 'हुन्छ';
$lang['ne_NP']['CMSMain']['PAGEDEL'] = '%d पेज हटाइयो';
$lang['ne_NP']['CMSMain']['PAGENOTEXISTS'] = 'यो पेज छैन । ';
$lang['ne_NP']['CMSMain']['PAGEPUB'] = '%d पेज प्रकाशित भयो';
$lang['ne_NP']['CMSMain']['PAGESDEL'] = '%d पेजहरु हटाइयो';
$lang['ne_NP']['CMSMain']['PAGESPUB'] = '%d पेजहरु प्रकाशित भए';
$lang['ne_NP']['CMSMain']['PAGETYPEOPT'] = 'पेज किसिम';
$lang['ne_NP']['CMSMain']['PRINT'] = 'प्रिन्ट';
$lang['ne_NP']['CMSMain']['PUBALLCONFIRM'] = 'कृपया प्रत्यक पेजलाई प्रकाशित गर्नुहोस् ,सामाग्रीलाई स्टेजबाट लाईभमा';
$lang['ne_NP']['CMSMain']['PUBALLFUN'] = '"सबै प्रकाशित गर्" functionality';
$lang['ne_NP']['CMSMain']['PUBALLFUN2'] = 'यो बटन थिचे,प्रतेक पेजमा गएर "प्रकाशित" थिचे बराबर हुन्छ । यो ठुला पजेहरु मिलौनकोलागी बनाईएको हो,जस्तौ पेज नयाँ बनाएको बेलामा ।  ';
$lang['ne_NP']['CMSMain']['PUBPAGES'] = 'भयो: प्रकाशित %d पेजहरु';
$lang['ne_NP']['CMSMain']['REMOVEDFD'] = 'द्रफ्त साईट बाट हटाइयो';
$lang['ne_NP']['CMSMain']['REMOVEDPAGE'] = '\'%s\'लाई प्रकाशित साईटबाट हटाइयो ।';
$lang['ne_NP']['CMSMain']['RESTORE'] = 'पुनर्स्थापना';
$lang['ne_NP']['CMSMain']['RESTORED'] = '\'%s\' लाइ सफलतापूर्वक पुनर्स्थापना गरियो';
$lang['ne_NP']['CMSMain']['ROLLBACK'] = 'यो संस्करणमा पुन जाने';
$lang['ne_NP']['CMSMain']['ROLLEDBACKPUB'] = 'प्रकाशित संस्करणमा गइयो ।  नयाँ संस्करण नम्बर #%d हो ।';
$lang['ne_NP']['CMSMain']['ROLLEDBACKVERSION'] = 'पहिलको संस्करण #%d मा गइयो । नयाँ संस्करण नम्बर #%d हो ।';
$lang['ne_NP']['CMSMain']['SAVE'] = 'सेभ गर्नुस्';
$lang['ne_NP']['CMSMain']['SENTTO'] = '%s %s लाई पासको लागि पठाउनुहोस्';
$lang['ne_NP']['CMSMain']['STATUSOPT'] = 'स्सतिति';
$lang['ne_NP']['CMSMain']['TOTALPAGES'] = 'जम्मा पेजहरु:';
$lang['ne_NP']['CMSMain']['VERSIONSNOPAGE'] = '#%d पेज पाउन सकिएन';
$lang['ne_NP']['CMSMain']['VIEWING'] = 'तपाईं #%d संस्करण हेदै हनुहुन्छ, बनाएको %s';
$lang['ne_NP']['CMSMain']['VISITRESTORE'] = 'restorepage/(ID) हेर्नुहोस्';
$lang['ne_NP']['CMSMain']['WAITINGON'] = 'तपाईंले अरु मान्छेलाई यी <b>%d</b> पेजहरुमा काम गर्न कुर्नु भएको छ ।';
$lang['ne_NP']['CMSMain']['WORKTODO'] = 'तपाईंले यी <b>%d</b> पेजहरुमा काम गर्नुपर्छ ।';
$lang['ne_NP']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Draft साईटमा हालियो तर प्रकाशित गरिएको छैन';
$lang['ne_NP']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'मापडन्ण्ड थपनुहोस्...';
$lang['ne_NP']['CMSMain_left.ss']['BATCHACTIONS'] = 'ब्याच कार्य';
$lang['ne_NP']['CMSMain_left.ss']['CHANGED'] = 'परिवर्तन गरियो';
$lang['ne_NP']['CMSMain_left.ss']['CLOSEBOX'] = 'यो बक्स बन्दगर्न थिचनुहोस्';
$lang['ne_NP']['CMSMain_left.ss']['COMMENTS'] = 'प्रतिक्रियाहरु';
$lang['ne_NP']['CMSMain_left.ss']['COMPAREMODE'] = 'तुलनागर्ने मोड (तल २ थिचनुहोस्स)';
$lang['ne_NP']['CMSMain_left.ss']['CREATE'] = 'बनउ';
$lang['ne_NP']['CMSMain_left.ss']['DEL'] = 'हटाईयो';
$lang['ne_NP']['CMSMain_left.ss']['DELETECONFIRM'] = 'छानिएका पेजहरु हटाउनुहोस्';
$lang['ne_NP']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Draft साईटबाट हटाईयो तर लाईभ साईटमा अझै छ';
$lang['ne_NP']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Draft साईटमा परिवर्तन गरियो तर प्रकाशित गरिएको छैन';
$lang['ne_NP']['CMSMain_left.ss']['EDITEDSINCE'] = 'मिलाईयको यहाँदेखी ';
$lang['ne_NP']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'लतारेर &amp; छोडर मिलाउन देउ';
$lang['ne_NP']['CMSMain_left.ss']['GO'] = 'जाउ';
$lang['ne_NP']['CMSMain_left.ss']['KEY'] = 'चापी:';
$lang['ne_NP']['CMSMain_left.ss']['NEW'] = 'नयाँ';
$lang['ne_NP']['CMSMain_left.ss']['OPENBOX'] = 'यो बक्स खोल्न थिचनुहोस्';
$lang['ne_NP']['CMSMain_left.ss']['PAGEVERSIONH'] = 'पेज संस्करण इतिहास्';
$lang['ne_NP']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'छानिएका पेजहरु प्रकाशित गर्नुस्';
$lang['ne_NP']['CMSMain_left.ss']['SEARCH'] = 'खोज';
$lang['ne_NP']['CMSMain_left.ss']['SEARCHTITLE'] = 'यू.र्.ल्,शिषक,मेनु शिषक,&amp;सामाग्री ';
$lang['ne_NP']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'तपाईंले परिवर्तन &amp; गर्न चाहनुभएको पेजहरु छान्नुस् ;अनी कुनै पनि कार्यमा थिचुनुहोस् :';
$lang['ne_NP']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'तपाईंले दुप्लिकेट गर्न खोज्न्नु भएको पेजहरु छन्नुहोस्,हाँगाहरु हाल्ने कि नहाल्ने र कहाँ हाल्ने छन्नुहोस्';
$lang['ne_NP']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'परिवर्तन भएका पेजहरु मात्र देखाउनुहोस् ';
$lang['ne_NP']['CMSMain_left.ss']['SHOWUNPUB'] = 'प्रकाशित नभएका संस्करणहरु देखाउनुहोस्';
$lang['ne_NP']['CMSMain_left.ss']['SITECONTENT TITLE'] = ' साईट सामाग्री र बनोट';
$lang['ne_NP']['CMSMain_left.ss']['SITEREPORTS'] = 'साईट रिपोर्टहरु';
$lang['ne_NP']['CMSMain_left.ss']['TASKLIST'] = 'कार्य तालिका';
$lang['ne_NP']['CMSMain_left.ss']['WAITINGON'] = 'कुर्दै छ';
$lang['ne_NP']['CMSMain_right.ss']['ANYMESSAGE'] = 'के तपाईंसँग तपाईंको सम्पादकलाई कुनै सन्देश छ ?';
$lang['ne_NP']['CMSMain_right.ss']['CHOOSEPAGE'] = 'कृपया बाँयाबाट एउटा पेज छन्नुहोस् ।';
$lang['ne_NP']['CMSMain_right.ss']['LOADING'] = 'लोओडिङ...';
$lang['ne_NP']['CMSMain_right.ss']['MESSAGE'] = 'सन्देश';
$lang['ne_NP']['CMSMain_right.ss']['SENDTO'] = 'पठाउ';
$lang['ne_NP']['CMSMain_right.ss']['STATUS'] = 'स्तिति';
$lang['ne_NP']['CMSMain_right.ss']['SUBMIT'] = 'Approvalको लागि पठाउनुहोस्';
$lang['ne_NP']['CMSMain_right.ss']['WELCOMETO'] = 'स्वागत छ';
$lang['ne_NP']['CMSMain_versions.ss']['AUTHOR'] = 'लेखक ';
$lang['ne_NP']['CMSMain_versions.ss']['NOTPUB'] = 'प्रकाशित नभएको';
$lang['ne_NP']['CMSMain_versions.ss']['PUBR'] = 'प्रकाशक';
$lang['ne_NP']['CMSMain_versions.ss']['UNKNOWN'] = 'थाहा नभएको';
$lang['ne_NP']['CMSMain_versions.ss']['WHEN'] = 'कहिले';
$lang['ne_NP']['CMSRight.ss']['CHOOSEPAGE'] = 'कृपया बाँयाबाट एउटा पेज छन्नुहोस् ।';
$lang['ne_NP']['CMSRight.ss']['ECONTENT'] = 'सामाग्री मिलाउनुहोस्';
$lang['ne_NP']['CMSRight.ss']['WELCOMETO'] = 'स्वागत छ';
$lang['ne_NP']['CommentList.ss']['CREATEDW'] = 'प्रतिक्रियाहर तब बनाइन्छ जब कुनै पनि कार्य गरिन्छ जस्तै प्रकाशन ।';
$lang['ne_NP']['CommentList.ss']['NOCOM'] = 'यो पेजमा प्रतिक्रियाहरु छौन्न्   ';
$lang['ne_NP']['GenericDataAdmin_left.ss']['ADDLISTING'] = 'लिस्टिङ्हरु थपनुहोस्';
$lang['ne_NP']['GenericDataAdmin_left.ss']['SEARCHLISTINGS'] = 'लिस्टिङ्हरु खोज्नुहोस्';
$lang['ne_NP']['GenericDataAdmin_left.ss']['SEARCHRESULTS'] = 'परीणाम खोज्नुहोस्';
$lang['ne_NP']['ImageEditor.ss']['CANCEL'] = 'क्यान्सिल गर';
$lang['ne_NP']['ImageEditor.ss']['CROP'] = 'crop';
$lang['ne_NP']['ImageEditor.ss']['HEIGHT'] = 'हाईट';
$lang['ne_NP']['ImageEditor.ss']['REDO'] = 'फेरी गर्';
$lang['ne_NP']['ImageEditor.ss']['ROT'] = 'घुमाउ';
$lang['ne_NP']['ImageEditor.ss']['SAVE'] = 'save&nbsp;तस्बिर';
$lang['ne_NP']['ImageEditor.ss']['UNDO'] = 'फिर्ता गर्';
$lang['ne_NP']['ImageEditor.ss']['UNTITLED'] = 'नाम नभएको कागजपत्र ';
$lang['ne_NP']['ImageEditor.ss']['WIDTH'] = 'चौदाई';
$lang['ne_NP']['LeftAndMain']['CHANGEDURL'] = 'URL \'%s\' मा बदलियो';
$lang['ne_NP']['LeftAndMain']['COMMENTS'] = 'प्रतिक्रियाहरु';
$lang['ne_NP']['LeftAndMain']['FILESIMAGES'] = 'फाइल र तस्बिरहरु';
$lang['ne_NP']['LeftAndMain']['HELP'] = 'सहयोग';
$lang['ne_NP']['LeftAndMain']['NEWSLETTERS'] = 'खबरपत्रहरु';
$lang['ne_NP']['LeftAndMain']['PAGETYPE'] = 'पेज किसिम:';
$lang['ne_NP']['LeftAndMain']['PERMAGAIN'] = 'तपाईं CMS बहिर आउनुभएको छ । यदी तपाईं फेरि भित्र जान चाहानुहुन्छ भने,आफ्नो प्रयोगकता नाम र पासओड तल लेखनुहोस् ।';
$lang['ne_NP']['LeftAndMain']['PERMALREADY'] = 'मफ गर्दिनुस्,तपाईंले CMS को त्यो भाग चलाउन पाउनुहुन्न । यदी तपाईं अरु कोही भएर भित्र जान चाहानुहुन्छ भने,त्यो तल गरनुस्';
$lang['ne_NP']['LeftAndMain']['PERMDEFAULT'] = 'कृपया एउटा authentication method छन्नुस् र CMS भित्र जान आफ्नो विवरण लेखनुहोस् । ';
$lang['ne_NP']['LeftAndMain']['PLEASESAVE'] = 'कृपया पेज सेभ गरनुस् : यो पेज उप्डेट गर्न सकिएन किनकि यो पेज अहिले सम्म सेभ गरिएकौ छैन ।';
$lang['ne_NP']['LeftAndMain']['REPORTS'] = 'रिपोटहरु';
$lang['ne_NP']['LeftAndMain']['REQUESTERROR'] = 'अनुरोधमा समस्या';
$lang['ne_NP']['LeftAndMain']['SAVED'] = 'सेभ गरियो';
$lang['ne_NP']['LeftAndMain']['SAVEDUP'] = 'सेभ गरियो';
$lang['ne_NP']['LeftAndMain']['SECURITY'] = 'सुरक्षा';
$lang['ne_NP']['LeftAndMain']['SITECONTENT'] = 'साईट सामाग्री';
$lang['ne_NP']['LeftAndMain']['SITECONTENTLEFT'] = 'साईट सामाग्री';
$lang['ne_NP']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'यो त';
$lang['ne_NP']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'तपाईंले अहिले चलाई रखानुभएको संस्करण, प्राविधिकरुपमा CVS branch हो ।';
$lang['ne_NP']['LeftAndMain.ss']['ARCHS'] = 'Archived साईट';
$lang['ne_NP']['LeftAndMain.ss']['DRAFTS'] = 'द्रफ्त साईट';
$lang['ne_NP']['LeftAndMain.ss']['EDIT'] = 'मिलौनु';
$lang['ne_NP']['LeftAndMain.ss']['EDITPROFILE'] = 'प्रोफाइल';
$lang['ne_NP']['LeftAndMain.ss']['LOADING'] = 'लोओडिङ...';
$lang['ne_NP']['LeftAndMain.ss']['LOGGEDINAS'] = 'लगइन गरिएको नाम';
$lang['ne_NP']['LeftAndMain.ss']['LOGOUT'] = 'बहिर जानुस्';
$lang['ne_NP']['LeftAndMain.ss']['PUBLIS'] = 'प्रकाशित साईट';
$lang['ne_NP']['LeftAndMain.ss']['SSWEB'] = 'सिल्भरस्त्रिप वेबसाईट';
$lang['ne_NP']['LeftAndMain.ss']['SWITCHTO'] = 'यसमा स्विच गर्नुहोस् : ';
$lang['ne_NP']['LeftAndMain.ss']['VIEWPAGEIN'] = 'पेज हेर्नुस्:';

$lang['ne_NP']['LeftAndMain']['STATUSTO'] = 'स्तिति \'%s\' मा बदलियो';
$lang['ne_NP']['LeftAndMain']['TREESITECONTENT'] = 'साईट सामाग्री';
$lang['ne_NP']['MemberList']['ADD'] = 'थप';
$lang['ne_NP']['MemberList']['EMAIL'] = 'ईमेल';
$lang['ne_NP']['MemberList']['FILTERBYG'] = 'समुहबाट छन्नुहोस्';
$lang['ne_NP']['MemberList']['FN'] = 'पहिलो नाम';
$lang['ne_NP']['MemberList']['PASSWD'] = 'पासओड';
$lang['ne_NP']['MemberList']['SEARCH'] = 'खोज';
$lang['ne_NP']['MemberList']['SN'] = 'थर';
$lang['ne_NP']['MemberList.ss']['FILTER'] = 'फिल्टर';
$lang['ne_NP']['MemberList_Table.ss']['EMAIL'] = 'ईमेल ठेगाना';
$lang['ne_NP']['MemberList_Table.ss']['FN'] = 'पहिलो नाम';
$lang['ne_NP']['MemberList_Table.ss']['PASSWD'] = 'पासओड';
$lang['ne_NP']['MemberList_Table.ss']['SN'] = 'थर';
$lang['ne_NP']['MemberTableField']['ADD'] = 'थप';
$lang['ne_NP']['MemberTableField']['ADDEDTOGROUP'] = 'समुहमा कार्यकर्ता हालियो ';
$lang['ne_NP']['MemberTableField.ss']['ADDNEW'] = 'नयाँ थप';
$lang['ne_NP']['MemberTableField.ss']['DELETEMEMBER'] = 'यो कार्यकर्ता हटाउनुहोस्';
$lang['ne_NP']['MemberTableField.ss']['EDITMEMBER'] = 'यो कार्यकर्ता मिलाउनुहोस्';
$lang['ne_NP']['MemberTableField.ss']['SHOWMEMBER'] = 'यो कार्यकर्ता देखाउनुहोस्';
$lang['ne_NP']['NewsletterAdmin']['FROMEM'] = 'ईमेल ठेगाना बाट';
$lang['ne_NP']['NewsletterAdmin']['MEWDRAFTMEWSL'] = 'नयाँ द्राफ्त खबरपत्र ';
$lang['ne_NP']['NewsletterAdmin']['NEWLIST'] = 'नयाँ मेलिङ लिस्ट';
$lang['ne_NP']['NewsletterAdmin']['NEWNEWSLTYPE'] = 'नयाँ खबरपत्र किसिम';
$lang['ne_NP']['NewsletterAdmin']['NEWSLTYPE'] = 'खबरपत्र किसिम';
$lang['ne_NP']['NewsletterAdmin']['PLEASEENTERMAIL'] = 'कृपया एउटा ईमेल ठेगाना लेखनुहोस्';
$lang['ne_NP']['NewsletterAdmin']['RESEND'] = 'फेरी पठाउ';
$lang['ne_NP']['NewsletterAdmin']['SAVE'] = 'सेभ गर्';
$lang['ne_NP']['NewsletterAdmin']['SAVED'] = 'सेभ गरियो';
$lang['ne_NP']['NewsletterAdmin']['SEND'] = 'पठाउ...';
$lang['ne_NP']['NewsletterAdmin']['SENDING'] = 'ईमेल पठाउदै छ...';
$lang['ne_NP']['NewsletterAdmin']['SENTTESTTO'] = 'टेस्ट पठाउनुहोस्';
$lang['ne_NP']['NewsletterAdmin']['SHOWCONTENTS'] = 'सामाग्रीहरु देखाउ';
$lang['ne_NP']['NewsletterAdmin_BouncedList.ss']['EMADD'] = 'ईमेल ठेगाना';
$lang['ne_NP']['NewsletterAdmin_BouncedList.ss']['HAVEBOUNCED'] = 'फर्किएका ईमेलहरु ';
$lang['ne_NP']['NewsletterAdmin_BouncedList.ss']['NOBOUNCED'] = 'कुनै पनि पठाईएका ईमेलहरु फर्किएका छैनन् ';
$lang['ne_NP']['NewsletterAdmin_BouncedList.ss']['UNAME'] = 'प्रयोगकताको नाम';
$lang['ne_NP']['NewsletterAdmin_left.ss']['ADDDRAFT'] = 'नयाँ draft थप';
$lang['ne_NP']['NewsletterAdmin_left.ss']['ADDTYPE'] = 'नयाँ किसिम थप';
$lang['ne_NP']['NewsletterAdmin_left.ss']['CREATE'] = 'बनाउ';
$lang['ne_NP']['NewsletterAdmin_left.ss']['DEL'] = 'हटाउ';
$lang['ne_NP']['NewsletterAdmin_left.ss']['DELETEDRAFTS'] = 'छानिएका draftहरु हटाउनुहोस् ';
$lang['ne_NP']['NewsletterAdmin_left.ss']['GO'] = 'जाउ';
$lang['ne_NP']['NewsletterAdmin_left.ss']['NEWSLETTERS'] = 'खबरपत्रहरु';
$lang['ne_NP']['NewsletterAdmin_left.ss']['SELECTDRAFTS'] = 'तपाईंले हटाउन खोज्नुभएको draftहरु छन्नुस् र तलको बटन थिचुनुहोस्';
$lang['ne_NP']['NewsletterAdmin_right.ss']['CANCEL'] = 'क्यान्सिल गर्नुस्';
$lang['ne_NP']['NewsletterAdmin_right.ss']['ENTIRE'] = 'सबै मेलइङ लिस्टलाई पठाउनुहोस्';
$lang['ne_NP']['NewsletterAdmin_right.ss']['ONLYNOT'] = 'पहिला नपठाउएका मान्छेलाई मात्र पठाउनुहोस्';
$lang['ne_NP']['NewsletterAdmin_right.ss']['SEND'] = 'खबरपत्रहरु पठाउनुहोस्';
$lang['ne_NP']['NewsletterAdmin_right.ss']['SENDTEST'] = 'टेस्ट पठाउनुहोस्';
$lang['ne_NP']['NewsletterAdmin_right.ss']['WELCOME1'] = 'स्वागत छ !';
$lang['ne_NP']['NewsletterAdmin_right.ss']['WELCOME2'] = 'खबरपत्रहरु मिलउने ठाउँ । कृपया बाँयाबाट एउटा फोल्डर छन्नुहोस् ।';
$lang['ne_NP']['NewsletterAdmin_SiteTree.ss']['DRAFTS'] = 'द्राफ्ट्हरु';
$lang['ne_NP']['NewsletterAdmin_SiteTree.ss']['MAILLIST'] = 'मेलइङ लिस्ट';
$lang['ne_NP']['NewsletterAdmin_SiteTree.ss']['SENT'] = 'पठाईएका सामाग्रीहरु';
$lang['ne_NP']['NewsletterAdmin_UnsubscribedList.ss']['NOUNSUB'] = 'कुनै पनि प्रयोगकर्ताले यो खबरपत्रको सदस्यता खारेज गरिएको  छैन ।';
$lang['ne_NP']['NewsletterAdmin_UnsubscribedList.ss']['UNAME'] = 'प्रयोगकताको नाम';
$lang['ne_NP']['NewsletterAdmin_UnsubscribedList.ss']['UNSUBON'] = 'सदस्यता खारेज गरिएको मिति ';
$lang['ne_NP']['NewsletterList.ss']['CHOOSEDRAFT1'] = 'कृपया बाँयाबाट एउटा draft छन्नुहोस् , अथवा';
$lang['ne_NP']['NewsletterList.ss']['CHOOSEDRAFT2'] = 'एउटा थप';
$lang['ne_NP']['NewsletterList.ss']['CHOOSESENT'] = 'कृपया बाँयाबाट एउटा पठाइएको सामाग्री छन्नुहोस् ।';
$lang['ne_NP']['Newsletter_RecipientImportField.ss']['CHANGED'] = 'विवरणको नम्बर परिवर्तन गारियो:';
$lang['ne_NP']['Newsletter_RecipientImportField.ss']['IMPORTED'] = 'नयाँ कार्यकर्ताहरु आर्यातित् गरियो';
$lang['ne_NP']['Newsletter_RecipientImportField.ss']['IMPORTNEW'] = 'आर्यातित् नयाँ कार्यकर्ताहरु';
$lang['ne_NP']['Newsletter_RecipientImportField.ss']['SEC'] = 'सेकेणसहरु';
$lang['ne_NP']['Newsletter_RecipientImportField.ss']['SKIPPED'] = 'रेकडहरु छुटाईयो: ';
$lang['ne_NP']['Newsletter_RecipientImportField.ss']['TIME'] = 'लागेको समय';
$lang['ne_NP']['Newsletter_RecipientImportField.ss']['UPDATED'] = 'कार्यकर्ताहरु उप्डेट गरियो:';
$lang['ne_NP']['Newsletter_RecipientImportField_Table.ss']['CONTENTSOF'] = 'सामाग्रीहरु';
$lang['ne_NP']['Newsletter_RecipientImportField_Table.ss']['NO'] = 'क्यान्सिल गर्नुस्';
$lang['ne_NP']['Newsletter_RecipientImportField_Table.ss']['RECIMPORTED'] = 'यहाँबाट प्राप्तगर्नेमन्छेहरु आर्यातित्';
$lang['ne_NP']['Newsletter_RecipientImportField_Table.ss']['YES'] = 'पुषटि गर्नुस्';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['DATE'] = 'मिति';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['EMAIL'] = 'ईमेल';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['FN'] = 'पहिलो नाम';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['NEWSNEVERSENT'] = 'तलको मन्छेलाई खबरपत्रहरु कहिल्य पठाईएको छैन ';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['RES'] = 'परीणाम';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['SENDBOUNCED'] = 'तलको प्राप्तगर्नेमन्छेलाई पठाईएको फर्कियो';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['SENDFAIL'] = 'तलको प्राप्तगर्नेमन्छेलाई पठाउन सकिएन्';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['SENTOK'] = 'तलको प्राप्तगर्नेमन्छेलाई पठाउने कार्य सफल भयो';
$lang['ne_NP']['Newsletter_SentStatusReport.ss']['SN'] = 'थर';
$lang['ne_NP']['PageComment']['COMMENTBY'] = '\'%s\'ले %s मा प्रतिक्रिया दिनु भयो ।';
$lang['ne_NP']['PageCommentInterface.ss']['COMMENTS'] = 'प्रतिक्रियाहरु';
$lang['ne_NP']['PageCommentInterface.ss']['NEXT'] = 'पछीको';
$lang['ne_NP']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'कसैले यो पोजेमा अहिलेसम्म प्रतिक्रिया दिएका छैन्नन् ।';
$lang['ne_NP']['PageCommentInterface.ss']['POSTCOM'] = 'आफ्नो प्रतिक्रिया दिनुस्';
$lang['ne_NP']['PageCommentInterface.ss']['PREV'] = 'पहिलाको';
$lang['ne_NP']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'यो प्रतिक्रिया स्पाम होइन् ';
$lang['ne_NP']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'यो प्रतिक्रिया स्पाम हो';
$lang['ne_NP']['PageCommentInterface_singlecomment.ss']['PBY'] = 'योद्वरा पठाईएको';
$lang['ne_NP']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'यो प्रतिक्रिया हटाउनुहोस्';
$lang['ne_NP']['ReportAdmin_left.ss']['REPORTS'] = 'रिपोर्टहरु';
$lang['ne_NP']['ReportAdmin_right.ss']['WELCOME1'] = 'स्वागत छ !';
$lang['ne_NP']['ReportAdmin_right.ss']['WELCOME2'] = 'रिपोर्टइङ गर्ने ठाउँ । कृपया बाँयाबाट एउटा रेपोट छन्नुहोस् ।';
$lang['ne_NP']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'रिपोर्टहरु';
$lang['ne_NP']['SecurityAdmin']['ADDMEMBER'] = 'कार्यकर्ता थप';
$lang['ne_NP']['SecurityAdmin']['ADVANCEDONLY'] = 'यो सेक्सन गहन प्रयोगकताहरुको लागि मात्र हो । हेर् <a href="http://doc.silverstripe.com/doku.php?
id=permissions:codes" target="_blank"> यो पेज </a> अरु जानकारीकोलगी ।';
$lang['ne_NP']['SecurityAdmin']['NEWGROUP'] = 'नयाँ समुह';
$lang['ne_NP']['SecurityAdmin']['SAVE'] = 'सेभ';
$lang['ne_NP']['SecurityAdmin']['SGROUPS'] = 'सुरक्षा समुह';
$lang['ne_NP']['SecurityAdmin_left.ss']['CREATE'] = 'बनउ';
$lang['ne_NP']['SecurityAdmin_left.ss']['DEL'] = 'हटाउ';
$lang['ne_NP']['SecurityAdmin_left.ss']['DELGROUPS'] = 'छानिएका समुहहरु हटाउनुहोस्';
$lang['ne_NP']['SecurityAdmin_left.ss']['GO'] = 'जाउ';
$lang['ne_NP']['SecurityAdmin_left.ss']['SECGROUPS'] = 'सुरक्षा समुहहरु';
$lang['ne_NP']['SecurityAdmin_left.ss']['SELECT'] = 'तपाईंले हटाउन खोज्नुभएको पेजहरु छन्नुस् र तलको बटन थिचुनुहोस्';
$lang['ne_NP']['SecurityAdmin_left.ss']['TOREORG'] = 'फेरि तपाईंको साईट मिलाउन,पेजहरु लतारेर मिलाउनुहोस्  ';
$lang['ne_NP']['SecurityAdmin_right.ss']['WELCOME1'] = 'स्वागत छ !';
$lang['ne_NP']['SecurityAdmin_right.ss']['WELCOME2'] = 'सुरक्षा मिलौने ठाउँ । कृपया बाँयाबाट एउटा समुह छन्नुहोस् ।';
$lang['ne_NP']['SideReport']['EMPTYPAGES'] = 'खाली पेजहरु';
$lang['ne_NP']['SideReport']['LAST2WEEKS'] = 'पेज अन्तिम २ हप्प्तमा मिलइएको थियो  ';
$lang['ne_NP']['SideReport']['REPEMPTY'] = '%s रिपोट खाली छ ।';
$lang['ne_NP']['StaticExporter']['BASEURL'] = 'बेस यू.र्.ल्';
$lang['ne_NP']['StaticExporter']['EXPORTTO'] = 'त्यो फोल्डरमा निर्यात गर्नुहोस् ';
$lang['ne_NP']['StaticExporter']['FOLDEREXPORT'] = 'फोल्डर आयत गने ';
$lang['ne_NP']['StaticExporter']['NAME'] = 'स्टाटिक एक्स्प्लोरेर';
$lang['ne_NP']['StaticExporter']['ONETHATEXISTS'] = 'कृपया भएको फोल्डर छन्नुहोस् ';



$lang['ne_NP']['SubmittedFormEmail.ss']['SUBMITTED'] = 'तलको डाटा तपाईंको वेबसाईटमा बुझाइएको थियो:';
$lang['ne_NP']['TaskList.ss']['BY'] = 'योद्वरा';
$lang['ne_NP']['ThumbnailStripField']['NOTAFOLDER'] = 'यो फोल्डर होइन';
$lang['ne_NP']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(माथिबाट एउटा फोल्डर छन्नुहोस्)';
$lang['ne_NP']['ViewArchivedEmail.ss']['CANACCESS'] = 'तपाईंले archived साईट यो लिन्कमा भेट्न सक्नुहुन्छ:';
$lang['ne_NP']['ViewArchivedEmail.ss']['HAVEASKED'] = 'तपाईंले हाम्रो साइटको सामाग्री यसमा हेन खोजनु भयो';
$lang['ne_NP']['WaitingOn.ss']['ATO'] = 'यस्लाई गराइएको   ';

?>