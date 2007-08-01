/**
 * Avatar Module
 * 
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id: pninit.php 31 2007-07-30 21:25:42Z landseer $
 * @author       Joerg Napp, Frank Schummertz
 * @link         http://lottasophie.sf.net, http://www.pn-cms.de
 * @copyright    Copyright (C) 2004-2007
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

function showavatar(basedir)
{
    if($('avatar') && $('avatarselect')) {
        $('avatar').src = basedir + $F('avatarselect');
    }
    return;
}
