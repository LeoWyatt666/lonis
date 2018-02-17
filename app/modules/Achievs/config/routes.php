<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route = [
    'achievs/([^0]\d*)' => 'Achievs/index/$1',
    'achievs' => 'Achievs/index/1',

    'achievs/achiev/(([^0]\d*))/([^0]\d*)' => 'Achievs/achiev/$1/$2',
    'achievs/achiev/(([^0]\d*))' => 'Achievs/achiev/$1/1',
    'achievs/achiev' => 'Achievs/achiev',

    'achievs/player/([^0]\d*)/([^0]\d*)' => 'Achievs/player/$1/$2',
    'achievs/player/([^0]\d*)' => 'Achievs/player/$1',
    'achievs/player' => 'Achievs/player/1',

    'achievs/players/([^0]\d*)' => 'Achievs/players/$1',
    'achievs/players' => 'Achievs/players/1',
];
