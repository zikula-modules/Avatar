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
function Avatar_admin_main()
{
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('Avatar');

    $profileModule = pnConfigGetVar('profilemodule', '');
    if (empty($profileModule) || !pnModAvailable($profileModule)) {
        LogUtil::registerError(__('Error! This module can only be used if the Profile module is installed and if it is set to the default profile module.', $dom));
        return pnRedirect(pnModURL('Admin', 'admin', 'adminpanel'));
    }

    pnModDBInfoLoad('Profile', 'Profile');
    $dudfields = DBUtil::selectObjectArray('user_property');
    $propcheck = false;
    foreach($dudfields as $dudfield) {
        if ($dudfield['prop_attribute_name'] == 'avatar') {
            $propcheck = true;
        }
    }

    if ($propcheck == false || empty($dudfields))  {
        return LogUtil::registerError(__('Error! The user attribute called \'avatar\' doesn\'t exist. Please install a Profile module if you want to use this module.', $dom));
    }

    $username = FormUtil::getPassedValue('username', '', 'GETPOST');
    $userid = pnUserGetIDFromName($username);
    if($userid == false) {
        $username = '';
        $avatar = '';
    } else {
        $avatar = pnUserGetVar('avatar', $userid);
    }

    $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
    $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
    list($avatarsarray, $allavatarscount) = pnModAPIFunc('Avatar', 'user', 'getAvatars', array('page' => $page, 'perpage'  => $perpage));
    // avoid some vars in the url of the pager
    unset($_GET['submit']);
    unset($_POST['submit']);
    unset($_REQUEST['submit']);

    $pnRender = pnRender::getInstance('Avatar', false, null, true);
    $pnRender->assign('avatarpath', pnModGetVar('Users', 'avatarpath'));
    $pnRender->assign('username', $username);
    $pnRender->assign('userid', $userid);
    $pnRender->assign('avatar', $avatar);
    $pnRender->assign('avatars', $avatarsarray);
    $pnRender->assign('allavatarscount', $allavatarscount);
    $pnRender->assign('page', $page);
    $pnRender->assign('perpage', $perpage);
    return $pnRender->fetch('Avatar_admin_main.htm');
}

/**
 * avatar search-user
 *
 *
 * @author       Frank Schummertz, Carsten Volmer
 * @return       output       The search-user admin page.
 */
function Avatar_admin_searchusers()
{
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $username = FormUtil::getPassedValue('username', '', 'GETPOST');
    $userid = pnUserGetIDFromName($username);
    if($userid == false) {
        $username = '';
        $avatar = '';
    } else {
        $avatar = pnUserGetVar('avatar', $userid);
    }

    $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
    $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
    list($avatarsarray, $allavatarscount) = pnModAPIFunc('Avatar', 'user', 'getAvatars', array('page' => $page, 'perpage' => $perpage));

    // avoid some vars in the url of the pager
    unset($_GET['submit']);
    unset($_POST['submit']);
    unset($_REQUEST['submit']);

    $pnRender = pnRender::getInstance('Avatar', false, null, true);
    $pnRender->assign('avatarpath', pnModGetVar('Users', 'avatarpath'));
    $pnRender->assign('username', $username);
    $pnRender->assign('userid', $userid);
    $pnRender->assign('avatar', $avatar);
    $pnRender->assign('avatars', $avatarsarray);
    $pnRender->assign('allavatarscount', $allavatarscount);
    $pnRender->assign('page', $page);
    $pnRender->assign('perpage', $perpage);
    return $pnRender->fetch('Avatar_admin_searchusers.htm');
}


/**
 * Avatar_admin_setavatar()
 *
 * This is the admin function to set a new avatar
 *
 * @param $args
 * @return
 **/
function Avatar_admin_setavatar()
{
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $uavatar = FormUtil::getPassedValue('uavatar', '', 'GETPOST');
    $uid     = FormUtil::getPassedValue('uid', -1, 'GETPOST');

    pnModAPIFunc('Avatar', 'user', 'setavatar', array('uid' => $uid, 'avatar' => $uavatar));

    return pnRedirect(pnModURL('Avatar', 'admin', 'main'));
}

/**
 * modify the configuration
 *
 * @author       J�rg Napp, Frank Schummertz
 * @return       output       The modify config page.
 */
