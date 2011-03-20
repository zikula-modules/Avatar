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

class Avatar_Form_Handler_Admin_ModifyConfig extends Zikula_Form_Handler
{
    function initialize(Zikula_Form_View $view)
    {
        $view->caching = false;
        $view->add_core_data();
        $view->assign('avatarpath',          ModUtil::getVar('Users', 'avatarpath'));
        $view->assign('avatarpath_writable', is_writable(ModUtil::getVar('Users', 'avatarpath')));
        $view->assign('pnphpbb_installed',   ModUtil::available('pnphpbb'));
        $view->assign('forumdir_writable',   is_writable(ModUtil::getVar('Avatar', 'forumdir')));

        return true;
    }


    function handleCommand(Zikula_Form_View $view, &$args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        if ($args['commandName'] == 'submit') {
            if (!$view->IsValid()) {
                return false;
            }

            $data = $view->getValues();

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
