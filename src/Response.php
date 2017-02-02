<?php
  namespace com\sg_group\pmv\Handlers;

  class Response{

    private $response;

    private $document;

    public function getContent(){
      return $this->response;
    }

    public function setContent($uri){
        $this->response = ($uri);
    }

    public function getDocument(){
      return $this->document;
    }

    public function setDocument($uri){
        $this->document = $uri;
    }

  }
