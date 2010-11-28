<?php
/**
 * Avatar Module
 *
 * @package      Avatar
 * @author       Joerg Napp, Frank Schummertz, Carsten Volmer
 * @link         http://code.zikula.org/avatar
 * @copyright    Copyright (C) 2004-2010
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

class Avatar_Api_Admin extends Zikula_Api {

    /**
     * get available admin panel links
     *
     * @author Mark West
     * @return array array of admin links
     */
    public function getlinks()
    {
        $links = array();
        if (SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('Avatar', 'admin', 'main'), 'text' => $this->__('Maintain avatars'));
            $links[] = array('url' => ModUtil::url('Avatar', 'admin', 'searchusers'), 'text' => $this->__('Search user'));
            $links[] = array('url' => ModUtil::url('Avatar', 'admin', 'modifyconfig'), 'text' => $this->__('Modify configuration'));
        }
        return $links;
    }
    
    /**
     * get all users that use the given avatar
     *
     *@params $args['avatar']    string   the avatar name
     */
    public function getusersbyavatar($args)
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
    
        $users = array();
        if(!isset($args['avatar']) || empty($args['avatar'])) {
            return $users;
        }
    
        $ztables = DBUtil::getTables();
        $userdatacolumn = $ztables['objectdata_attributes_column'];
        if ($args['avatar'] == 'blank.gif') {
            $where = $userdatacolumn['attribute_name'] . '="avatar" AND (' . $userdatacolumn['value'] . '="' . DataUtil::formatForStore($args['avatar']) . '" OR ' . $userdatacolumn['value'] . '="")';
        } else {
            $where = $userdatacolumn['attribute_name'] . '="avatar" AND ' . $userdatacolumn['value'] . '="' . DataUtil::formatForStore($args['avatar']) . '"';
        }
        $avatarusers = DBUtil::selectObjectArray('objectdata_attributes', $where);
    
        foreach($avatarusers as $avataruser) {
            $users[$avataruser['id']] = UserUtil::getVar('uname', $avataruser['object_id']);
        }
    
        return $users;
    }
    
    /**
     * delete an avatar
     *
     */
    public function deleteavatar($args)
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
    
        $osdir = DataUtil::formatForOS(ModUtil::getVar('Users', 'avatarpath'));
        $avatarfile = $osdir . '/' . DataUtil::formatForOS($args['avatar']);
        if(unlink($avatarfile) == false) {
            return LogUtil::registerError($this->__f('Error! Unable to delete avatar \'%s\'.', $avatarfile));
        }
    
        LogUtil::registerStatus($this->__f('Done! The Avatar \'%s\' has been deleted.', $avatarfile));
        return true;
    }

}
