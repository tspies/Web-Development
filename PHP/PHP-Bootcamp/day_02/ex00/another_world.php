#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $array = array_values(array_filter(preg_split("/[\s,]+/", $argv[1])));
        $full = "";
        foreach ($array as $half)
            $full .= $half." ";
        echo trim($full)."\n";
    }
?>