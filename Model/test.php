<?php
// testing command line execution
// C:\xampp\htdocs>php testPatterns\Model\test.php arg1=theFirst


//      var_dump($argv);

//      array(2) {
//        [0]=>
//        string(27) "testPatterns\Model\test.php"
//        [1]=>
//        string(13) "arg1=theFirst"

        foreach ( $_SERVER['argv'] as $arg ) {
          if (strpos( $arg, '=' ) ) {
            list( $key, $val ) = explode( '=', $arg );
            echo "$key $val \n";
          }
        }

//      arg1 theFirst

 ?>
