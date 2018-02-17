<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route = [
    // Players
    //'cstrike/players/profile/([^0]\d*)' => 'cstrike/players/profile/$1',
    'cstrike/player/([^0]\d*)' => 'Players/player/$1',
    'cstrike/players/([^0]\d*)' => 'Players/index/$1',
    
];
