<?php
  namespace com\sg_group\pmv\Handlers;

  use com\sg_group\pmv\Handlers as HttpHandlers;

  class HandlersFactory {
      public static function getInstance($method){
        switch($method){
          case "GET":
            return new HttpHandlers\GetRequest();
          break;
          case "POST":
              return new HttpHandlers\PostRequest();
          break;
          default:
            return NULL;
          break;
        }
      }
  }
