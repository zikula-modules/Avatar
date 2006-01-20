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
define('_AVATAR_TITLE',              'Avatar Management');

// defines for the avatar select form
define('_AVATAR_SELECTYOURAVATAR',   'Choose your prefered avatar among those available.');
define('_AVATAR_SELECTAVATAR',       'Avatar auswählen:');
define('_AVATAR_CURRENTAVATAR',      'Your current avatar is ');

// defines for the upload form
define('_AVATAR_USER_CHOOSE',        'If no available avatar represents you, you can upload a personalised avatar.');
define('_AVATAR_UPLOADFILE',         'Upload file');
define('_AVATAR_UPLOAD_BUTTON',      'Upload');
define('_AVATAR_CLEAR_BUTTON',       'Eingabe löschen');
define('_AVATAR_MAXSIZE',            'Avatar max dimensions');
define('_AVATAR_ALLOWEDEXTENSIONS',  'Authorised extensions');
define('_AVATAR_MAXHEIGHT',          'Maximal height');
define('_AVATAR_MAXWIDTH',           'Maximal Width');
define('_AVATAR_MAXDIMENSIONS',      'Maximal avatar size');
define('_AVATAR_PIXEL',              'pixels');
define('_AVATAR_RESIZE',             'Bigger images will be resized automatically.');

// Error Messages
define('_AVATAR_ERR_FILETYPE',       'Unauthorised file extension.');
define('_AVATAR_ERR_FILESIZE',       'Filesize error.');
define('_AVATAR_ERR_FILEDIMENSIONS', 'Image Height or Width error.');
define('_AVATAR_ERR_FILEUPLOAD',     'No file selected.');
define('_AVATAR_ERR_AUTHORIZED',     'Not authorised to upload your avatar.');
define('_AVATAR_ERR_COPYAVATAR',     'Fail to copy the file in avatars\' directory.');
define('_AVATAR_ERR_COPYFORUM',      'Fail to copy the file in phpbb\'s directory.');
define('_AVATAR_ERR_SELECT',         'Die Auswahl des Avatars schlug fehl.');
define('_AVATAR_ERR_NOTLOGGEDIN',    'You aren\'t a registered user.');

// defines for the user page plugin
define('_AVATAR_SELECTAVATAR_LINK',  'Change Avatar');

?>
