<?php

if (!function_exists('dump')) {
    /**
     * Function responsible for data printing
     *
     * @param mixed $data Data to be printed.
     */
    function dump($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('dd')) {
    /**
     * Function responsible for data printing and stop the script execution.
     *
     * @param mixed $data Data to be printed.
     */
    function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
}