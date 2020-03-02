<?php

namespace App\DBConectivity\Core\Orm\Manager;

use App\DBConectivity\Core\Exception\OrmException;
use App\DBConectivity\Core\Orm\Contract\{
    AbstractDriver, AbstractModel, DriverInterface
};
use App\DBConectivity\Core\Orm\Driver\Factory\FileDriverFactory;
use App\DBConectivity\Core\Orm\Driver\Factory\MysqlDriverFactory;

/**
 * Class EntityManager
 * @package App\DBConectivity\Core\Orm\Manager
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class EntityManager implements DriverInterface
{
    /** @var AbstractDriver $driver  */
    private $driver;

    /**
     * EntityManager constructor.
     * @throws OrmException
     */
    public function __construct()
    {
        $driverName = getenv('DB_DRIVER');

        switch ($driverName) {
            case 'mysql':
                $mysqlDriverFactory = new MysqlDriverFactory;
                $this->driver = $mysqlDriverFactory->makeDriver();
                break;
            case 'file':
                 $fileDriverFactory = new FileDriverFactory;
                 $this->driver = $fileDriverFactory->makeDriver();
                break;
            default:
                throw new OrmException('You must define the DB_DRIVER.');
        }
    }

    /**
     * @inheritDoc
     */
    public function insert(AbstractModel $model)
    {
        $this->driver->insert($model);
    }

    /**
     * @inheritDoc
     */
    public function update(AbstractModel $model)
    {
        $this->driver->update($model);
    }

    /**
     * @inheritDoc
     */
    public function get(string $tableName, array $filters = [], array $orderBy = [], array $select = [])
    {
        return $this->driver->get($tableName, $filters, $orderBy, $select);
    }

    /**
     * @inheritDoc
     */
    public function delete(AbstractModel $model)
    {
        $this->driver->delete($model);
    }
}