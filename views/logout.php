<?php
  session_start();
  session_unset();
  exit(header("Location: /"));
