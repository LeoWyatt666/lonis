<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|   https://codeigniter.com/user_guide/general/hooks.html
|
*/

// MAIN HOOKs
$hook['pre_system'][] = array(
    'class'    => 'main_hook',
    'function' => 'pre_system',
    'filename' => 'main_hook.php',
    'filepath' => 'hooks',
    'params'   => [],
);

$hook['post_system'][] = array(
    'class'    => 'main_hook',
    'function' => 'post_system',
    'filename' => 'main_hook.php',
    'filepath' => 'hooks',
    'params'   => [],
);

$hook['pre_controller'][] = array(
    'class'    => 'main_hook',
    'function' => 'pre_controller',
    'filename' => 'main_hook.php',
    'filepath' => 'hooks',
    'params'   => [],
);

$hook['post_controller'][] = array(
    'class'    => 'main_hook',
    'function' => 'post_controller',
    'filename' => 'main_hook.php',
    'filepath' => 'hooks',
    'params'   => [],
);

// Other HOOKs
// $hook['display_override'][] = array(
//     'class' => 'Minifyhtml',
//     'function' => 'output',
//     'filename' => 'Minifyhtml.php',
//     'filepath' => 'hooks',
//     'params' => []
// );
