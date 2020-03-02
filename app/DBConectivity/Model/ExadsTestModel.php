<?php

namespace App\DBConectivity\Model;

use App\DBConectivity\Core\Orm\Contract\AbstractModel;

/**
 * Class ExadsTestModel
 * @package App\DBConectivity\Model
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ExadsTestModel extends AbstractModel
{
    /** @var integer $id */
    protected $id;

    /** @var integer $age */
    protected $age;

    /** @var string $name */
    protected $name;

    /** @var string $jobName */
    protected $jobName;

    /** @var string $orm_tableName Custom table name (if it wasn't defined, the table name would be used by class name) */
    protected $orm_tableName = 'exads_test';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ExadsTestModel
     */
    public function setId(int $id): ExadsTestModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return ExadsTestModel
     */
    public function setAge(int $age): ExadsTestModel
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ExadsTestModel
     */
    public function setName(string $name): ExadsTestModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getJobName(): string
    {
        return $this->jobName;
    }

    /**
     * @param string $jobName
     * @return ExadsTestModel
     */
    public function setJobName(string $jobName): ExadsTestModel
    {
        $this->jobName = $jobName;
        return $this;
    }
}