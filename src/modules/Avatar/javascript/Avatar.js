/**
 * Avatar Module
 *
 * @package      Avatar
 * @author       Joerg Napp, Frank Schummertz, Carsten Volmer
 * @link         http://code.zikula.org/avatar
 * @copyright    Copyright (C) 2004-2010
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

Event.observe(window, 'load', function() {
    Zikula.define('Avatar');
    if ($('liveusersearch')) {
        liveusersearch();
    }
});

function liveusersearch()
{
    $('liveusersearch').removeClassName('z-hide');
    $('listuser').observe('click', function() { window.location.href=Zikula.Config.entrypoint + "?module=Avatar&type=admin&func=searchusers&uname=" + $F('username');});
    new Ajax.Autocompleter('username', 'username_choices', Zikula.Config.baseURL + 'ajax.php?module=users&func=getusers',
                           {paramName: 'fragment',
                            minChars: 3,
                            afterUpdateElement: function(data){
                                Event.observe('listuser', 'click', function() { window.location.href=Zikula.Config.entrypoint + "?module=Avatar&type=admin&func=searchusers&username=" + $('username').value;});
                                }
                            }
                            );
}