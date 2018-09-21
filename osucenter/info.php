<?php
  // JSON string
  $someJSON = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';

  // Convert JSON string to Array
  $someArray = json_decode($someJSON, true);
  foreach ($someArray as $key => $value) {
    echo $value["name"] . ", " . $value["gender"] . "<br>";
  }

  // Loop through Object
  $someObject = ...; // Replace ... with your PHP Object
  foreach($someObject as $key => $value) {
    echo $value->name . ", " . $value->gender . "<br>";
  }
?>