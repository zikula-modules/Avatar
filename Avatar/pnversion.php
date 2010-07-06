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

$modversion['name']           = 'Avatar';
$modversion['displayname']    = __('Avatar');
$modversion['url']            = __('avatar');
$modversion['version']        = '3.0';
$modversion['description']    = __('Upload of individual Avatars');
$modversion['credits']        = 'docs/changelog.txt';
$modversion['help']           = 'docs/readme.txt';
$modversion['changelog']      = 'docs/changelog.txt';
$modversion['license']        = 'docs/license.txt';
$modversion['official']       = 0;
$modversion['author']         = 'Joerg Napp, Frank Schummertz, Carsten Volmer';
$modversion['contact']        = 'http://code.zikula.org/avatar/';
$modversion['admin']          = 1;
$modversion['user']           = 1;
$modversion['securityschema'] = array('Avatar::' => '::',
                                      'Avatar::' => 'prefix:userid:');

// recommended and required modules
$modversion['dependencies'] = array();
