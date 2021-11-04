<?php


class PostLoader
{
    private array $entries;

    /**
     * @param array $post
     */
    public function __construct(array $post)
    {
        $this->post = $post;
    }

    public function putPostToFile()
    {
        if (isset($_POST['title']) && isset($_POST['message']) && isset($_POST['name'])) {
            $data = $_POST['title'] . ": " . $_POST['message'] . " Author: " . $_POST['name'] . " " . "Date: " . date("Y-m-d H:i:s") . " ";
            $entries[] = json_decode(file_get_contents("msgs.json"));
            array_unshift($entries, $data);
            file_put_contents("msgs.json", json_encode($entries));
        }
    }

    public function getPostFromFile()
    {
        $stringOfPosts = file_get_contents('./msgs.json');
        $arrayOfPosts = json_decode($stringOfPosts, true);
        var_dump($arrayOfPosts);
//        foreach ($arrayOfPosts AS $ofPost) {
//            echo $ofPost . "<br>";
//        }
    }
}
//    $i = 0;
//    do {
//        echo $arrayOfPosts[$i] . "<br/>";
//            $i++;
//        }
//        while ($i < count($arrayOfPosts) == 20);
//    }
