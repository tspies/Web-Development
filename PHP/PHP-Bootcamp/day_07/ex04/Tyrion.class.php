<?php
    class Tyrion
    {
        public function sleepWith($name)
        {
            if ($name instanceof Sansa)
                print("Let's do this.".PHP_EOL); 
            else
            print ("Not even if I'm drunk !" . PHP_EOL);   
        }
    }
?>