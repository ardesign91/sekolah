<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CMS Sekolahku | CMS (Content Management System) dan PPDB/PMB Online GRATIS
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    2.4.9
 * @author     Anton Sofyan | https://facebook.com/antonsofyan | 4ntonsofyan@gmail.com | 0857 5988 8922
 * @copyright  (c) 2014-2020
 * @link       https://sekolahku.web.id
 *
 * PERINGATAN :
 * 1. TIDAK DIPERKENANKAN MENGGUNAKAN CMS INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 2. TIDAK DIPERKENANKAN MEMPERJUALBELIKAN APLIKASI INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 3. TIDAK DIPERKENANKAN MENGHAPUS KODE SUMBER APLIKASI.
 */

class Recaptcha {

   /**
    * Reference to CodeIgniter instance
    *
    * @var object
    */
   protected $CI;

   /**
    * @var siteVerifyURL
    * @access private
    */
   private $siteVerifyURL = "https://www.google.com/recaptcha/api/siteverify?";

   /**
    * @var secret_key
    * @access private
    */
   private $secret_key;

   /**
    * @var site_key
    * @access private
    */
   private $site_key;

   /**
    * @var _version
    * @access private
    */
   private $_version = "php_1.0";

   /**
    * Class Constructor
    *
    * @return Void
    */
   public function __construct() {
      $this->CI = & get_instance();
      $this->site_key = __session('recaptcha_site_key');
      $this->secret_key = __session('recaptcha_secret_key');
      if ( ! $this->site_key || ! $this->secret_key ) {
         die("Recaptcha site key dan secret key belum diatur. Silahkan masuk ke menu Pengaturan / Umum.");
      }
   }

   /**
    * Function for verifying user's input
    * @param string $response User's input
    * @param string $remoteIp Remote IP you wish to send to reCAPTCHA, if NULL $this->input->ip_address() will be called
    * @return Array Array of response
    */
   public function verifyResponse($response, $remoteIp = NULL) {
      if ($response == NULL || strlen($response) == 0) {
         $response = [
            'success' => FALSE,
            'error_codes' => 'missing-input'
         ];
      }
      $getResponse = $this->_submitHttpGet(
         $this->siteVerifyURL, [
            'secret' => $this->secret_key,
            'remoteip' => (!is_null($remoteIp)) ? $remoteIp : $this->CI->input->ip_address(),
            'v' => $this->_version,
            'response' => $response
         ]
      );
      $res = json_decode($getResponse, TRUE);
      if ($res['success']) {
         $response = [
            'success' => TRUE,
            'error_codes' => ''
         ];
      } else {
         $response = [
            'success' => FALSE,
            'error_codes' => $res['error-codes']
         ];
      }
      return $response;
   }

   /**
    * HTTP GET to communicate with reCAPTCHA server
    * @param String $path
    * @param Array $data
    * @return String JSON
    */
   private function _submitHTTPGet($path, $data) {
      $req = $this->_encodeQS($data);
      $response = file_get_contents($path . $req);
      return $response;
   }

   /**
    * Function to convert an array into query string
    * @param Array $data Array of params
    * @return String query string of parameters
    */
   private function _encodeQS($data) {
      $req = "";
      foreach ($data as $key => $value) {
         $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
      }
      return substr($req, 0, strlen($req) - 1);
   }
}
