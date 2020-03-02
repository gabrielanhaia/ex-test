<?php

namespace App\ABTesting\Model;

use App\DBConectivity\Core\Orm\Contract\AbstractModel;

/**
 * Class DesignModel
 * @package App\DBConectivity\Model
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class DesignModel extends AbstractModel
{
    /** @var integer $id */
    protected $id;

    /** @var float $splitPercentage */
    protected $splitPercentage;

    /** @var string $name */
    protected $name;

    /** @var int $totalAccess */
    protected $totalAccess;

    /** @var string $orm_tableName Custom table name (if it wasn't defined, the table name would be used by class name) */
    protected $orm_tableName = 'designs';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DesignModel
     */
    public function setId(int $id): DesignModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getSplitPercentage(): float
    {
        return $this->splitPercentage;
    }

    /**
     * @param float $splitPercentage
     * @return DesignModel
     */
    public function setSplitPercentage(float $splitPercentage): DesignModel
    {
        $this->splitPercentage = $splitPercentage;
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
     * @return DesignModel
     */
    public function setName(string $name): DesignModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalAccess(): int
    {
        return $this->totalAccess;
    }

    /**
     * @param int $totalAccess
     * @return DesignModel
     */
    public function setTotalAccess(int $totalAccess): DesignModel
    {
        $this->totalAccess = $totalAccess;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrmTableName(): string
    {
        return $this->orm_tableName;
    }

    /**
     * @param string $orm_tableName
     * @return DesignModel
     */
    public function setOrmTableName(string $orm_tableName): DesignModel
    {
        $this->orm_tableName = $orm_tableName;
        return $this;
    }
}