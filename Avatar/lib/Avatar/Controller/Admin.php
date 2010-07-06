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
 * the main administration function
 *
 * This function is the default function, and is called whenever the
 * module is called without defining arguments.
 * As such it can be used for a number of things, but most commonly
 * it either just shows the module menu and returns or calls whatever
 * the module designer feels should be the default function (often this
 * is the view() function)
 *
 * @author       J�rg Napp, Frank Schummertz
 * @return       output       The main module admin page.
 */

/**
 * avatar maintenance
 *
 *
 * @author       Frank Schummertz
 * @return       output       The maintenance admin page.
 */
 

class Avatar_Controller_Admin extends Zikula_Controller
{
    public function main()
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
    
        $username = FormUtil::getPassedValue('username', '', 'GETPOST');
        $userid = UserUtil::getIDFromName($username);
        if($userid == false) {
            $username = '';
            $avatar = '';
        } else {
            $avatar = UserUtil::getVar('avatar', $userid);
        }
    
        $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
        $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
        list($avatarsarray, $allavatarscount) = ModUtil::apiFunc('Avatar', 'user', 'getAvatars', array('page' => $page, 'perpage'  => $perpage));
        // avoid some vars in the url of the pager
        unset($_GET['submit']);
        unset($_POST['submit']);
        unset($_REQUEST['submit']);
    
