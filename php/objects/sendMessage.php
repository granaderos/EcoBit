<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 2:05 PM
 */

    include_once "../controller/Functions.php";

    $receiverId = $_POST["receiverId"];
    $message = $_POST["message"];

    $obj = new Functions();
    $obj->sendMessage($receiverId, $message);