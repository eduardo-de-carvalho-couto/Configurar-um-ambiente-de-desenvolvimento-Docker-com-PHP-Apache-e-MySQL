<?php

echo "hello from docker-compose!";

function conectar(){
    try {
        $conn = new PDO('mysql:host=db;dbname=company1', 'root', 'example');

        return $conn;
    } catch (\PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
    }
}

conectar();


$query = "insert into users(name, fav_color) values('Lil Sneazy', 'Yellow')";
$result = conectar()->query($query);
$query = "insert into users(name, fav_color) values('Nick Jonas', 'Brown')";
$result = conectar()->query($query);
$query = "insert into users(name, fav_color) values('Maroon 5', 'Maroon')";
$result = conectar()->query($query);
$query = "insert into users(name, fav_color) values('Tommy Baker', '043A2B')";
$result = conectar()->query($query);


$sql = "select * from users";
$stmt = conectar()->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_OBJ);


foreach ($users as $user) {
    echo "<br><br><br><br>";
    echo $user->name . "-" . $user->fav_color;
    echo "<br>";
}
