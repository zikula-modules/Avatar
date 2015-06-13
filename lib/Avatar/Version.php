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

class Avatar_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname']    = $this->__('Avatar');
        //!url must be different to displayname
        $meta['url']            = $this->__('avatar');
        $meta['version']        = '2.3.0';
        $meta['description']    = $this->__('Upload of individual Avatars, supports Gravatars');
        $meta['contact']        = 'https://github.com/zikula-ev/Avatar';
        $meta['securityschema'] = array('Avatar::' => '::',
                                        'Avatar::' => 'prefix:userid:');

        // recommended and required modules
        $meta['dependencies'] = array();
        return $meta;
    }
}