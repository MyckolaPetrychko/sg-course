<?php
  namespace  com\sg_group\pmv\Handlers;

  use  com\sg_group\pmv\Handlers as ParentRequest;

  class GetRequest implements ParentRequest\Request{

      public function __construct(){}

      public function proccess($uri, $response){
          if ($uri === '/'){
            $uri = '../' . VIEWS_DIR . '/home.html';
            $response->setContent($uri);
          }else{
            $uri = '../' . VIEWS_DIR . $uri . '.html';
            $response->setContent($uri);
          }
          return $response;
      }

  }
