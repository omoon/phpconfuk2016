<?php
$sql = 'SELECT * FROM books';

$result = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
print_r($result);

$result = $pdo->query($sql)->fetchAll();
print_r($result);

// select * from `books`
echo $builder->table('books')->toSql();
$result = $builder->table('books')->get();

print_r($result);

// SELECT * FROM books
echo $dbal->select('*')->from('books')->getSQL();
$result = $dbal->select('*')->from('books')->execute()->fetchAll();
print_r($result);
