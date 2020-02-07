#!/usr/bin/php
<?php
    function ft_split($str)
    {
        $array =  array_values(array_filter((explode(" ", $str))));
        sort($array);
        return ($array);
    }
?>