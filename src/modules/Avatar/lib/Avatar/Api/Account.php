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
 
class Avatar_Api_Account extends Zikula_Api { 
 
    public function getAll($args)
    {
        $items = array();
        if (SecurityUtil::checkPermission('Avatar::', '::', ACCESS_OVERVIEW)) {
            // Create an array of links to return
            $items[] = array('url'     => ModUtil::url('Avatar', 'user', 'main'),
                             'module'  => 'Avatar',
                             'set'     => '',
                             'title'   => $this->__('Avatar Management'),
                             'icon'    => 'admin.gif');
        }
        // Return the items
        return $items;
    }

}