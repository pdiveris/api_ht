<?php
/**
 * Unit test 9
 */
namespace Jisc\api\XmlSerialization\Tests;

/**
 * Class Sample9
 * @package Jisc\api\XmlSerialization\Tests
 */
class Sample9
{

    /**
     * child
     * @XmlElement(Sample9)
     */
    public $child;

    /**
     * str
     * @XmlElement
     */
    public $str;

}