function Avatar_admin_modifyconfig()
{
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $profileModule = pnConfigGetVar('profilemodule', '');
    if (empty($profileModule) || !pnModAvailable($profileModule)) {
        LogUtil::registerError(__('Error! This module can only be used if the Profile module is installed and if it is set to the default profile module.', $dom));
        return pnRedirect(pnModURL('Admin', 'admin', 'adminpanel'));
    }

    Loader::requireOnce('modules/Avatar/pnincludes/Avatar_admin_modifyconfighandler.class.php');

    // Create output object
    $pnf = FormUtil::newpnForm('Avatar');

    // Return the output that has been generated by this function
    return $pnf->pnFormExecute('Avatar_admin_modifyconfig.htm', new Avatar_admin_modifyconfighandler());
}

/**
 * list all users that use a certain avatar
 *
 *
 */
function Avatar_admin_listusers($args)
{
    $dom = ZLanguage::getModuleDomain('Avatar');

    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $uavatar = FormUtil::getPassedValue('avatar', '', 'GET');
    if(empty($uavatar)) {
        LogUtil::registerError(__('Error! No avatar choosen.', $dom));
        return pnRedirect(pnModURL('Avatar', 'admin', 'main'));
    }

    if (!pnModAvailable('Profile')) {
        LogUtil::registerError(__('Error! The Profile module must be installed for this function.', $dom));
        return pnRedirect(pnModURL('Avatar', 'admin', 'main'));
    }

    // get all users that use this avatar
    $users = pnModAPIFunc('Avatar', 'admin', 'getusersbyavatar', array('avatar' => $uavatar));

    $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
    $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
    list($avatarsarray, $allavatarscount) = pnModAPIFunc('Avatar', 'user', 'getAvatars', array('page' => $page, 'perpage'  => $perpage));

    // avoid some v1ars in the url of the pager
    unset($_GET['submit']);
    unset($_POST['submit']);
    unset($_REQUEST['submit']);

    $pnRender = pnRender::getInstance('Avatar', false, null, true);
    $pnRender->assign('avatarpath', pnModGetVar('Users', 'avatarpath'));
    $pnRender->assign('users', $users);
    $pnRender->assign('uavatar', $uavatar);
    $pnRender->assign('avatars', $avatarsarray);
    $pnRender->assign('allavatarscount', $allavatarscount);
    $pnRender->assign('page', $page);
    $pnRender->assign('perpage', $perpage);
    return $pnRender->fetch('Avatar_admin_listusers.htm');
}

/**
 * update a list of users with sa certain avatar
 *
 *
 */
function Avatar_admin_updateusers($args)
{
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $newavatar   = FormUtil::getPassedValue('avatar', '', 'POST');
    $updateusers = FormUtil::getPassedValue('updateusers', '', 'POST');

    if(is_array($updateusers) & count($updateusers) > 0) {
        foreach($updateusers as $userid) {
            pnModAPIFunc('Avatar', 'user', 'setavatar', array('uid' => $userid, 'avatar' => $newavatar));
        }
    }
    return pnRedirect(pnModURL('Avatar', 'admin', 'main'));
}

/**
 * delete an avatar or, if users use it, forward to listusers
 *
 */
function Avatar_admin_delete()
{
    $dom = ZLanguage::getModuleDomain('Avatar');

    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $avatar   = FormUtil::getPassedValue('avatar', '', 'GETPOST');
    if(empty($avatar)) {
        return pnRedirect(pnModURL('Avatar', 'Admin', 'main'));
    }

    // get all users that use this avatar
    $users = pnModAPIFunc('Avatar', 'admin', 'getusersbyavatar', array('avatar' => $avatar));
    if(count($users) <> 0) {
        // there are users, at least one, using this avatar, redirect to listusers
        return LogUtil::registerError(__('Warning! This avatar is in use and cannot be deleted. If you want to delete it, please change the avatars of the users listed below.', $dom), null, pnModURL('Avatar', 'admin', 'listusers', array('avatar' => $avatar)));
    }

    // ok to delete
    $submit = FormUtil::getPassedValue('submit', null, 'POST');
    if($submit) {
        // delete avatar
        pnModAPIFunc('Avatar', 'admin', 'deleteavatar',
        array('avatar' => $avatar));
        return pnRedirect(pnModURL('Avatar', 'admin', 'main'));
    } else {
        $pnRender = pnRender::getInstance('Avatar', false, null, true);
        $pnRender->assign('avatarpath', pnModGetVar('Users', 'avatarpath'));
        $pnRender->assign('avatar', $avatar);
        return $pnRender->fetch('Avatar_admin_delete.htm');
    }

    // we should never get here
    return pnRedirect(pnModURL('Avatar', 'Admin', 'main'));

}
