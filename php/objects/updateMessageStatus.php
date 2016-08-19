<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 2:44 PM
 */

    include_once "../controller/Functions.php";

    $messageId = $_POST["messaged"];

    $obj = new Functions();
    $obj->updateMessageStatus($messageId);