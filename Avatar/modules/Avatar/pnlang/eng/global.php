<?php
/**
 * Avatar Module
 * 
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id: user.php 12 2006-01-20 09:31:08Z jna $
 * @author       Joerg Napp
 * @link         http://lottasophie.sf.net
 * @copyright    Copyright (C) 2004
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

define('_AVATAR_AVATARINUSE',                 'Warning: This avatar is in use and cannot be deleted. If you want to delete it, please change the avatars of the users listed below.');
define('_AVATAR_CONFIRMDELETE',               'Confirm deletion');
define('_AVATAR_ERRORDELETINGAVATAR',         'Error: Unable to delete avatar %s');
define('_AVATAR_DELETED',                     'Avatar %s has been deleted');
define('_AVATAR_SELECTAVATARFORUSERS',        'Choose the avatar to update all selected users');
define('_AVATAR_NOUSERFORTHISAVATAR',         'No user is using this avatar');
define('_AVATAR_USERLISTPERAVATAR',           'Users who use this avatar');
define('_AVATAR_CHANGEDTO',                   'The avatar of user %s has been changed to %s');
define('_AVATAR_ERR_USERNOTAUTHORIZED',       'The user is not authorized to use this avatar. To change this, update the permission for %s.');
define('_AVATAR_DELETECURRENTAVATAR',         'Delete current avatar?');
define('_AVATAR_SELECTNEWAVATAR',             'Select new avatar');
define('_AVATAR_CURRENTAVATAR',               'Current avatar');
define('_AVATAR_ENTERUSERNAME',               'Enter users name');
define('_AVATAR_MODIFYCONFIG',                'Modify configuration');
define('_AVATAR_MAINTAINAVATARS',             'Maintain Avatars');
define('_AVATAR_VISITHOMEPAGE',               'Visit Avatar project on NOC');
define('_AVATAR_ADM_TITLE',                   'Avatar Administration');

// upload settings form
define('_AVATAR_ADM_UPLOAD',                  'Upload Settings');
define('_AVATAR_ADM_AVATARDIR',               'Avatar Directory (PostNuke)');
define('_AVATAR_ADM_AVATARDIR_HINT',          'Default: images/avatar');
define('_AVATAR_ADM_FORUMDIR',                'Avatar Directory (PHPBB2');
define('_AVATAR_ADM_ALLOWRESIZE',             'Resize the avatar automatically');
define('_AVATAR_ADM_MAXSIZE',                 'MAX avatar Filesize in bytes');
define('_AVATAR_ADM_MAXHEIGHT',               'Max Height in pixels');
define('_AVATAR_ADM_MAXWIDTH',                'Max Width in pixels');
define('_AVATAR_ADM_EXTENSIONS',              'Authorized extensions');
define('_AVATAR_ADM_EXTENSIONS_HINT',         'gif;jpg The user can upload a file for each one');

// display management form
define('_AVATAR_ADM_DISPLAYMANAGEMENT',       'Display management');
define('_AVATAR_ADM_DISPLAYMANAGEMENT_HINT',  'In this section you can fix particular prefix for groups. As an example if you assign "writer" as prefix to the editor\'s group, only users who are member of this group will see avatars with name like "writer_xxxxx.ext". If you want that a group can see all avatars, enter the character * as prefix.');
define('_AVATAR_ADM_DISPLAYMANAGEMENT_HINT2', 'P.S. Remember that avatars uploaded by users have name like "pers_userID.ext" and by default are only available to the owner. To allow others to see personal avatars you have to set their prefix to "pers".');
define('_AVATAR_ADM_GROUPID',                 'Group ID');
define('_AVATAR_ADM_PREFIX',                  'Prefix');
define('_AVATAR_ADM_GROUPS',                  'Available groups');
define('_AVATAR_ADM_GROUPS_ALL',              'All');

// warnings
define('_AVATAR_WARN_AVARTARDIR',                    'Warning: the Avatar direcory isn\'t writable');
define('_AVATAR_WARN_FORUMDIR',                      'Warning: the Forum direcory isn\'t writable (This is fine when PNphpBB2 isn\'t installed)');

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
