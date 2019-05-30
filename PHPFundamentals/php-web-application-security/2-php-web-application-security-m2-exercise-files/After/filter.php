<?php
  var_dump(filter_var(
      ' doe€snöt@€x!st',
      FILTER_SANITIZE_EMAIL));
  var_dump(filter_var(
      'X-123.456E789Y',
      FILTER_SANITIZE_NUMBER_FLOAT,
      FILTER_FLAG_ALLOW_SCIENTIFIC | FILTER_FLAG_ALLOW_FRACTION));
  var_dump(filter_has_var(
      INPUT_GET,
      'id'));
  var_dump(filter_input(
      INPUT_GET,
      'id',
      FILTER_VALIDATE_INT));
