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
 * Avatar_init()
 *
 * Initialize the Module
 *
 * @return boolean success or not
 */
function Avatar_init()
{
    ModUtil::setVar('Avatar', 'forumdir',           '');
    ModUtil::setVar('Avatar', 'allow_resize',       false);
    ModUtil::setVar('Avatar', 'maxsize',            '12000');
    ModUtil::setVar('Avatar', 'maxheight',          '80');
    ModUtil::setVar('Avatar', 'maxwidth',           '80');
    ModUtil::setVar('Avatar', 'allowed_extensions', 'gif;jpg;jpeg;png');
    ModUtil::setVar('Avatar', 'allow_multiple',     true);
    return true;
}

/**
 * Avatar_upgrade()
 *
 * Upgrade the Module
 *
 * @param integer $oldversion old version of the module
 * @return boolean success or not
 **/
function Avatar_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch($oldversion) {
        case '1.1':
            ModUtil::delVar('Avatar', 'prefix_group_1');
            ModUtil::delVar('Avatar', 'prefix_group_2');
            ModUtil::delVar('Avatar', 'prefix_group_3');
            ModUtil::delVar('Avatar', 'prefix_prefix_1');
            ModUtil::delVar('Avatar', 'prefix_prefix_2');
            ModUtil::delVar('Avatar', 'prefix_prefix_3');

            ModUtil::setVar('Avatar', 'allow_multiple', true);

            // for PHP5: if jpg is allowed, also allow jpeg if needed
            // this is needed because image_type_to_extension() always returns 'jpeg' in case
            // of jpg images in PHP5
            $exts = explode(';', ModUtil::getVar('Avatar', 'allowed_extensions'));
            if (is_array($exts) && in_array('jpg', $exts) && !in_array('jpeg', $exts)) {
                $exts[] = 'jpeg';
                ModUtil::setVar('Avatar', 'allowed_extensions', implode(';', $exts));
            }
        case '2.0':
        case '2.1':
            ModUtil::setVar('Users', 'avatarpath', ModUtil::getVar('Avatar', 'avatardir'));
            ModUtil::delVar('Avatar', 'avatardir');
        case '2.2':
    }
    return true;
}

/**
 * Avatar_delete()
 *
 * Delete the module
 *
 * @return boolean success or not
 */
function Avatar_delete()
{
    ModUtil::delVar('Avatar');
    return true;
}
