<?php

/**
 * Russian (Russia) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('ru_RU', $lang) && is_array($lang['ru_RU'])) {
	$lang['ru_RU'] = array_merge($lang['en_US'], $lang['ru_RU']);
} else {
	$lang['ru_RU'] = $lang['en_US'];
}

$lang['ru_RU']['AssetAdmin']['CHOOSEFILE'] = 'Выберите файл';
$lang['ru_RU']['AssetAdmin']['CONTENTMODBY'] = 'Редакторы содержимого:';
$lang['ru_RU']['AssetAdmin']['CONTENTUSABLEBY'] = 'Пользователи содержимого:';
$lang['ru_RU']['AssetAdmin']['CREATED'] = 'Первая загрузка';
$lang['ru_RU']['AssetAdmin']['DELETEDX'] = 'Удалено файлов: %s. %s';
$lang['ru_RU']['AssetAdmin']['DELETEUNUSEDTHUMBNAILS'] = 'Удалить неиспользуемые миниатюры';
$lang['ru_RU']['AssetAdmin']['DELSELECTED'] = 'Удалить выбранные файлы';
$lang['ru_RU']['AssetAdmin']['DETAILSTAB'] = 'Подробно';
$lang['ru_RU']['AssetAdmin']['FILENAME'] = 'Имя файла';
$lang['ru_RU']['AssetAdmin']['FILESREADY'] = 'Файлы готовые к загрузке:';
$lang['ru_RU']['AssetAdmin']['FILESTAB'] = 'Файлы';
$lang['ru_RU']['AssetAdmin']['LASTEDITED'] = 'Последнее обновление';
$lang['ru_RU']['AssetAdmin']['MOVEDX'] = 'Перемещено файлов: %s';
$lang['ru_RU']['AssetAdmin']['NEWFOLDER'] = 'Новая папка';
$lang['ru_RU']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Ничего не было для загрузки';
$lang['ru_RU']['AssetAdmin']['NOWBROKEN'] = 'Эти страницы сейчас содержат неверные ссылки:';
$lang['ru_RU']['AssetAdmin']['ONLYADMINS'] = 'Только администраторы могут загружать %s файла(ов).';
$lang['ru_RU']['AssetAdmin']['OWNER'] = 'Владелец';
$lang['ru_RU']['AssetAdmin']['SAVEDFILE'] = 'Файл %s сохранен';
$lang['ru_RU']['AssetAdmin']['SAVEFOLDERNAME'] = 'Сохранить имя папки';
$lang['ru_RU']['AssetAdmin']['TITLE'] = 'Заголовок';
$lang['ru_RU']['AssetAdmin']['TOOLARGE'] = '%s слишком большой (%s). Файлы этого типа не могут превышать %s';
$lang['ru_RU']['AssetAdmin']['TYPE'] = 'Тип';
$lang['ru_RU']['AssetAdmin']['UNUSEDFILESTAB'] = 'Неиспользуемые';
$lang['ru_RU']['AssetAdmin']['UNUSEDFILESTITLE'] = 'Неиспользуемые';
$lang['ru_RU']['AssetAdmin']['UNUSEDTHUMBNAILSTITLE'] = 'Неиспользуемые миниатюры';
$lang['ru_RU']['AssetAdmin']['UPLOAD'] = 'Загрузить указанные файлы';
$lang['ru_RU']['AssetAdmin']['UPLOADEDX'] = 'Загружен(ы) %s файла(ов)';
$lang['ru_RU']['AssetAdmin']['UPLOADTAB'] = 'Загрузить';
$lang['ru_RU']['AssetAdmin']['VIEWASSET'] = 'Просмотр Медиаобъекта';
$lang['ru_RU']['AssetAdmin']['VIEWEDITASSET'] = 'Просмотр/Правка медиа';
$lang['ru_RU']['AssetAdmin_left.ss']['CREATE'] = 'Создать';
$lang['ru_RU']['AssetAdmin_left.ss']['DELETE'] = 'Удалить';
$lang['ru_RU']['AssetAdmin_left.ss']['DELFOLDERS'] = 'Удалить выбранные папки';
$lang['ru_RU']['AssetAdmin_left.ss']['FOLDERS'] = 'Папки';
$lang['ru_RU']['AssetAdmin_left.ss']['GO'] = 'Перейти';
$lang['ru_RU']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Выберите папки, которые вы хотите удалить, и нажмите кнопку внизу';
$lang['ru_RU']['AssetAdmin_left.ss']['TOREORG'] = 'Для изменения порядка папок перетащите их мышкой.';
$lang['ru_RU']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Пожалуйста, выберите страницу слева.';
$lang['ru_RU']['AssetAdmin_right.ss']['WELCOME'] = 'Добро пожаловать в';
$lang['ru_RU']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'У вас нет доступа к загрузке файлов в эту папку.';
$lang['ru_RU']['AssetTableField']['CREATED'] = 'Первая загрузка';
$lang['ru_RU']['AssetTableField']['DIM'] = 'Размеры';
$lang['ru_RU']['AssetTableField']['FILENAME'] = 'Имя файла';
$lang['ru_RU']['AssetTableField']['LASTEDIT'] = 'Последнее изменение';
$lang['ru_RU']['AssetTableField']['NOLINKS'] = 'На этот файл нет ссылок ни с одной страницы.';
$lang['ru_RU']['AssetTableField']['OWNER'] = 'Владелец';
$lang['ru_RU']['AssetTableField']['PAGESLINKING'] = 'На этот файл имеются ссылки со следующих страниц:';
$lang['ru_RU']['AssetTableField']['SIZE'] = 'Размер';
$lang['ru_RU']['AssetTableField.ss']['DELFILE'] = 'Удалить этот файл';
$lang['ru_RU']['AssetTableField.ss']['DRAGTOFOLDER'] = 'Чтобы переместить файл, перетащите его в папку слева';
$lang['ru_RU']['AssetTableField']['TITLE'] = 'Название';
$lang['ru_RU']['AssetTableField']['TYPE'] = 'Тип';
$lang['ru_RU']['BulkLoaderAdmin']['CONFIRMBULK'] = 'Подтвердить массовую загрузку';
$lang['ru_RU']['BulkLoaderAdmin']['CSVFILE'] = 'Файл CSV';
$lang['ru_RU']['BulkLoaderAdmin']['DATALOADED'] = 'Эти данные были загружены';
$lang['ru_RU']['BulkLoaderAdmin']['PRESSCNT'] = 'Нажмите "Продолжить" для загрузки данных';
$lang['ru_RU']['BulkLoaderAdmin']['PREVIEW'] = 'Предпросмотр';
$lang['ru_RU']['BulkLoaderAdmin_left.ss']['BATCHEF'] = 'Функции пакетного ввода';
$lang['ru_RU']['BulkLoaderAdmin_left.ss']['FUNCTIONS'] = 'Функции';
$lang['ru_RU']['BulkLoaderAdmin_preview.ss']['RES'] = 'Результаты';
$lang['ru_RU']['CMSLeft.ss']['DELPAGE'] = 'Удалить страницы...';
$lang['ru_RU']['CMSLeft.ss']['DELPAGES'] = 'Удалить выбранные страницы';
$lang['ru_RU']['CMSLeft.ss']['GO'] = 'Перейти';
$lang['ru_RU']['CMSLeft.ss']['NEWPAGE'] = 'Новая страница...';
$lang['ru_RU']['CMSLeft.ss']['SELECTPAGESDEL'] = 'Выберите страницы, которые Вы хотите удалить, и нажмите кнопку внизу';
$lang['ru_RU']['CMSLeft.ss']['SITECONT'] = 'Содержимое сайта';
$lang['ru_RU']['CMSMain']['CANCEL'] = 'Отмена';
$lang['ru_RU']['CMSMain']['CHOOSEREPORT'] = '(Выберите отчёт)';
$lang['ru_RU']['CMSMain']['COMPARINGV'] = 'Вы сравниваете версии #%d и #%d';
$lang['ru_RU']['CMSMain']['COPYPUBTOSTAGE'] = 'Вы действительно хотите скопировать опубликованное содержимое в черновой сайт?';
$lang['ru_RU']['CMSMain']['DELETEFP'] = 'Удалить с опубликованного сайта';
$lang['ru_RU']['CMSMain']['EMAIL'] = 'Email';
$lang['ru_RU']['CMSMain']['GO'] = 'Перейти';
$lang['ru_RU']['CMSMain']['METADESCOPT'] = 'Описание';
$lang['ru_RU']['CMSMain']['METAKEYWORDSOPT'] = 'Ключевые слова';
$lang['ru_RU']['CMSMain']['NEW'] = 'Новый';
$lang['ru_RU']['CMSMain']['NOCONTENT'] = 'содержимого нет';
$lang['ru_RU']['CMSMain']['NOTHINGASSIGNED'] = 'У вас нет ничего назначенного на вас.';
$lang['ru_RU']['CMSMain']['NOWAITINGON'] = 'Вы никого не ожидаете.';
$lang['ru_RU']['CMSMain']['NOWBROKEN'] = 'Сейчас следующие страницы содержат неверные ссылки:';
$lang['ru_RU']['CMSMain']['NOWBROKEN2'] = 'Их владельцы были уведомлены по электронной почте и они исправят эти страницы.';
$lang['ru_RU']['CMSMain']['OK'] = 'ОК';
$lang['ru_RU']['CMSMain']['PAGEDEL'] = '%d страница  удалена';
$lang['ru_RU']['CMSMain']['PAGENOTEXISTS'] = 'Страница не существует';
$lang['ru_RU']['CMSMain']['PAGEPUB'] = '%d страница опубликована';
$lang['ru_RU']['CMSMain']['PAGESDEL'] = '%d страниц(ы) удалено(ы)';
$lang['ru_RU']['CMSMain']['PAGESPUB'] = 'опубликовано(ы) %d страниц(ы) ';
$lang['ru_RU']['CMSMain']['PAGETYPEOPT'] = 'Тип страницы';
$lang['ru_RU']['CMSMain']['PRINT'] = 'Печать';
$lang['ru_RU']['CMSMain']['PUBALLCONFIRM'] = 'Пожалуйста, опубликуйте каждую страницу сайта, перенося содержимое из чернового режима в опубликованный';
$lang['ru_RU']['CMSMain']['PUBALLFUN'] = 'Функция "Опубликовать все"';
$lang['ru_RU']['CMSMain']['PUBALLFUN2'] = 'Нажатие этой кнопки выполнит ту же функцию, что и нажатие кнопки "Опубликовать" для каждой отдельной страницы. Данная функция предназначена для использования после значительных изменений содержимого, например, в момент создания нового сайта.';
$lang['ru_RU']['CMSMain']['PUBPAGES'] = 'Выполнено: Опубликовано %d страниц';
$lang['ru_RU']['CMSMain']['REMOVEDFD'] = 'Удалено с чернового сайта';
$lang['ru_RU']['CMSMain']['REMOVEDPAGE'] = 'Удалено \'%s\' с опубликованного сайта';
$lang['ru_RU']['CMSMain']['RESTORE'] = 'Восстановить';
$lang['ru_RU']['CMSMain']['RESTORED'] = '\'%s\' успешно восстановлено';
$lang['ru_RU']['CMSMain']['ROLLBACK'] = 'Откатить до этой версии';
$lang['ru_RU']['CMSMain']['ROLLEDBACKPUB'] = 'Произведен откат до опубликованной версии. Новая версия #%d';
$lang['ru_RU']['CMSMain']['ROLLEDBACKVERSION'] = 'Произведен откат до версии #%d. Номер новой версии #%d';
$lang['ru_RU']['CMSMain']['SAVE'] = 'Сохранить';
$lang['ru_RU']['CMSMain']['SENTTO'] = 'Послать для подтверждения %s %s.';
$lang['ru_RU']['CMSMain']['STATUSOPT'] = 'Статус';
$lang['ru_RU']['CMSMain']['TOTALPAGES'] = 'Всего страниц:';
$lang['ru_RU']['CMSMain']['VERSIONSNOPAGE'] = 'Не могу найти страницу #%d';
$lang['ru_RU']['CMSMain']['VIEWING'] = 'Вы просматриваете версию #%d, созданную %s';
$lang['ru_RU']['CMSMain']['VISITRESTORE'] = 'перейти к restorepage/(ID)';
$lang['ru_RU']['CMSMain']['WAITINGON'] = 'Вы ожидаете других людей для работы на <b>%d</b> страницах.';
$lang['ru_RU']['CMSMain']['WORKTODO'] = 'У вас есть что делать на этих <b>%d</b> страницах.';
$lang['ru_RU']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Добавлено на черновой сайт и еще не опубликовано';
$lang['ru_RU']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Добавить критерий...';
$lang['ru_RU']['CMSMain_left.ss']['BATCHACTIONS'] = 'Пакетные действия';
$lang['ru_RU']['CMSMain_left.ss']['CHANGED'] = 'изменено';
$lang['ru_RU']['CMSMain_left.ss']['CLOSEBOX'] = 'нажмите, чтобы закрыть окно';
$lang['ru_RU']['CMSMain_left.ss']['COMMENTS'] = 'Комментарии';
$lang['ru_RU']['CMSMain_left.ss']['COMPAREMODE'] = 'Режим сравнения (кликните 2 ниже)';
$lang['ru_RU']['CMSMain_left.ss']['CREATE'] = 'Создать';
$lang['ru_RU']['CMSMain_left.ss']['DEL'] = 'удалено';
$lang['ru_RU']['CMSMain_left.ss']['DELETECONFIRM'] = 'Удалить выбранные страницы';
$lang['ru_RU']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Удалено с чернового сайта, но еще опубликовано на рабочем сайте';
$lang['ru_RU']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Отредактировано на черновом сайте и еще не опубликовано';
$lang['ru_RU']['CMSMain_left.ss']['EDITEDSINCE'] = 'Изменения с';
$lang['ru_RU']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'Разрешить перетаскивание мышкой';
$lang['ru_RU']['CMSMain_left.ss']['GO'] = 'Перейти';
$lang['ru_RU']['CMSMain_left.ss']['KEY'] = 'Ключ:';
$lang['ru_RU']['CMSMain_left.ss']['NEW'] = 'новое';
$lang['ru_RU']['CMSMain_left.ss']['OPENBOX'] = 'нажмите, чтобы открыть это окно';
$lang['ru_RU']['CMSMain_left.ss']['PAGEVERSIONH'] = 'История версий страницы';
$lang['ru_RU']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Опубликовать выбранные страницы';
$lang['ru_RU']['CMSMain_left.ss']['SEARCH'] = 'Найти';
$lang['ru_RU']['CMSMain_left.ss']['SEARCHTITLE'] = 'Поиск по URL, названию, пункту в меню и содержимому';
$lang['ru_RU']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Выберите страницы для изменения и затем выберите действие:';
$lang['ru_RU']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'Выберите страницы, которые Вы хотите дублировать, нужно ли включать их дочерние страницы, а также, куда поместить дубликаты';
$lang['ru_RU']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Показать только измененные страницы';
$lang['ru_RU']['CMSMain_left.ss']['SHOWUNPUB'] = 'Показать неопубликованные';
$lang['ru_RU']['CMSMain_left.ss']['SITECONTENT TITLE'] = 'Содержимое и Структура сайта';
$lang['ru_RU']['CMSMain_left.ss']['SITEREPORTS'] = 'Отчеты сайта';
$lang['ru_RU']['CMSMain_left.ss']['TASKLIST'] = 'Список задач';
$lang['ru_RU']['CMSMain_left.ss']['WAITINGON'] = 'Ожидание';
$lang['ru_RU']['CMSMain_right.ss']['ANYMESSAGE'] = 'У Вас есть сообщение для вашего редактора?';
$lang['ru_RU']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Пожалуйста, выберите слева страницу.';
$lang['ru_RU']['CMSMain_right.ss']['LOADING'] = 'загрузка...';
$lang['ru_RU']['CMSMain_right.ss']['MESSAGE'] = 'Сообщение';
$lang['ru_RU']['CMSMain_right.ss']['SENDTO'] = 'Отправить';
$lang['ru_RU']['CMSMain_right.ss']['STATUS'] = 'Статус';
$lang['ru_RU']['CMSMain_right.ss']['SUBMIT'] = 'Отправить на подтверждение';
$lang['ru_RU']['CMSMain_right.ss']['WELCOMETO'] = 'Добро пожаловать в';
$lang['ru_RU']['CMSMain_versions.ss']['AUTHOR'] = 'Автор';
$lang['ru_RU']['CMSMain_versions.ss']['NOTPUB'] = 'Не опубликовано';
$lang['ru_RU']['CMSMain_versions.ss']['PUBR'] = 'Публикация';
$lang['ru_RU']['CMSMain_versions.ss']['UNKNOWN'] = 'Неизвестный';
$lang['ru_RU']['CMSMain_versions.ss']['WHEN'] = 'Когда';
$lang['ru_RU']['CMSRight.ss']['CHOOSEPAGE'] = 'Пожалуйста, выберите слева страницу.';
$lang['ru_RU']['CMSRight.ss']['ECONTENT'] = 'Редактировать';
$lang['ru_RU']['CMSRight.ss']['WELCOMETO'] = 'Добро пожаловать в';
$lang['ru_RU']['CommentList.ss']['CREATEDW'] = 'Комментарии создаются всегда, когда производятся "рабочие действия" - Опубликовать, Отклонить, Отправить.';
$lang['ru_RU']['CommentList.ss']['NOCOM'] = 'На этой странице комментариев нет';
$lang['ru_RU']['GenericDataAdmin_left.ss']['ADDLISTING'] = 'Создать перечень';
$lang['ru_RU']['GenericDataAdmin_left.ss']['SEARCHLISTINGS'] = 'Найти в перечнях';
$lang['ru_RU']['GenericDataAdmin_left.ss']['SEARCHRESULTS'] = 'Найти в результатах';
$lang['ru_RU']['ImageEditor.ss']['CANCEL'] = 'отмена';
$lang['ru_RU']['ImageEditor.ss']['CROP'] = 'обрезать';
$lang['ru_RU']['ImageEditor.ss']['HEIGHT'] = 'высота';
$lang['ru_RU']['ImageEditor.ss']['REDO'] = 'вернуть';
$lang['ru_RU']['ImageEditor.ss']['ROT'] = 'повернуть';
$lang['ru_RU']['ImageEditor.ss']['SAVE'] = 'сохранить&nbsp;изобр.';
$lang['ru_RU']['ImageEditor.ss']['UNDO'] = 'отменить';
$lang['ru_RU']['ImageEditor.ss']['UNTITLED'] = 'Без названия';
$lang['ru_RU']['ImageEditor.ss']['WIDTH'] = 'ширина';
$lang['ru_RU']['LeftAndMain']['CHANGEDURL'] = 'URL изменен на \'%s\'';
$lang['ru_RU']['LeftAndMain']['COMMENTS'] = 'Комментарии';
$lang['ru_RU']['LeftAndMain']['FILESIMAGES'] = 'Файлы и Изображения';
$lang['ru_RU']['LeftAndMain']['HELP'] = 'Помощь';
$lang['ru_RU']['LeftAndMain']['NEWSLETTERS'] = 'Рассылки';
$lang['ru_RU']['LeftAndMain']['PAGETYPE'] = 'Тип страницы:';
$lang['ru_RU']['LeftAndMain']['PERMAGAIN'] = 'Вы вышли из Системы Управления Сайтом. Если Вы хотите войти снова, введите внизу имя пользователя и пароль.';
$lang['ru_RU']['LeftAndMain']['PERMALREADY'] = 'Извините, у вас нет доступа к этому разделу Системы Управления. Если Вы хотите войти под другой учетной записью, сделайте это ниже';
$lang['ru_RU']['LeftAndMain']['PERMDEFAULT'] = 'Пожалуйста, выберите способ авторизации и введите ваши данные для доступа к системе.';
$lang['ru_RU']['LeftAndMain']['PLEASESAVE'] = 'Пожалуйста, сохраните страницу: ее нельзя обновить, т.к. она еще не была сохранена.';
$lang['ru_RU']['LeftAndMain']['REPORTS'] = 'Отчеты';
$lang['ru_RU']['LeftAndMain']['REQUESTERROR'] = 'Ошибка в запросе';
$lang['ru_RU']['LeftAndMain']['SAVED'] = 'сохранено';
$lang['ru_RU']['LeftAndMain']['SAVEDUP'] = 'Сохранено';
$lang['ru_RU']['LeftAndMain']['SECURITY'] = 'Права доступа';
$lang['ru_RU']['LeftAndMain']['SITECONTENT'] = 'Содержимое сайта';
$lang['ru_RU']['LeftAndMain']['SITECONTENTLEFT'] = 'Содержимое сайта';
$lang['ru_RU']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'Это';
$lang['ru_RU']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'версия, которую Вы используете в данный момент, технически она является ответвлением Системы Управления Версиями CVS';
$lang['ru_RU']['LeftAndMain.ss']['ARCHS'] = 'Архивный сайт';
$lang['ru_RU']['LeftAndMain.ss']['DRAFTS'] = 'Черновой сайт';
$lang['ru_RU']['LeftAndMain.ss']['EDIT'] = 'Редактировать';
$lang['ru_RU']['LeftAndMain.ss']['EDITPROFILE'] = 'Профиль';
$lang['ru_RU']['LeftAndMain.ss']['LOADING'] = 'Загрузка...';
$lang['ru_RU']['LeftAndMain.ss']['LOGGEDINAS'] = 'Вы вошли как';
$lang['ru_RU']['LeftAndMain.ss']['LOGOUT'] = 'выйти';
$lang['ru_RU']['LeftAndMain.ss']['PUBLIS'] = 'Опубликованный сайт';
$lang['ru_RU']['LeftAndMain.ss']['SSWEB'] = 'Вебсайт Silverstripe';
$lang['ru_RU']['LeftAndMain.ss']['SWITCHTO'] = 'Переключиться на:';
$lang['ru_RU']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Вид страниц:';

$lang['ru_RU']['LeftAndMain']['STATUSTO'] = 'Статус изменен на \'%s\'';
$lang['ru_RU']['LeftAndMain']['TREESITECONTENT'] = 'Содержимое сайта';
$lang['ru_RU']['MemberList']['ADD'] = 'Добавить';
$lang['ru_RU']['MemberList']['EMAIL'] = 'Email';
$lang['ru_RU']['MemberList']['FILTERBYG'] = 'Фильтр по группе';
$lang['ru_RU']['MemberList']['FN'] = 'Имя';
$lang['ru_RU']['MemberList']['PASSWD'] = 'Пароль';
$lang['ru_RU']['MemberList']['SEARCH'] = 'Найти';
$lang['ru_RU']['MemberList']['SN'] = 'Фамилия';
$lang['ru_RU']['MemberList.ss']['FILTER'] = 'Фильтр';
$lang['ru_RU']['MemberList_Table.ss']['EMAIL'] = 'Адрес email';
$lang['ru_RU']['MemberList_Table.ss']['FN'] = 'Имя';
$lang['ru_RU']['MemberList_Table.ss']['PASSWD'] = 'Пароль';
$lang['ru_RU']['MemberList_Table.ss']['SN'] = 'Фамилия';
$lang['ru_RU']['MemberTableField']['ADD'] = 'Добавить';
$lang['ru_RU']['MemberTableField']['ADDEDTOGROUP'] = 'Участник, добавленный в группу';
$lang['ru_RU']['MemberTableField.ss']['ADDNEW'] = 'Добавить';
$lang['ru_RU']['MemberTableField.ss']['DELETEMEMBER'] = 'Удалить этого участника';
$lang['ru_RU']['MemberTableField.ss']['EDITMEMBER'] = 'Изменить этого участника';
$lang['ru_RU']['MemberTableField.ss']['SHOWMEMBER'] = 'Показать этого участника';
$lang['ru_RU']['NewsletterAdmin']['FROMEM'] = 'С адреса email';
$lang['ru_RU']['NewsletterAdmin']['MEWDRAFTMEWSL'] = 'Новый черновик рассылки';
$lang['ru_RU']['NewsletterAdmin']['NEWLIST'] = 'Новый список рассылки';
$lang['ru_RU']['NewsletterAdmin']['NEWNEWSLTYPE'] = 'Новый тип рассылки';
$lang['ru_RU']['NewsletterAdmin']['NEWSLTYPE'] = 'Тип рассылки';
$lang['ru_RU']['NewsletterAdmin']['PLEASEENTERMAIL'] = 'Пожалуйста, введите адрес email';
$lang['ru_RU']['NewsletterAdmin']['RESEND'] = 'Повтор отправки';
$lang['ru_RU']['NewsletterAdmin']['SAVE'] = 'Сохранить';
$lang['ru_RU']['NewsletterAdmin']['SAVED'] = 'Сохранено';
$lang['ru_RU']['NewsletterAdmin']['SEND'] = 'Отправка...';
$lang['ru_RU']['NewsletterAdmin']['SENDING'] = 'Отправка email...';
$lang['ru_RU']['NewsletterAdmin']['SENTTESTTO'] = 'Тестовая отправка для:';
$lang['ru_RU']['NewsletterAdmin']['SHOWCONTENTS'] = 'Показать содержимое';
$lang['ru_RU']['NewsletterAdmin_BouncedList.ss']['EMADD'] = 'Адрес email';
$lang['ru_RU']['NewsletterAdmin_BouncedList.ss']['HAVEBOUNCED'] = 'Недоставленная почта';
$lang['ru_RU']['NewsletterAdmin_BouncedList.ss']['NOBOUNCED'] = 'Все письма доставлены';
$lang['ru_RU']['NewsletterAdmin_BouncedList.ss']['UNAME'] = 'Имя пользователя';
$lang['ru_RU']['NewsletterAdmin_left.ss']['ADDDRAFT'] = 'Добавить новый черновик';
$lang['ru_RU']['NewsletterAdmin_left.ss']['ADDTYPE'] = 'Добавить новый тип';
$lang['ru_RU']['NewsletterAdmin_left.ss']['CREATE'] = 'Создать';
$lang['ru_RU']['NewsletterAdmin_left.ss']['DEL'] = 'Удалить';
$lang['ru_RU']['NewsletterAdmin_left.ss']['DELETEDRAFTS'] = 'Удалить выбранные черновики';
$lang['ru_RU']['NewsletterAdmin_left.ss']['GO'] = 'Перейти';
$lang['ru_RU']['NewsletterAdmin_left.ss']['NEWSLETTERS'] = 'Рассылки';
$lang['ru_RU']['NewsletterAdmin_left.ss']['SELECTDRAFTS'] = 'Выберите черновики, которые Вы хотите удалить, и нажмите кнопку внизу';
$lang['ru_RU']['NewsletterAdmin_right.ss']['CANCEL'] = 'Отмена';
$lang['ru_RU']['NewsletterAdmin_right.ss']['ENTIRE'] = 'Отправить всем из списка рассылки';
$lang['ru_RU']['NewsletterAdmin_right.ss']['ONLYNOT'] = 'Отправить лишь тем, кому еще не отправлено';
$lang['ru_RU']['NewsletterAdmin_right.ss']['SEND'] = 'Произвести рассылку';
$lang['ru_RU']['NewsletterAdmin_right.ss']['SENDTEST'] = 'Тестовая отправка для:';
$lang['ru_RU']['NewsletterAdmin_right.ss']['WELCOME1'] = 'Добро пожаловать в';
$lang['ru_RU']['NewsletterAdmin_right.ss']['WELCOME2'] = 'раздел управления рассылками. Пожалуйста, выберите папку слева.';
$lang['ru_RU']['NewsletterAdmin_SiteTree.ss']['DRAFTS'] = 'Черновики';
$lang['ru_RU']['NewsletterAdmin_SiteTree.ss']['MAILLIST'] = 'Лист рассылки';
$lang['ru_RU']['NewsletterAdmin_SiteTree.ss']['SENT'] = 'Отправленные';
$lang['ru_RU']['NewsletterAdmin_UnsubscribedList.ss']['NOUNSUB'] = 'От подписки на эту рассылку не отказался никто';
$lang['ru_RU']['NewsletterAdmin_UnsubscribedList.ss']['UNAME'] = 'Имя пользователя';
$lang['ru_RU']['NewsletterAdmin_UnsubscribedList.ss']['UNSUBON'] = 'Подписка отменена';
$lang['ru_RU']['NewsletterList.ss']['CHOOSEDRAFT1'] = 'Пожалуйста, выберите черновик слева или';
$lang['ru_RU']['NewsletterList.ss']['CHOOSEDRAFT2'] = 'добавьте новый';
$lang['ru_RU']['NewsletterList.ss']['CHOOSESENT'] = 'Пожалуйста, выберите отправленную рассылку слева.';
$lang['ru_RU']['Newsletter_RecipientImportField.ss']['CHANGED'] = 'Количество изменений:';
$lang['ru_RU']['Newsletter_RecipientImportField.ss']['IMPORTED'] = 'Импортировано новых участников:';
$lang['ru_RU']['Newsletter_RecipientImportField.ss']['IMPORTNEW'] = 'Импортированные новые участники';
$lang['ru_RU']['Newsletter_RecipientImportField.ss']['SEC'] = 'сек.';
$lang['ru_RU']['Newsletter_RecipientImportField.ss']['SKIPPED'] = 'Пропущенных записей:';
$lang['ru_RU']['Newsletter_RecipientImportField.ss']['TIME'] = 'Затраченное время:';
$lang['ru_RU']['Newsletter_RecipientImportField.ss']['UPDATED'] = 'Обновленных участников:';
$lang['ru_RU']['Newsletter_RecipientImportField_Table.ss']['CONTENTSOF'] = 'Содержимое в';
$lang['ru_RU']['Newsletter_RecipientImportField_Table.ss']['NO'] = 'Отменить';
$lang['ru_RU']['Newsletter_RecipientImportField_Table.ss']['RECIMPORTED'] = 'Получатели, импортированные из';
$lang['ru_RU']['Newsletter_RecipientImportField_Table.ss']['YES'] = 'Подтвердить';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['DATE'] = 'Дата';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['EMAIL'] = 'Email';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['FN'] = 'Имя';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['NEWSNEVERSENT'] = 'Рассылка никогда не отправлялась следующим подписчикам';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['RES'] = 'Результат';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['SENDBOUNCED'] = 'Рассылка, отправленная следующим получателям, вернулась';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['SENDFAIL'] = 'Отправка следующим получателям неудачна';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['SENTOK'] = 'Отправка следующим получателям произведена успешно';
$lang['ru_RU']['Newsletter_SentStatusReport.ss']['SN'] = 'Фамилия';
$lang['ru_RU']['PageComment']['COMMENTBY'] = 'Комментарий: \'%s\' на %s';
$lang['ru_RU']['PageCommentInterface.ss']['COMMENTS'] = 'Комментарии';
$lang['ru_RU']['PageCommentInterface.ss']['NEXT'] = 'следующий';
$lang['ru_RU']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'На этой странице еще нет комментариев.';
$lang['ru_RU']['PageCommentInterface.ss']['POSTCOM'] = 'Оставить комментарий';
$lang['ru_RU']['PageCommentInterface.ss']['PREV'] = 'предыдущий';
$lang['ru_RU']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'этот комментарий - не спам';
$lang['ru_RU']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'этот комментарий - спам';
$lang['ru_RU']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Автор';
$lang['ru_RU']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'удалить этот комментарий';
$lang['ru_RU']['ReportAdmin_left.ss']['REPORTS'] = 'Отчеты';
$lang['ru_RU']['ReportAdmin_right.ss']['WELCOME1'] = 'Добро пожаловать в';
$lang['ru_RU']['ReportAdmin_right.ss']['WELCOME2'] = 'раздел отчетов. Пожалуйста, выберите нужный отчет слева.';
$lang['ru_RU']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Отчеты';
$lang['ru_RU']['SecurityAdmin']['ADDMEMBER'] = 'Добавить участника';
$lang['ru_RU']['SecurityAdmin']['ADVANCEDONLY'] = 'Этот раздел предназначен только для опытных пользователей.
Более подробную информацию можно получить <a href="http://doc.silverstripe.com/doku.php?id=permissions:codes" target="_blank">на этой странице</a>.';
$lang['ru_RU']['SecurityAdmin']['NEWGROUP'] = 'Новая группа';
$lang['ru_RU']['SecurityAdmin']['SAVE'] = 'Сохранить';
$lang['ru_RU']['SecurityAdmin']['SGROUPS'] = 'Группы доступа';
$lang['ru_RU']['SecurityAdmin_left.ss']['CREATE'] = 'Создать';
$lang['ru_RU']['SecurityAdmin_left.ss']['DEL'] = 'Удалить';
$lang['ru_RU']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Удалить выбранные группы';
$lang['ru_RU']['SecurityAdmin_left.ss']['GO'] = 'Перейти';
$lang['ru_RU']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Группы доступа';
$lang['ru_RU']['SecurityAdmin_left.ss']['SELECT'] = 'Выберите группы, которые Вы хотите удалить, и нажмите кнопку внизу';
$lang['ru_RU']['SecurityAdmin_left.ss']['TOREORG'] = 'Для упорядочения страниц, перетаскивайте их мышкой.';
$lang['ru_RU']['SecurityAdmin_right.ss']['WELCOME1'] = 'Добро пожаловать в';
$lang['ru_RU']['SecurityAdmin_right.ss']['WELCOME2'] = 'раздел управления правами доступа. Пожалуйста, выберите группу слева.';
$lang['ru_RU']['SideReport']['EMPTYPAGES'] = 'Пустые страницы';
$lang['ru_RU']['SideReport']['LAST2WEEKS'] = 'Страницы, редактированные последние 2 недели';
$lang['ru_RU']['SideReport']['REPEMPTY'] = 'Отчет %s пуст.';
$lang['ru_RU']['StaticExporter']['BASEURL'] = 'Базовый URL';
$lang['ru_RU']['StaticExporter']['EXPORTTO'] = 'Экспорт в эту папку';
$lang['ru_RU']['StaticExporter']['FOLDEREXPORT'] = 'Папка для экспорта';
$lang['ru_RU']['StaticExporter']['NAME'] = 'Статический экспорт';
$lang['ru_RU']['StaticExporter']['ONETHATEXISTS'] = 'Пожалуйста, укажите существующую папку';



$lang['ru_RU']['SubmittedFormEmail.ss']['SUBMITTED'] = 'На Ваш сайт были отправлены следующие данные: ';
$lang['ru_RU']['TaskList.ss']['BY'] = '-';
$lang['ru_RU']['ThumbnailStripField']['NOTAFOLDER'] = 'Это не папка';
$lang['ru_RU']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(Выберите выше папку)';
$lang['ru_RU']['ViewArchivedEmail.ss']['CANACCESS'] = 'Вы можете посмотреть архивную версию сайта по этой ссылке:';
$lang['ru_RU']['ViewArchivedEmail.ss']['HAVEASKED'] = 'Вы запросили просмотр содержимого нашего сайта за';
$lang['ru_RU']['WaitingOn.ss']['ATO'] = 'назначено для';

?>