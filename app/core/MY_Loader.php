<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * PHP Codeigniter Simplicity
 *
 * Copyright (C) 2013  John Skoumbourdis.
 *
 * GROCERY CRUD LICENSE
 *
 * Codeigniter Simplicity is released with dual licensing, using the GPL v3 and the MIT license.
 * You don't have to do anything special to choose one license or the other and you don't have to notify anyone which license you are using.
 * Please see the corresponding license file for details of these licenses.
 * You are free to use, modify and distribute this software, but all copyright information must remain.
 *
 * @package     Codeigniter Simplicity
 * @copyright   Copyright (c) 2013, John Skoumbourdis
 * @license     https://github.com/scoumbourdis/grocery-crud/blob/master/license-grocery-crud.txt
 * @version     0.6
 * @author      John Skoumbourdis <scoumbourdisj@gmail.com>
 */

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader
{

    public function __construct()
    {
        parent::__construct();
    }
}
