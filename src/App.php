<?php
  namespace com\sg_group\pmv\App;

  require ('Request.php');
  require ('Response.php');
  require ('GetRequest.php');
  require ('PostRequest.php');
  require ('HandlersFactory.php');

  use com\sg_group\pmv\Handlers as HttpHandlers;

  class App{
      public $uri;

      public $config;

      public $request;

      public $response;

      public function __construct($uri, $config, $method){
        $this->uri = $uri;
        $this->config = $config;
        $this->request = HttpHandlers\HandlersFactory::getInstance($method);
        $this->response = new HttpHandlers\Response();
      }

      public function get($uri){
          if ($uri === $this->uri){
              $this->response = $this->request->proccess($uri, $this->response);
          }
      }

      public function post($uri){
          if ($this->uri === $uri){
              $this->response = $this->request->proccess($uri, $this->response);
          }
      }

      public function getContent(){
        return $this->response->getContent();
      }
  }
