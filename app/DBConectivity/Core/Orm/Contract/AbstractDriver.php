<?php

namespace App\DBConectivity\Core\Orm\Contract;

/**
 * Default interface for different DB drivers.
 *
 * Interface AbstractDriver
 * @package App\DBConectivity\Core\Orm
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
abstract class AbstractDriver implements DriverInterface
{
    /** @var \PDO $connection Object with database connection. */
    protected $connection;

    /**
     * DriverInterface constructor.
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Search of the table name base on the model.
     *
     * @param string $fullClassName Nome completo da classe.
     * @return string
     */
    protected function getTableName(string $fullClassName)
    {
        $className = explode('\\', $fullClassName);
        $className = end($className);
        $className = str_replace('Model', '', $className);
        $className = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $className));
        $className = str_replace('_', 's_', $className) . 's';

        return $className;
    }
}