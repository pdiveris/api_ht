<?php
/**
 * Jisc APIs
 *
 * Debug
 *
 * General helper for printing out debug information. Not essential.
 *
 * @package      Jisc
 * @subpackage
 * @category     Utilities
 * @author       Petros Diveris <petros.diveris@jisc.ac.uk>
 * @version      1.0
 *
 */
namespace Jisc\api;

/**
 * Class Debug
 * @package MIMAS
 */
class Debug
{

    /**
     * Dumps information about multiple variables
     * @return void
     */
    public static function dumpMulti()
    {
        // get variables to dump
        $args = func_get_args();

        // loop through all items to output
        foreach ($args as $arg) {
            self::dump($arg);
        }
    }


 

}