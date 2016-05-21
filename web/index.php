<?php
use Omoon\PhpConFukuoka16\model\Author;
use Omoon\PhpConFukuoka16\model\Book;
use Omoon\PhpConFukuoka16\Util\Connection;

$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4("Omoon\\PhpConFukuoka16\\", __DIR__ . "/../src/");

$connection = new Connection();

$mysqli = $connection->getMysqli();
$pdo = $connection->getPdo();
$builder = $connection->getBuilder();
$dbal = $connection->getDbal();
include __DIR__ . '/parts/migration.php';
?>

<pre>
<?php
include __DIR__ . '/parts/select.php';
include __DIR__ . '/parts/for_slides.php';
include __DIR__ . '/parts/select_with_query.php';
include __DIR__ . '/parts/join.php';
include __DIR__ . '/parts/sql_injection.php';
include __DIR__ . '/parts/prepared_statement.php';
include __DIR__ . '/parts/prepared_statement2.php';
include __DIR__ . '/parts/aggregate_function.php';
include __DIR__ . '/parts/insert.php';
include __DIR__ . '/parts/filtering.php';
?>


</pre>
