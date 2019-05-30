<?php
  $data = [
    'term' => $_GET['q']
  ];
  
  header('Content-type: application/json');
  
  echo json_encode($data, JSON_HEX_TAG | JSON_HEX_QUOT | JSON_HEX_APOS | JSON_HEX_AMP);
  