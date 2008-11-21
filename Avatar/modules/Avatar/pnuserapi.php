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
 * @param integer $args['startnum'] int the number where to start (for paging)
 * @param integer $args['perpage'] int items per page
 * @return array a list of avatar file names
 **/
function Avatar_userapi_getAvatars($args)
{
    $uid      = (isset($args['uid'])) ? $args['uid'] : pnUserGetVar('uid');
    $page     = (isset($args['page'])) ? $args['page']: -1;
    $perpage  = (isset($args['perpage'])) ? $args['perpage'] : -1;
    $avatardir = pnModGetVar('Avatar', 'avatardir');
   
    Loader::loadClass('FileUtil');
    $allavatars = FileUtil::getFiles($avatardir, true, true, null, false);
    $avatars = array();
    foreach ($allavatars as $avatar) {
        // imagename is like pers_XXXX.gif (with XXXX = user id) 
        if (pnModAPIFunc('Avatar', 'user', 'checkAvatar',
                         array('avatar' => $avatar,
                               'uid'    => $uid)) == true) {
            $avatars[] = $avatar;
        }
    }
    sort($avatars);
    $allcount = count($avatars);
    // paging
    if ($page <> -1 && $perpage <> -1) {
        $start = ($page-1) * $perpage;
        $stop = $start + $perpage;
        if($stop > $allcount) {
            $stop = $allcount;
        }
        for ($idx = $start; $idx < $stop; $idx++) {
            $pagedavatars[] = $avatars[$idx];
        }
        return array($pagedavatars, $allcount);
    }
    
    return array($avatars, $allcount);
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
 *@params string   $args['avatar'] the avatar filename
 *@params int      $args['uid']    the userid of the current user
 *
 */
function Avatar_userapi_checkAvatar($args)
{
    // check if the avatar is allowed for the user
    $avatar_ok = false;
    $parts = explode('_', $args['avatar']);
    if(is_array($parts)) {
        // with pers_XXX.gif, [0] is now pers, [1] is now XXXX.gif
        if(!isset($parts[1])) {
            // normal avatar, so it's OK
            $avatar_ok = true;
        } else {
            $userparts = explode('.', $parts[1]);
            // [0] is now the user id, [1] is the file extension
            // check for permission
            $avatar_ok = (SecurityUtil::checkPermission('Avatar::', $parts[0] . ':' . $userparts[0] . ':', ACCESS_READ) || $userparts[0] == $args['uid']);
        }
    }
    return $avatar_ok;
}
