<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailgun {

  protected $CI;
  private static $api_key;
  private static $api_base_url;

  public function __construct() {
    // assign CI super object
    $this->CI =& get_instance();

    // config
    self::$api_key = "f81a27c305dcd212235b13b466020ac5-3b1f59cf-5a240ee2";
    self::$api_base_url = "https://api.mailgun.net/v3/mg.clirnetmail.com";
  }

  /**
   * Send mail
   * $mail = array(from, to, subject, text)
   */
  public static function send($mail) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, 'api:' . self::$api_key);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, self::$api_base_url . '/messages');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $mail);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }

}