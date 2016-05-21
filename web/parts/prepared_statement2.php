<?php
// プリペアドステイトメント２
// SQLとパラメータが離れてしまうのがいや
$name = '%PHP%';
$price = 3000;
$sql = "SELECT * FROM books where name like ? and price >= ?";

$sth = $mysqli->prepare($sql);
$sth->bind_param('si', $name, $price);
$sth->execute();
$result = $sth->get_result();
print_r($result->fetch_all(MYSQLI_ASSOC));

$sth = $pdo->prepare($sql);
$sth->execute([$name, $price]);
print_r($sth->fetchAll(PDO::FETCH_ASSOC));

$result = $builder->table('books')->where('name', 'like', $name)->where('price', '>=', $price)->get();
print_r($result);
