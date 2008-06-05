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
define('_AVATAR_ADM_ALLOWMULTIPLEAVATARS',    'Allow multiple avatars');
define('_AVATAR_ADM_ALLOWRESIZE',             'Resize the avatar automatically');
define('_AVATAR_ADM_AVATARDIR',               'Avatar Directory (Zikula)');
define('_AVATAR_ADM_AVATARDIR_HINT',          'Default: images/avatar <strong>without trailing /</strong>');
define('_AVATAR_ADM_EXTENSIONS',              'Allowed extensions');
define('_AVATAR_ADM_EXTENSIONS_HINT',         '(a semicolon separated list of allowed file extensions, supported filetypes: gif, jpg, jpeg, png, wbm. When using PHP 5 or later you have to allow \'jpeg\' instead of \'jpg\')');
define('_AVATAR_ADM_FORUMDIR',                'Avatar Directory (PHPBB2');
define('_AVATAR_ADM_MAXHEIGHT',               'Max height in pixels');
define('_AVATAR_ADM_MAXSIZE',                 'Max avatar filesize in bytes');
define('_AVATAR_ADM_MAXWIDTH',                'Max width in pixels');
define('_AVATAR_ADM_MULTIPLE_HINT',           'This allows the user to store one avatar per extension');
define('_AVATAR_ADM_TITLE',                   'Avatar Administration');
define('_AVATAR_ADM_UPLOAD',                  'Upload Settings');
define('_AVATAR_ALLOWEDEXTENSIONS',  'Possible extensions');
define('_AVATAR_AVATARINUSE',                 'Warning: This avatar is in use and cannot be deleted. If you want to delete it, please change the avatars of the users listed below.');

//
// C
//
define('_AVATAR_CHANGEDTO',                   'The avatar of user %username% has been changed to %avatar%');
define('_AVATAR_CLEAR_BUTTON',       'Clear');
define('_AVATAR_CONFIRMDELETE',               'Confirm deletion');
define('_AVATAR_CURRENTAVATAR',      'Your current avatar is ');

//
// D
//
define('_AVATAR_DELETEAVATAR',                'delete avatar');
define('_AVATAR_DELETECURRENTAVATAR',         'Delete current avatar?');
define('_AVATAR_DELETED',                     'Avatar %avatar% has been deleted');

//
// E
//
define('_AVATAR_ENTERUSERNAME',               'Enter users name');
define('_AVATAR_ERRORDELETINGAVATAR',         'Error: Unable to delete avatar %avatar%');
define('_AVATAR_ERR_AUTHORIZED',     'Not authorised to upload your avatar.');
define('_AVATAR_ERR_COPYAVATAR',     'Fail to copy the file in avatars\' directory.');
define('_AVATAR_ERR_COPYFORUM',      'Fail to copy the file in phpbb\'s directory.');
define('_AVATAR_ERR_FILEDIMENSIONS', 'Image height (max. %h%px) or width (max. %w%px) error.');
define('_AVATAR_ERR_FILESIZE',       'Filesize error, max %max% bytes are allowed.');
define('_AVATAR_ERR_FILETYPE',       'Unauthorised file extension. Allowed extensions: %ft%.');
define('_AVATAR_ERR_FILEUPLOAD',     'No file selected.');
define('_AVATAR_ERR_NOIMAGE',        'File is not an image');
define('_AVATAR_ERR_NOTLOGGEDIN',    'You aren\'t a registered user.');
define('_AVATAR_ERR_SELECT',         'Error while selecting the avatar.');
define('_AVATAR_ERR_USERNOTAUTHORIZED',       'The user is not authorized to use this avatar. To change this, update the permission for %avatar%.');

//
// L
//
define('_AVATAR_LISTUSERS',                   'list the users that use this avatar');

//
// M
//
define('_AVATAR_MAINTAINAVATARS',             'Maintain Avatars');
define('_AVATAR_MAXDIMENSIONS',      'Maximal avatar dimensions');
define('_AVATAR_MAXHEIGHT',          'Maximal height');
define('_AVATAR_MAXSIZE',            'Avatar max. file size');
define('_AVATAR_MAXWIDTH',           'Maximal width');
define('_AVATAR_MISSINGPATH',                 'missing path');
define('_AVATAR_MODIFYCONFIG',                'Modify configuration');

//
// N
//
define('_AVATAR_NOUSERFORTHISAVATAR',         'No user is using this avatar');
define('_AVATAR_NOAVATARSELECTED',            'no avatar selected');

//
// P
//
define('_AVATAR_PATHDOESNOTEXIST',   'The path %path% does not exist or is not readable by the webserver.');
define('_AVATAR_PATHISNOTWRITABLE',  'The webserver cannot write to %path%.');
define('_AVATAR_PIXEL',              'pixels');

//
// R
//
define('_AVATAR_RESIZE',             'Larger images will be resized automatically.');

//
// S
//
define('_AVATAR_SEARCHUSERS',         'Search user');
define('_AVATAR_SELECTAVATAR',       'Select avatar');
define('_AVATAR_SELECTAVATARFORUSERS',        'Choose the avatar to update all selected users');
define('_AVATAR_SELECTAVATAR_LINK',  'Change Avatar');
define('_AVATAR_SELECTEDAVATAR',       'Selected avatar');
define('_AVATAR_SELECTNEWAVATAR',             'Select new avatar');
define('_AVATAR_SELECTYOURAVATAR',   'Choose your prefered avatar');

//
// T
//
define('_AVATAR_TITLE',              'Avatar Management');

//
// U
//
define('_AVATAR_UPLOADFILE',         'Upload file');
define('_AVATAR_UPLOAD_BUTTON',      'Upload');
define('_AVATAR_USERLISTPERAVATAR',           'Users who use this avatar');
define('_AVATAR_USER_CHOOSE',        'If no available avatar represents you, you can upload a personalised avatar.');

//
// V
//
define('_AVATAR_VISITHOMEPAGE',               'Visit Avatar project on NOC');

//
// w
//
define('_AVATAR_WARN_AVARTARDIR',                    'Warning: the webserver cannot write to the avatar direcory');
define('_AVATAR_WARN_FORUMDIR',                      'Warning: the webserver cannot write to the forums avatar direcory (this is fine when PNphpBB2 isn\'t installed)');
