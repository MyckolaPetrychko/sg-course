<?php
  namespace  com\sg_group\pmv\Handlers;

  use  com\sg_group\pmv\Handlers as ParentRequest;

  class GetRequest implements ParentRequest\Request{

      public function __construct(){}

      public function proccess($uri, $response){
          if ($uri === '/'){
            $uri_tmp = '../' . VIEWS_DIR . '/home.html';
            $response->setContent($uri_tmp);
          }else{
            $uri_tmp = '../' . VIEWS_DIR . $uri . '.html';
            if (file_exists($uri_tmp)){
              $response->setContent($uri_tmp);
            }else{
              $uri = '../' . VIEWS_DIR . $uri . '.php';
              $response->setContent($uri);
            }

          }
          return $response;
      }

  }
