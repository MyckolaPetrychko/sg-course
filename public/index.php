<?php
  require ('../src/App.php');
  require ('../src/settings.php');


  use com\sg_group\pmv\App as Application;


  session_start();

  $uri = $_SERVER['REQUEST_URI'];
  $method = $_SERVER['REQUEST_METHOD'];

  $app = new Application\App($uri, getConfig(), $method);

  $app->get('/');

  $app->get('/login');

  $app->get('/user');

  $app->get('/logout');

  $app->post('/auth');

  if ($app->getContent() === NULL && $app->getDocument() === NULL){
    $app->response->setContent('../' . VIEWS_DIR . '/404.html');
  }

?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="/assets/css/bootstrap/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap/ct-navbar.css" rel="stylesheet" />
  </head>
  <body>
    <div id="navbar-orange">
        <nav class="navbar navbar-ct-orange" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/"><i class="pe-7s-home pe-fw"></i>SG-GROUP</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                          <?php
                              if (!isset($_SESSION['user'])){
                                echo '<a href="/login">
                                        <i class="pe-7s-angle-right"></i>
                                        <p>Login</p>
                                      </a>';
                              }else{
                                echo '<a href = "/logout" id = "logout">
                                  <i class = "pe-7s-angle-left"></i>
                                  <p>Logout</p>
                                </a>';
                              }
                           ?>
                    </li>
                    <?php
                        if (isset($_SESSION['user'])){
                          echo '<li>
                                  <a href="/user">
                                    <i class="pe-7s-user"></i>
                                    <p>User</p>
                                  </a>
                                </li>';
                        }
                     ?>
               </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

    </div><!--  end navbar -->

    <?php
      if ($app->getContent() !== null) {
        require ($app->getContent());
      }

      if (($app->getDocument()) !== null){
        require ($app->getDocument());
      }
    ?>
  </body>
  <script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="/assets/js/ct-navbar.js"></script>
</html>
