<?php

  session_start();
  
  session_regenerate_id(true);
  
  echo 'Current session ID: ' . session_id();