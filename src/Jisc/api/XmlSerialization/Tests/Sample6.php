<?php
/**
 * UNIT Test 6
 */
namespace Jisc\api\XmlSerialization\Tests;

/** Bad: static property */
class Sample6
{

    /**
     * var a
     * @XmlElement
     */
    private static $a;

}
