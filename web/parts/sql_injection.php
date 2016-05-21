<?php
// SQLインジェクション
$name = "t' OR 't' = 't";
$sql = "SELECT * FROM books where name = '$name'";

$result = $mysqli->query($sql);
print_r($result->fetch_all(MYSQLI_ASSOC));

$result = $pdo->query($sql);
print_r($result->fetchAll(PDO::FETCH_ASSOC));

$result = $builder->table('books')->where('name', '=', $name)->get();
print_r($result);
