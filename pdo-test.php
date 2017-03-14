<?php
$host = 'localhost';
$port = '5432';
$user = 'postgres';

$database = 'puppies';

try {
  $dbh = new PDO("pgsql:host=$host;port=$port;dbname=$database;user=$user");
  echo "Connected!\n";
} catch (PDOException $e) {
  echo "Error : " . $e->getMessage() . "<br/>";
  die();
}

$query = $dbh->query('SELECT * from pups limit 3');

foreach ($query as $row) {
  print_r($row);
}


?>
