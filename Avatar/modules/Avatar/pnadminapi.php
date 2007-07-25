<?php
/**
 * Avatar Module
 *
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id: pnadmin.php 19 2007-07-24 19:13:47Z landseer $
 * @author       Joerg Napp
 * @link         http://lottasophie.sf.net
 * @copyright    Copyright (C) 2004
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */


/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function Avatar_adminapi_getlinks()
{
    $links = array();
    if (SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Avatar', 'admin', 'maintain'), 'text' => _AVATAR_MAINTAINAVATARS);
        $links[] = array('url' => pnModURL('Avatar', 'admin', 'modifyconfig'), 'text' => _AVATAR_MODIFYCONFIG);
    }
    return $links;
}

?>