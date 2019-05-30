<?php
  $data = [
    'term' => $_GET['q']
  ];
  
  echo json_encode($data);
  