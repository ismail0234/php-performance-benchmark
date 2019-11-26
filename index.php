<?php 

define('ROOT_PATH'       , dirname(__FILE__) . DIRECTORY_SEPARATOR );
define('APP_PATH'        , ROOT_PATH . 'application' . DIRECTORY_SEPARATOR );
define('CORE_PATH'       , APP_PATH  . 'core'        . DIRECTORY_SEPARATOR );
define('CONFIG_PATH'     , APP_PATH  . 'config'      . DIRECTORY_SEPARATOR );
define('CONTROLLER_PATH' , APP_PATH  . 'controller'  . DIRECTORY_SEPARATOR );
define('LIB_PATH' 		 , APP_PATH  . 'lib' 		 . DIRECTORY_SEPARATOR );
define('LANG_PATH' 		 , APP_PATH  . 'language'    . DIRECTORY_SEPARATOR );
define('VIEW_PATH' 		 , APP_PATH  . 'view' 		 . DIRECTORY_SEPARATOR );

/*
 * LAMBDA ÇEKİRDEK DOSYASI
 */
require APP_PATH . "core/core.php";