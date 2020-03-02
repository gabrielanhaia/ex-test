<?php

namespace App\DBConectivity\Core\Orm\Driver\Factory;

use App\DBConectivity\Core\Orm\Contract\AbstractDriver;
use App\DBConectivity\Core\Orm\Driver\MysqlDriver;

/**
 * Class MysqlDriverFactory
 * @package App\DBConectivity\Core\Orm\Driver\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class MysqlDriverFactory implements DriverFactory
{
    /**
     * @inheritDoc
     */
    public function makeDriver(): AbstractDriver
    {
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASSWORD');
        $host = getenv('DB_HOST');
        $name = getenv('DB_NAME');

        $connection = new \PDO("mysql:host={$host};dbname={$name}", $user, $pass);
        return new MysqlDriver($connection);
    }
}