<?php

namespace App\Helpers;


if (!function_exists('cleanslug')) {
    function cleanslug($string, $delimiter = '-')
    {
        $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
        $string = strtolower(trim(preg_replace("/[\/_|+ -]+/", $delimiter, $string), $delimiter));
        return $string;
    }
}


