<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/17/15
 * Time: 10:15 AM
 */

class Upload
{
    protected $id;
    protected $file;
    protected $ip;
    protected $datetime;
    protected $hits = 0;
    protected $agent;
    protected $extension;


    public function __construct()
    {
        $this->agent = $_SERVER["HTTP_USER_AGENT"];
        $this->ip    = $_SERVER["REMOTE_ADDR"];
        $this->datetime = new DateTime();
    }

    public function increaseHits()
    {
        $this->hits++;
    }

    //Getters
    public function getId()
    {
        return $this->id;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    public function getHits()
    {
        return $this->hits;
    }

    public function getAgent()
    {
        return $this->agent;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    //Setter
    public function setFile($file)
    {
        $this->file = $file;
    }

    public function setExtension($extension)
    {
        $this->file = $extension;
    }
} 