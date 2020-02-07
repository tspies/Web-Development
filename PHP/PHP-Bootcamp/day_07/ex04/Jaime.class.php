<?php
    class Jaime
    {
        public function sleepWith($name)
        {
            if ($name instanceof Sansa)
                print("Let's do this.".PHP_EOL);
            else if ($name instanceof Cersei)
                print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
            else
                print ("Not even if I'm drunk !" . PHP_EOL);
        }
    }
?>