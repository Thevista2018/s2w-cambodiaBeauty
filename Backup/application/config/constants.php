<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| DB
|--------------------------------------------------------------------------
*/
/* -- Table : Prefix -- */
define('TB_PREFIX', 'myan_');

/* -- Table : Default -- */
define('TB_ADMIN', TB_PREFIX.'admin');
define('TB_SLIDE', TB_PREFIX.'slide');
define('TB_SHORTNEWS', TB_PREFIX.'shortnews');
define('TB_DOWNLOAD', TB_PREFIX.'download');
define('TB_ARTICLE', TB_PREFIX.'article');
define('TB_GALLERY', TB_PREFIX.'gallery');
define('TB_CONTACT_US', TB_PREFIX.'contact_us');
define('TB_REGISTER', TB_PREFIX.'register');
define('TB_PUBLICITIES', TB_PREFIX.'publicities');
define('TB_SPACE', TB_PREFIX.'space');

/* -- Custom -- */
define('TITLE_ADMIN', 'ระบบจัดการ : myanmarbuilddecor.com');

define('SERV_IP', '203.150.20.234');
define('SERV_NAME', 'myanmarbuilddecor.com/');
define('WEB_NAME', 'Myanmararchitectdecor');

if ($_SERVER['SERVER_ADDR']==SERV_IP) {
    define('BASE_HREF', 'http://myanmarbuilddecor.com/');
//    define('BASE_HREF', 'http://203.150.20.151/~myanmararchitectdecor/');
}
else {
    define('BASE_HREF', 'http://myanmarbuilddecor.com/');
}

define('PATH_UPLOADS', 'uploads');

define('FOLDER_AM', 'myanmin');
define('BASE_AM', BASE_HREF.FOLDER_AM);
define('BASE_AM_DEFAULT', BASE_AM.'/shortnews/list_shortnews');

/* End of file constants.php */
/* Location: ./application/config/constants.php */