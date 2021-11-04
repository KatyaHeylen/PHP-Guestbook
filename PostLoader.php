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
            $data = [];
            $data["title"] = $_POST['title'];
            $entries[] = json_decode(file_get_contents("msgs.json"));
            array_unshift($entries, $data);
            file_put_contents("msgs.json", json_encode($entries));
        }
    }

    public function getPostFromFile()
    {
        $stringOfPosts = file_get_contents('./msgs.json');
        $arrayOfPosts = json_decode($stringOfPosts, true);
        var_dump($arrayOfPosts[0]);
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
