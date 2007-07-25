<?php
// $Id: mh_admin_modifyconfighandler.class.php 166 2007-02-18 19:18:21Z landseer $
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Frank Schummertz
// Purpose of file:  formicula configuration pnForm handler class
// ----------------------------------------------------------------------

class Avatar_admin_modifyconfighandler
{
    function initialize(&$pnRender)
    {
        $pnRender->caching = false;
        $pnRender->add_core_data();

        // get all groups
        $orig_groups = pnModAPIFunc('Groups', 'user', 'getall');
        foreach($orig_groups as $orig_group) {
            $groups[$orig_group['gid']] = $orig_group['name']; 
        }
        $groups[0] = _AVATAR_ADM_GROUPS_ALL;
        ksort($groups);
    
        $pnRender->assign('groups',             $groups);
        $pnRender->assign('warn_avatardir',     !is_writable(pnModGetVar('Avatar', 'avatardir')));
        $pnRender->assign('pnphpbb_installed',   pnModAvailable('pnphpbb'));
        $pnRender->assign('warn_forumdir',      !is_writable(pnModGetVar('Avatar', 'forumdir')));

        return true;
    }


    function handleCommand(&$pnRender, &$args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('formicula::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError('index.php');
        }  
        if ($args['commandName'] == 'submit') {
            if (!$pnRender->pnFormIsValid()) {
                return false;
            }
            $ok = true;
            $data = $pnRender->pnFormGetValues();
            if(empty($data['avatardir']) || !is_writable($data['avatardir'])) {
                $ifield = & $pnRender->pnFormGetPluginById('avatardir');
                $ifield->setError(DataUtil::formatForDisplay(_AVATAR_WARN_AVARTARDIR));
                $ok = false;
            }
            if(pnModAvailable('pnphpbb') && (empty($data['forumdir']) || !is_writable($data['forumdir']))) {
                $ifield = & $pnRender->pnFormGetPluginById('forumdir');
                $ifield->setError(DataUtil::formatForDisplay(_AVATAR_WARN_FORUMDIR));
                $ok  = false;
            }
            
            $data['maxsize']   = (int)$data['maxsize'];
            if(empty($data['maxsize']) || $data['maxsize'] < 0) {
                $data['maxsize'] = 12000;
            }
            
            $data['maxheight'] = (int)$data['maxheight']; 
            if(empty($data['maxheight']) || $data['maxsize'] < 0) {
                $data['maxheight'] = 80;
            }
            
            $data['maxwidth']  = (int)$data['maxwidth'];  
            if(empty($data['maxwidth']) || $data['maxwidth'] < 0) {
                $data['maxwidth'] = 80;
            }
             
            if($ok == false) {
                return false;
            }
            
            pnModSetVar('Avatar', 'avatardir',          $data['avatardir']);
            pnModSetVar('Avatar', 'forumdir',           $data['forumdir']);
            pnModSetVar('Avatar', 'allow_resize',       ($allow_resize == 1));
            pnModSetVar('Avatar', 'maxsize',            $data['maxsize']);
            pnModSetVar('Avatar', 'maxheight',          $data['maxheight']);
            pnModSetVar('Avatar', 'maxwidth',           $data['maxwidth']);
            pnModSetVar('Avatar', 'allowed_extensions', $data['allowed_extensions']);
        }
        return true;
    }

}

?>