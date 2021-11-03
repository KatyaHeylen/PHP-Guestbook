<?php


class PostLoader
{
private $allPosts = [];
private $postsToPublish = [];

    /**
     * @param array $allPosts
     * @param array $postsToPublish
     */
    public function __construct(array $allPosts, array $postsToPublish)
    {
        $this->allPosts = $allPosts;
        $this->postsToPublish = $postsToPublish;
    }

    /**
     * @return array
     */
    public function getAllPosts(): array
    {
        return $this->allPosts;
    }

    /**
     * @return array
     */
    public function getPostsToPublish(): array
    {
        return $this->postsToPublish;
    }



}