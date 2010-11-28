<?php
/**
 * Avatar Module
 *
 * @package      Avatar
 * @author       Joerg Napp, Frank Schummertz, Carsten Volmer
 * @link         http://code.zikula.org/avatar
 * @copyright    Copyright (C) 2004-2010
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * Avatar_user_main()
 *
 * Main function, shows the avatars to select from.
 *
 * @return output The main module page
 */
 
class Avatar_Controller_User extends Zikula_Controller
{ 
    public function postInitialize()
    {
        $this->view->setCaching(false)->add_core_data();
    }

    public function main()
    {
        // plus, the user should have overview right to see the avatars.
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_OVERVIEW)) {
            return LogUtil::registerPermissionError();
        }
    
        // only logged-ins are allowed to see the overview.
        if (!UserUtil::isLoggedIn()) {
            return LogUtil::registerError($this->__('Error! You aren\'t a registered user.'), null, System::getVar('entrypoint', 'index.php'));
        }

        // get all possible avatars
        $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
        $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
        list($avatars, $allavatarscount) = ModUtil::apiFunc('Avatar', 'user', 'getAvatars', array('page' => $page, 'perpage' => $perpage, 'realimages' => true));
    
        // avoid some vars in the url of the pager
        unset($_GET['submit']);
        unset($_POST['submit']);
        unset($_REQUEST['submit']);

        $current_avatar = UserUtil::getVar('avatar', UserUtil::getVar('uid'), '');

        // display
        $this->view->assign('avatarpath', ModUtil::getVar('Users', 'avatarpath'));
        $this->view->assign('current_avatar', $current_avatar);
        $this->view->assign('gravatar_hash', md5(strtolower(trim(UserUtil::getVar('email')))));
        $this->view->assign('avatars', $avatars);
        $this->view->assign('allavatarscount', $allavatarscount);
        $this->view->assign('page', $page);
        $this->view->assign('perpage', $perpage);
        return $this->view->fetch('Avatar_user_main.htm');
    }
    
    /**
     * Avatar_user_uploadform()
     *
     * Avatar upload form.
     *
     * @return output The main module page
     */
    public function uploadform()
    {
        // only logged-ins are allowed to see the overview.
        if (!UserUtil::isLoggedIn()) {
            return LogUtil::registerError($this->__('Error! You aren\'t a registered user.'), null, System::getVar('entrypoint', 'index.php'));
        }
    
        // plus, the user should have overview right to see the avatars.
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_COMMENT)) {
            return LogUtil::registerPermissionError();
        }

        $current_avatar = UserUtil::getVar('avatar', UserUtil::getVar('uid'), '');

        // display
        $this->view->assign('avatarpath', ModUtil::getVar('Users', 'avatarpath'));
        $this->view->assign('current_avatar', $current_avatar);

        // display
        return $this->view->fetch('Avatar_user_uploadform.htm');
    }
       
    /**
     * Avatar_user_upload()
     *
     * This is the upload function.
     * It takes the uploaded file, performs the relevant checks to see if
     * the file meets the upload policy, and sets the uploaded file as the
     * new avatar of the user.
     */
    public function upload ($args)
    {
        // permission check
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_COMMENT)) {
            return LogUtil::registerPermissionError();
        }
    
        if (!SecurityUtil::confirmAuthKey()) {
            return LogUtil::registerAuthidError();
        }
    
        // get the file
        $uploadfile = $_FILES['filelocale'];
    
        if (!is_uploaded_file($_FILES['filelocale']['tmp_name'])) {
            return LogUtil::registerError($this->__('Error! No file selected.'));
        }
    
        $tmp_file = tempnam(System::getVar('temp'), 'Avatar');
        move_uploaded_file($_FILES['filelocale']['tmp_name'], $tmp_file);
    
        $modvars = ModUtil::getVar('Avatar');
        $avatarpath = ModUtil::getVar('Users', 'avatarpath');
    
        // check for file size limit
        if (!$modvars['allow_resize'] && filesize($tmp_file) > $modvars['maxsize']) {
            unlink($tmp_file);
            return LogUtil::registerError($this->__f('Error! Filesize error, max %s bytes are allowed.', $modvars['maxsize']));
        }
    
        // Get image information
        $imageinfo = getimagesize($tmp_file);
    
        // file is not an image
        if (!$imageinfo) {
            unlink($tmp_file);
            return LogUtil::registerError($this->__('Error! The file is not an image.'));
        }
    
        $extension = image_type_to_extension($imageinfo[2], false);
        // check for image type
        if (!in_array($extension, explode (';', $modvars['allowed_extensions']))) {
            unlink($tmp_file);
            return LogUtil::registerError($this->__f('Error! UnSecurityUtil::checkPermission* file extension. Allowed extensions: %s.', $modvars['allowed_extensions']));
        }
    
    
        // check for image dimensions limit
        if ($imageinfo[0] > $modvars['maxwidth'] || $imageinfo[1] > $modvars['maxheight']) {
            if (!$modvars['allow_resize']) {
                unlink($tmp_file);
                return LogUtil::registerError($this->__f('Error! Image height (max. %1$s px) or width (max. %2$s px) error.', array($modvars['maxheight'], $modvars['maxwidth'])));
            } else {
                // resize the image
    
                // get the new dimensions
                $width = $imageinfo[0];
                $height = $imageinfo[1];
    
                if ($width > $modvars['maxwidth']) {
                    $height = ($modvars['maxwidth'] / $width) * $height;
                    $width = $modvars['maxwidth'];
                }
    
                if ($height > $modvars['maxheight']) {
                    $width = ($modvars['maxheight'] / $height) * $width;
                    $height = $modvars['maxheight'];
                }
    
                // get the correct functions based on the image type
                switch ($imageinfo[2]) {
                    case 1:
                        $createfunc = 'imagecreatefromgif';
                        $savefunc = 'imagegif';
                        break;
                    case 2:
                        $createfunc = 'ImageCreateFromJpeg';
                        $savefunc = 'imagejpeg';
                        break;
                    case 3:
                        $createfunc = 'imagecreatefrompng';
                        $savefunc = 'imagepng';
                        break;
                    case 4:
                        $createfunc = 'imagecreatefromwbmp';
                        $savefunc = 'imagewbmp';
                        break;
                }
    
                $srcImage = $createfunc($tmp_file);
                $destImage = imagecreatetruecolor($width, $height);
                imagecopyresampled($destImage, $srcImage, 0, 0, 0, 0, $width, $height, $imageinfo[0], $imageinfo[1]);
                $savefunc($destImage, $tmp_file);
    
                // free the memory
                imagedestroy($srcImage);
                imagedestroy($destImage);
            }
        }
    
        // everything's OK, so move'em
    
        $uid = UserUtil::getVar('uid');
        $avatarfilenamewithoutextension = 'pers_' . $uid;
        $avatarfilename = $avatarfilenamewithoutextension . '.' . $extension;
        $user_avatar = DataUtil::formatForOS($avatarpath . '/' . $avatarfilename);
        $pnphpbb_avatar = DataUtil::formatForOS($modvars['forumdir'] . '/' .$avatarfilename);
    
        // delete old user avatar with this extension
        // this allows the users to have a avatar available for each extension that is allowed
        if($modvars['allow_multiple'] == false) {
            // users are not allowed to store more than one avatar
            foreach(explode (';', $modvars['allowed_extensions']) as $ext) {
                unlink($file = DataUtil::formatForOS($avatarpath . '/' . $avatarfilenamewithoutextension . '.' . $ext));
            }
        } else if(file_exists($user_avatar) && is_writable($user_avatar)) {
            unlink($user_avatar);
        }
    
        if (!@copy($tmp_file, $user_avatar)) {
            unlink($tmp_file);
            return LogUtil::registerError($this->__('Error! Fail to copy the file in avatar\'s directory.'));
        } else {
            chmod ($user_avatar, 0644);
        }
        if (ModUtil::available('pnPHPbb') && avatarpath != '') {
            unlink($pnphpbb_avatar);
            if (!@copy($tmp_file, $pnphpbb_avatar)) {
                unlink($tmp_file);
                return LogUtil::registerError($this->__('Error! Fail to copy the file in phpbb\'s directory.'));
            } else {
                chmod ($pnphpbb_avatar, 0644);
            }
        }
        unlink($tmp_file);
    
        if (!ModUtil::apiFunc('Avatar', 'user', 'setavatar', array('uid' => $uid, 'avatar' => $avatarfilename))) {
            return LogUtil::registerError($this->__('Error while selecting the avatar.'));
        }
        return System::redirect(ModUtil::url('Avatar', 'user', 'main'));
    }
    
    
    /**
     * Avatar_user_setavatar()
     *
     * Takes the new avatar from the input space and selects it as
     * the new avatar.
     *
     * @param $args
     * @return
     **/
    public function setavatar($args)
    {
        // only logged-ins are allowed to see the overview.
        if (!UserUtil::isLoggedIn()) {
            return LogUtil::registerError($this->__('Error! You aren\'t a registered user.'));
        }
    
        // plus, the user should have overview right to see the avatars.
        if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_OVERVIEW)) {
            return LogUtil::registerPermissionError();
        }
    
        $user_avatar = FormUtil::getPassedValue('user_avatar', '', 'GETPOST');
        ModUtil::apiFunc('Avatar', 'user', 'setavatar', array('uid' => UserUtil::getVar('uid'), 'avatar' => $user_avatar));
        return System::redirect(ModUtil::url('Avatar'));
    }
    
    
        /**
         * image_type_to_extension()
         *
         * returns the correct extension for a given image type as returned by getimagesize
         *
         * @param integer $imagetype the image type, returned by getimagesize()
         * @param boolean $include_dot prepend a dot to the extension
         * @return string the file extension
         */
    /*
        public function image_type_to_extension($imagetype, $include_dot = true)
        {
            if (empty($imagetype)) return false;
            $dot = $include_dot ? '.' : '';
            switch ($imagetype) {
                case IMAGETYPE_GIF     : return $dot . 'gif';
                case IMAGETYPE_JPEG    : return $dot . 'jpg';
                case IMAGETYPE_PNG     : return $dot . 'png';
                case IMAGETYPE_SWF     : return $dot . 'swf';
                case IMAGETYPE_PSD     : return $dot . 'psd';
                case IMAGETYPE_BMP     : return $dot . 'bmp';
                case IMAGETYPE_TIFF_II : return $dot . 'tiff';
                case IMAGETYPE_TIFF_MM : return $dot . 'tiff';
                case IMAGETYPE_JPC     : return $dot . 'jpc';
                case IMAGETYPE_JP2     : return $dot . 'jp2';
                case IMAGETYPE_JPX     : return $dot . 'jpf';
                case IMAGETYPE_JB2     : return $dot . 'jb2';
                case IMAGETYPE_SWC     : return $dot . 'swc';
                case IMAGETYPE_IFF     : return $dot . 'aiff';
                case IMAGETYPE_WBMP    : return $dot . 'wbmp';
                case IMAGETYPE_XBM     : return $dot . 'xbm';
                default                : return false;
            }
        }
    }
    */

}
