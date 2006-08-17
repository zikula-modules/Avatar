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

define('_AVATAR_ADM_TITLE',                   'Control de Avatares');

// upload settings form
define('_AVATAR_ADM_UPLOAD',                  'Opciones de subida');
define('_AVATAR_ADM_AVATARDIR',               'Directorio de avatares (PostNuke)');
define('_AVATAR_ADM_AVATARDIR_HINT',          'Por defecto: images/avatar');
define('_AVATAR_ADM_FORUMDIR',                'Directorio de avatares (PHPBB2)');
define('_AVATAR_ADM_ALLOWRESIZE',             'Cambiar el tamaño del avatar automáticamente');
define('_AVATAR_ADM_MAXSIZE',                 'Tamaño máximo del avatar en pixels');
define('_AVATAR_ADM_MAXHEIGHT',               'Altura máxima del avatar en pixels');
define('_AVATAR_ADM_MAXWIDTH',                'Ancho máximo del avatar en pixels');
define('_AVATAR_ADM_EXTENSIONS',              'Extensiones autorizadas');
define('_AVATAR_ADM_EXTENSIONS_HINT',         'gif;jpg El usuario puede subir un fichero por cada uno de ellos');

// display management form
define('_AVATAR_ADM_DISPLAYMANAGEMENT',       'Control de imagen');
define('_AVATAR_ADM_DISPLAYMANAGEMENT_HINT',  'En esta sección puedes fijar un prefijo particular para los grupos. Por ejemplo si asignas "escritores" como prefijo al grupo de editores, solamente los usuarios miembros de éste grupo verán los avatares con el nombre "escritores_xxxxx.ext". Si quieres que un grupo vea todos los avatares, pon el caracter * como prefijo.');
define('_AVATAR_ADM_DISPLAYMANAGEMENT_HINT2', 'P.S. Recuerda que los avatares subidos por los usuarios tienen un nombre parecido a "pers_userID.ext" y por defecto están solamente disponibles por el propietario. Para permitir a otros ver los avatares personales tienes que poner el prefijo "pers".');
define('_AVATAR_ADM_GROUPID',                 'ID de grupo');
define('_AVATAR_ADM_PREFIX',                  'Prefijo');
define('_AVATAR_ADM_GROUPS',                  'Grupos disponibles');
define('_AVATAR_ADM_GROUPS_ALL',              'Todos');

?>