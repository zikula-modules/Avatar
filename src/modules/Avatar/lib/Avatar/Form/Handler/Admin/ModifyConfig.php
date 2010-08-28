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

class Avatar_Form_Handler_Admin_ModifyConfig  extends Form_Handler
{
    function initialize(&$render)
    {
        $render->caching = false;
        $render->add_core_data();
        $render->assign('avatarpath',          ModUtil::getVar('Users', 'avatarpath'));
        $render->assign('avatarpath_writable', is_writable(ModUtil::getVar('Users', 'avatarpath')));
        $render->assign('pnphpbb_installed',   ModUtil::available('pnphpbb'));
        $render->assign('forumdir_writable',   is_writable(ModUtil::getVar('Avatar', 'forumdir')));

        return true;
    }


    function handleCommand(&$render, &$args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        if ($args['commandName'] == 'submit') {
            if (!$render->IsValid()) {
                return false;
            }

            $data = $render->getValues();

            if(array_key_exists('forumdir', $data)) {
                ModUtil::setVar('Avatar', 'forumdir',       $data['forumdir']);
            }
            ModUtil::setVar('Users',  'avatarpath',         $data['avatarpath']);
            ModUtil::setVar('Avatar', 'allow_resize',       $data['allow_resize']);
            ModUtil::setVar('Avatar', 'maxsize',            $data['maxsize']);
            ModUtil::setVar('Avatar', 'maxheight',          $data['maxheight']);
            ModUtil::setVar('Avatar', 'maxwidth',           $data['maxwidth']);
            ModUtil::setVar('Avatar', 'allowed_extensions', $data['allowed_extensions']);
            ModUtil::setVar('Avatar', 'allow_multiple',     $data['allow_multiple']);
        }
        return true;
    }

}
