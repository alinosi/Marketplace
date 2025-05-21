<?php 
if (!session_id()) session_start();
    require_once '../app/init.php';
    require_once '../vendor/autoload.php'; // sesuaikan path kalau bukan di public/

    use app\core\App as App; 

    // $test = new Controller;
    // echo $test->tes();
    // echo "<br>";
    new App; 
