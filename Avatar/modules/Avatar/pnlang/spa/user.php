<?php
/**
 * Avatar Module
 * 
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id$
 * @author       Joerg Napp
 * @link         http://lottasophie.sf.net
 * @copyright    Copyright (C) 2004
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// title
define('_AVATAR_TITLE',              'Control de Avatares');

// defines for the avatar select form
define('_AVATAR_SELECTYOURAVATAR',   'Elige tu avatar preferido entre los disponibles.');
define('_AVATAR_SELECTAVATAR',       'Imagen seleccionada:');
define('_AVATAR_CURRENTAVATAR',      'Tu avatar seleccionado es: ');

// defines for the upload form
define('_AVATAR_USER_CHOOSE',        'Si entre los disponibles no encuentras uno que te represente sube tu propio avatar personalizado.');
define('_AVATAR_UPLOADFILE',         'Subida de fichero');
define('_AVATAR_UPLOAD_BUTTON',      'Subida');
define('_AVATAR_CLEAR_BUTTON',       'Borrado de Avatar');
define('_AVATAR_MAXSIZE',            'Máxima dimension del Avatar');
define('_AVATAR_ALLOWEDEXTENSIONS',  'Extensiones autorizadas');
define('_AVATAR_MAXHEIGHT',          'Altura máxima');
define('_AVATAR_MAXWIDTH',           'Ancho máximo');
define('_AVATAR_MAXDIMENSIONS',      'Máximo tamaño del avatar:');
define('_AVATAR_PIXEL',              'pixels.');
define('_AVATAR_RESIZE',             'Las imágenes más grandes serán redimensionadas.');

// Error Messages
define('_AVATAR_ERR_FILETYPE',       'Extensión del fichero no autorizada.');
define('_AVATAR_ERR_FILESIZE',       'Tamaño del fichero erroneo.');
define('_AVATAR_ERR_FILEDIMENSIONS', 'Altura ó anchura de la imagen errónea.');
define('_AVATAR_ERR_FILEUPLOAD',     'No se ha seleccionado ningún fichero.');
define('_AVATAR_ERR_AUTHORIZED',     'No estás autorizado para subir un fichero.');
define('_AVATAR_ERR_COPYAVATAR',     'Fallo al copiar el fichero en el directorio avatars\'');
define('_AVATAR_ERR_COPYFORUM',      'Fallo al copiar el fichero en el directorio phpbb\'s');
define('_AVATAR_ERR_SELECT',         'Fallo en la selección de los avatares');
define('_AVATAR_ERR_NOTLOGGEDIN',    'No eres un usuario registrado.');

// defines for the user page plugin
define('_AVATAR_SELECTAVATAR_LINK',  'Cambiar Avatar');

?>
