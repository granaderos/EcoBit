<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 1:35 PM
 */

include_once "DatabaseConnector.php";
session_start();
class Functions extends DatabaseConnector {
    function addUser($firstname, $lastname, $email, $password) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO users VALUES (null, ?, ?, ?, password(?));");
        $sql->execute(array($firstname, $lastname, $email, $password));

        $this->closeConnection();
    }

    function logIn($email, $password) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT * FROM users WHERE email = ?;");
        $sql->execute(array($email));

        if($sql->fetch()) {
            $sql = $this->dbHolder->prepare("SELECT * FROM users WHERE email = ? AND password = password(?);");
            $sql->execute($email, $password);
            if($sql->fetch()) {
                echo "valid";
            } else echo "Invalid password.";

        } else echo "Invalid email.";

        $this->closeConnection();
    }

    function getCurrentUserData($email, $password) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT * FROM users WHERE email =  AND password = $password(?);");
        $sql->execute($email, $password);
        $data = $sql->fetch();

        $_SESSION["userId"] = $data[0];
        $_SESSION["firstname"] = $data[1];
        $_SESSION["lastname"] = $data[2];
        $_SESSION["email"] = $data[3];
        $_SESSION["password"] = $data[4];

        $this->closeConnection();
    }

    function addPost($title, $content, $photo) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO posts VALUES (null, ?, ?, ?, ?, ?);");
        $sql->execute(array($_SESSION["userId"],nl2br(htmlentities($title)), nl2br(htmlentities($content))), $photo, $this->getCurrentDate());

        $this->closeConnection();
    }

    function addComment($postId, $comment) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO comments VALUES (null, ?, ?, ?);");
        $sql->execute(array($postId, $_SESSION["userId"], nl2br(htmlentities($comment))));

        $this->closeConnection();
    }

    function likePost($postId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO likes VALUES (null, ?, ?);");
        $sql->execute(array($postId, $_SESSION["userId"]));

        $this->closeConnection();
    }

    function sendMessage($receiverId, $message) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO messages VALUES (null, ?, ?, ?, ?);");
        $sql->execute(array($_SESSION["userId"], $receiverId, nl2br(htmlentities($message)), $this->getCurrentDate()));

        $this->closeConnection();
    }

    function getCurrentDate() {
        $this->openConnection();

        $sql = $this->dbHolder0>query("SELECT curdate();");
        $date =  $sql->fetch();

        $this->closeConnection();
        return $date;
    }

    function updateMessageStatus($messageId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("UPDATE messages SET status = 1 WHERE messageId = ?;");
        $sql->execute(array($messageId));

        $this->closeConnection();
    }

    function getPosts() {
        $this->openConnection();

        $sqlPost = $this->dbHolder->query("SELECT u.firstname, u.lastname, p.* FROM users u, posts p WHERE u.userId = p.userId ORDER BY p.datePosted, p.totalLikes;");

        $data = "";

        while($posts = $sqlPost->fetch()) {

            $sqlLikes = $this->dbHolder->prepare("SELECT count(*) FROM likes WHERE postId = ?;");
            $sqlLikes->execute(array($posts[2]));
            $numOfLikes = $sqlLikes->fetch();

            $sqlComments = $this->dbHolder->prepare("SELECT count(*) FROM comments WHERE postId = ?;");
            $sqlComments->execute(array($posts[2]));
            $numOfComments = $sqlComments->fetch();

            $data .= "<div>
                        <img src='../photos/".$posts[6]."' />
                        <label>Author:</label>".$posts[0]." ".$posts[1]."<br />
                        <label>Title:</label>".$posts[4]."<br />
                        <label>Likes:</label>".$numOfLikes[0]."
                        <label>Comments:</label>".$numOfComments[0]."
                      </div>";
        }

        $this->closeConnection();
    }


} 