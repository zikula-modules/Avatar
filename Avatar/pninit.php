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
 * Avatar_init()
 *
 * Initialize the Module
 *
 * @return boolean success or not
 */
function Avatar_init()
{
    pnModSetVar('Avatar', 'avatardir',          'images/avatar');
    pnModSetVar('Avatar', 'forumdir',           '');
    pnModSetVar('Avatar', 'allow_resize',       false);
    pnModSetVar('Avatar', 'maxsize',            '12000');
    pnModSetVar('Avatar', 'maxheight',          '80');
    pnModSetVar('Avatar', 'maxwidth',           '80');
    pnModSetVar('Avatar', 'allowed_extensions', 'gif;jpg;jpeg;png');
    pnModSetVar('Avatar', 'allow_multiple',     true);
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
            pnModDelVar('Avatar', 'prefix_group_1');
            pnModDelVar('Avatar', 'prefix_group_2');
            pnModDelVar('Avatar', 'prefix_group_3');
            pnModDelVar('Avatar', 'prefix_prefix_1');
            pnModDelVar('Avatar', 'prefix_prefix_2');
            pnModDelVar('Avatar', 'prefix_prefix_3');

            pnModSetVar('Avatar', 'allow_multiple', true);

            // for PHP5: if jpg is allowed, also allow jpeg if needed
            // this is needed because image_type_to_extension() always returns 'jpeg' in case
            // of jpg images in PHP5
            $exts = explode(';', pnModGetVar('Avatar', 'allowed_extensions'));
            if (is_array($exts) && in_array('jpg', $exts) && !in_array('jpeg', $exts)) {
                $exts[] = 'jpeg';
                pnModSetVar('Avatar', 'allowed_extensions', implode(';', $exts));
            }
        case '2.0':
        case '2.1':
            pnModSetVar('Users', 'avatarpath', pnModGetVar('Avatar', 'avatardir'));
            pnModDelVar('Avatar', 'avatardir');
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
    pnModDelVar('Avatar');
    return true;
}
