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

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function Avatar_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('Avatar');
    $links = array();
    if (SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Avatar', 'admin', 'main'), 'text' => __('Maintain Avatars', $dom));
        $links[] = array('url' => pnModURL('Avatar', 'admin', 'searchusers'), 'text' => __('Search user', $dom));
        $links[] = array('url' => pnModURL('Avatar', 'admin', 'modifyconfig'), 'text' => __('Modify configuration', $dom));
    }
    return $links;
}

/**
 * get all users that use the given avatar
 *
 *@params $args['avatar']    string   the avatar name
 */
function Avatar_adminapi_getusersbyavatar($args)
{
    $users = array();

    if (SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        if(!isset($args['avatar']) || empty($args['avatar'])) {
            return $users;
        }

        //First we need to get the property _YOURAVATAR
        $properties = pnModAPIFunc('Profile', 'user', 'getall');
        $youravatar = DataUtil::formatForStore($properties['_YOURAVATAR']['prop_id']);

        $pntables = pnDBGetTables();
        $userdatacolumn = $pntables['user_data_column'];
        $where = $userdatacolumn['uda_propid'] . '=' . $youravatar . ' AND ' . $userdatacolumn['uda_value'] . '="' . DataUtil::formatForStore($args['avatar']) . '"';
        $avatarusers = DBUtil::selectObjectArray('user_data', $where);
        foreach($avatarusers as $avataruser) {
            $users[$avataruser['uda_uid']] = pnUserGetVar('uname', $avataruser['uda_uid']);
        }
    }
    return $users;
}

/**
 * delete an avatar
 *
 */
function Avatar_adminapi_deleteavatar($args)
{
    $dom = ZLanguage::getModuleDomain('Avatar');
    if (SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        $osdir = DataUtil::formatForOS(pnModGetVar('Users', 'avatarpath'));
        $avatarfile = $osdir . '/' . DataUtil::formatForOS($args['avatar']);
        if(unlink($avatarfile) == false) {
            return LogUtil::registerError(__f('Error: Unable to delete avatar %s', $avatarfile, $dom), null, pnModURL('Avatar', 'admin', 'main'));
        }
        LogUtil::registerStatus(__f('Avatar %s has been deleted', $avatarfile, $dom));
        return true;
    }
    return LogUtil::registerPermissionError();
}
