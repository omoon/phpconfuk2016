<?php
// プリペアドステイトメント
$name = "t' OR 't' = 't";
$sql = "SELECT * FROM books where name = ?";

$sth = $mysqli->prepare($sql);
$sth->bind_param('s', $name);
$sth->execute();
$result = $sth->get_result();
print_r($result->fetch_all(MYSQLI_ASSOC));

$sth = $pdo->prepare($sql);
$sth->execute([$name]);
print_r($sth->fetchAll(PDO::FETCH_ASSOC));

$result = $builder->table('books')->where('name', '=', $name)->get();
print_r($result);
