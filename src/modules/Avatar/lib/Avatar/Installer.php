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

Class Avatar_Installer extends Zikula_Installer {
    /**
     * install()
     *
     * Initialize the Module
     *
     * @return boolean success or not
     */
    public function install() {
        $this->setVar('forumdir', '');
        $this->setVar('allow_resize', false);
        $this->setVar('maxsize', '12000');
        $this->setVar('maxheight', '80');
        $this->setVar('maxwidth', '80');
        $this->setVar('allowed_extensions', 'gif;jpg;jpeg;png');
        $this->setVar('allow_multiple', true);
        return true;
    }
    
    /**
     * Avatar_upgrade()
     *
     * Upgrade the Module
     *
     * @param integer $oldversion old version of the module
     * @return boolean success or not
     **/
    public function upgrade($oldversion) {
        // Upgrade dependent on old version number
        switch ($oldversion) {
            case '1.1':
                $this->delVar('prefix_group_1');
                $this->delVar('prefix_group_2');
                $this->delVar('prefix_group_3');
                $this->delVar('prefix_prefix_1');
                $this->delVar('prefix_prefix_2');
                $this->delVar('prefix_prefix_3');
                
                $this->setVar('allow_multiple', true);
                
                // for PHP5: if jpg is allowed, also allow jpeg if needed
                // this is needed because image_type_to_extension() always returns 'jpeg' in case
                // of jpg images in PHP5
                $exts = explode(';', $this->getVar('allowed_extensions'));
                if (is_array($exts) && in_array('jpg', $exts) && !in_array('jpeg', $exts)) {
                    $exts[] = 'jpeg';
                    $this->setVar('allowed_extensions', implode(';', $exts));
                }
            case '2.0':
            case '2.1':
                ModUtil::setVar('Users', 'avatarpath', ModUtil::getVar('Avatar', 'avatardir'));
                $this->delVar('avatardir');
            case '2.2':
                
        }
        return true;
    }
    
    /**
     * Avatar_delete()
     *
     * Delete the module
     *
     * @return boolean success or not
     */
    public function uninstall() {
        $this->delVar();
        return true;
    }
}
