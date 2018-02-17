<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['pagination'] = [
    'base_url' => '',
    'total_rows' => 15,
    'per_page' => 15,
    'uri_segment' => 0,
    'use_page_numbers' => true,
    'attributes' => ['class' => 'item'],

    'full_tag_open' => '<div class="ui inverted grey pagination menu">',
    'full_tag_close' => '</div>',
    'first_link' => '&lt;&lt;',
    'first_tag_open' => '',
    'first_tag_close' => '',
    'last_link' => '&gt;&gt;',
    'last_tag_open' => '',
    'last_tag_close' => '',
    'next_link' => '&gt;',
    'next_tag_open' => '',
    'next_tag_close' => '',
    'prev_link' => '&lt;',
    'prev_tag_open' => '',
    'prev_tag_close' => '',
    'cur_tag_open' => '<span class="active item">',
    'cur_tag_close' => '</span>',
    'num_tag_open' => '',
    'num_tag_close' => '',
];

/* BS4
$config['pagination'] = [
    'base_url' => '',
    'total_rows' => 15,
    'per_page' => 15,
    'uri_segment' => 0,
    'use_page_numbers' => true,
    'full_tag_open' => '<nav><ul class="pagination justify-content-center">',
    'full_tag_close' => '</ul></nav>',
    'first_link' => '&lt;&lt;',
    'first_tag_open' => '<li class="page-item"><span class="page-link">',
    'first_tag_close' => '</span></li>',
    'last_link' => '&gt;&gt;',
    'last_tag_open' => '<li class="page-item"><span class="page-link">',
    'last_tag_close' => '</span></li>',
    'next_link' => '&gt;',
    'next_tag_open' => '<li class="page-item"><span class="page-link">',
    'next_tag_close' => '<span aria-hidden="true">&raquo;</span></span></li>',
    'prev_link' => '&lt;',
    'prev_tag_open' => '<li class="page-item"><span class="page-link">',
    'prev_tag_close' => '</span></li>',
    'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
    'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
    'num_tag_open' => '<li class="page-item"><span class="page-link">',
    'num_tag_close' => '</span></li>',
];
*/
