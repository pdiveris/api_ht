<?php
/**
 * Test Metastore
 */
namespace Jisc\api\XmlSerialization\Tests;

use Jisc\api\XmlSerialization\ClassMeta;
use Jisc\api\XmlSerialization\ClassMetaStore;

/**
 * Class ClassMetaStoreTests
 * @package Jisc\api\XmlSerialization\Tests
 */
class ClassMetaStoreTests
{
    /**
     * Stop hassling me for documentation
     */
    function test_1()
    {
        $class = __NAMESPACE__ . "\\Sample1";
        $meta = ClassMetaStore::getMeta($class);
        assert($meta->getClassName() == $class);
    }


}