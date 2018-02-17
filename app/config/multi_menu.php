<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['multi_menu'] = [
  'menu_id'               => 'id',
  'menu_label'            => 'name',
  'menu_parent'           => 'parent',
  'menu_icon'                       => 'icon',
  'menu_key'              => 'slug',
  'menu_order'            => 'order',
  
  'nav_tag_open'          => '',
  'nav_tag_close'         => '',
  'item_tag_open'         => '',
  'item_tag_close'        => '',
  'item_anchor'           => '<a class="item" href="%s">%s</a>'."\n\t",
  'parentl1_tag_open'     => '<div class="ui simple dropdown item">'."\n\t",
  'parentl1_tag_close'    => '</div>'."\n\t",
  'parentl1_anchor'         => '%s'."\n\t",
  'parent_tag_open'       => '',
  'parent_tag_close'      => '',
  'parent_anchor_tag'     => '<a class="item" href="%s">%s</a>'."\n\t",
  'children_tag_open'     => '<div class="menu">'."\n\t",
  'children_tag_close'    => '</div>'."\n\t",
  'icon_position'                 => 'left', // 'left' or 'right'
  'menu_icons_list'           => array(),
  // these for the future version
  'icon_img_base_url'         => '',
  'lang_tag_open'         => '<l>',
  'lang_tag_close'        => '</l>',
];
