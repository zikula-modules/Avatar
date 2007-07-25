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

// display management form
define('_AVATAR_ADM_DISPLAYMANAGEMENT',       'Anzeigeeinstellungen');
define('_AVATAR_ADM_DISPLAYMANAGEMENT_HINT',  'In diesem Bereich können Einstellungen für die Gruppe vorgenommen werden.  Beispiels kann die Einstellung ´editors´ zur Gruppe der editors so gewählt werden, dass nur Angehörige dieser Gruppe die Avatar-Bilder mit der Bezeichnung ´editors_User-Name.ext´ sehen und auswählen können. Wenn jeder Zugriff auf sämtliche Avatar-Bilder haben sollen, dann muss ´*´ gewählt werden.');
define('_AVATAR_ADM_DISPLAYMANAGEMENT_HINT2', 'P.S. Jedes hochgeladene Avatar-Bild wird ohne die ´pers´-Änderung mit dem Namen ´User-name_AVATAR_.ext´ gespeichert.');
define('_AVATAR_ADM_GROUPID',                 'Gruppen ID');
define('_AVATAR_ADM_PREFIX',                  'Prefix');
define('_AVATAR_ADM_GROUPS',                  'zur Verfügung stehende Gruppen');
define('_AVATAR_ADM_GROUPS_ALL',              'Alle');

// warnings
define('_AVATAR_WARN_AVARTARDIR',                    'Achtung: das Avatar-Verzeichnis ist nicht beschreibbar');
define('_AVATAR_WARN_FORUMDIR',                      'Achtung: das Forum-Verzeichnis ist nicht beschreibbar (Das ist OK, wenn kein PNphpBB2 installiert ist)');
?>