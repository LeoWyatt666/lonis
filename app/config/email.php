<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is default config, vars set in database
 */

$config = [
    'protocol'      => getenv('MAIL_DRIVER'),
    'smtp_host'     => getenv('MAIL_HOST'),
    'smtp_port'     => getenv('MAIL_PORT'),
    'smtp_timeout'  => '7',
    'smtp_user'     => getenv('MAIL_USERNAME'),
    'smtp_pass'     => getenv('MAIL_PASSWORD'),
    'smtp_crypto'   => getenv('MAIL_ENCRYPTION'),
    'newline'       => "\r\n",
    'mailtype'      => 'text', // or html
    'validation'    => TRUE, // bool whether to validate email or not      
];
