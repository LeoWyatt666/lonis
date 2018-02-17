<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is default config, vars set in database
 */

$config['site_name'] = getenv('SITE_NAME');
$config['site_title'] = getenv('SITE_TITLE');
$config['site_slogan'] = getenv('SITE_SLOGAN');

$config['avatarSize'] = [
    'avatar' => 32,
    'avatarmedium' => 80,
    'avatarfull' => 150,
];
