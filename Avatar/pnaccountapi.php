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
 * Return an array of items to show in the your account panel
 *
 * @return   array   array of items, or false on failure
 */
function Avatar_accountapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('Avatar');

    $items = array();
    if (SecurityUtil::checkPermission('Avatar::', '::', ACCESS_OVERVIEW)) {
        pnModLangLoad('Avatar', 'user');
        // Create an array of links to return
        $items[] = array('url'     => pnModURL('Avatar', 'user', 'main'),
                         'module'  => 'Avatar',
                         'set'     => '',
                         'title'   => __('Avatar Management', $dom),
                         'icon'    => 'admin.gif');
    }
    // Return the items
    return $items;
}
