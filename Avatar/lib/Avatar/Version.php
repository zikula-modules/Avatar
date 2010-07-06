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
		$meta['name']           = 'Avatar';
		$meta['displayname']    = $this->__('Avatar');
		$meta['url']            = $this->__('avatar');
		$meta['version']        = '3.0';
		$meta['description']    = $this->__('Upload of individual Avatars');
		$meta['credits']        = 'docs/changelog.txt';
		$meta['help']           = 'docs/readme.txt';
		$meta['changelog']      = 'docs/changelog.txt';
		$meta['license']        = 'docs/license.txt';
		$meta['official']       = 0;
		$meta['author']         = 'Joerg Napp, Frank Schummertz, Carsten Volmer';
		$meta['contact']        = 'http://code.zikula.org/avatar/';
		$meta['securityschema'] = array('Avatar::' => '::',
		                                      'Avatar::' => 'prefix:userid:');
		// recommended and required modules
		$meta['dependencies'] = array();
		return $meta;
    }

}
