<?php
  namespace com\sg_group\pmv\Handlers;

  class Response{

    private $response;

    public function getContent(){
      return $this->response;
    }

    public function setContent($uri){
        $this->response = file_get_contents($uri);
    }

  }
