#!/usr/bin/php
<?php 
while (1)
{
        echo "Enter a number: ";
        $input = trim(fgets(STDIN));
        if (feof(STDIN))
		{
			echo "\n";
			exit();
		}
        if (!is_numeric($input))
            print "'$input' is not a number\n";
        else
        {
            if ($input % 2 == 0 || $input == 0)
                print "The number $input is even\n";
            else
                print "The number $input is odd\n";
        }
}
?>