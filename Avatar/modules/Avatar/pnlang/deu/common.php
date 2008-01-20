<?php
/**
 * Avatar Module
 * 
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id$
 * @author       Joerg Napp, Frank Schummertz
 * @link         http://lottasophie.sf.net, http://www.pn-cms.de
 * @copyright    Copyright (C) 2004-2007
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

//
// A
//
define('_AVATAR_ADM_ALLOWMULTIPLEAVATARS',    'Erlaube mehrere Avatare');
define('_AVATAR_ADM_ALLOWRESIZE',             'Automatische Verkleinerung des Avatarbildes');
define('_AVATAR_ADM_AVATARDIR',               'Avatar Verzeichnis (PostNuke)');
define('_AVATAR_ADM_AVATARDIR_HINT',          'Standard: images/avatar <strong>ohne / am Ende des Pfades!</strong>');
define('_AVATAR_ADM_EXTENSIONS',              'Erlaubte Dateiendungen');
define('_AVATAR_ADM_EXTENSIONS_HINT',         '(eine durch Semikolons getrennte Liste erlaubter Dateiendungen, unterstützt werden: gif, jpg, png, wbm. Bei Verwendung von mind. PHP 5 muss \'jpeg\' anstelle von \'jpg\' verwendet werden.)');
define('_AVATAR_ADM_FORUMDIR',                'Avatar Verzeichnis (PHPBB2-Forum)');
define('_AVATAR_ADM_MAXHEIGHT',               'Maximal Höhe in Pixel');
define('_AVATAR_ADM_MAXSIZE',                 'Dateigröße in Bytes');
define('_AVATAR_ADM_MAXWIDTH',                'Maximale Breite in Pixel');
define('_AVATAR_ADM_MULTIPLE_HINT',           'dem Benutzer erlauben jeweils ein Avatar pro Dateiendung abzuspeichern.');
define('_AVATAR_ADM_TITLE',                   'Avatarverwaltung');
define('_AVATAR_ADM_UPLOAD',                  'Einstellungen zum Upload');
define('_AVATAR_ALLOWEDEXTENSIONS',           'Erlaubte Dateiendungen');
define('_AVATAR_AVATARINUSE',                 'Achtung: Dieser Avatar ist in Benutzung und kann nicht gelöscht werden. Vor der Löschung müssen den unten aufgeführten Benutzern neue Avatare zugeteilt werden.');

//
// C
//
define('_AVATAR_CHANGEDTO',                   'Der Avatar des Benutzer %username% wurde auf %avatar% geändert');
define('_AVATAR_CLEAR_BUTTON',                'Eingabe löschen');
define('_AVATAR_CONFIRMDELETE',               'Löschung bestätigen');
define('_AVATAR_CURRENTAVATAR',               'Aktueller Avatar');

//
// D
//
define('_AVATAR_DELETEAVATAR',                'Avatar löschen');
define('_AVATAR_DELETECURRENTAVATAR',         'Aktuellen Avatar löschen?');
define('_AVATAR_DELETED',                     'Der Avatar %avatar% wurde gelöscht');

//
// E
//
define('_AVATAR_ENTERUSERNAME',               'Benutzernamen suchen:');
define('_AVATAR_ERRORDELETINGAVATAR',         'Fehler: Der Avatar %avatar% konnte nicht gelöscht werden');
define('_AVATAR_ERR_AUTHORIZED',              'Keine Berechtigung, einen Avatar auszuwählen.');
define('_AVATAR_ERR_COPYAVATAR',              'Das Hochladen der Datei ist fehlgeschlagen.');
define('_AVATAR_ERR_COPYFORUM',               'Das Hochladen der Datei ist fehlgeschlagen.');
define('_AVATAR_ERR_FILEDIMENSIONS',          'Die Abmessungen des Bildes sind zu groß. Höhe max. %h%px, Breite max. %w%px');
define('_AVATAR_ERR_FILESIZE',                'Falsche Dateigröße, max. %max% Byte sind erlaubt.');
define('_AVATAR_ERR_FILETYPE',                'Dieser Dateityp ist nicht gestattet. Erlaubt sind %ft%');
define('_AVATAR_ERR_FILEUPLOAD',              'Keine Datei ausgewählt.');
define('_AVATAR_ERR_NOIMAGE',                 'Datei ist kein Bild');
define('_AVATAR_ERR_NOTLOGGEDIN',             'Nicht registrierter User !');
define('_AVATAR_ERR_SELECT',                  'Die Auswahl des Avatars schlug fehl.');
define('_AVATAR_ERR_USERNOTAUTHORIZED',       'Der User darf diesen Avatar nicht sehen. Zum Ändern bitte die Zugriffsrechte für %s anpassen');

//
// L
//
define('_AVATAR_LISTUSERS',                   'User auflisten, die diesen Avatar benutzen');

//
// M
//
define('_AVATAR_MAINTAINAVATARS',             'Avatars verwalten');
define('_AVATAR_MAXDIMENSIONS',               'Maximale Avatargröße');
define('_AVATAR_MAXHEIGHT',                   'Maximale Höhe in Pixel');
define('_AVATAR_MAXSIZE',                     'Maximal Dateigröße des Avatars');
define('_AVATAR_MAXWIDTH',                    'Maximale Breite in Pixel');
define('_AVATAR_MODIFYCONFIG',                'Konfiguration ändern');

//
// N
//
define('_AVATAR_NOUSERFORTHISAVATAR',         'Kein Benutzer verwendet diesen Avatar');
define('_AVATAR_NOAVATARSELECTED',            'kein Avatar ausgewählt');

//
// P
//
define('_AVATAR_PIXEL',                       'Pixel');

//
// R
//
define('_AVATAR_RESIZE',                      'Größere Bilder werden automatisch verkleinert.');

//
// S
//
define('_AVATAR_SEARCHUSERS',                 'Benutzer suchen');
define('_AVATAR_SELECTAVATAR',                'Avatar auswählen');
define('_AVATAR_SELECTAVATARFORUSERS',        'Gewählte User mit folgendem Avatar versehen');
define('_AVATAR_SELECTAVATAR_LINK',           'Individuellen Avatar auswählen');
define('_AVATAR_SELECTNEWAVATAR',             'Neuen Avatar auswählen');
define('_AVATAR_SELECTYOURAVATAR',            'Bitte einen Avatar durch Anklicken auswählen');

//
// T
//
define('_AVATAR_TITLE',                       'Avatar-Bild Einstellungen');

//
// U
//
define('_AVATAR_UPLOADFILE',                  'Datei hochladen');
define('_AVATAR_UPLOAD_BUTTON',               'Hochladen');
define('_AVATAR_USERLISTPERAVATAR',           'Benutzer die diesen Avatar verwenden');
define('_AVATAR_USER_CHOOSE',                 'Wenn ein eigenes Avatar bereits vorhanden ist, muss kein weiteres hochgeladen werden.');

//
// V
//
define('_AVATAR_VISITHOMEPAGE',               'Avatar-Modul im NOC besuchen');

//
// W
//
define('_AVATAR_WARN_AVARTARDIR',             'Achtung: das Avatar-Verzeichnis ist nicht beschreibbar');
define('_AVATAR_WARN_FORUMDIR',               'Achtung: das Forum-Verzeichnis ist nicht beschreibbar (Das ist OK, wenn kein PNphpBB2 installiert ist)');
