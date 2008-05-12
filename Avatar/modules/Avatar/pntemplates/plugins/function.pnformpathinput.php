<?php
/**
 * Path input plugin
 *
 * @copyright (c) 2006, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: function.pnformintinput.php 22138 2007-06-01 10:19:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Frank Schummertz, Jorn Wildt
 * @package PostNuke_Template_Plugins
 * @subpackage Functions
 */

require_once('system/pnForm/plugins/function.pnformtextinput.php');

/**
 * Path input
 *
 * Use for text inputs where you only want to accept paths. The value saved by
 * {@link pnForm::pnFormGetValues()} is either null or a valid path.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormPathInput extends pnFormTextInput
{
    /**
     * Path needs to be writable by the webserver
     * @var bool
     */
    var $writable;

    /**
     * remove trailing slashes from the path
     * @var bool
     */
    var $removeSlash;

    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function create(&$render, &$params)
    {
        $this->writable = array_key_exists('writable', $params) ? true : false;
        $this->removeSlash = array_key_exists('removeSlash', $params) ? true : false;
        $params['width'] = '6em';
        parent::create($render, $params);
    }

    function load(&$render, &$params)
    {
        parent::load($render, $params);
        $this->validate();
    }

    function validate(&$render)
    {
        parent::validate($render);
        if (!$this->isValid) {
            return;
        }

        if ($this->text != '') {
            if (!is_dir($this->text) || !is_readable($this->text)) {
                $this->setError(pnML('_AVATAR_PATHDOESNOTEXIST', array('path' => $this->text)));
            } elseif ($this->writable == true && !is_writable($this->text)) {
                $this->setError(pnML('_AVATAR_PATHISNOTWRITABLE', array('path' => $this->text)));
            } else {
                if ($this->removeSlash == true) {
                    Loader::loadClass('StringUtil');
                    do {
                        $hasSlash = false;
                        if (StringUtil::right($this->text, 1) == '/') {
                            $hasSlash = true;
                            $this->text = StringUtil::left($this->text, strlen($this->text)-1);
                        }
                    } while ($hasSlash==true);
                }
            }
        } else {
            $this->setError(_AVATAR_MISSINGPATH);
        }
    }


    function parseValue(&$render, $text)
    {
        if ($text == '') {
            return null;
        }
        return $text;
    }
}


function smarty_function_pnformpathinput($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormPathInput', $params);
}
