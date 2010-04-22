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

$dom = ZLanguage::getModuleDomain('Avatar');
$modversion['name']           = 'Avatar';
$modversion['displayname']    = __('Avatar', $dom);
$modversion['url']            = __('avatar', $dom);
$modversion['version']        = '2.2';
$modversion['description']    = __('Upload of individual Avatars', $dom);
$modversion['credits']        = 'pndocs/changelog.txt';
$modversion['help']           = 'pndocs/readme.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 0;
$modversion['author']         = 'Joerg Napp, Frank Schummertz, Carsten Volmer';
$modversion['contact']        = 'http://code.zikula.org/avatar/';
$modversion['admin']          = 1;
$modversion['user']           = 1;
$modversion['securityschema'] = array('Avatar::' => '::',
                                      'Avatar::' => 'prefix:userid:');

// recommended and required modules
$modversion['dependencies'] = array(array('modname'    => 'Profile',
                                          'minversion' => '1.5.0',
                                          'maxversion' => '',
                                          'status'     => PNMODULE_DEPENDENCY_REQUIRED
)
);
