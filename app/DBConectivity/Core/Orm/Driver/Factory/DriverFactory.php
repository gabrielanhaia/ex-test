<?php

namespace App\DBConectivity\Core\Orm\Driver\Factory;

use App\DBConectivity\Core\Orm\Contract\AbstractDriver;

/**
 * Interface DriverFactory
 * @package App\DBConectivity\Core\Orm\Driver\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface DriverFactory
{
    /**
     * Method responsible for create the instance of the database driver used.
     *
     * @return AbstractDriver
     */
    public function makeDriver() : AbstractDriver;
}