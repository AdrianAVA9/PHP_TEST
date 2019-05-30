<?php

  function is_url($s) {
      if (strpos($s, 'http://') === false) {
          return false;
      } else {
          return true;
      }
  }

  var_dump(is_url('http://php.net/'));