<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (! function_exists('redirect_back')) {
    function redirect_back()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        } else {
            header('Location: '.base_url());
        }
        exit;
    }
}

if (! function_exists('array_join')) {
    function array_join()
    {
        $args = func_get_args();

        if (count($args) < 2) {
            return false;
        }

        $ret = [];
        foreach ($args as $arg) {
            foreach ($arg as $val) {
                $ret[] = $val;
            }
        }

        return $ret;
    }
}

if (! function_exists('pp')) {
    function pp($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}

if (! function_exists('ppd')) {
    function ppd($var)
    {
        pp($var);
        die();
    }
}

if (! function_exists('timed')) {
    // Time format ##:##.##
    function timed($ftime, $pad = 0)
    {
        if (!$ftime) {
            return "";
        }

        $min = floor($ftime/60);
        $sec = $ftime%60;
        $ms = $ftime * pow(10, $pad) % pow(10, $pad);
        if ($min < 10) {
            $min = '0'.$min;
        }
        if ($sec < 10) {
            $sec = '0'.$sec;
        }
        if ($ms < pow(10, $pad-1) && $ms!=0) {
            $ms = '0'.$ms;
        }
        $ms = str_pad($ms, $pad, '0');

        return $min.':'.$sec.'.'.$ms;
    }
}

if (! function_exists('time_elasped')) {
    // Elasped time
    function time_elasped($time)
    {
        $sec = $time%60;
        $mins = floor($time/60);
        $min = $mins%60;
        $hours = floor($mins/60);
        $hour = $hours%24;
        $days = floor($hours/24);
        $day = $days%365;
        $year = floor($days/365);

        $out = "{$year}y {$day}d {$hour}h {$min}m {$sec}s";

        return $out;
    }
}

/**
 * replace path
 *
 * @access  public
 * @param   string  asset url
 * @return  string
 */

if (! function_exists('image')) {
    function image($image = '')
    {
        $ci =& get_instance();
        $path = 'assets/images/';
        $image = $path.$image;
        return file_exists(FCPATH.$image) ? base_url($image) : $path.'noimage.jpg';
    }

}

if (! function_exists('image')) {
    function get_childs(&$array, $id)
    {
        static $childs=[];
        static $allkey=[];
        if (!array_key_exists($id, $array)) {
            return false;
        }
        foreach ($array[$id] as $value) {
            $childs[$id] = $array[$id];
            if (!in_array($value, $allkey)) {
                $allkey[]=$value;
                get_childs($array, $value);
            }
        }
        return $childs;
    }
}