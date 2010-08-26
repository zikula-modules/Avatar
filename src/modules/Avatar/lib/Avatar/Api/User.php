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

class Avatar_Api_User extends Zikula_Api {

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
    public function getAvatars($args)
    {
        $uid         = (isset($args['uid'])) ? $args['uid'] : UserUtil::getVar('uid');
        $page        = (isset($args['page'])) ? $args['page']: -1;
        $perpage     = (isset($args['perpage'])) ? $args['perpage'] : -1;
        $realimages  = (isset($args['realimages'])) ? true : false;
        $avatarpath  = ModUtil::getVar('Users', 'avatarpath');
    
        $allavatars = FileUtil::getFiles($avatarpath, true, true, null, false);
        if ($realimages == true) {
            $allavatars = array_diff($allavatars, array('blank.gif', 'gravatar.gif'));
        }
        $avatars = array();
        foreach ($allavatars as $avatar) {
            // imagename is like pers_XXXX.gif (with XXXX = user id)
            if (ModUtil::apiFunc('Avatar', 'user', 'checkAvatar', array('avatar' => $avatar, 'uid' => $uid)) == true) {
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
            $pagedavatars = array();
            for ($idx = $start; $idx < $stop; $idx++) {
                $pagedavatars[] = $avatars[$idx];
            }
            return array($pagedavatars, $allcount);
        }
    
        return array($avatars, $allcount);
    }
    
    
    /**
     * Avatar_userapi_setavatar()
     *
     * sets the user avatar.
     *
     * @param integer $args['uid'] the user id
     * @param string $args['avatar'] the user avatar
     * @return boolean success
     **/
    public function setavatar($args)
    {
        if (!isset($args['uid']) || !isset($args['avatar'])) {
            return LogUtil::registerArgsError();
        }
    
        $avatar_ok = ModUtil::apiFunc('Avatar', 'user', 'checkAvatar', $args);
    
        if($avatar_ok == true) {
            $uname = UserUtil::getVar('uname', $args['uid']);
            if ($args['avatar'] == 'blank.gif') {
                $args['avatar'] = '';
                $status = $this->__f('Done! The avatar of the user \'%s\' has been disabled.', $uname);
            } else if ($args['avatar'] == 'gravatar.gif') {
                $status = $this->__f('Done! The avatar of the user \'%s\' has been set to his gravatar.', $uname);
            } else {
                $status = $this->__f('Done! The avatar of the user \'%1$s\' has been changed to \'%2$s\'', array($uname, $args['avatar']));
            }
            UserUtil::setVar('avatar', $args['avatar'], $args['uid']);
            LogUtil::registerStatus($status);
            return true;
        }
    
        return LogUtil::registerError($this->__f('Error! The user is not authorized to use this avatar. To change this, update the permission for %s.', $args['avatar']));
    }
    
    /**
     * check if a user is allowed to use a avatar
     *
     *@params string   $args['avatar'] the avatar filename
     *@params int      $args['uid']    the userid of the current user
     *
     */
    public function checkAvatar($args)
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

}
