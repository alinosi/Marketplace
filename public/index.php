<?php 
if (!session_id()) session_start();
    require_once '../app/init.php';

    use app\core\App as App; 

    // $test = new Controller;
    // echo $test->tes();
    // echo "<br>";
    new App; 
