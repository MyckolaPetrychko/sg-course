<?php
  namespace com\sg_group\pmv\Handlers;

  use com\sg_group\pmv\Handlers as ParentHandlers;

  class PostRequest implements Request{

        public function __construct(){}

        public function proccess($uri, $response){
            if ($uri === '/auth'){
              if ($_POST['username'] === 'test' && $_POST['password'] === '123'){
                  $_SESSION['user'] = $_POST['username'];
                  $_SESSION['password'] = md5($_POST['password']);
                  exit(header("Location: /user"));
              }
            }
        }

        public function authentification(){
            if ($_POST['username'] === 'test' && $_POST['password'] === '123'){
                session_start();
                $_SESSION['user'] = $_POST['username'];
                $_SESSION['password'] = md5($_POST['password']);
            }
        }
  }
