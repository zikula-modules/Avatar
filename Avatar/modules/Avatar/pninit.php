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
    pnModSetVar('Avatar', 'maxsize',            '5000');
    pnModSetVar('Avatar', 'maxheight',          '50');
    pnModSetVar('Avatar', 'maxwidth',           '50');
    pnModSetVar('Avatar', 'allowed_extensions', 'gif;jpg');
    pnModSetVar('Avatar', 'prefix_group_1',     '');
    pnModSetVar('Avatar', 'prefix_group_2',     '');
    pnModSetVar('Avatar', 'prefix_group_3',     '');
    pnModSetVar('Avatar', 'prefix_prefix_1',    '');
    pnModSetVar('Avatar', 'prefix_prefix_2',    '');
    pnModSetVar('Avatar', 'prefix_prefix_3',    '');
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
    pnModDelVar('Avatar', 'avatardir');
    pnModDelVar('Avatar', 'forumdir');
    pnModDelVar('Avatar', 'allow_resize');
    pnModDelVar('Avatar', 'maxsize');
    pnModDelVar('Avatar', 'maxheight');
    pnModDelVar('Avatar', 'maxwidth');
    pnModDelVar('Avatar', 'allowed_extensions');
    pnModDelVar('Avatar', 'prefix_group_1');
    pnModDelVar('Avatar', 'prefix_group_2');
    pnModDelVar('Avatar', 'prefix_group_3');
    pnModDelVar('Avatar', 'prefix_prefix_1');
    pnModDelVar('Avatar', 'prefix_prefix_2');
    pnModDelVar('Avatar', 'prefix_prefix_3');
    return true;
} 

?>