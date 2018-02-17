<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route = [
    /*** Records ***/
    'records' => 'Records/players',

    // Records compare
    'records/compare/(:num)' => 'Records/compare/$1',
    'records/compare' => 'Records/compare',

    // Records ljsrecs
    'records/longjumps/(:any)' => 'Records/longjumps/$1',
    'records/longjumps' => 'Records/longjumps',

    // Records maps
    'records/maps/(:any)/(:num)' => 'Records/maps/$1/$2',
    'records/maps/(:any)' => 'Records/maps/$1',
    'records/maps' => 'Records/maps',

    'records/map/(:any)' => 'Records/map/$1',
    'records/map' => 'Records/map',

    // Records demos
    'records/demos/(:any)/(:num)' => 'Records/demos/$1/$2',
    'records/demos/(:any)' => 'Records/demos/$1',
    'records/demos' => 'Records/demos',

    // Records players
    'records/players/(:any)/(:num)' => 'Records/players/$1/$2',
    'records/players/(:any)' => 'Records/players/$1',
    'records/players' => 'Records/players',

    'records/player/(:any)/(:any)/(:num)' => 'Records/player/$1/$2/$3',
    'records/player/(:any)/(:any)' => 'Records/player/$1/$2',
    'records/player/(:any)' => 'Records/player/$1',
    'records/player' => 'Records/player',
];
