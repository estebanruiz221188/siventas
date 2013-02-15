<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('niceurl'))
{
    function niceurl ($s_str)
    {
        $s_str = str_replace("á","a", $s_str);
        $s_str = str_replace("é","e", $s_str);
        $s_str = str_replace("í","i", $s_str);
        $s_str = str_replace("ó","o", $s_str);
        $s_str = str_replace("ú","u", $s_str);
        $s_str = str_replace("Á","A", $s_str);
        $s_str = str_replace("É","E", $s_str);
        $s_str = str_replace("Í","I", $s_str);
        $s_str = str_replace("Ó","O", $s_str);
        $s_str = str_replace("Ú","U", $s_str);
        $s_str = str_replace(" ","-", $s_str);
        $s_str = preg_replace('#[^\w^\-]+#', '', $s_str);
        $s_str = strtolower($s_str);
        return $s_str;
    }
}