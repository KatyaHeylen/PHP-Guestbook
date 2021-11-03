<?php

class Post
{
    private $title;
    private $message;
    private $clientName;
    private $date;

    /**
     * @param $title
     * @param $clientName
     * @param $message
     * @param $date
     */
    public function __construct(array $title, $clientName, $message, $date)
    {
        $this->title = $title;
        $this->clientName = $clientName;
        $this->message = $message;
        $this->date = date('d-m-y h:i:s');
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }



}