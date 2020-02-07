#!/usr/bin/php
<?php
    function ft_is_sort($array)
    {
        $sorted = $array;
        sort($sorted);
        foreach ($array as $key=>$element)
            if ($element != $sorted[$key])
                return false;
        return true;
    }
    /*
        This could also be done the easy way:

        $sorted = $array;
        sort($sorted);
        if (array_diff_assoc($sorted, $array) == null)
                return false;
        return true;
    */
?>