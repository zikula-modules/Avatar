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

if (strpos(basename(__FILE__), $_SERVER['PHP_SELF'])) { 
           die ('You can\'t access this file directly...'); 
}

// only to load the language file, so that we do not need the lang folder :-)
pnModLoad('Avatar', 'user');
$modInfo = pnModGetInfo(pnModGetIDFromName('Avatar'));
user_menu_add_option(pnModURL(Avatar), _AVATAR_SELECTAVATAR_LINK, "modules/$modInfo[directory]/pnimages/user.gif");

?>