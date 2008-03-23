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
 * Avatar_userapi_GetAvatars()
 * 
 * returns all possible avatars for the current user. 
 * 
 * @param integer $args['uid'] the user ID (if missing, the current user is assumed)
 * @return array a list of avatar file names
 **/
function Avatar_userapi_getAvatars($args)
{
    $uid = (isset($args['uid'])) ? $args['uid'] : pnUserGetVar('uid');
    $avatardir = pnModGetVar('Avatar', 'avatardir');
   
    Loader::loadClass('FileUtil');
    $allavatars = FileUtil::getFiles($avatardir, true, true, null, false);
    $avatars = array();
    foreach ($allavatars as $avatar) {
        // imagename is like pers_XXXX.gif (with XXXX = user id) 
        $parts = explode('_', $avatar);
        if(is_array($parts)) {
            // with pers_XXX.gif, [0] is now pers, [1] is now XXXX.gif
            if(!isset($parts[1])) {
                // normal avatar, so it's OK
                $avatars[] = $avatar;
            } else {
                $userparts = explode('.', $parts[1]);
                // [0] is now the user id, [1] is the file extension
                // check for permission
                if(SecurityUtil::checkPermission('Avatar::', $parts[0] . ':' . $userparts[0] . ':', ACCESS_READ) || $userparts[0] == $uid) {
                    $avatars[] = $avatar;
                }
            }
        }
    }
    asort($avatars);
    
    return $avatars;
}


/**
 * Avatar_userapi_SetAvatar()
 * 
 * sets the user avatar.
 * 
 * @param integer $args['uid'] the user id
 * @param string $args['avatar'] the user avatar
 * @return boolean success
 **/
function Avatar_userapi_setAvatar($args)
{
    if (!isset($args['uid']) || !isset($args['avatar'])) {
        return LogUtil::registerError(_MODSARGSERR . 'in Avatar_user_setavatar');
    }

    $avatar_ok = pnModAPIFunc('Avatar', 'user', 'checkAvatar', $args);

    if($avatar_ok == true) {
        pnUserSetVar('user_avatar', $args['avatar'], $args['uid']);  
         
        // trick: show new avatar in status message if img-tag is free
        $allowedhtml = pnConfigGetVar('AllowableHTML');
        $uname = pnUserGetVar('uname', $args['uid']);
        if($allowedhtml['img'] == 2) {
            $status = pnML('_AVATAR_CHANGEDTO', array('username' => $uname, 'avatar' => '')) . '<img src="' . pnModGetVar('Avatar', 'avatardir') .  '/'. $args['avatar'] . '" alt="Avatar" />';
        } else {
            $status = pnML('_AVATAR_CHANGEDTO', array('username' => $uname, 'avatar' => $args['avatar']));
        }
        LogUtil::registerStatus($status); 
        return true;
    }
    
    return LogUtil::registerError(pnML('_AVATAR_ERR_USERNOTAUTHORIZED', array('avatar' => $args['avatar'])));
}

/**
 * check if a user is allowed to use a avatar
 *
 */
function Avatar_userapi_checkAvatar($args)
{
    // check if the avatar is allowed for the user
    $avatar_ok = false;
    $parts = explode($args['avatar'], '_');
    if(is_array($parts)) {
        if(!isset($parts[1])) {
            // normal avatar, so it's OK
            $avatar_ok = true;
        } else {
            // check for permission
            if(SecurityUtil::checkPermission('Avatar::', $parts[0] . ':' . $parts[1] . ':', ACCESS_READ, $args['uid']) || $parts[1] == $args['uid']) {
                $avatar_ok = true;
            }
        }
    }
    return $avatar_ok;
}
