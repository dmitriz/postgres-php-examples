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

$statement = $dbh->prepare("INSERT INTO pups(breed, age, sex) VALUES(:breed, :age, :sex)");
try {
  $statement->execute(array(
    // "name" => "Bobic",
    "breed" => "Desaunoissss",
    "age" => 4,
    "sex" => "f"
  ));
} catch (PDOException $e) {
  echo "Error : " . $e->getMessage() . "<br/>";
  die();
}


$query = $dbh->query('SELECT * from pups');

foreach ($query as $row) {
  // print_r($row);
}


?>
