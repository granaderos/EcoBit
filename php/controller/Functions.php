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
            $sql2 = $this->dbHolder->prepare("SELECT * FROM users WHERE email = ? AND password = password(?);");
            $sql2->execute(array($email, $password));
            if($sql2->fetch()) {
                echo "valid";
                $this->getCurrentUserData($email, $password);
            } else echo "Invalid password.";

        } else echo "Invalid email.";

        $this->closeConnection();
    }

    function getCurrentUserData($email, $password) {
        //$this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT * FROM users WHERE email = ? AND password = password(?);");
        $sql->execute(array($email, $password));
        $data = $sql->fetch();

        $_SESSION["userId"] = $data[0];
        $_SESSION["firstname"] = $data[1];
        $_SESSION["lastname"] = $data[2];
        $_SESSION["email"] = $data[3];
        $_SESSION["password"] = $data[4];
        //echo " id noe is = ".$_SESSION["userId"];
        //$this->closeConnection();
    }

    function addPost($title, $content, $photo) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("INSERT INTO posts VALUES (null, ?, ?, ?, ?, ?, 0);");
        $sql->execute(array($_SESSION["userId"], nl2br(htmlentities($title)), nl2br(htmlentities($content)), $photo, $this->getCurrentDate()));

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

        $sql = $this->dbHolder->query("SELECT curdate();");
        $date =  $sql->fetch();

        $this->closeConnection();
        return $date[0];
    }

    function updateMessageStatus($messageId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("UPDATE messages SET status = 1 WHERE messageId = ?;");
        $sql->execute(array($messageId));

        $this->closeConnection();
    }

    function displayPosts() {
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

            $data .= "<div class='panel panel-info'>
                            <div class='panel-body'>
                                <div class='col-lg-3'>
                                    <img class='img-responsive' src='images/".$posts[6]."' alt=''>
                                </div>
                                <div class='col-lg-9'>
                                    <div class='caption-full'>
                                        <h4 class='pull-right'><span></span></h4>
                                        <h4 class='section-lead''>Author: <a href=''>".$posts[0]." ".$posts[1]."</a></h4>
                        <h4 class='section-lead'>Title: <a href='#' onclick='displayFullPost(".$posts[2].")'>".$posts[4]."</a></h4>

                                        <p>".$posts[5]."</p>

                                        <div class='pull-left'>
                                            <p>
                                                <span class='badge'>".$numOfLikes[0]."</span> Likes <span class='badge'>".$numOfComments[0]."</span> Comments
                                            </p>
                                        </div>
                                        <div class='pull-right'>
                                            <p>
                                                <span class='glyphicon glyphicon-star'></span>
                                                <span class='glyphicon glyphicon-star'></span>
                                                <span class='glyphicon glyphicon-star''></span>
                                                <span class='glyphicon glyphicon-star'></span>
                                                <span class='glyphicon glyphicon-star-empty'></span>
                        4.0 stars &nbsp;3 reviews
                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
        }

        echo $data;

        $this->closeConnection();
    }

    function displayFullPost($postId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT u.firstname, u.lastname, p.* FROM users u, posts p WHERE u.userId = p.userId AND p.postId = ?;");
        $sql->execute(array($postId));

        $postData = $sql->fetch();

        $data = "<div >
                        <img src='../photos/".$postData[6]."' />
                        <label>Author:</label>".$postData[0]." ".$postData[1]."<br />
                        <label>Title:</label><span onclick='displayFullPost(".$postData[2].")'>".$postData[4]."</span>
                        <p>".$postData[5]."</p>
                        <span onmouseover='displayLikers(".$postId.")'><label>Likes:</label>".$postData[0]."</span>
                        <label>Comments</label>";
        $sqlComments = $this->dbHolder->prepare("SELECT u.firstname, u.lastname, c.* FROM users u, comments c WHERE u.userId = c.userId AND c.postId = ?;");
        $sqlComments->execute(array($postId));

        while($commentData = $sqlComments->fetch()) {
            $data .= "<div>
                            <div>
                                <label>".$commentData[0]." ".$commentData[1]."</label><br />
                                <p>".$commentData[5]."<br />".$commentData[6]."</p>
                            ";
        }

        $data.="<p><input type='text' id='newComment' /><button class='btn btn-primary' onclick='addComment(".$postId.")'comment</button></p></div></div></div>";

        echo $data;
        $this->closeConnection();
    }

    function displayLikers($postId) {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT u.firstname, u.lastname, l.* FROM users u, likes l WHERE u.userId = l.userId AND l.postId = ?;");
        $sql->execute(array($postId));
        $data = "<ul>";
        while($likeData = $sql->fetch()) {
            $data .= "<li>".$likeData[0]." ".$likeData[1]."</li>";
        }
        $data .= "</ul>";

        echo $data;
        $this->closeConnection();
    }

    function getMessages() {
        $this->openConnection();

        $sql = $this->dbHolder->prepare("SELECT u.firstname, u.lastname FROM users u, messages m WHERE u.userId = m.senderId AND m.receiverId = ?;");
        $sql->execute(array($_SESSION["userId"]));

        $data = "";
        $class = "";

        while($messages = $sql->fetch()) {
            if($messages[7] == 1) { // It means the messages' already seen
                $class = "unseenMessage";
            } else { // message still unseen
                $class = "seenMessage";
            }
            $data .= "<div class='".$class."'>
                            <label>From:</label><span>".$messages[0]." ".$messages[1]."</span><br />
                            <p>".$messages[5]."<br />".$messages[6]."</p>
                      </div>";
        }
        echo $data;
        $this->closeConnection();
    }
} 