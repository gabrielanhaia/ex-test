<?php

/**
 * Class Autoloader
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class Autoloader {
    static public function exadsLoader($className) {
        $fileNameFragments = explode("\\", $className);

        if ($fileNameFragments[0] === 'App') {
            $fileNameFragments[0] = 'app';
        }

        $fileName = implode('/', $fileNameFragments);
        $fileName .= '.php';

        if (file_exists($fileName)) {
            include_once($fileName);
            if (class_exists($className)) {
                return true;
            }
        }

        return false;
    }
}
spl_autoload_register('Autoloader::exadsLoader');