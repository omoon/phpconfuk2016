<?php
// 集約関数
$price = 2000;
$sql = "SELECT count(*), min(price), max(price), sum(price) FROM books where price >= ?";

$sth = $mysqli->prepare($sql);
$sth->bind_param('i', $price);
$sth->execute();
$result = $sth->get_result();
print_r($result->fetch_array(MYSQLI_ASSOC));

$sth = $pdo->prepare($sql);
$sth->execute([$price]);
print_r($sth->fetchAll(PDO::FETCH_ASSOC));

$result = $builder->table('books')->where('price', '>=', $price)->count();
print_r($result);
