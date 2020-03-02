<?php

namespace App\DBConectivity\Core\Orm\Contract;

/**
 * Interface DriverInterface
 * @package App\DBConectivity\Core\Orm\Contract
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface DriverInterface
{
    /**
     * Insert operation.
     *
     * @param AbstractModel $model Model a ser salva.
     * @return mixed
     */
    public function insert(AbstractModel $model);

    /**
     * Update operation.
     *
     * @param AbstractModel $model
     * @return mixed
     */
    public function update(AbstractModel $model);

    /**
     * Delete operation.
     *
     * @param AbstractModel $model
     * @return mixed
     */
    public function delete(AbstractModel $model);

    /**
     * Get operation.
     *
     * @param string $tableName
     * @param array $filters
     * @param array $orderBy
     * @param array $select
     * @return mixed
     */
    public function get(string $tableName, array $filters = [], array $orderBy = [], array $select = []);
}