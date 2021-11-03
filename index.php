<?php

declare(strict_types=1);

require "Post.php";
require "PostLoader.php";

session_start();

//$post = new Post(isset($_POST['title']), isset($_POST['message']), isset($_POST['name']),isset($_POST['date']));

function whatIsHappening() {
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
whatIsHappening();

if (isset($_POST['title']) && isset($_POST['message']) && isset($_POST['name'])) {
    $myfile = fopen("msgs.txt", "a+");
    $txt = "Title : " .$_POST['title']. " => Message : " . $_POST['message']. " => Author : " .$_POST['name']. " => Date : " . date('d-m-y h:i:s')." => ";
    fwrite($myfile, $txt);
    fclose($myfile);
}

$stringFile = file_get_contents("./msgs.txt", true);
$parsedPosts = json_decode($stringFile, true);
$allPosts[] = $parsedPosts;
var_dump($allPosts);

//
//if (isset($_POST['title']) || isset($_POST['message']) || isset($_POST['name']) || isset($_POST['date']) && (isset($_POST["submit"])) ) {
//    $_SESSION['title'] = htmlentities($_POST['title']);
//    $_SESSION['message'] = htmlentities($_POST['message']);
//    $_SESSION['name'] = htmlentities($_POST['name']);
////  $_SESSION['date'] = htmlentities($_POST['date']);
//}


?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Guestbook</title>
</head>
<body>
<!--input form for collecting messages-->
<form method="post" action="">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control"/>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="message">leave your message here</label>
            <input type="text" id="message" name="message" class="form-control"/>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Your name</label>
            <input type="text" id="name" name="name" class="form-control"/>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
<!--output current message-->
<section id="your message" class="col">
    <h4>Your message</h4>
    <h6><?php if (isset($_POST["title"])) {
            echo $_POST["title"];
        } ?></h6>
    <p><em><?php if (isset($_POST["message"])) {
        echo $_POST["message"];
        } ?></em></p>
    <p><?php if (isset($_POST["name"])) {
            echo $_POST["name"];
        } ?></p>
   <p><?php $date = date('d-m-y h:i:s');
       echo $date;
       ?></p>
</section>
<!--output all messages-->
<section id="allmessages" class="col">
    <h4>All reviews</h4>
    <h6></h6>
    <p><em></em></p>
    <p></p>
    <p></p>
</section>
</body>
</html>
<?php
session_destroy(); ?>
