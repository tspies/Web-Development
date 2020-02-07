#!/usr/bin/php
<?php
    $j = 1;

        $num_arr = array();
        $char_upper = array();
        $char_lower = array();
        while ($j < $argc)
        {
            $array = array_filter(explode(" ", $argv[$j]));
            foreach ($array as $element)
            {
                if (ctype_upper($element))
                    array_push($char_upper, $element);
                if (ctype_lower($element))
                    array_push($char_lower, $element);
                else
                    array_push($num_arr, $element);
            }
            $j++;
        }
        array_merge($char_upper, $char_lower);
        natcasesort(array_merge($char_upper, $char_lower));
        sort($num_arr);
        foreach ($char_upper as $Name)
            echo "$Name\n";
        foreach ($char_lower as $name)
            echo "$name\n";
        foreach ($num_arr as $num)
            echo "$num\n";
?>