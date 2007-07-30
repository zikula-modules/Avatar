<?php
/**
 * Avatar Module
 * 
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id: user.php 12 2006-01-20 09:31:08Z jna $
 * @author       Joerg Napp, Frank Schummertz
 * @link         http://lottasophie.sf.net, http://www.pn-cms.de
 * @copyright    Copyright (C) 2004-2007
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

define('_AVATAR_LISTUSERS',                   'User auflisten, die diesen Avatar benutzen');
define('_AVATAR_DELETEAVATAR',                'Avatar löschen');
define('_AVATAR_AVATARINUSE',                 'Achtung: Dieser Avatar ist in Benutzung und kann nicht gelöscht werden. Vor der Löschung müssen den unten aufgeführten Benutzern neue Avatare zugeteilt werden.');
define('_AVATAR_CONFIRMDELETE',               'Löschung bestätigen');
define('_AVATAR_ERRORDELETINGAVATAR',         'Fehler: Der Avatar %s konnte nicht gelöscht werden');
define('_AVATAR_DELETED',                     'Der Avatar %s wurde gelöscht');
define('_AVATAR_SELECTAVATARFORUSERS',        'Gewählte User mit folgenden Avatar versehen');
define('_AVATAR_NOUSERFORTHISAVATAR',         'Kein Benutzer verwendet diesen Avatar');
define('_AVATAR_USERLISTPERAVATAR',           'Benutzer die diesen Avatar verwenden');
define('_AVATAR_CHANGEDTO',                   'Der Avatar des Benutzer %s wurde geändert auf %s');
define('_AVATAR_ERR_USERNOTAUTHORIZED',       'Der User darf diesen Avatar nicht sehen. Zum Ändern bitte die Zugriffsrechte für %s anpassen');
define('_AVATAR_DELETECURRENTAVATAR',         'Aktuellen Avatar löschen?');
define('_AVATAR_SELECTNEWAVATAR',             'Neuen Avatar auswählen');
define('_AVATAR_CURRENTAVATAR',               'Aktueller Avatar');
define('_AVATAR_ENTERUSERNAME',               'Benutzername');
define('_AVATAR_MODIFYCONFIG',                'Konfiguration ändern');
define('_AVATAR_MAINTAINAVATARS',             'Avatars verwalten');
define('_AVATAR_VISITHOMEPAGE',               'Avatar-Modul im NOC besuchen');
define('_AVATAR_ADM_TITLE',                   'Avatarverwaltung');

// upload settings form
define('_AVATAR_ADM_UPLOAD',                  'Einstellungen zum Upload');
define('_AVATAR_ADM_AVATARDIR',               'Avatar Verzeichnis (PostNuke)');
define('_AVATAR_ADM_AVATARDIR_HINT',          'Standard: images/avatar');
define('_AVATAR_ADM_FORUMDIR',                'Avatar Verzeichnis (PHPBB2-Forum)');
define('_AVATAR_ADM_ALLOWRESIZE',             'Automatische verkleinerung des Avatarbildes');
define('_AVATAR_ADM_MAXSIZE',                 'Dateigröße in Bytes');
define('_AVATAR_ADM_MAXHEIGHT',               'Maximal Höhe in Pixel');
define('_AVATAR_ADM_MAXWIDTH',                'Maximale Breite in Pixel');
define('_AVATAR_ADM_EXTENSIONS',              'Erlaubte Dateiendungen');
define('_AVATAR_ADM_EXTENSIONS_HINT',         'Die Freigabe einiger Dateiendungen kann den unberechtigten Zugriff von außen auf das System ermöglichen!');

// warnings
define('_AVATAR_WARN_AVARTARDIR',                    'Achtung: das Avatar-Verzeichnis ist nicht beschreibbar');
define('_AVATAR_WARN_FORUMDIR',                      'Achtung: das Forum-Verzeichnis ist nicht beschreibbar (Das ist OK, wenn kein PNphpBB2 installiert ist)');

// title
define('_AVATAR_TITLE',              'Avatar-Bild Einstellungen');

// defines for the avatar select form
define('_AVATAR_SELECTYOURAVATAR',   'bitte wähle durch Anklicken ein Avatar-Bild aus den folgenden aus.');
define('_AVATAR_SELECTAVATAR',       'Avatar auswählen:');
define('_AVATAR_CURRENTAVATAR',      'Dein jetziges Avatar ist: ');

// defines for the upload form
define('_AVATAR_USER_CHOOSE',        'Wenn ein eigenes Avatar bereits vorhanden ist, muss kein weiteres hochgeladen werden.');
define('_AVATAR_UPLOADFILE',         'Datei hochladen');
define('_AVATAR_UPLOAD_BUTTON',      'Hochladen');
define('_AVATAR_CLEAR_BUTTON',       'Eingabe löschen');
define('_AVATAR_MAXSIZE',            'Maximal Dateigröße des Avatars');
define('_AVATAR_ALLOWEDEXTENSIONS',  'Erlaubte Dateiendungen');
define('_AVATAR_MAXHEIGHT',          'Maximale Höhe in Pixel');
define('_AVATAR_MAXWIDTH',           'Maximale Breite in Pixel');
define('_AVATAR_MAXDIMENSIONS',      'Maximale Avatargröße');
define('_AVATAR_PIXEL',              'Pixel');
define('_AVATAR_RESIZE',             'Größere Bilder werden automatisch verkleinert.');

// Error Messages
define('_AVATAR_ERR_FILETYPE',       'Dieser Dateityp ist nicht gestattet.');
define('_AVATAR_ERR_FILESIZE',       'Die Dateigröße ist nicht gestattet.');
define('_AVATAR_ERR_FILEDIMENSIONS', 'Die Abmessungen des Bildes sind zu groß.');
define('_AVATAR_ERR_FILEUPLOAD',     'Keine Datei ausgewählt.');
define('_AVATAR_ERR_AUTHORIZED',     'Keine Berechtigung, einen Avatar auszuwählen.');
define('_AVATAR_ERR_COPYAVATAR',     'Das Hochladen der Datei ist fehlgeschlagen.');
define('_AVATAR_ERR_COPYFORUM',      'Das Hochladen der Datei ist fehlgeschlagen.');
define('_AVATAR_ERR_SELECT',         'Die Auswahl des Avatars schlug fehl.');
define('_AVATAR_ERR_NOTLOGGEDIN',    'Nicht registrierter User !');

// defines for the user page plugin
define('_AVATAR_SELECTAVATAR_LINK',  'Individuellen Avatar auswählen');
