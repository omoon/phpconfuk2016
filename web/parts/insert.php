<?php
//insert 
$bench = new Ubench;

$values = [];
for ($i = 0; $i < 10000; $i++) {
    $values[] = [
        'name' => 'name' . $i,
        'author_id' => rand(1, 10),
        'price' => rand(500, 10000),
    ];
}

$sql = "INSERT INTO books (name, author_id, price) values (?, ?, ?)";

$bench->start();
$sth = $mysqli->prepare($sql);
$sth->bind_param('ssi', $name, $authors, $price);
foreach ($values as $value) {
    $name = $value['name'];
    $authors = $value['author_id'];
    $price = $value['price'];
    $sth->execute();
}
$bench->end();
printf("mysqli %s\n", $bench->getTime());

$bench->start();
$sth = $pdo->prepare($sql);
foreach ($values as $value) {
    $sth->execute(array_values($value));
}
$bench->end();
printf("pdo %s\n", $bench->getTime());

$bench->start();
$builder->table('books')->insert($values);
$bench->end();
printf("builder %s\n", $bench->getTime());
