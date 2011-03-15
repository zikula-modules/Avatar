<?php
/**
 * Path input plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Frank Schummertz, Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */


/**
 * Path input
 *
 * Use for text inputs where you only want to accept paths. The value saved by
 * {@link Form::FormGetValues()} is either null or a valid path.
 *
 * @package Form
 * @subpackage Plugins
 */
class Avatar_Form_Plugin_PathInput extends Zikula_Form_Plugin_TextInput
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


    function create($render, &$params)
    {
        $this->writable = array_key_exists('writable', $params) ? true : false;
        $this->removeSlash = array_key_exists('removeSlash', $params) ? true : false;
        $params['width'] = '6em';
        parent::create($render, $params);
    }

    function load($render, &$params)
    {
        parent::load($render, $params);
        $this->validate($render);
    }

    function validate($render)
    {
        parent::validate($render);
        if (!$this->isValid) {
            return;
        }
        if ($this->text != '') {
            if (!is_dir($this->text) || !is_readable($this->text)) {
                $this->setError(__f('The path %s does not exist or is not readable by the webserver.', $this->text));
            } elseif ($this->writable == true && !is_writable($this->text)) {
                $this->setError(__f('The webserver cannot write to %s.',$this->text));
            } else {
                if ($this->removeSlash == true) {
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
            $this->setError(__('Error! Missing path.'));
        }
    }


    function parseValue($render, $text)
    {
        if ($text == '') {
            return null;
        }
        return $text;
    }
}
