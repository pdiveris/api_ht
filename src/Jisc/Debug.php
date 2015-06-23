<?php
/**
 * Jisc APIs
 *
 * Debug
 *
 * General helper for printing out debug information. Not essential.
 *
 * @package      HT_Api
 * @subpackage   Debug
 * @category     Utilities
 * @author       Petros Diveris <petros.diveris@jisc.ac.uk>
 * @version      1.0
 *
 */
namespace Jisc;

/**
 * Class Debug
 * @package HT_Api
 */
class Debug
{
    /**
    * Internal dump function for prettty outputs
    * Needs re-implementing
    */
    public static function dump($var) {
        // @TODO: implement
    }

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
            var_dump($arg);
        }
    }

}