<?php
    ob_start();
    print "Hello First!\n";
    ob_end_clean();

    ob_start();
    print "Hello Second!\n";
    ob_end_flush();

    ob_start();
    print "Hello Third!\n";
?>