<?php

if (! function_exists('f_rand')) {
    function f_rand($min, $max, int $decimals = 0)
    {
        $scale = pow(10, $decimals);
        return mt_rand($min * $scale, $max * $scale) / $scale;
    }
}
