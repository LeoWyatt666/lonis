<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (! function_exists('lang')) {
    /* translate helper */
    function lang($line)
    {
        global $LANG;
        return ($t = $LANG->line($line)) ? $t : $line;
    }
}
