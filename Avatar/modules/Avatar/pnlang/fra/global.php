<?php
/**
 * Avatar Module
 *
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar 
 * @author       DO HOANG Quynh Anh, (correction Bergues André)
 * @link        http://forum.topflood.com
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
//
// A
//
define('_AVATAR_ADM_ALLOWMULTIPLEAVATARS',    'Permettre plusieurs avatars');
define('_AVATAR_ADM_ALLOWRESIZE',             'Auto-redimensionner l\'avatar');
define('_AVATAR_ADM_AVATARDIR',               'Répertoire des avatars (PostNuke)');
define('_AVATAR_ADM_AVATARDIR_HINT',          'Par défaut: images/avatar <strong>sans le dernier /</strong>');
define('_AVATAR_ADM_EXTENSIONS',              'Extensions acceptées :');
define('_AVATAR_ADM_EXTENSIONS_HINT',         'Un point virgule sépare les extensions acceptées, les formats supportés sont gif, jpg, png, wbm');
define('_AVATAR_ADM_FORUMDIR',                'Répertoire des avatars (PHPBB2');
define('_AVATAR_ADM_MAXHEIGHT',               'Hauteur maximale en pixel');
define('_AVATAR_ADM_MAXSIZE',                 'Taille maximale du fichier en octet');
define('_AVATAR_ADM_MAXWIDTH',                'Largeur maximale en pixel');
define('_AVATAR_ADM_MULTIPLE_HINT',           'Ceci permet au membre de sauvegarder un avatar pour chaque extension');
define('_AVATAR_ADM_TITLE',                   'Administration des avatars');
define('_AVATAR_ADM_UPLOAD',                  'Configuration');
define('_AVATAR_ALLOWEDEXTENSIONS',  'Les extensions possibles');
define('_AVATAR_AVATARINUSE',                 'Attention: Cet avatar est en cours d\'utilisation et ne peut pas être supprimé. Si vous voulez le supprimer, merci de changer les avatars des membres dans la liste ci-dessous.');

//
// A
//
define('_AVATAR_CHANGEDTO',                   'L\'avatar du membre %username% est changé en %avatar%');
define('_AVATAR_CLEAR_BUTTON',       'Enlever');
define('_AVATAR_CONFIRMDELETE',               'Confirmer la suppression');
define('_AVATAR_CURRENTAVATAR',               'Avatar actuel');
define('_AVATAR_CURRENTAVATAR',      'Votre avatar actuel est ');

//
// D
//
define('_AVATAR_DELETEAVATAR',                'supprimer l\'avatar');
define('_AVATAR_DELETECURRENTAVATAR',         'Voulez-vous supprimez l\'avatar actuel?');
define('_AVATAR_DELETED',                     'Avatar %avatar% est supprimé');

//
// E
//
define('_AVATAR_ENTERUSERNAME',               'Entrer le nom d\'un membre');
define('_AVATAR_ERRORDELETINGAVATAR',         'Erreur: Impossible de supprimer l\'avatar %avatar%');
define('_AVATAR_ERR_AUTHORIZED',     'Vous n\'êtes pas autorisé à charger votre avatar.');
define('_AVATAR_ERR_COPYAVATAR',     'Echec de copie du fichier dans le dossier \'avatars\'.');
define('_AVATAR_ERR_COPYFORUM',      'Echec de copie du fichier dans le dossier \'phpbb\'.');
define('_AVATAR_ERR_FILEDIMENSIONS', 'Erreur avec la longueur ou la largeur de l\'image.');
define('_AVATAR_ERR_FILESIZE',       'Erreur de taille du fichier.');
define('_AVATAR_ERR_FILETYPE',       'Extension non acceptée.');
define('_AVATAR_ERR_FILEUPLOAD',     'Aucun fichier n\'est sélectionné.');
define('_AVATAR_ERR_NOTLOGGEDIN',    'Vous n\'êtes pas un membre enregistré.');
define('_AVATAR_ERR_SELECT',         'Le choix des avatars a échoué.');
define('_AVATAR_ERR_USERNOTAUTHORIZED',       'Le membre n\'est pas permis d\'utiliser cet avatar. Il faut donc changer les droits de %avatar%.');

//
// L
//
define('_AVATAR_LISTUSERS',                   'lister les membres utilisant cet avatar');

//
// M
//
define('_AVATAR_MAINTAINAVATARS',             'Gérer les avatars');
define('_AVATAR_MAXDIMENSIONS',      'Les dimension maximales de l\'avatar');
define('_AVATAR_MAXHEIGHT',          'Hauteur maximale');
define('_AVATAR_MAXSIZE',            'Taille maximale de l\'avatar');
define('_AVATAR_MAXWIDTH',           'Largeur maximale');
define('_AVATAR_MODIFYCONFIG',                'Modifier la configuration');

//
// N
//
define('_AVATAR_NOUSERFORTHISAVATAR',         'Aucun membre n\'utilise cet avatar en ce moment');

//
// P
//
define('_AVATAR_PIXEL',              'pixels');

//
// R
//
define('_AVATAR_RESIZE',             'Les images trop grandes seront redimensionnées.');

//
// S
//
define('_AVATAR_SELECTAVATAR',       'Choisir un avatar');
define('_AVATAR_SELECTAVATARFORUSERS',        'Choisir l\'avatar qui sera applicable à tous les membres sélectionnés');
define('_AVATAR_SELECTAVATAR_LINK',  'Changer l\'avatar');
define('_AVATAR_SELECTNEWAVATAR',             'Choisir un nouveau avatar');
define('_AVATAR_SELECTYOURAVATAR',   'Choisir votre avatar');

//
// T
//
define('_AVATAR_TITLE',              'Avatar');

//
// U
//
define('_AVATAR_UPLOADFILE',         'Charger un fichier');
define('_AVATAR_UPLOAD_BUTTON',      'Charger');
define('_AVATAR_USERLISTPERAVATAR',           'Les membres utilisant cet avatar');
define('_AVATAR_USER_CHOOSE',        'Si aucun avatar n\'est disponible pour vous représenter, vous pouvez toujours charger un avatar personnalisé.');

//
// V
//
define('_AVATAR_VISITHOMEPAGE',               'Visiter le projet Avatar');

//
// w
//
define('_AVATAR_WARN_AVARTARDIR',                    'Attention: impossible d\'écrire dans le répertoire \'Avatar\'');
define('_AVATAR_WARN_FORUMDIR',                      'Attention: impossible d\'écrire dans le répertoire \'Forum\' (Aucun souci si PNphpBB2 n\'est pas installé)');