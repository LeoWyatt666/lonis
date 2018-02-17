<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| HybridAuth settings
| -------------------------------------------------------------------------
| Your HybridAuth config can be specified below.
|
| See: https://github.com/hybridauth/hybridauth/blob/v2/hybridauth/config.php
*/
$config['hybridauth'] = array(
  "providers" => array(
    "OpenID" => array(
      "enabled" => false,
    ),
    "Steam" => array(
      "enabled" => true,
      "keys" => array("key" => getenv('api_steam_key')),
    ),
    "Yandex" => array(
      "enabled" => false,
      "keys" => array("id" => getenv('api_yandex_id'), "secret" => getenv('api_yandex_secret')),
    ),
    "Yahoo" => array(
      "enabled" => false,
      "keys" => array("id" => getenv('api_yahoo_id'), "secret" => getenv('api_yahoo_secret')),
    ),
    "Google" => array(
      "enabled" => false,
      "keys" => array("id" => getenv('api_google_key'), "secret" => getenv('api_google_secret')),
    ),
    "Facebook" => array(
      "enabled" => false,
      "keys" => array("id" => getenv('api_facebook_id'), "secret" => getenv('api_facebook_secret')),
      "trustForwarded" => false,
    ),
    "Twitter" => array(
      "enabled" => false,
      "keys" => array("id" => getenv('api_twitter_id'), "secret" => getenv('api_twitter_secret')),
      "includeEmail" => false,
    ),
    "LinkedIn" => array(
      "enabled" => false,
      "keys" => array("id" => getenv('api_linkedin_id'), "secret" => getenv('api_linkedin_secret')),
    ),
  ),
  // If you want to enable logging, set 'debug_mode' to true.
  // You can also set it to
  // - "error" To log only error messages. Useful in production
  // - "info" To log info and error messages (ignore debug messages)
  "debug_mode" => ENVIRONMENT === 'development',
  // Path to file writable by the web server. Required if 'debug_mode' is not false
  "debug_file" => APPPATH . 'logs/hybridauth.log',
);
