<?php

namespace App\DBConectivity\Core\Orm\Driver;

use App\DBConectivity\Core\Orm\Contract\AbstractDriver;
use App\DBConectivity\Core\Orm\Contract\AbstractModel;
use PDO;

/**
 * Class MysqlDriver
 * @package App\DBConectivity\Core\Orm\Driver
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class MysqlDriver extends AbstractDriver
{
    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    public function insert(AbstractModel $model)
    {
        $namespace = get_class($model);

        $reflectionClass = new \ReflectionClass($namespace);

        $finalAttributesToSave = [];
        $ormAttributes = [];

        foreach ($reflectionClass->getDefaultProperties() as $propertyName => $value) {
            if (preg_match('|^orm_|', $propertyName)) {
                $ormAttributes[$propertyName] = $propertyName;
                continue;
            }

            $finalAttributesToSave[] = $propertyName;
        }

        $tableName = $this->getTableName(get_class($model));
        if (!empty($ormAttributes['orm_tableName'])) {
            $tableName = $reflectionClass->getDefaultProperties()['orm_tableName'];
        }

        $insertFieldNames = [];
        $insertValueNames = [];
        $insertBindValues = [];
        foreach ($finalAttributesToSave as $attribute) {
            if ($attribute === 'id') {
                continue;
            }

            $insertFieldNames[] = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $attribute));

            $methodName = 'get' . ucfirst($attribute);

            $insertBindValues[] = '?';

            $insertValueNames[] = $model->{$methodName}();
        }

        $insertFieldNames = implode(', ', $insertFieldNames);
        $insertBindValues = implode(', ', $insertBindValues);

        $sql = "INSERT INTO {$tableName} ({$insertFieldNames}) VALUES ({$insertBindValues})";

        $this->connection->prepare($sql)
            ->execute($insertValueNames);

        $model->setId($this->connection->lastInsertId());
    }

    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    public function update(AbstractModel $model)
    {
        $namespace = get_class($model);

        $reflectionClass = new \ReflectionClass($namespace);

        $finalAttributesToSave = [];
        $ormAttributes = [];

        foreach ($reflectionClass->getDefaultProperties() as $propertyName => $value) {
            if (preg_match('|^orm_|', $propertyName)) {
                $ormAttributes[$propertyName] = $propertyName;
                continue;
            }

            $finalAttributesToSave[] = $propertyName;
        }

        $tableName = $this->getTableName(get_class($model));
        if (!empty($ormAttributes['orm_tableName'])) {
            $tableName = $reflectionClass->getDefaultProperties()['orm_tableName'];
        }

        $insertValueNames = [];
        $insertBindValues = [];
        foreach ($finalAttributesToSave as $attribute) {
            if ($attribute === 'id') {
                continue;
            }

            $fieldName = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $attribute));

            $methodName = 'get' . ucfirst($attribute);

            $insertBindValues[] = "{$fieldName} = ?";

            $insertValueNames[] = $model->{$methodName}();
        }

        $insertBindValues = implode(', ', $insertBindValues);

        $sql = "UPDATE {$tableName} SET {$insertBindValues} WHERE id = {$model->getId()}";

        $this->connection->prepare($sql)
            ->execute($insertValueNames);
    }

    /**
     * @inheritDoc
     *
     * I didn't covered all fields against SQL Injection, only the where clause (on purpose).
     * (In a real situation i would cover all variable params).
     *
     */
    public function get(string $tableName, array $filters = [], array $orderBy = [], array $select = [])
    {
        $selectFields = empty($select) ? '*' : implode(', ', $select);

        $sql = "SELECT {$selectFields} FROM {$tableName}";

        $allFilters = [];
        if (!empty($filters)) {
            $sql .= ' WHERE ';

            foreach ($filters as $filter) {
                if (sizeof($filter) == 1) {
                    $sql .= $filter[0] . " AND ";
                    continue;
                }

                $values = implode([
                    $filter[0],
                    $filter[1],
                    '?',
                ]);

                $allFilters[] = $filter[2];

                $sql .= $values . " AND ";
            }
        }
        $sql = rtrim($sql, ' AND ');

        if (!empty($orderBy)) {
            foreach ($orderBy as $orderByField => $order) {
                $order = strtoupper($order);

                $sql .= " ORDER BY {$orderByField} {$order}, ";
            }
        }
        $sql = rtrim($sql, ', ');

        $statment = $this->connection->prepare($sql);
        $statment->execute($allFilters);
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            return [];
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function delete(AbstractModel $model)
    {
        $namespace = get_class($model);

        $reflectionClass = new \ReflectionClass($namespace);

        $tableName = $this->getTableName(get_class($model));
        if (!empty($ormAttributes['orm_tableName'])) {
            $tableName = $reflectionClass->getDefaultProperties()['orm_tableName'];
        }

        $sql = "DELETE FROM {$tableName} WHERE id = {$model->getId()}";

        $this->connection->prepare($sql)
            ->execute();
    }
}