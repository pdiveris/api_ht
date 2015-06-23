<?php
class HelperTest extends PHPUnit_Framework_TestCase
{

   /**
    * Can we get something from \Jisc\Help?
    */
    public function testHelperReturnsStuff()
    {
        $this->assertEquals(\Jisc\Helper::pageSizes(), array(10=>10,25=>25,50=>50,100=>100));
    }
}
?>