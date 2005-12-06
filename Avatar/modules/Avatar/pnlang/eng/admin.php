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

?>