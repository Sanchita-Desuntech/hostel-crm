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


define('PROFILE_IMAGE_PATH',		FCPATH.'assets/users/profile/');
define('PROFILE_IMAGE_FOLDER',		'assets/user/profile/');

define('PROFILE_IMAGE_THUMB_WIDTH',		'');
define('PROFILE_IMAGE_THUMB_HIGHT',		'');
define('PROFILE_IMAGE_THUMB_SMALL_WIDTH',		150);
define('PROFILE_IMAGE_THUMB_SMALL_HIGHT',		150);
/*
|--------------------------------------------------------------------------
| File Upload paths
|--------------------------------------------------------------------------
*/
define("ABS_PATH", 			$_SERVER['DOCUMENT_ROOT']."/");
define('IMAGE_UPLOAD_PATH',	ABS_PATH.'assets/');
define('NEWSPAPER_IMAGE_UPLOAD_PATH',	IMAGE_UPLOAD_PATH.'newspaper/');
define('BANNER_IMAGE_UPLOAD_PATH',IMAGE_UPLOAD_PATH.'banner/');
define('IMAGE_TYPE_ALLOWED',	'gif|jpg|png|jpeg');
define('EMAIL_FILE_TYPE_ALLOWED',	'jpg|png|jpeg|zip|pdf');
define('VOICE_FILE_TYPE_ALLOWED',	'avi|mp4|mp3');


// in display classified upload image path.
define('DC_TMP_UPLOAD_PATH', ABS_PATH.'assets/dc_tmp');
define('DG_EMAIL_TMP_UPLOAD_PATH', ABS_PATH.'assets/dg_email_tmp');

define('NP_TC_DOCUMENT_UPLOAD_TYPE', 'png|jpg|jpeg|pdf|doc|zip');
define('NP_TC_DOCUMENT_UPLOAD_PATH', ABS_PATH.'user_uploads/newspaper/document');
define('NP_TC_DOCUMENT_UPLOAD_PATH_TMP', ABS_PATH.'user_uploads/newspaper/document/tmp');



define('DIGITAL_SMS_CONTACT_UPLOAD_PATH', ABS_PATH.'user_uploads/digital/sms/csv');
define('DIGITAL_VOICE_CONTACT_UPLOAD_PATH', ABS_PATH.'user_uploads/digital/voice/csv');
define('DIGITAL_SMS_CONTACT_UPLOAD_TYPE', 'csv|xlsx');
define('DIGITAL_EMAIL_CONTENT_UPLOAD_PATH', ABS_PATH.'user_uploads/digital/email/files');
define('DIGITAL_EMAIL_CONTENT_UPLOAD_TYPE', 'html|png|jpg|jpeg|gif|htm|zip');
define('DIGITAL_VOICE_CONTENT_UPLOAD_PATH', ABS_PATH.'user_uploads/digital/voice/files');
define('DIGITAL_VOICE_CONTENT_UPLOAD_TYPE', 'html|png|jpg|jpeg|gif|htm|zip');

/*
|--------------------------------------------------------------------------
| Date Time
|--------------------------------------------------------------------------
*/
define('VIEW_DATE_FORMATE',	'd/m/Y');

/*
|--------------------------------------------------------------------------
| Custom Constants (origin)
|--------------------------------------------------------------------------
*/
define('TOP_MENU',	'1');
define('HOME_CATEGORY',	'2');
define('HOME_BANNER',	'3');
define('NP_DETAIL',	'4');

/*
|--------------------------------------------------------------------------
| Title & metadata Constants on the functions page
|--------------------------------------------------------------------------
*/
define('SELECTION_PAGE_TITLE',	'Bookallads | Bookallads');
define('SELECTION_PAGE_META_DES',	'Bookallads | Bookallads');
define('SELECTION_PAGE_META_KEY',	'Bookallads | Bookallads');


define('TAX_NP',5);
define('TAX_DIGITAL',18);

define('COD_CHARGE',70);
define('COD_MIN_ORDER_AMOUNT',5000);
define('NP_DESIGN_ASSISTANCE_VALUE',999);
define('DIGITAL_EMAIL_DESIGN_ASSISTANCE_VALUE',999);
define('DIGITAL_VOICE_DESIGN_ASSISTANCE_VALUE',1999);


/* End of file constants.php *//* Location: ./application/config/constants.php */