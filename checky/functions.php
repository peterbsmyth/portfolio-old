<?php
$q = $_GET['q'];

function getChecky() {
  require 'db/connect.php';
  $result = $db->query("SELECT * FROM checky")->fetch_object();

  echo json_encode($result);
  }
}


if ($q == "checky"){getChecky();}

?>
