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

function showavatar(basedir)
{
    if($('selectedavatar') && $('avatarselect')) {
        $('selectedavatar').src = basedir + '/' + $F('avatarselect');
    }
    return;
}
