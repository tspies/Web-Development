#!/usr/bin/php
<?php
    $i = $argc;
    $j = 1;
    
    if ($i > 1)
    {
        $full = "";
        while ($j < $i)
        {
            $array = array_values(array_filter(explode(" ", $argv[$j])));
            foreach ($array as $half)
                $full .= $half." ";
            $j++;
        }
        $array = array_values(array_filter(explode(" ", $full)));
        sort ($array);
        foreach ($array as $name)
            echo "$name\n";
    }
?>