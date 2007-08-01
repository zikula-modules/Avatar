<?php
/**
 * Avatar Module
 *
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id: pnversion.php 31 2007-07-30 21:25:42Z landseer $
 * @author       Joerg Napp, Frank Schummertz
 * @link         http://lottasophie.sf.net, http://www.pn-cms.de
 * @copyright    Copyright (C) 2004-2007
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

$modversion['name']           = 'Avatar';
$modversion['version']        = '2.0';
$modversion['description']    = _AVATAR_DESCRIPTION;
$modversion['credits']        = 'pndocs/changelog.txt';
$modversion['help']           = 'pndocs/changelog.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 0;
$modversion['author']         = 'Joerg Napp, Frank Schummertz, Carsten Volmer';
$modversion['contact']        = 'http://noc.postnuke.com/projects/avatar/';
$modversion['admin']          = 1;
$modversion['user']           = 1;
$modversion['securityschema'] = array('Avatar::' => '::',
                                      'Avatar::' => 'prefix:userid:');
