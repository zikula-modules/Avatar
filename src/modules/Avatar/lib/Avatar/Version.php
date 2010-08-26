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

class Avatar_Version extends Zikula_Version
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname']    = __('Avatar');
        //!url must be different to displayname
        $meta['url']            = __('avatar');
        $meta['version']        = '2.3.0';
        $meta['description']    = __('Upload of individual Avatars, supports Gravatars');
        $meta['contact']        = 'http://code.zikula.org/avatar/';
        $meta['securityschema'] = array('Avatar::' => '::',
                                        'Avatar::' => 'prefix:userid:');

        // recommended and required modules
        $meta['dependencies'] = array();
        return $meta;
    }
}