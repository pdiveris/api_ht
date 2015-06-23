<?php
class TestTest extends PHPUnit_Framework_TestCase
{
   /**
    * Test \Jisc\Test class
    */
    public function testIcanCreateAnInstanceOfTest()
    {
        $x = new \Jisc\Test;
        $this->assertTrue( ('hello'==$x->hello()), 'Test Class is happy and returns hello');
    }

   /**
    * Test \Jisc\Helper class
    */
    public function testHelperReturnsStuff()
    {
        $this->assertEquals(\Jisc\Helper::pageSizes(), array(10=>10,25=>25,50=>50,100=>100));
    }    

   /**
    * Test \Jisc\Helpers class
    */
    public function testHelpersReturnsStuff()
    {
        $this->assertEquals(\Jisc\api\Helpers::hello(), 'hello');
    }    

   /**
    * Test \Jisc\Debug class
    */
    public function testDebugDump()
    {
        // $this->assertNull(\Jisc\Debug::dumpMulti([1,2,5,6],'Koko the cat', 1.76));
    }    

    /**
    * Test \Jisc\api\Collection class with data
    */
    public function testJiscCollection() {
    	$collection = new \Jisc\api\Collection([1=>'alpha',2=>'beta',3=>'gamma',4=>'delta']);
    	
    	$this->assertEquals($collection->all(), [1=>'alpha',2=>'beta',3=>'gamma',4=>'delta'], 
    			'Collection created, returns the right data'
    		);

    	$this->assertEquals($collection->has(1),1,'Collection has key 1');
    	$this->assertEquals($collection->toJson(), '{"1":"alpha","2":"beta","3":"gamma","4":"delta"}');
    }

   /**
    * Initialise a \Jisc\api\Service\Context
    * and check whether we get back what we should
    */
    public function testJiscContextWithData() {
	    $context = new \Jisc\api\Service\Context(['limit'=>10, 'offset'=>0, 'totalCount'=>222, 'query'=>'select * where id>1', 'queryDate'=>date('Y-m-d H:i:s')]);
	    $this->assertEquals($context->getLimit(),10, 'Got correct limit of 10 from Context');
	    $this->assertEquals($context->getOffset(),0, 'Got correct offset 0 from Context');
	    $this->assertEquals($context->getTotalCount(),222, 'Got correct total 222 from Context');
    }

   /**
    * Initialise a \Jisc\api\Service\Hairdressing\Item
    * and check whether we get back what we should
    */
    public function testJiscHTItem() {
		$item = new \Jisc\api\Service\Hairdressing\Item(['nid'=>22, 'title'=>'The Graduated Bob: Guide', 'type'=>'page' ]);
		$this->assertEquals($item->getId(),22, 'Item created and returns the correct ID');
		$this->assertEquals($item->getHandle(),'node/22', 'Item  returns the correct handle');
		$this->assertEquals($item->getType(), 'page', 'Item type returned correctly');
		$this->assertEquals($item->getName(), 'The Graduated Bob: Guide', 'We got a Graduated Bob');
    }
}
?>