<?php
/**
 * Unit test 3
 */
namespace Jisc\api\XmlSerialization\Tests;

/** Bad: duplicate attribute */
class Sample3
{

    /**
     * a
     * @XmlAttribute(float, test)
     */
    private $a;

    /**
     * b
     * @XmlAttribute(T, test)
     */
    private $b;

}