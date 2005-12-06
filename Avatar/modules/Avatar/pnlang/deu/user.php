<?php
/**
 * Avatar Module
 * 
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id$
 * @author       Joerg Napp
 * @link         http://lottasophie.sf.net
 * @copyright    Copyright (C) 2004
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
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
define('_AVATAR_MAXDIMENSIONS',      'Maximale Avatargröße:');
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

?>
