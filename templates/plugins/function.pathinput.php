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

function smarty_function_pathinput($params, &$render)
{
    return $render->RegisterPlugin('Avatar_Form_Plugin_PathInput', $params);
}
