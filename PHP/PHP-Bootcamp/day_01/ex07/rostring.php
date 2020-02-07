#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $array = array_values(array_filter(explode(" ", $argv[1])));
        $num = count($array);
        $array[$num] = $array[0];
        unset($array[0]);
        $full = "";
        foreach ($array as $name)
            $full .= $name." ";
        print trim("$full")."\n";
    }
?>