        $render = Zikula_View::getInstance('Avatar', false, null, true);
        $render->assign('avatarpath', ModUtil::getVar('Users', 'avatarpath'));
        $render->assign('username', $username);
        $render->assign('userid', $userid);
        $render->assign('avatar', $avatar);
        $render->assign('avatars', $avatarsarray);
        $render->assign('allavatarscount', $allavatarscount);
        $render->assign('page', $page);
        $render->assign('perpage', $perpage);
        return $render->fetch('Avatar_admin_main.htm');
    }
    
    /**
     * avatar search-user
     *
     *
     * @author       Frank Schummertz, Carsten Volmer
     * @return       output       The search-user admin page.
     */
    public function searchusers()
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
    
        $username = FormUtil::getPassedValue('username', '', 'GETPOST');
        $userid = UserUtil::getIDFromName($username);
        if($userid == false) {
            $username = '';
            $avatar = '';
        } else {
            $avatar = UserUtil::getVar('avatar', $userid);
        }
    
        $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
        $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
        list($avatarsarray, $allavatarscount) = ModUtil::apiFunc('Avatar', 'user', 'getAvatars', array('page' => $page, 'perpage' => $perpage));
    
        // avoid some vars in the url of the pager
        unset($_GET['submit']);
        unset($_POST['submit']);
        unset($_REQUEST['submit']);
    
        $render = Zikula_View::getInstance('Avatar', false, null, true);
        $render->assign('avatarpath', ModUtil::getVar('Users', 'avatarpath'));
        $render->assign('username', $username);
        $render->assign('userid', $userid);
        $render->assign('avatar', $avatar);
        $render->assign('avatars', $avatarsarray);
        $render->assign('allavatarscount', $allavatarscount);
        $render->assign('page', $page);
        $render->assign('perpage', $perpage);
        return $render->fetch('Avatar_admin_searchusers.htm');
    }
    
    
    /**
     * Avatar_admin_setavatar()
     *
     * This is the admin function to set a new avatar
     *
     * @param $args
     * @return
     **/
    public function setavatar()
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
    
        $uavatar = FormUtil::getPassedValue('uavatar', '', 'GETPOST');
        $uid     = FormUtil::getPassedValue('uid', -1, 'GETPOST');
    
        ModUtil::apiFunc('Avatar', 'user', 'setavatar', array('uid' => $uid, 'avatar' => $uavatar));
    
        return System::redirect(ModUtil::url('Avatar', 'admin', 'main'));
    }
    
    /**
     * modify the configuration
     *
     * @author       J�rg Napp, Frank Schummertz
     * @return       output       The modify config page.
     */
    public function modifyconfig()
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        Loader::requireOnce('modules/Avatar/includes/Avatar_admin_modifyconfighandler.class.php');
    
        // Create output object
        $avatarform = FormUtil::newForm('Avatar');
    
        // Return the output that has been generated by this function
        return $avatarform->execute('Avatar_admin_modifyconfig.htm', new Avatar_admin_modifyconfighandler());
    }
    
    /**
     * list all users that use a certain avatar
     *
     *
     */
    public function listusers($args)
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
    
        $uavatar = FormUtil::getPassedValue('avatar', '', 'GET');
        if(empty($uavatar)) {
            LogUtil::registerError($this->__('Error! No avatar choosen.'));
            return System::redirect(ModUtil::url('Avatar', 'admin', 'main'));
        }

        // get all users that use this avatar
        $users = ModUtil::apiFunc('Avatar', 'admin', 'getusersbyavatar', array('avatar' => $uavatar));
    
        $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
        $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
        list($avatarsarray, $allavatarscount) = ModUtil::apiFunc('Avatar', 'user', 'getAvatars', array('page' => $page, 'perpage'  => $perpage));
    
        // avoid some v1ars in the url of the pager
        unset($_GET['submit']);
        unset($_POST['submit']);
        unset($_REQUEST['submit']);
    
        $render = Zikula_View::getInstance('Avatar', false, null, true);
        $render->assign('avatarpath', ModUtil::getVar('Users', 'avatarpath'));
        $render->assign('users', $users);
        $render->assign('uavatar', $uavatar);
        $render->assign('avatars', $avatarsarray);
        $render->assign('allavatarscount', $allavatarscount);
        $render->assign('page', $page);
        $render->assign('perpage', $perpage);
        return $render->fetch('Avatar_admin_listusers.htm');
    }
    
    /**
     * update a list of users with sa certain avatar
     *
     *
     */
    public function updateusers($args)
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
    
        $newavatar   = FormUtil::getPassedValue('avatar', '', 'POST');
        $updateusers = FormUtil::getPassedValue('updateusers', '', 'POST');
    
        if(is_array($updateusers) & count($updateusers) > 0) {
            foreach($updateusers as $userid) {
                ModUtil::apiFunc('Avatar', 'user', 'setavatar', array('uid' => $userid, 'avatar' => $newavatar));
            }
        }
        return System::redirect(ModUtil::url('Avatar', 'admin', 'main'));
    }
    
    /**
     * delete an avatar or, if users use it, forward to listusers
     *
     */
    public function delete()
    {
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
    
        $avatar   = FormUtil::getPassedValue('avatar', '', 'GETPOST');
        if(empty($avatar)) {
            return System::redirect(ModUtil::url('Avatar', 'Admin', 'main'));
        }
    
        // get all users that use this avatar
        $users = ModUtil::apiFunc('Avatar', 'admin', 'getusersbyavatar', array('avatar' => $avatar));
        if(count($users) <> 0) {
            // there are users, at least one, using this avatar, redirect to listusers
            return LogUtil::registerError($this->__('Warning! This avatar is in use and cannot be deleted. If you want to delete it, please change the avatars of the users listed below.'), null, ModUtil::url('Avatar', 'admin', 'listusers', array('avatar' => $avatar)));
        }
    
        // ok to delete
        $submit = FormUtil::getPassedValue('submit', null, 'POST');
        if($submit) {
            // delete avatar
            ModUtil::apiFunc('Avatar', 'admin', 'deleteavatar',
            array('avatar' => $avatar));
            return System::redirect(ModUtil::url('Avatar', 'admin', 'main'));
        } else {
            $render = Zikula_View::getInstance('Avatar', false, null, true);
            $render->assign('avatarpath', ModUtil::getVar('Users', 'avatarpath'));
            $render->assign('avatar', $avatar);
            return $render->fetch('Avatar_admin_delete.htm');
        }
    
        // we should never get here
        return System::redirect(ModUtil::url('Avatar', 'Admin', 'main'));
    
    }

}
