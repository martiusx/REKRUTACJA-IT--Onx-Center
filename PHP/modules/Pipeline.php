<?php 
  class Pipeline {
    public static function make(...$functions) {
        return function($arg) use ($functions) {
            foreach ($functions as $func) {
                $arg = $func($arg);
            }
            return $arg;
        };
    }
}

    $pipeline = Pipeline::make(
        function($var) { return $var * 3; },
        function($var) { return $var + 1; },
        function($var) { return $var / 2; }
      );
      
      $res = $pipeline(3);
      echo $res;
?>