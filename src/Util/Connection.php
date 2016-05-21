<?php

namespace Omoon\PhpConFukuoka16\Util;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Illuminate\Database\Capsule\Manager as Builder;
use mysqli;
use PDO;

class Connection
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'database';

    /**
     * @return mysqli
     */
    public function getMysqli()
    {
        return new mysqli($this->host, $this->username, $this->password, $this->database);
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        $dsn = sprintf('mysql:host=%s;dbname=%s', $this->host, $this->database);
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    /**
     * @return \Doctrine\DBAL\Query\QueryBuilder
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getDbal()
    {
        $config = new Configuration();
        $connectionParams = [ 
            'url' => sprintf('mysql://%s:%s@%s/%s', $this->username, $this->password, $this->host, $this->database)
        ];
        $conn = DriverManager::getConnection($connectionParams, $config);
        $conn->setFetchMode(PDO::FETCH_ASSOC);

        return $conn->createQueryBuilder();
    }

    /**
     * @return \Illuminate\Database\Connection
     */
    public function getBuilder()
    {
        $builder = new Builder();
        $builder->addConnection([
            'driver' => 'mysql',
            'host' => $this->host,
            'database' => $this->database,
            'username' => $this->username,
            'password' => $this->password,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $builder->setAsGlobal();
        $builder->setFetchMode(PDO::FETCH_ASSOC);
        $builder->bootEloquent();
        return $builder->connection();
    }
}

