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

$statement = $dbh->prepare("INSERT INTO pups(name, breed, age, sex) VALUES(:name, :breed, :age, :sex)");
$statement->execute(array(
    "name" => "Bob",
    "breed" => "Desaunois",
    "age" => "18",
    "sex" => "f"
));


$query = $dbh->query('SELECT * from pups');

foreach ($query as $row) {
  print_r($row);
}


?>
