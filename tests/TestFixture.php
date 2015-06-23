<?php

/*
 * This file is part of hthe ht_api package.
 *
 * (c) Petros Diveris <petros@jic.ac.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__.'/../vendor/autoload.php';


class TestFixture extends \PHPUnit_Framework_TestCase
{
    private $saveTz;

   /**
    * boot function
    */
    protected function setUp()
    {
        //save current timezone
        $this->saveTz = date_default_timezone_get();

        date_default_timezone_set('Europe/Lisbon');
    }

   /**
    * Tear down function
    */
    protected function tearDown()
    {
        date_default_timezone_set($this->saveTz);
    }

}
