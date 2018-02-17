<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route = [
    /*** Kreedz ***/
    'kreedz' => 'Kreedz/last',

    // Kreeedz maps
    'kreedz/maps/(all|noob|pro)/([^0]\d*)' => 'Kreedz/maps/$1/$2',
    'kreedz/maps/(all|noob|pro)' => 'Kreedz/maps/$1',
    'kreedz/maps' => 'Kreedz/maps',

    'kreedz/maps/norec/([^0]\d*)' => 'Kreedz/maps_norec/$1',
    'kreedz/maps/norec' => 'Kreedz/maps_norec',

    'kreedz/map/(:any)/(all|noob|pro)/([^0]\d*)' => 'Kreedz/map/$1/$2/$3',
    'kreedz/map/(:any)/(all|noob|pro)' => 'Kreedz/map/$1/$2',
    'kreedz/map/(:any)' => 'Kreedz/map/$1',
    'kreedz/map' => 'Kreedz/map',

    // Kreeedz longjump
    'kreedz/longjumps' => 'Kreedz/longjumps',

    // Kreeedz duels
    'kreedz/duels/([^0]\d*)' => 'Kreedz/duels/$1',
    'kreedz/duels' => 'Kreedz/duels',

    // Kreeedz players
    'kreedz/players/(all|noob|pro)/(all|top1)/([^0]\d*)' => 'Kreedz/players/$1/$2/$3',
    'kreedz/players/(all|noob|pro)/(all|top1)' => 'Kreedz/players/$1/$2/1',
    'kreedz/players/(all|noob|pro)' => 'Kreedz/players/$1',

    'kreedz/player/([^0]\d*)/norec/([^0]\d*)' => 'Kreedz/player_norec/$1/$2',
    'kreedz/player/([^0]\d*)/norec' => 'Kreedz/player_norec/$1/1',

    'kreedz/player/([^0]\d*)/(all|noob|pro)/(all|top1)/([^0]\d*)' => 'Kreedz/player/$1/$2/$3/$4',
    'kreedz/player/([^0]\d*)/(all|noob|pro)/(all|top1)' => 'Kreedz/player/$1/$2/$3',
    'kreedz/player/([^0]\d*)/(all|noob|pro)' => 'Kreedz/player/$1/$2',
    'kreedz/player/([^0]\d*)' => 'Kreedz/player/$1',
    'kreedz/player' => 'Kreedz/player',

    // Kreeedz last
    'kreedz/last/(all|noob|pro)/([^0]\d*)' => 'Kreedz/last/$1/$2',
    'kreedz/last/(all|noob|pro)' => 'Kreedz/last/$1',
    'kreedz/last' => 'Kreedz/last',
];
