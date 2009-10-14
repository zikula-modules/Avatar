<?php
/**
 * Avatar Module
 * 
 * The Avatar module allows uploading of individual Avatars.
 * It is based on EnvoAvatar from A.T.Web, http://www.atw.it
 *
 * @package      Avatar
 * @version      $Id$
 * @author       Arthens
 * @copyright    Copyright (C) 2008ff
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

// new
define('_AVATAR_SELECTDISPLAY',               'Select the number of avatars to be displayed per page');

//
// A
//
define('_AVATAR_ADM_ALLOWMULTIPLEAVATARS',    'Permetti avatar multipli');
define('_AVATAR_ADM_ALLOWRESIZE',             'Ridimensiona automaticamente gli avatar');
define('_AVATAR_ADM_AVATARDIR',               'Cartella degli Avatar (Zikula)');
define('_AVATAR_ADM_AVATARDIR_HINT',          'Default: images/avatar <strong>senza / finale</strong>');
define('_AVATAR_ADM_EXTENSIONS',              'Estensioni permesse');
define('_AVATAR_ADM_EXTENSIONS_HINT',         '(una lista di estensioni separate da punto e virgola, tipi di file supportati: gif, jpg, jpeg, png, wbm. Se stai usando PHP 5 o successivo devi usare \'jpeg\' invece di \'jpg\')');
define('_AVATAR_ADM_FORUMDIR',                'Cartella degli Avatar (PHPBB2');
define('_AVATAR_ADM_MAXHEIGHT',               'Altezza massima in pixel');
define('_AVATAR_ADM_MAXSIZE',                 'Dimensione massima del file in bytes');
define('_AVATAR_ADM_MAXWIDTH',                'Larghezza massima in pixel');
define('_AVATAR_ADM_MULTIPLE_HINT',           'Questo permette all\'utente di caricare un avatar per ogni estensione');
define('_AVATAR_ADM_TITLE',                   'Amministrazione Avatar');
define('_AVATAR_ADM_UPLOAD',                  'Impostazioni Upload');
define('_AVATAR_ALLOWEDEXTENSIONS',  		  'Estensioni permesse');
define('_AVATAR_AVATARINUSE',                 'Attenzione: questo avatar è in uso e non può essere eliminato. Se vuoi cancellarlo cambia l\'avatar degli utenti elencati qui sotto.');

//
// C
//
define('_AVATAR_CHANGEDTO',                   'L\'avatar dell\'utente %username% ora è %avatar%');
define('_AVATAR_CLEAR_BUTTON',                'Pulisci');
define('_AVATAR_CONFIRMDELETE',               'Conferma eliminazione');
define('_AVATAR_CURRENTAVATAR',               'Il tuo avatar attuale è');

//
// D
//
define('_AVATAR_DELETEAVATAR',                'elimina avatar');
define('_AVATAR_DELETECURRENTAVATAR',         'Elimina l\'avatar attuale?');
define('_AVATAR_DELETED',                     'L\'avatar %avatar% è stato eliminato');

//
// E
//
define('_AVATAR_ENTERUSERNAME',               'Inserisci l\'username');
define('_AVATAR_ERRORDELETINGAVATAR',         'Errore: Impossibile eliminare l\'avatar %avatar%');
define('_AVATAR_ERR_AUTHORIZED',              'Non sei autorizzato a caricare avatar.');
define('_AVATAR_ERR_COPYAVATAR',              'Copia del file nella cartella degli avatar fallita.');
define('_AVATAR_ERR_COPYFORUM',               'Copia del file nella cartella di phpbb fallita.');
define('_AVATAR_ERR_FILEDIMENSIONS',          'Altezza (max. %h%px) o larghezza (max. %w%px) dell\'immagine non permessa.');
define('_AVATAR_ERR_FILESIZE',                'Dimensione del file eccessiva, massimo permesso %max% bytes.');
define('_AVATAR_ERR_FILETYPE',                'Estensione non permessa. Estensioni accettate: %ft%.');
define('_AVATAR_ERR_FILEUPLOAD',              'Nessun file selezionato.');
define('_AVATAR_ERR_NOIMAGE',                 'Questo file non è un\'immagine');
define('_AVATAR_ERR_NOTLOGGEDIN',             'Non sei un utente registrato.');
define('_AVATAR_ERR_SELECT',                  'Errore durante la selezione dell\'avatar.');
define('_AVATAR_ERR_USERNOTAUTHORIZED',       'L\'utente non è autorizzato ad utilizzare questo avatar. Per cambiare questa opzione modifica i permessi di %avatar%.');

//
// L
//
define('_AVATAR_LISTUSERS',                   'lista degli utenti che usano questo avatar');

//
// M
//
define('_AVATAR_MAINTAINAVATARS',             'Gestione Avatar');
define('_AVATAR_MAXDIMENSIONS',               'Dimensione massima dell\'avatar');
define('_AVATAR_MAXHEIGHT',                   'Altezza massima');
define('_AVATAR_MAXSIZE',                     'Dimensione massima del file');
define('_AVATAR_MAXWIDTH',                    'Larghezza massima');
define('_AVATAR_MISSINGPATH',                 'path mancante');
define('_AVATAR_MODIFYCONFIG',                'Modifica Configurazione');

//
// N
//
define('_AVATAR_NOUSERFORTHISAVATAR',         'Nessun utente sta usando questo avatar');
define('_AVATAR_NOAVATARSELECTED',            'nessun avatar selezionato');

//
// P
//
define('_AVATAR_PATHDOESNOTEXIST',            'Il path %path% non esiste o non è leggibile dal webserver.');
define('_AVATAR_PATHISNOTWRITABLE',           'Il webserver non può scrivere in %path%.');
define('_AVATAR_PIXEL',                       'pixel');

//
// R
//
define('_AVATAR_RESIZE',                      'Le immagini troppo grandi verranno ridimensionate automaticamente.');

//
// S
//
define('_AVATAR_SEARCHUSERS',                 'Cerca Utente');
define('_AVATAR_SELECTAVATAR',                'Seleziona un avatar');
define('_AVATAR_SELECTAVATARFORUSERS',        'Seleziona l\'avatar da mettere a tutti gli utenti selezionati');
define('_AVATAR_SELECTAVATAR_LINK',           'Cambia Avatar');
define('_AVATAR_SELECTEDAVATAR',              'Avatar selezionato');
define('_AVATAR_SELECTNEWAVATAR',             'Seleziona un nuovo avatar');
define('_AVATAR_SELECTYOURAVATAR',            'Scegli il tuo avatar preferito');

//
// T
//
define('_AVATAR_TITLE',                       'Gestione Avatar');

//
// U
//
define('_AVATAR_UPLOADFILE',                  'Upload file');
define('_AVATAR_UPLOAD_BUTTON',               'Upload');
define('_AVATAR_USERLISTPERAVATAR',           'Utenti che usano questo avatar');
define('_AVATAR_USER_CHOOSE',                 'Se nessun avatar ti rappresenta ne puoi caricare uno personalizzato.');

//
// V
//
define('_AVATAR_VISITHOMEPAGE',               'Visita il progetto Avatar su Trac');

//
// w
//
define('_AVATAR_WARN_AVARTARDIR',             'Attenzione: il webserver non può scrivere nella cartella degli avatar');
define('_AVATAR_WARN_FORUMDIR',               'Attenzione: il webserver non può scrivere nella cartella del forum (è normale se PNphpBB2 non è installato)');
