#!/usr/bin/php
<?php

    if ($argc == 2)
    {
        function check_value_format($hour, $min, $sec, $mon, $day, $year)
        {
            if (($hour == NULL || $min == NULL || $sec == NULL || $mon == NULL || $day == NULL || $year == NULL))
                return false;
            return  true;
        }
        date_default_timezone_set('Europe/Paris');

        $date_data = explode(" ", $argv[1]);
        $time_data = explode(":", $date_data[4]);
        print_r($date_data);
        print_r($time_data);

        $months = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
        $month_num = (array_search(strtolower($date_data[2]), $months) ) + 1;

        $full_data['seconds'] = NULL;
        $full_data['minutes'] = NULL;
        $full_data['hours'] = NULL;

        $full_data['day'] = NULL;
        $full_data['month'] = NULL;
        $full_data['year'] = NULL;

        $full_data['seconds'] = $time_data[2];
        $full_data['minutes'] = $time_data[1];
        $full_data['hours'] = $time_data[0];

        $full_data['day'] = $date_data[1];
        $full_data['month'] = $month_num;
        $full_data['year'] = $date_data[3];

        if (!(checkdate($full_data['month'], $full_data['day'], $full_data['year'])))
        {
            echo "Wrong Format\n";
            exit();
        }

        if (!check_value_format($full_data['hours'], $full_data['minutes'], $full_data['seconds'], $full_data['month'], $full_data['day'], $full_data['year']))
        {
            echo "Wrong Format\n";
            exit();
        }
        $time_in_seconds = mktime($full_data['hours'], $full_data['minutes'], $full_data['seconds'], $full_data['month'], $full_data['day'], $full_data['year']);
        if ($time_in_seconds)
        {
            $time_in_seconds .= "\n";
            print_r($time_in_seconds);
        }
        else if ($argv[1])
            echo "Wrong Format\n";
    }
?>