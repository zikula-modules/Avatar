<?php
/**
 * Avatar Module
 *
 * @package      Avatar
 * @version      $Id$
 * @author       Joerg Napp, Frank Schummertz, Carsten Volmer
 * @link         http://code.zikula.org/avatar
 * @copyright    Copyright (C) 2004-2010
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
        $links[] = array('url' => pnModURL('Avatar', 'admin', 'main'), 'text' => __('Maintain avatars', $dom));
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
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('Avatar');

    $users = array();
    if(!isset($args['avatar']) || empty($args['avatar'])) {
        return $users;
    }

    //First we need to get the property avatar
    $properties = pnModAPIFunc('Profile', 'user', 'getall');
    $youravatar = DataUtil::formatForStore($properties['_YOURAVATAR']['prop_attribute_name']);

    $pntables = pnDBGetTables();
    $userdatacolumn = $pntables['objectdata_attributes_column'];
    if ($args['avatar'] == 'blank.gif') {
        $where = $userdatacolumn['attribute_name'] . '="' . $youravatar . '" AND (' . $userdatacolumn['value'] . '="' . DataUtil::formatForStore($args['avatar']) . '" OR ' . $userdatacolumn['value'] . '="")';
    } else {
        $where = $userdatacolumn['attribute_name'] . '="' . $youravatar . '" AND ' . $userdatacolumn['value'] . '="' . DataUtil::formatForStore($args['avatar']) . '"';
    }
    $avatarusers = DBUtil::selectObjectArray('objectdata_attributes', $where);

    foreach($avatarusers as $avataruser) {
        $users[$avataruser['id']] = pnUserGetVar('uname', $avataruser['object_id']);
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

    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $osdir = DataUtil::formatForOS(pnModGetVar('Users', 'avatarpath'));
    $avatarfile = $osdir . '/' . DataUtil::formatForOS($args['avatar']);
    if(unlink($avatarfile) == false) {
        return LogUtil::registerError(__f('Error! Unable to delete avatar \'%s\'', $avatarfile, $dom));
    }

    LogUtil::registerStatus(__f('Done! The Avatar \'%s\' has been deleted', $avatarfile, $dom));
    return true;
}
