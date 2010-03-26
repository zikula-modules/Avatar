<?php
/**
 * Avatar Module
 *
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id$
 * @author       Joerg Napp, Frank Schummertz
 * @link         http://lottasophie.sf.net, http://www.pn-cms.de
 * @copyright    Copyright (C) 2004-2007
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * Avatar_user_main()
 *
 * Main function, shows the avatars to select from and the upload form.
 *
 * @return output The main module page
 */
function Avatar_user_main()
{
    $dom = ZLanguage::getModuleDomain('Avatar');
    // only logged-ins are allowed to see the overview.
    if (!pnUserLoggedIn()) {
        return LogUtil::registerError(__("You aren't a registered user.", $dom), null, pnConfigGetVar('entrypoint', 'index.php'));
    }

    // plus, the user should have overview right to see the avatars.
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerPermissionError(pnConfigGetVar('entrypoint', 'index.php'));
    }

    // is the user allowed to upload an Avatar?
    $allow_uploads = SecurityUtil::checkPermission('Avatar::', '::', ACCESS_COMMENT);

    // get all possible avatars
    $page     = (int)FormUtil::getPassedValue('page', 1, 'GETPOST');
    $perpage  = (int)FormUtil::getPassedValue('perpage', 50, 'GETPOST');
    list($avatars, $allavatarscount) = pnModAPIFunc('Avatar', 'user', 'getAvatars',
                                                    array('page'     => $page,
                                                          'perpage'  => $perpage));
    // avoid some vars in the url of the pager
    unset($_GET['submit']);
    unset($_POST['submit']);
    unset($_REQUEST['submit']);

    // display
    $pnRender = pnRender::getInstance('Avatar', false, null, true);
    $pnRender->assign('avatarpath', pnModGetVar('Users', 'avatarpath'));
    $pnRender->assign('avatars', $avatars);
    $pnRender->assign('allow_uploads', $allow_uploads);
    $pnRender->assign('user_avatar', pnUserGetVar('user_avatar'));
    $pnRender->assign('allavatarscount', $allavatarscount);
    $pnRender->assign('page', $page);
    $pnRender->assign('perpage', $perpage);
    return $pnRender->fetch('Avatar_user_main.htm');
}

/**
 * Avatar_user_upload()
 *
 * This is the upload function.
 * It takes the uploaded file, performs the relevant checks to see if
 * the file meets the upload policy, and sets the uploaded file as the
 * new avatar of the user.
 */
