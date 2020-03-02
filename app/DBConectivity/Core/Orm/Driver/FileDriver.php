<?php

namespace App\DBConectivity\Core\Orm\Driver;

use App\DBConectivity\Core\Orm\Contract\AbstractDriver;
use App\DBConectivity\Core\Orm\Contract\AbstractModel;

/**
 * Class FileDriver
 * @package App\DBConectivity\Core\Orm\Driver
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class FileDriver extends AbstractDriver
{
    /**
     * @inheritDoc
     */
    public function insert(AbstractModel $model)
    {

    }

    /**
     * @inheritDoc
     */
    public function update(AbstractModel $model)
    {

    }

    /**
     * @inheritDoc
     */
    public function get(string $tableName, array $filters = [], array $orderBy = [], array $select = [])
    {
       $conteudo = file_get_contents("{$tableName}.json");

       return \json_decode($conteudo, true);
    }

    /**
     * @inheritDoc
     */
    public function delete(AbstractModel $model)
    {

    }
}