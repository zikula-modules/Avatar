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

class Avatar_admin_modifyconfighandler
{
    function initialize(&$pnRender)
    {
        $pnRender->caching = false;
        $pnRender->add_core_data();
        $pnRender->assign('avatarpath',          pnModGetVar('Users', 'avatarpath'));
        $pnRender->assign('avatarpath_writable', is_writable(pnModGetVar('Users', 'avatarpath')));
        $pnRender->assign('pnphpbb_installed',   pnModAvailable('pnphpbb'));
        $pnRender->assign('forumdir_writable',   is_writable(pnModGetVar('Avatar', 'forumdir')));

        return true;
    }


    function handleCommand(&$pnRender, &$args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        if ($args['commandName'] == 'submit') {
            if (!$pnRender->pnFormIsValid()) {
                return false;
            }

            $data = $pnRender->pnFormGetValues();

            if(array_key_exists('forumdir', $data)) {
                pnModSetVar('Avatar', 'forumdir',       $data['forumdir']);
            }
            pnModSetVar('Avatar', 'allow_resize',       $data['allow_resize']);
            pnModSetVar('Avatar', 'maxsize',            $data['maxsize']);
            pnModSetVar('Avatar', 'maxheight',          $data['maxheight']);
            pnModSetVar('Avatar', 'maxwidth',           $data['maxwidth']);
            pnModSetVar('Avatar', 'allowed_extensions', $data['allowed_extensions']);
            pnModSetVar('Avatar', 'allow_multiple',     $data['allow_multiple']);
        }
        return true;
    }

}