function Avatar_user_upload ($args)
{
    $dom = ZLanguage::getModuleDomain('Avatar');
    // permission check
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_COMMENT)) {
        return LogUtil::registerPermissionError(pnConfigGetVar('entrypoint', 'index.php'));
    }

    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnConfigGetVar('entrypoint', 'index.php'));
    }

    // get the file
    $uploadfile = $_FILES['filelocale'];

    if (!is_uploaded_file($_FILES['filelocale']['tmp_name'])) {
        return LogUtil::registerError(__('No file selected.', $dom), null, pnModURL('Avatar'));
    }

    $tmp_file = tempnam(pnConfigGetVar('temp'), 'Avatar');
    move_uploaded_file($_FILES['filelocale']['tmp_name'], $tmp_file);

    $modvars = pnModGetVar('Avatar');
    $avatarpath = pnModGetVar('Users', 'avatarpath');

    // check for file size limit
    if (!$modvars['allow_resize'] && filesize($tmp_file) > $modvars['maxsize']) {
        unlink($tmp_file);
        return LogUtil::registerError(__f('Filesize error, max %s bytes are allowed.', $modvars['maxsize'], $dom), null, pnModURL('Avatar'));
    }

    // Get image information
    $imageinfo = getimagesize($tmp_file);

    // file is not an image
    if (!$imageinfo) {
        unlink($tmp_file);
        return LogUtil::registerError(__('File is not an image', $dom), null, pnModURL('Avatar'));
    }

    $extension = image_type_to_extension($imageinfo[2], false);
    // check for image type
    if (!in_array($extension, explode (';', $modvars['allowed_extensions']))) {
        unlink($tmp_file);
        return LogUtil::registerError(__f('Unauthorised file extension. Allowed extensions: %s.', $modvars['allowed_extensions'], $dom), null, pnModURL('Avatar'));
    }


    // check for image dimensions limit
    if ($imageinfo[0] > $modvars['maxwidth'] || $imageinfo[1] > $modvars['maxheight']) {
        if (!$modvars['allow_resize']) {
            unlink($tmp_file);
            return LogUtil::registerError(__f('Image height (max. %s1$spx) or width (max. %2$spx) error.', array($modvars['maxheight'], $modvars['maxwidth']), $dom), null, pnModURL('Avatar'));
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

    $uid = pnUserGetVar('uid');
    $avatarfilenamewithoutextension = 'pers_' . $uid;
    $avatarfilename = $avatarfilenamewithoutextension . '.' . $extension;
    $user_avatar = DataUtil::formatForStore($avatarpath . '/' . $avatarfilename);
    $pnphpbb_avatar = DataUtil::formatForStore($modvars['forumdir'] . '/' .$avatarfilename);

    // delete old user avatar with this extension
    // this allows the users to have a avatar available for each extension that is allowed
    if($modvars['allow_multiple'] == false) {
        // users are not allowed to store more than one avatar
        foreach(explode (';', $modvars['allowed_extensions']) as $ext) {
            unlink($file = DataUtil::formatForStore($avatarpath . '/' . $avatarfilenamewithoutextension . '.' . $ext));
        }
    } else if(file_exists($user_avatar) && is_writable($user_avatar)) {
        unlink($user_avatar);
    }

    if (!@copy($tmp_file, $user_avatar)) {
        unlink($tmp_file);
        return LogUtil::registerError(__("Fail to copy the file in avatars' directory.", $dom), null, pnModURL('Avatar'));
    } else {
        chmod ($user_avatar, 0644);
    }
    if (pnModAvailable('pnPHPbb') && avatarpath != '') {
        unlink($pnphpbb_avatar);
        if (!@copy($tmp_file, $pnphpbb_avatar)) {
            unlink($tmp_file);
            return LogUtil::registerError(__("Fail to copy the file in phpbb's directory.", $dom), null, pnModURL('Avatar'));
        } else {
            chmod ($pnphpbb_avatar, 0644);
        }
    }
    unlink($tmp_file);

    if (!pnModAPIFunc('Avatar', 'user', 'setavatar',
                      array('uid'    => $uid,
                            'avatar' => $avatarfilename))) {
        return LogUtil::registerError(__('Error while selecting the avatar.', $dom), null, pnModURL('Avatar'));
    }
    return pnRedirect(pnModURL('Avatar', 'user', 'main'));
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
function Avatar_user_setavatar($args)
{
    $dom = ZLanguage::getModuleDomain('Avatar');
    // only logged-ins are allowed to see the overview.
    if (!pnUserLoggedIn()) {
        return LogUtil::registerError(__("You aren't a registered user.", $dom), null, pnModURL('Avatar'));
    }

    // plus, the user should have overview right to see the avatars.
    if (!SecurityUtil::checkPermission('Avatar::', '::', ACCESS_OVERVIEW)) {
        return LogUtil::registerPermissionError(pnConfigGetVar('entrypoint', 'index.php'));
    }

    $user_avatar = FormUtil::getPassedValue('user_avatar', '', 'GETPOST');

    pnModAPIFunc('Avatar', 'user', 'setavatar',
                       array('uid'    => pnUserGetVar('uid'),
                             'avatar' => $user_avatar));

    return pnRedirect(pnModURL('Avatar'));
}


if (!function_exists('image_type_to_extension')) {
    /**
     * image_type_to_extension()
     *
     * returns the correct extension for a given image type as returned by getimagesize
     *
     * @param integer $imagetype the image type, returned by getimagesize()
     * @param boolean $include_dot prepend a dot to the extension
     * @return string the file extension
     */
    function image_type_to_extension($imagetype, $include_dot = true)
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
