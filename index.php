<?php

declare(strict_types=1);

require "Post.php";
require "PostLoader.php";

function whatIsHappening() {
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
   }
whatIsHappening();

$post = new Post();
if (isset($_POST['title']) && isset($_POST['message']) && isset($_POST['name'])) {
    $post->setTitle($_POST["title"]);
    $post->setMessage($_POST["message"]);
    $post->setName($_POST["name"]);
}

$postloader = new PostLoader ((array) $post);

$postloader->putPostToFile();

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

<h1>Guestbook</h1>

<?php echo $post->getDate()->format('Y-m-d H:i:s');?>

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

    <h6><?php echo $post->getTitle();
        ?></h6>
    <p><em><?php echo $post->getMessage();
    ?></em></p>
    <p><?php echo $post->getName();?></p>

    <hr>

</section>
<!--output all messages-->
<section id="allmessages" class="col">
    <h4>All reviews</h4>
    <ol>
        <li><?php $postloader->getPostFromFile(); ?></li>
    </ol>
</section>
</body>
</html>

