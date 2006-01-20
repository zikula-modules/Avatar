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


/**
 * Avatar_userapi_GetAvatars()
 * 
 * returns all possible avatars for the current user. 
 * 
 * @param integer $args['uid'] the user ID (if missing, the current user is assumed)
 * @return array a list of avatar file names
 **/
function Avatar_userapi_GetAvatars($args)
{
    if (isset($args['uid'])) {
        $uid = $args['uid'];
    } else {
        // no user ID is passed, so assume the current user
        $uid = pnUserGetVar('uid');
    }
    
    $avatars = array();
    foreach (glob(pnModGetVar('Avatar', 'avatardir') . '/*') as $file) {
        $file = basename($file);
        if (pnModAPIFunc('Avatar', 
                         'user', 
                         'CheckAvatar', 
                         array('avatar' => $file, 
                               'uid'    => $uid))) {
            $avatars[] = $file;
        }
    }

    asort($avatars);
    
    return $avatars;
}

/**
 * Avatar_userapi_CheckAvatar()
 * 
 * checks if a given Avatar file is valid for the current user.
 * 
 * @param string $args['file'] the base file name of the avatar (e.g. 001.gif)
 * @return boolean the results of the check
 **/
function Avatar_userapi_CheckAvatar($args)
{
    // the avatar file
    if (!isset($args['avatar'])) {
        pnSessionSetVar('errormsg', _MODSARGSERR);
        return false;
    }
    $avatar = $args['avatar'];

    // the user ID
    if (isset($args['uid'])) {
        $uid = $args['uid'];
    } else {
        // no user ID is passed, so assume the current user
        $uid = pnUserGetVar('uid');
    }

    if (!isset($args['checkfile'])) {
        // default value
        $args['checkfile'] = true;
    }
    
    // check if the file exists
    $avatar_full = pnModGetVar('Avatar', 'avatardir') . '/' . pnVarPrepForOS($avatar);
    if ($args['checkfile'] && !file_exists($avatar_full)) {
        return false;
    }

    if ($avatar == '.' || $avatar == '..' || $avatar == 'index.html') {
        return false;
    } 

    if (!strpos($avatar, '_')) {
        // normal avatar, so it's OK
        return true;
    }


    $prefix = (substr($avatar, 0, strpos($avatar, '_')));

    // personal avatar
    // TODO: Better Check!
    if ($prefix == 'pers') {
        return ((int)substr_replace(substr($avatar, 5), '', -4) == $uid);
    } 

    $user_groups = pnModAPIFunc('Avatar', 
                                'user', 
                                'GetUserGroups');

    $prefix_group_1 = pnModGetVar('Avatar', 'prefix_group_1');
    $prefix_group_2 = pnModGetVar('Avatar', 'prefix_group_2');
    $prefix_group_3 = pnModGetVar('Avatar', 'prefix_group_3');
    $prefix_prefix_1 = pnModGetVar('Avatar', 'prefix_prefix_1');
    $prefix_prefix_2 = pnModGetVar('Avatar', 'prefix_prefix_2');
    $prefix_prefix_3 = pnModGetVar('Avatar', 'prefix_prefix_3');

    // check nanu?
    if ($prefix_prefix_1 == '*') {
        $vr1 = explode (';', $prefix_group_1);
        if (count(array_intersect($user_groups, $vr1)) > 0) {
            return true;
        } 
    } 
    if ($prefix_prefix_2 == '*') {
        $vr1 = explode (';', $prefix_group_2);
        if (count(array_intersect($user_groups, $vr1)) > 0) {
            return true;
        } 
    } 
    if ($prefix_prefix_3 == '*') {
        $vr1 = explode (';', $prefix_group_3);
        if (count(array_intersect($user_groups, $vr1)) > 0) {
            return true;
        } 
    } 
    
    
    $visualizza = false;
    $regola = false;

    if ($prefix == $prefix_prefix_1 and !$visualizza) {
        $regola = true;
        $vr1 = explode (';', $prefix_group_1);
        if (count(array_intersect($user_groups, $vr1)) > 0) {
            $visualizza = true;
        } 
    } 
    if ($prefix == $prefix_prefix_2 and !$visualizza) {
        $regola = true;
        $vr1 = explode (';', $prefix_group_2);
        if (count(array_intersect($user_groups, $vr1)) > 0) {
            $visualizza = true;
        } 
    } 
    if ($prefix == $prefix_prefix_3 and !$visualizza) {
        $regola = true;
        $vr1 = explode (';', prefix_group_3);
        if (count(array_intersect($user_groups, $vr1)) > 0) {
            $visualizza = true;
        } 
    } 
    
    if (!$visualizza and !$regola) {
        $visualizza = true;
    } 
    return $visualizza;
} 

/**
 * Avatar_userapi_GetUserGroups()
 * 
 * Returns a list of all groups the user ia a member of
 * 
 * @return array list of group IDs
 **/
function Avatar_userapi_GetUserGroups()
{
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $table = &$pntable['group_membership'];
    $column = &$pntable['group_membership_column'];

    $id = pnUserGetVar('uid');

    $sql = "SELECT $column[gid] FROM $table WHERE $column[uid]=$id";
    $result =& $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        return false;
    }
    $groups = array();
    for (; !$result->EOF; $result->MoveNext()) {
        list($gid) = $result->fields;
        $groups[] = $gid;
    }
    $result->Close();
    
    return $groups;    
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
function Avatar_userapi_SetAvatar($args)
{
    if (!isset($args['uid']) || !isset($args['avatar'])) {
        pnSessionSetVar('errormsg', _MODSARGSERR);
        return false;
    }
    
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
    $userscolumn = &$pntable['users_column'];

    $uid = pnVarPrepForStore($args['uid']);
    $avatar = pnVarPrepForStore($args['avatar']);
    
    $sql = "UPDATE $pntable[users] 
               SET $userscolumn[user_avatar] ='$avatar' 
             WHERE $userscolumn[uid]='$uid'";

    $result =& $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _ERRORUPDATING);
        return false;
    } 
    return true;
}
?>