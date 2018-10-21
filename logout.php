<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 11:11 PM
 */
    session_start();
    if(isset($_SESSION["userId"])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
