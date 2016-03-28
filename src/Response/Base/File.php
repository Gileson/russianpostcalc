<?php
namespace Gileson\RussianPostCalc\Response\Base;

abstract class File {
    protected $url = null;

    function __construct($url) {
        $this->url = $url;
    }

    function getUrl(){
        return $this->url;
    }

    function getFile(){
        return file_get_contents($this->getUrl());
    }

}